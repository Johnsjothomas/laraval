<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Register;
use App\Services\Hooper;
use Session;
use Storage;
use Cache;

class EmployerController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function __construct(
        Register $employer,Hooper $hooper
    ) {
        $this->register = $employer;
        $this->hooper = $hooper;
    }

    public function update_profile(Request $request)
    {   
        $companyId = null;
        $search_request=[];
        $search_request['resolveRefs'] = [
                    "Select_Superadmin" => ["First_Name"],
        ];
        $search_request['criteria']['Select_Superadmin'] = $request->session()->get('register_id');
        $response = $this->register->getTransactionList('svc_type_5',1,1,$search_request);
        if($response->status == true){
            $data=$response->data->data->content[0] ?? [];
            $companyId = $response->data->data->content[0]->id ?? null; 
            //print_r($data);exit;
        }

         if($request->isMethod('post')){

            $request->validate([
            'company_name' => ['required','string'],
            'industry_type' => ['required','string'],
            'website'  => ['required', 'string', 'max:30'],
            'company_profile'  => ['required', 'string'],
            'linkedin' => ['nullable', 'string'],
            'registration_no' => ['required', 'string'],
            'vat_details' => ['required', 'string'],
            'company_size' => ['required', 'numeric'],
            ]/*,[
                'password.regex' => 'Password must be alphanumeric'
            ]*/);

           $profile_details = [
                "Select_Superadmin" => $request->session()->get('register_id'),
                "Company_Name" => $request->company_name,
                "Type" => $request->industry_type,
                "Website_URL" => [
                    "title"=>'website',
                    "value"=>$request->website
                ],
                "Linkedin_URL" => [
                    "title"=>'linkedin',
                    "value"=>$request->linkedin
                ],
                "Company_Registration_Number" => $request->registration_no,
                "VAT_details" => $request->vat_details,
                "Company_Size" => $request->company_size,
                "Location" => $request->location,
                "Company_Profile" => $request->company_profile
           ];

           if(!empty($request->profile_pic)){
            $url = $request->profile_pic;
            $contents = file_get_contents($url);
            $name = 'User_'.time().'.png';
            $path = 'public/profile/'.$name;
            Storage::put($path, $contents);

               $profile_details["Profile_Image"] = $name; 
               $request->session()->put('profile_image', $name);
           }

           //print_r($profile_details);exit;
           //Account Registration API
         // print_r(json_encode($profile_details));
           $response = $this->register->updateCompanyDetails($profile_details,$companyId);//print_r($response);exit;
           $response=json_decode($response);

           if($response->status == true){

                if($response->data->statusCode != 0){//check if any error

                    $request->session()->flash('failed', $response->data->statusMessage);
                    return redirect()->back()->withInput();
                }

                if(!$request->session()->has('company_id')){
                    $search_request=[];
                    $search_request['criteria']['Select_Superadmin'] = $request->session()->get('register_id');
                    $response = $this->register->getTransactionList('svc_type_5',1,1,$search_request);
                    if($response->status == true){
                        $companyId = $response->data->data->content[0]->id ?? null; 
                        $request->session()->put('company_id',$companyId);
                    }
                }
                $request->session()->flash('success', 'Information updated successfully');
                sleep(1);
                return redirect()->back();

           }else{
             $request->session()->flash('failed', $response->data->message);
             return redirect()->back()->withInput();
           }

          
            
        }


        return view('employer.superadmin.profiledetails',compact('data'));
    }


    public function shortlist_aspirant(Request $request){
          $details=["Application_Status"=>"Shortlisted"];  
         $response = $this->hooper->updateTransaction('svc_type_8',$request->id,$details);
            $success_msg = 'Job updated successfully';
            if($response->status == true){

                if($response->data->statusCode != 0){//check if any error

                    $request->session()->flash('failed', $response->data->statusMessage);
                    return redirect()->back()->withInput();
                }
                $request->session()->flash('success', $success_msg);
                sleep(1);
                return redirect()->back();

           }else{
             $request->session()->flash('failed', $response->data->message);
             return redirect()->back()->withInput();
           }

    }



    
}