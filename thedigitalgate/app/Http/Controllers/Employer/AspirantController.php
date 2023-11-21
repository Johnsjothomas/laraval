<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Hooper;
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
        Hooper $hooper
    ) {
        $this->hooper = $hooper;
    }

    public function search_applicants()
    {   
        $search_request = array(""=>"");
        $response = $this->hooper->getAspirantList('usr_type_4',1,10,$search_request,null);
        $data = $response->data->data->content ?? [];
        return view('employer.profiles.search_applicants',compact('data'));
    }

    public function applicant_list($id=null)
    {   
        $search_request = [];
        $search_request['criteria'] = [
                    "Job_Status" => "Active",
                    "Posted_by_Company" => session('company_id'),
        ];
        $response = $this->hooper->getTransactionList('svc_type_8',1,10,$search_request,null);
        $jobs = $response->data->data->content ?? [];

        $search_request = [];
        $search_request['resolveRefs'] = [
                    "Select_Aspirant" => ["First_Name"],
        ];
        $search_request['criteria'] = [
                    "Select_Job" => $id,
        ];
        $response = $this->hooper->getTransactionList('svc_type_9',1,10,$search_request,null);
        $applicants = $response->data->data->content ?? [];

        return view('employer.profiles.list_applicants',compact('applicants','jobs'));
    }

    public function trainer_requests()
    {   
        $search_request['resolveRefs'] = [
                    "Company" => ["Company_Name"],
        ];

        $search_request['criteria'] = [
                    "Company" => session('company_id'),
        ];
        $response = $this->hooper->getTransactionList('svc_type_10',1,10,$search_request,null);
        $requests = $response->data->data->content ?? [];
        return view('employer.trainings.trainer_requests',compact('requests'));
    }

    public function trainer_schedule()
    {   
        
        return view('employer.trainings.training_scheduled');
    }

    public function schedule_interview(Request $request)
    {   

        $request->validate([
            'application_id' => ['required'],
            'proposed_date_1' => ['required'],
            'proposed_date_2' => ['required'],
            'proposed_date_3' => ['required'],
            'proposed_time_1' => ['required'],
            'proposed_time_2' => ['required'],
            'proposed_time_3' => ['required'],
            ]);

        $request_json = [
                "Proposed_Date_1" => date('Y-m-d',strtotime($request->proposed_date_1)),
                "Proposed_Date_2" => date('Y-m-d',strtotime($request->proposed_date_2)),
                "Proposed_Date_3" => date('Y-m-d',strtotime($request->proposed_date_3)),
                "Proposed_Time_1" => $request->proposed_time_1,
                "Proposed_Time_2" => $request->proposed_time_2,
                "Proposed_Time_3" => $request->proposed_time_3,
                "Employer_Interview_Status" => 'Proposed',
                "Interview_Status" => 'Scheduled',

        ];
        //print_r($request_json);exit;
        $response = $this->hooper->updateTransaction('svc_type_9',$request->application_id,$request_json);
        //print_r($response);exit;
        if($response->status==true){
            if($response->data->statusCode==0){
                $request->session()->flash('success', 'Interview scheduled successfully');
                sleep(1);
            return redirect()->back();
        }
        }
        
    }

    public function saved_aspirants($id=null)
    {   
        $search_request = [];
        $search_request['criteria'] = [
                    "Job_Status" => "Active",
                    "Posted_by_Company" => session('company_id'),
        ];
        $response = $this->hooper->getTransactionList('svc_type_8',1,10,$search_request,null);
        $jobs = $response->data->data->content ?? [];

        $search_request = [];
        $search_request['resolveRefs'] = [
                    "Select_Aspirant" => ["First_Name"],
        ];
        $search_request['criteria'] = [
                    "Select_Job" => $id,
                    "Applicant_Status" => 'Saved'
        ];
        $response = $this->hooper->getTransactionList('svc_type_9',1,10,$search_request,null);
        $applicants = $response->data->data->content ?? [];
        return view('employer.profiles.saved_applicants',compact('applicants','jobs'));
    }

     public function interview_scheduled($id=null)
    {   
        $search_request = [];
        $search_request['criteria'] = [
                    "Job_Status" => "Active",
                    "Posted_by_Company" => session('company_id'),
        ];
        $response = $this->hooper->getTransactionList('svc_type_8',1,10,$search_request,null);
        $jobs = $response->data->data->content ?? [];

        $search_request = [];
        $search_request['resolveRefs'] = [
                    "Select_Aspirant" => ["First_Name","Email"],
                    "Select_Job" => ["Job_Title"],
        ];
        $search_request['criteria'] = [
                    "Select_Job" => $id,
                    "Applicant_Status" => 'Interview Scheduled'
        ];
        $response = $this->hooper->getTransactionList('svc_type_9',1,10,$search_request,null);
        $applicants = $response->data->data->content ?? [];
        return view('employer.profiles.interview_scheduled',compact('applicants','jobs'));
    }

    public function shortlisted_aspirants($id=null)
    {   
        $search_request = [];
        $search_request['criteria'] = [
                    "Job_Status" => "Active",
                    "Posted_by_Company" => session('company_id'),
        ];
        $response = $this->hooper->getTransactionList('svc_type_8',1,10,$search_request,null);
        $jobs = $response->data->data->content ?? [];

        $search_request = [];
        $search_request['resolveRefs'] = [
                    "Select_Aspirant" => ["First_Name","Email"],
                    "Select_Job" => ["Job_Title"],
        ];
        $search_request['criteria'] = [
                    "Select_Job" => $id,
                    "Applicant_Status" => 'Shortlisted'
        ];
        $response = $this->hooper->getTransactionList('svc_type_9',1,10,$search_request,null);
        $applicants = $response->data->data->content ?? [];
        return view('employer.profiles.shortlisted_applicants',compact('applicants','jobs'));
    }

    public function rejected_aspirants($id=null)
    {   
        $search_request = [];
        $search_request['criteria'] = [
                    "Job_Status" => "Active",
                    "Posted_by_Company" => session('company_id'),
        ];
        $response = $this->hooper->getTransactionList('svc_type_8',1,10,$search_request,null);
        $jobs = $response->data->data->content ?? [];

        $search_request = [];
        $search_request['resolveRefs'] = [
                    "Select_Aspirant" => ["First_Name","Email"],
                    "Select_Job" => ["Job_Title"],
        ];
        $search_request['criteria'] = [
                    "Select_Job" => $id,
                    "Applicant_Status" => 'Profile Rejected'
        ];
        $response = $this->hooper->getTransactionList('svc_type_9',1,10,$search_request,null);
        $applicants = $response->data->data->content ?? [];
        return view('employer.profiles.rejected_applicants',compact('applicants','jobs'));
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