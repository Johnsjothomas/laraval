<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Hooper;
use App\Services\Register;
use Session;
use Storage;
use Cache;

class AspirantController extends Controller
{   
    
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function __construct(
        Hooper $hooper,Register $register
    ) {
        $this->hooper = $hooper;
        $this->register = $register;
    }

    public function aspirant_list(Request $request,$module=null,$search_request=array(""=>""))
    {   
        $data = [];
        $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id')]];
        $response = $this->hooper->getTransactionList('svc_type_16',1,100,$search_request);
        $training_modules = $response->data->data->content ?? [];
        if(!empty($module)){
          $search_request=["resolveRefs"=>["Aspirant" => ["First_Name"]]];
       $response = $this->hooper->getTransactionList('svc_type_18',1,100,$search_request);
          if($response->status == true){
            $data=$response->data->data->content ?? [];
          }
        }

       return view('trainer.aspirant.listaspirant',compact('data','module','training_modules'));
    }

    public function aspirant_contacted(Request $request,$module=null,$search_request=array(""=>""))
    {   
           $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id')]];
          $search_request=["resolveRefs"=>["Aspirant" => ["First_Name"]]];
       $response = $this->hooper->getTransactionList('svc_type_19',1,100,$search_request);
          if($response->status == true){
            $data=$response->data->data->content ?? [];
          }

       return view('trainer.aspirant.aspirantcontacted',compact('data'));
    }

    public function aspirant_search(Request $request,$keyword=null,$search_request=array(""=>""))
    {   
        //$search_request= ["criteria"=>["Module_ID"=>$id]];
       $response = $this->hooper->getAspirantList('usr_type_4',1,10,$search_request);
       //print_r($response);exit;
          if($response->status == true){
            $data=$response->data->data->content ?? [];
          }
        $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id')]];
       $response = $this->hooper->getTransactionList('svc_type_16',1,50,$search_request);  
       $training_modules = $response->data->data->content ?? [];
          
       return view('trainer.aspirant.searchaspirant',compact('data','training_modules'));
    }

    public function training_schedule(Request $request,$search_request=array(""=>""))
    {   
       /* //$search_request= ["criteria"=>["Module_ID"=>$id]];
       $response = $this->hooper->getAspirantList('usr_type_4',1,10,$search_request);
       //print_r($response);exit;
          if($response->status == true){
            $data=$response->data->data->content[0] ?? [];
          }*/
       return view('trainer.aspirant.aspiranttrainingschedule');
    }

    public function contact_aspirant(Request $request)
    {   
        $request = [
                    "Trainer" => $request->session()->get('register_id'),
                    "Aspirant" => $request->aspirant_id,
                    "Module" => $request->training_module,
                    "Message" => 'Checkout my new training module.'
                ];
        $response = $this->hooper->createTransaction('svc_type_19',$request,null,null); 
        //$request->session()->flash('success', 'Message sent successfully');
                sleep(1);
                return redirect()->back();
    }


    
}