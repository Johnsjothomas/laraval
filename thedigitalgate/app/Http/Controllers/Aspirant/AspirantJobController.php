<?php

namespace App\Http\Controllers\Aspirant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Hooper;

class AspirantJobController extends Controller
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

   
    public function managejob(){

        $search_request['resolveRefs'] = [
                    "Posted_by_Company" => ["Company_Name"],
        ];
        $search_request['criteria'] = [
                    "Job_Status" => 'Active',
        ];
        $response = $this->hooper->getTransactionList('svc_type_8',1,10,$search_request,null);
        $jobs = $response->data->data->content ?? [];
        return view('aspirant.job.managejob',compact('jobs'));
    }

    public function jobdetails($uid,$id){

        $search_request['criteria'] = [
                    "Job_ID" => $id,
        ];
        $search_request['resolveRefs'] = [
                    "Posted_by_Company" => ["Company_Name","Company_Profile"],
        ];
        $response = $this->hooper->getTransactionList('svc_type_8',1,1,$search_request,null);
        $job_details = $response->data->data->content[0] ?? [];
        $mandatory_fields = $job_details->fields->Mandatory_Skillset;
        $optional_skillsets = $job_details->fields->Optional_Skillset;
        $optional_skillsets = $job_details->fields->Optional_Skillset;
        return view('aspirant.job.jobdetails',compact('job_details','uid','mandatory_fields','optional_skillsets'));
    }

    public function submit_application_fulltime(Request $request){

        if($request->isMethod('post')){

            $request->validate([
            'notice_period' => ['required','string'],
            'current_ctc' => ['numeric','string'],
            'expected_ctc' => ['numeric','string'],
            'resume' => ['required'],
            ]/*,[
                'password.regex' => 'Password must be alphanumeric'
            ]*/);


           $application_details = [
                "Select_Job" => $request->job_id,
                "Select_Aspirant" => $request->session()->get('register_id'),
                "Employment_Type" => $request->employment_type,
                "Notice_Period" => $request->notice_period,
                "Current_CTC" => (int)$request->current_ctc,
                "Expected_CTC" => (int)$request->expected_ctc,
                "Applicant_Status" => 'Pending'
           ];
           //print_r(json_encode($application_details));exit;

            $response = $this->hooper->createTransaction('svc_type_9',$application_details,null,null);
            $success_msg = 'Application submitted successfully';
           

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

    public function submit_application_gig(Request $request){

        if($request->isMethod('post')){

            $request->validate([
            'hourly_rate' => ['required','numeric'],
            'total_cost' => ['required','numeric'],
            'estimated_hours' => ['required','numeric'],
            'cover_letter' => ['required'],
            ]/*,[
                'password.regex' => 'Password must be alphanumeric'
            ]*/);


           $application_details = [
                "Select_Job" => $request->job_id,
                "Select_Aspirant" => $request->session()->get('register_id'),
                "Employment_Type" => $request->employment_type,
                "Hourly_Rate" => (int)$request->hourly_rate,
                "Talent_Service_Fee" => 10,
                "You_will_receive" => 100,
                "Total_Project_Work_Cost" => 1000,
                "Total_Estimated_Hours" => (int)$request->estimated_hours,
                "Add_Cover_Letter" => $request->cover_letter,
           ];
          //print_r(json_encode($application_details));exit;

            $response = $this->hooper->createTransaction('svc_type_9',$application_details,null,null);
            $success_msg = 'Application submitted successfully';
           
            //print_r($response);exit;
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


    public function savedjob(Request $request){

        $search_request['resolveRefs'] = [
                    "Select_Job" => ["Job_ID","Job_Title","Job_Description","Employment_Type"],
                    //"Posted_by_Company" => ["Company_Name"],
        ];
        $search_request['criteria'] = [
                    "Select_Aspirant" => $request->session()->get('register_id'),
                    "Application_Status" => "Saved",
        ];
        $response = $this->hooper->getTransactionList('svc_type_9',1,10,$search_request,null);
        $jobs = $response->data->data->content ?? [];
        return view('aspirant.job.savedjob',compact('jobs'));
    }

    public function appliedjob(Request $request){
        $search_request['resolveRefs'] = [
                    "Select_Job" => ["Job_ID","Job_Title","Job_Description","Employment_Type"],
                    //"Posted_by_Company" => ["Company_Name"],
        ];
        $search_request['criteria'] = [
                    "Select_Aspirant" => $request->session()->get('register_id'),
                    "Application_Status" => "Pending",
        ];
        $response = $this->hooper->getTransactionList('svc_type_9',1,10,$search_request,null);
        $jobs = $response->data->data->content ?? [];
        return view('aspirant.job.appliedjob',compact('jobs'));
    }

    public function interview(Request $request){
        $search_request['resolveRefs'] = [
                    "Select_Job" => ["Job_ID","Job_Title","Job_Description","Employment_Type"],
                    //"Posted_by_Company" => ["Company_Name"],
        ];
        $search_request['criteria'] = [
                    "Select_Aspirant" => $request->session()->get('register_id'),
                    "Application_Status" => "Interview Scheduled",
        ];
        $response = $this->hooper->getTransactionList('svc_type_9',1,10,$search_request,null);
        $jobs = $response->data->data->content ?? [];
        return view('aspirant.job.interview',compact('jobs'));
    }

     public function shortlisted(Request $request){
        $search_request['resolveRefs'] = [
                    "Select_Job" => ["Job_ID","Job_Title","Job_Description","Employment_Type"],
                    //"Posted_by_Company" => ["Company_Name"],
        ];
        $search_request['criteria'] = [
                    "Select_Aspirant" => $request->session()->get('register_id'),
                    "Application_Status" => "Shortlisted",
        ];
        $response = $this->hooper->getTransactionList('svc_type_9',1,10,$search_request,null);
        $jobs = $response->data->data->content ?? [];
        return view('aspirant.job.shortlisted',compact('jobs'));
    }

     public function rejected(Request $request){
        $search_request['resolveRefs'] = [
                    "Select_Job" => ["Job_ID","Job_Title","Job_Description","Employment_Type"],
                    //"Posted_by_Company" => ["Company_Name"],
        ];
        $search_request['criteria'] = [
                    "Select_Aspirant" => $request->session()->get('register_id'),
                    "Application_Status" => "Profile Rejected",
        ];
        $response = $this->hooper->getTransactionList('svc_type_9',1,10,$search_request,null);
        $jobs = $response->data->data->content ?? [];
        return view('aspirant.job.rejected',compact('jobs'));
    }

    public function submit_proposal(){

        return view('aspirant.job.submitaproposal');
    }
    
}
