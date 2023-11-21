<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Hooper;
use Session;
use Storage;
use Cache;

class JobController extends Controller
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

    public function index($status)
    {   
        $search_request['resolveRefs'] = [
                    "Posted_by_Company" => ["Company_Name"],
        ];

        if($status=='active'){
            $status = ['Active'];
        }

        if($status=='closed'){
            $status = ['Closed','Deleted','Paused'];
        }

        $search_request['criteria'] = [
                    "Job_Status" => $status,
                    "Posted_by_Company" => session('company_id'),
        ];
        $response = $this->hooper->getTransactionList('svc_type_8',1,10,$search_request,null);
        $jobs = $response->data->data->content ?? [];
        return view('employer.jobs.index',compact('jobs'));
    }


     public function create_job(Request $request,$id=null,$jobid=null)
    {    
         $data = [];      
         if($id){
            /*$search_request['resolveRefs'] = [
                    "Job_Category" => ["Name"],
            ];*/
            $search_request['criteria'] = [
                    "Job_ID" => [$jobid],
            ];
            $response = $this->hooper->getTransactionList('svc_type_8',1,1,$search_request,null);
            $data = $response->data->data->content[0] ?? [];
         }   
         if($request->isMethod('post')){

            $request->validate([
            'job_title' => ['required','string'],
            'job_description' => ['required','string'],
            'payment_cycle'  => ['required','string'],
            'currency'  => ['required', 'string'],
            'amount' => ['required', 'numeric'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'gender' => ['required','string'],
            'type_of_employment' => ['required','string'],
            'job_category' => ['required','string'],
            'working_type' => ['required','string'],
            'country' => ['nullable','string'],
            'city' => ['nullable','string'],
            'training_required' => ['required'],
            'training_module' => ['nullable'],
            'mandatory_skillset' => ['required'],
            'optional_skillset' => ['required'],
            'total_experience' => ['required','string'],
            'relevant_experience' => ['required','string'],
            'educational_qualification' => ['required','string'],
            'perks' => ['required','string'],
            'jd_document' => ['nullable'],
            ]/*,[
                'password.regex' => 'Password must be alphanumeric'
            ]*/);


           $job_details = [
                "Job_Title" => $request->job_title,
                "Job_Description" => $request->job_description,
                "Payment_Cycle" => $request->payment_cycle,
                "Currency" => $request->currency,
                "Remuneration_Amount" => (int)$request->amount,
                "Working_Type" => $request->working_type,
                "Job_Category" => $request->job_category,
                "Mandatory_Skillset" => implode(',',$request->mandatory_skillset),
                "Total_Experience" => $request->total_experience,
                "Relevant_Experience" => $request->relevant_experience,
                "Posted_by_Company" => $request->session()->get('company_id'),
                "Gender" => $request->gender,
                "Optional_Skillset" => implode(',',$request->optional_skillset),
                "Educational_Qualification" => $request->educational_qualification,
                "Perks" => $request->perks,
                "Start_Date" => date('Y-m-d',strtotime($request->start_date)),
                "End_Date" => date('Y-m-d',strtotime($request->end_date)),
                "Employment_Type" => $request->type_of_employment,
                "Compulsory_Training_Required" => $request->training_required,
                "Job_Status" => "Active"
           ];

           if($request->session()->get('role')=='employer'){
             $job_details['Posted_by_Superadmin'] = $request->session()->get('register_id');
           }elseif($request->session()->get('role')=='team'){
             $job_details['Posted_by_User'] = $request->session()->get('register_id');
           }


            if(!empty($request->jd_document)){
                $fileName = time().'.'.$request->jd_document->extension();  
                $request->jd_document->move(public_path('uploads'), $fileName);
                //$image->move($path, $image_name);
                $job_details['Upload_JD_Document'] = $request->jd_document;
            }


           if($request->id){
            $response = $this->hooper->updateTransaction('svc_type_8',$request->id,$job_details);
            $success_msg = 'Job updated successfully';
           }else{
            $response = $this->hooper->createTransaction('svc_type_8',$job_details,null,null);
            $success_msg = 'Job created successfully';
           }

           if($response->status == true){

                if($response->data->statusCode != 0){//check if any error

                    $request->session()->flash('failed', $response->data->statusMessage);
                    return redirect()->back()->withInput();
                }
                $request->session()->flash('success', $success_msg);
                sleep(1);
                return redirect()->route('jobs',['active']);

           }else{
             $request->session()->flash('failed', $response->data->message);
             return redirect()->back()->withInput();
           }

          
            
        }


        return view('employer.jobs.create',compact('data','id'));
    }

    public function update_status(Request $request,$txnid,$status)
    {   

        $request_json = [
                "Job_Status" => $status
        ];
        $response = $this->hooper->updateTransaction('svc_type_8',$txnid,$request_json);

        if($response->status==true){
            if($response->data->statusCode==0){
                $request->session()->flash('success', 'Status updated successfully');
                sleep(1);
            return redirect()->back();
        }
        }
        
    }

    public function job_applications($id)
    {   

        $search_request = [];
        $search_request['resolveRefs'] = [
                    "Posted_by_Company" => ["Company_Name"],
        ];
        $search_request['criteria'] = [
                    "Job_ID" => [$id],
            ];
        $response = $this->hooper->getTransactionList('svc_type_8',1,1,$search_request,null);
        $job_details = $response->data->data->content[0] ?? [];
        //print_r($job_details);exit;


        //Get Applications
        $search_request = [];
        $search_request['resolveRefs'] = [
                    "Select_Aspirant" => ["First_Name"],
        ];
        $search_request['criteria'] = [
                    "Select_Job" => $job_details->id,
        ];
        $response = $this->hooper->getTransactionList('svc_type_9',1,10,$search_request,null);
        $applications = $response->data->data->content ?? [];
        return view('employer.jobs.applications',compact('job_details','applications'));
    }



    
}