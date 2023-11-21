<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Hooper;
use Session;
use Storage;
use Cache;

class TrainerController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function __construct(
        Hooper $hooper
    ) {
        $this->hooper = $hooper;
    }

    public function training_planner()
    {   
        $search_request['resolveRefs'] = [
                    "Company" => ["Company_Name"],
        ];

        $search_request['criteria'] = [
                    "Company" => session('company_id'),
        ];
        $response = $this->hooper->getTransactionList('svc_type_10',1,10,$search_request,null);
        $requests = $response->data->data->content ?? [];
        return view('employer.trainings.training_planner',compact('requests'));
    }

    public function manage_trainers(Request $request)
    {   
        $search_request= [
          "criteria"=>["Application_Status"=>"Payment Complete","Company"=> $request->session()->get('company_id')],
          "resolveRefs"=> [
            "Company" => ["Company_Name"],
            "Trainer" => ["First_Name","Email"],
            "Training_Request" => ["Internal_Training_Title","Start_Date"]
          ]];
       $response = $this->hooper->getTransactionList('svc_type_21',1,100,$search_request);
          if($response->status == true){
            $data=$response->data->data->content ?? [];
          }
        return view('employer.trainings.manage_trainers',compact('data'));
    }

    public function trainer_requests(Request $request)
    {   
        $search_request= [
          "criteria"=>["Company"=> $request->session()->get('company_id')],
          "resolveRefs"=> [
            "Company" => ["Company_Name"],
            "Trainer" => ["First_Name","Email"],
          ]];
       $response = $this->hooper->getTransactionList('svc_type_21',1,100,$search_request);
          if($response->status == true){
            $data=$response->data->data->content ?? [];
          }
        return view('employer.trainings.trainer_requests',compact('data'));
    }

    public function trainer_schedule()
    {   
        
        return view('employer.trainings.training_scheduled');
    }


    


     public function create_training(Request $request,$id=null,$trainingid=null)
    {    
         $data = [];  
         $modules = [];    
         if($id){
            /*$search_request['resolveRefs'] = [
                    "Job_Category" => ["Name"],
            ];*/
            $search_request['criteria'] = [
                    "Training_Request_ID" => [$trainingid],
            ];
            $response = $this->hooper->getTransactionList('svc_type_10',1,1,$search_request,null);
            $data = $response->data->data->content[0] ?? [];    
            if($response->data->statusCode == 0){
                $search_request = [
                    "criteria" => [
                        "Training_Request" => $id
                    ],
                ];
                $search_request['sortCriteria'] = ["sortOn"=>"Request_Module_ID","sortBy"=>"ASC"];
                $response = $this->hooper->getTransactionList('svc_type_11',1,3,$search_request,null);
                $modules = $response->data->data->content ?? [];
            }
         }   
         if($request->isMethod('post')){

            $request->validate([
            'training_title' => ['required','string'],
            'no_of_modules' => ['required','numeric'],
            'department'  => ['required','string'],
            'number_of_trainees'  => ['required', 'numeric'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'training_type' => ['required','string']
            ]);


           $training_details = [
                "Company" => $request->session()->get('company_id'),
                "Internal_Training_Title" => $request->training_title,
                "Number_of_Modules_Required" => (int)$request->no_of_modules,
                "Department" => $request->department,
                "Number_of_Trainees" => (int)$request->number_of_trainees,
                "Start_Date" => date('Y-m-d',strtotime($request->start_date)),
                "End_Date" => date('Y-m-d',strtotime($request->end_date)),
                "Training_Type" => $request->training_type,
                "Request_Status" => "Draft"
           ];

           if($request->session()->get('role')=='employer'){
             $training_details['Posted_by_Superadmin'] = $request->session()->get('register_id');
           }elseif($request->session()->get('role')=='team'){
             $training_details['Posted_by_User'] = $request->session()->get('register_id');
           }



           if($request->id){
            $response = $this->hooper->updateTransaction('svc_type_10',$request->id,$training_details);
            $success_msg = 'Training Request updated successfully';
           }else{
            $response = $this->hooper->createTransaction('svc_type_10',$training_details,null,null);
            $success_msg = 'Training Request created successfully';
           }
           //print_r($request->training_topic);exit;
           if($response->status == true){

                if($response->data->statusCode != 0){//check if any error

                    $request->session()->flash('failed', $response->data->statusMessage);
                    return redirect()->back()->withInput();
                }

                foreach($request->training_topic as $key=>$val){
                

                    if($request->id){
                        $module_details = [
                            "Training_Topic"=>$request->training_topic[$key],
                            "Topic_Description"=>$request->description[$key]
                        ];
                        
                        $response = $this->hooper->updateTransaction('svc_type_11',$request->module_id[$key],$module_details);
                    }else{
                        $module_details = [
                            "Training_Request"=> $response->data->data->id,
                            "Training_Topic"=>$request->training_topic[$key],
                            "Topic_Description"=>$request->description[$key]
                        ];
                        $this->hooper->createTransaction('svc_type_11',$module_details,null,null);
                    }

                }


                $request->session()->flash('success', $success_msg);
                sleep(1);
                return redirect()->route('training_requests');

           }else{
             $request->session()->flash('failed', $response->data->message);
             return redirect()->back()->withInput();
           }

          
            
        }


        return view('employer.trainings.create_training',compact('data','id','modules'));
    }

    public function update_status(Request $request,$txnid,$status)
    {   

        $request_json = [
                "Application_Status" => $status
        ];
        $response = $this->hooper->updateTransaction('svc_type_21',$txnid,$request_json);

        if($response->status==true){
            if($response->data->statusCode==0){
                $request->session()->flash('success', 'Status updated successfully');
                sleep(1);
            return redirect()->back();
        }
        }
        
    }

    



    
}