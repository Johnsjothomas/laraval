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
// use app\Models;
use App\Models\module_creation;
use App\Models\trainer;
use DB;
use Google\Service\CloudTrace\Module;
use \Illuminate\Http\Response;
use App\Services\Notification;
use App\Models\aspirant;

class ModuleController extends Controller
{   
    
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function __construct(
        Hooper $hooper,Register $register,Notification $notification
    ) {
        $this->hooper = $hooper;
        $this->register = $register;
        $this->notification = $notification;
    }

    public function module_list(Request $request,$type,$status)
    {   
        $module_status = ($status=='closed') ? 'inactive' : $status;
        $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id'),"Current_Module_Status"=>ucfirst($module_status),"Type"=>ucfirst($type)]];
        //print_r($search_request);exit;
       $response = $this->hooper->getTransactionList('svc_type_16',1,100,$search_request);
          if($response->status == true){
            $data=$response->data->data->content ?? [];
          }
       return view('trainer.modules.module_list',compact('data','type','status','module_status'));
    }

    public function module_info(Request $request,$type,$id)
    {   
        $search_request= ["criteria"=>["Module_ID"=>$id]];
       $response = $this->hooper->getTransactionList('svc_type_16',1,1,$search_request);
          if($response->status == true){
            $data=$response->data->data->content[0] ?? [];
            $search_request= ["criteria"=>["Module"=>$data->id]];
            $topics = $this->hooper->getTransactionList('svc_type_17',1,50,$search_request);
            $topics = $topics->data->data->content;
          }
       return view('trainer.modules.module_info',compact('data','topics'));
    }


    public function createmoduled(Request $request)
    {
      $loggedInTrainerID = $request->session()->get('Trainer_ID');
      // session()->get('Role')
      // print_r($request->all());exit();
      $TID = $request->session()->get('Trainer_ID');
      
      if(@$request->module_creations_id)
      {
        $module = (object) array();
      }
      else
      {
        $module = new module_creation;
      }
      $module->trainer_id = $TID;
      $module->trainingType = $request->trainingType;
      $module->trainingClassification = $request->trainingClassification;
      $module->moduleTitle = $request->moduleTitle;
      $module->totalNoOfDays = $request->totalDays;
      $module->startDate = $request->startDate;
      $module->starTime = "";//$request->starTime;
      $module->timeZone = $request->timeZone;
      $module->timeInMinutesPerDay = $request->timeInMinutesPerDay;
      $module->moduleDescription = $request->moduleDescription;
      $module->skills = $request->mskills;
      $module->parent_skill = $request->parent_skill;
      $module->intesityLevel = $request->intesityLevel;

      $module->sessiontype = $request->sessiontype;
      $module->ifLive = $request->ifLive;
      $module->languages = $request->languages;
      $module->startDateTime = $request->startDateTimes;
      $module->endDateTime = $request->endDateTimes;


      $module->prereqWork = $request->prereqWork;
      $module->maxParticipantPerModule = $request->maxParticipantPerModule;
      $module->total_seat_by_module = $request->total_seat_by_module;
      $module->preWorkURL = $request->preWorkURL;
      //$module->lessonRequirementForparti = $request->lessonRequirementForparti;
      $module->lessonRequirementForparti = (@$request->lessonRequirementForparti ? json_encode($request->lessonRequirementForparti) : '[]');
      $module->traineeHandouts = $request->traineeHandouts;

      $module->lmsURL = $request->lmsURL;
      $module->courseWorkHandoutUpload = $request->courseWorkHandoutUpload;
      $module->youtubeVideoUpload = $request->youtubeVideoUpload;
      $module->jpegUpload = $request->jpegUpload;
      if(isset($request->jpegUpload_default))
      {
        $module->jpegUpload = $request->jpegUpload_default;
      }

      $module->price = $request->price;
      $module->currency = $request->currency;
      $module->amount = $request->amount;
      if(empty($request->module_creations_id))
      {
        $module->Status = $request->Status='InActive';
      }
      $module->isDeleted = $request->isDeleted='no';
      $module->currency = $request->currency;

      $module->name_of_customer = $request->name_of_customer;
      $module->emailaddress_of_customer_contact = $request->emailaddress_of_customer_contact;
      $module->fullname_of_customer_contact = $request->fullname_of_customer_contact;
      $module->companyname_of_customer_contact = $request->companyname_of_customer_contact;
      $module->designation_of_customer_contact = $request->designation_of_customer_contact;
      $module->jobtype_of_customer_contact = $request->jobtype_of_customer_contact;

      // $fileyoutubeVideoUpload = $request->file('youtubeVideoUpload');
      // if($fileyoutubeVideoUpload)
      // {
            // $request->validate([
            //   'youtubeVideoUpload' => ['max:1536'],
            // ]);
      //     $getClientOriginalName = $fileyoutubeVideoUpload->getClientOriginalName();
      //     $getClientOriginalExtension = $fileyoutubeVideoUpload->getClientOriginalExtension();

      //     $getClientOriginalNameNew = $loggedInTrainerID.'-trainerModule-'.time().'-'.uniqid().'.'.$getClientOriginalExtension;
      //     $destinationPath = '../public/uploads/moduleyoutube';
      //     if(empty($fileyoutubeVideoUpload->move($destinationPath, $getClientOriginalNameNew)))
      //     {
      //         $getClientOriginalNameNew = '';
      //     }
      //     $module->youtubeVideoUpload = $getClientOriginalNameNew;
      // }
      // else
      // {
      //   $module->youtubeVideoUpload = $request->youtubeVideoUpload_old;
      // }
      $module->youtubeVideoUpload = $request->youtubeVideoUpload;

      if(!isset($request->jpegUpload_default))
      {
        $filejpegUpload = $request->file('jpegUpload');
        if($filejpegUpload)
        {
            $request->validate([
              'jpegUpload' => ['max:1536'],
            ]);
            $getClientOriginalName = $filejpegUpload->getClientOriginalName();
            $getClientOriginalExtension = $filejpegUpload->getClientOriginalExtension();

            $getClientOriginalNameNew = $loggedInTrainerID.'-trainerModule-'.time().'-'.uniqid().'.'.$getClientOriginalExtension;
            $destinationPath = '../public/uploads/moduleimage';
            if(empty($filejpegUpload->move($destinationPath, $getClientOriginalNameNew)))
            {
                $getClientOriginalNameNew = '';
            }
            $module->jpegUpload = $getClientOriginalNameNew;
        }
        else
        {
          $module->jpegUpload = $request->jpegUpload_old;
        }
      }
      
      $filecourseWorkHandoutUpload = $request->file('courseWorkHandoutUpload');
      if($filecourseWorkHandoutUpload)
      {
        $destinationPath = '../public/uploads/modulehandouts';

        $getClientOriginalNameNew_Arr = array();
        $courseWorkHandoutUpload_mail_Arr = array();
        foreach ($filecourseWorkHandoutUpload as $keyUpload => $valueUpload) {
          // $request->validate([
          //   'courseWorkHandoutUpload' => ['max:1536'],
          // ]);
          $getClientOriginalName = $valueUpload->getClientOriginalName();
          $getClientOriginalExtension = $valueUpload->getClientOriginalExtension();

          $getClientOriginalNameNew = $loggedInTrainerID.'-trainerModule-'.$keyUpload.'-'.time().'-'.uniqid().'.'.$getClientOriginalExtension;
          
          if(!empty($valueUpload->move($destinationPath, $getClientOriginalNameNew)))
          {
            $getClientOriginalNameNew_Arr[] = $getClientOriginalNameNew;
            $courseWorkHandoutUpload_mail_Arr[] = public_path().'/uploads/modulehandouts/'.$getClientOriginalNameNew;
          }
        }
        $module->courseWorkHandoutUpload = (@$getClientOriginalNameNew_Arr) ? implode(",", $getClientOriginalNameNew_Arr) : "";

        $courseWorkHandoutUpload_mail = @$courseWorkHandoutUpload_mail_Arr ? $courseWorkHandoutUpload_mail_Arr : '';
      }
      else
      {
        $module->courseWorkHandoutUpload = $request->courseWorkHandoutUpload_old;
      }
      
      if(@$request->module_creations_id)
      {
        $moduleData = json_decode(json_encode($module), true);
        module_creation::where('module_Id',$request->module_creations_id)->update($moduleData);

        $msgmsg = 'Module Update Successfully..';
        $noty_mes = $request->moduleTitle. " Module Updated";
      }
      else
      {
        // total_seat_by_module   40
        // maxParticipantPerModule  10
        $loopOnThis = $module->total_seat_by_module;
        if(@$loopOnThis)
        {
          $module_startDate = $request->startDate;//2023-10-08T20:22
          $module_startDateTime = $request->startDateTimes;//2023-10-08 20:22
          $module_endDateTime = $request->endDateTimes;//2023-10-08 21:07
          $module_totalDays = $request->totalDays;
          if(empty($module_totalDays))
          {
            $module_totalDays = 1;
          }

          $uniqueIdGenerated = uniqid();
          $module->related_module_id = $uniqueIdGenerated;

          $attributes = $module->getAttributes();

          $iAdd = 1;
          while ($loopOnThis > 0) {
            $newRecord = new module_creation();

            // Set the attributes for the new record
            foreach ($attributes as $key => $value) {
                $newRecord->$key = $value;
            }

            if($loopOnThis != $module->total_seat_by_module)
            {
              $newRecord->startDate = $module_startDate = date("Y-m-d\TH:i", strtotime("+".$module_totalDays." days", strtotime($module_startDate)));
              
              $newRecord->startDateTime = $module_startDateTime = date("Y-m-d H:i", strtotime("+".$module_totalDays." days", strtotime($module_startDateTime)));

              $newRecord->endDateTime = $module_endDateTime = date("Y-m-d H:i", strtotime("+".$module_totalDays." days", strtotime($module_endDateTime)));
            }
            
            if(($loopOnThis - $request->maxParticipantPerModule) < 0)
            {
              $newRecord->maxParticipantPerModule = $loopOnThis;
            }
            $newRecord->moduleTitle = $request->moduleTitle . ' - Cohort '.$iAdd;
            $newRecord->save();

            $loopOnThis = $loopOnThis - $request->maxParticipantPerModule;
            $iAdd++;
          }
        }
        // $module->save();

        $msgmsg = 'Module Created Successfully..';
        $noty_mes = $request->moduleTitle. " Module Created";
        
        $trainer_data = trainer::where('trainer_id', $loggedInTrainerID)->get()->first();
        $mailSendar =  array(
            // 'useremail' => "hani.chatbot@thedigitalgate.co",
            'useremail' => $trainer_data->email_id,
            'username'  => $trainer_data->first_name,
            'type'      => 'module_create',
            'message'   => $noty_mes
        );
        $this->register->sendCommonchatmail($mailSendar);
    
        if(@$courseWorkHandoutUpload_mail)
        {
            // $trainer_data = trainer::where('trainer_id', $loggedInTrainerID)->get()->first();
            $mailSendar =  array(
                'useremail' => "hani.chatbot@thedigitalgate.co",
                // 'useremail' => "pritampansuriya@gmail.com",
                'username'  => "Hani",
                'type'      => 'module_create',
                'message'   => $noty_mes,
                'attchment' => $courseWorkHandoutUpload_mail,
            );
            $this->register->sendCommonchatmail($mailSendar);

            $mailSendar =  array(
                'useremail' => "adith.haridas@thedigitalgate.co",
                'username'  => "Adith",
                'type'      => 'module_create',
                'message'   => $noty_mes,
                'attchment' => $courseWorkHandoutUpload_mail,
            );
            $this->register->sendCommonchatmail($mailSendar);
        }
      }
      $this->notification->savenotification("trainer", $TID, $noty_mes);

      // $moduleinfo = module_creation::all();
      $moduleinfo = module_creation::where('Status','InActive')->where('isDeleted','no')->where('trainer_id', $loggedInTrainerID)->get();
      
      $moduleinfoactiveUpcoming = module_creation::where('Status','Active')->where('isDeleted','no')->where('trainer_id', $loggedInTrainerID)->get();
      $ModulesDeleted = module_creation::where('Status', 'InActive')->where('isDeleted', 'yes')->where('trainer_id', $loggedInTrainerID)->get();
      $PastModules = module_creation::where('endDateTime', '<', now())->where('trainer_id', $loggedInTrainerID)->get();
      // return view('trainer_backup.managemodules', ['moduleinfo'=> $moduleinfo,'moduleinfoactiveUpcoming'=>$moduleinfoactiveUpcoming])->with('status', 'Module Created Successfully..');
      $arrRet = array(
        'moduleinfo' => $moduleinfo,
        'moduleinfoactiveUpcoming' => $moduleinfoactiveUpcoming,
        'ModulesDeleted' => $ModulesDeleted,
        'PastModules' => $PastModules,
        "status" => 1,
        "msg" => $msgmsg
      );
      return $arrRet;
    }

    public function updatemoduleactive(Request $request,$id)
    {
      $loggedInTrainerID = $request->session()->get('Trainer_ID');
      // print_r($id);
      $thisModule_Data = module_creation::where('module_Id',$id)->get()->first();
      module_creation::where('module_Id',$id)->update(['Status'=>'Active','publish_date' => now()]);

      $moduleinfo = module_creation::where('Status','InActive')->where('isDeleted','no')->where('trainer_id', $loggedInTrainerID)->get();
      $moduleinfoactiveUpcoming = module_creation::where('Status','Active')->where('isDeleted','no')->where('trainer_id', $loggedInTrainerID)->get();
      $ModulesDeleted = module_creation::where('Status', 'InActive')->where('isDeleted', 'yes')->where('trainer_id', $loggedInTrainerID)->get();
      $PastModules = module_creation::where('endDateTime', '<', now())->where('trainer_id', $loggedInTrainerID)->get();
      // $moduleinfo = module_creation::all(['isDeleted','no']);
      // $moduleinfoactiveUpcoming = module_creation::where(['Status','Active'],['isDeleted','no'])->get();
      // return view('trainer_backup.managemodules', ['moduleinfo'=> $moduleinfo,'moduleinfoactiveUpcoming'=>$moduleinfoactiveUpcoming]);
      // return view('trainer_backup.managemodules', ['moduleinfo'=>$moduleinfo,'moduleinfoactiveUpcoming'=>$moduleinfoactiveUpcoming])->with('status', 'Module Published Successfully..');
      
      $trainer_data = trainer::where('trainer_id', $loggedInTrainerID)->get()->first();
      $mailSendar =  array(
          // 'useremail' => "hani.chatbot@thedigitalgate.co",
          'useremail' => $trainer_data->email_id,
          'username'  => $trainer_data->first_name,
          'type'      => 'module_publish',
          'message'   => $thisModule_Data->moduleTitle. " Module Published"
      );
      $this->register->sendCommonchatmail($mailSendar);

      $this->notification->savenotification("trainer", $loggedInTrainerID, $thisModule_Data->moduleTitle. " Module Published");
      return redirect()->back()->with(['moduleinfo'=> $moduleinfo,'moduleinfoactiveUpcoming'=>$moduleinfoactiveUpcoming, 'ModulesDeleted'=>$ModulesDeleted, 'PastModules'=>$PastModules], 'status', 'Module Published Successfully..');
    }

    public function editModule($id)
    {
        $eModule = module_creation::where('module_Id', $id)->get();
        return response()->json([
          'status'=> 200,
          'Module'=> $eModule,
        ]);
    }
    
    public function updateModule(Request $request)
    {
      $id = $request->input('module_Id');
      $loggedInTrainerID = $request->session()->get('Trainer_ID');

      // $module = module_creation::find($id);
      // $module = module_creation::where('module_Id', $id);
      // print_r($id);exit;
      // 'Status'=>'Active', 'moduleTitle' => $request->editmoduleTitle
      // print_r($request->ifLive);exit;
      module_creation::where('module_Id',$id)->update([
      'trainingType' => $request->edittrainingType,
      'trainingClassification' => $request->edittrainingClassification,
      'moduleTitle' => $request->editmoduleTitle,
      'totalNoOfDays' => $request->edittotalDays,
      'startDate' => $request->editstartDate,
      'starTime' => $request->editstarTime,
      'timeZone' => $request->edittimeZone,
      'timeInMinutesPerDay' => $request->edittimeInMinutesPerDay,
      'moduleDescription' => $request->editmoduleDescription,
      'skills' => $request->skills,
      'intesityLevel' => $request->editintesityLevel,
      'sessiontype' => $request->editsessiontype,
      'ifLive' => $request->eidtifLive,
      'languages' => $request->editlanguages,
      'startDateTime' => $request->editstartDateTime,
      'endDateTime' => $request->editendDateTime,
      'prereqWork' => $request->editprereqWork,
      'maxParticipantPerModule' => $request->editmaxParticipantPerModule,
      'preWorkURL' => $request->editpreWorkURL,
      'lessonRequirementForparti' => $request->editlessonRequirementForparti,
      'traineeHandouts' => $request->edittraineeHandouts,
      'lmsURL' => $request->editlmsURL,
      'courseWorkHandoutUpload' => $request->editcourseWorkHandoutUpload,
      'youtubeVideoUpload' => $request->edityoutubeVideoUpload,
      'jpegUpload' => $request->editjpegUpload,
      'price' => $request->editprice,
      'currency' => $request->editcurrency,
      'amount' => $request->editamount,
      'Status' => $request->Status='InActive',
      'isDeleted'=>$request->isDeleted='no'
      ]);
      $moduleinfo = module_creation::where('Status','InActive')->where('isDeleted','no')->where('trainer_id', $loggedInTrainerID)->get();
      $moduleinfoactiveUpcoming = module_creation::where('Status','Active')->where('isDeleted','no')->where('trainer_id', $loggedInTrainerID)->get();
      $ModulesDeleted = module_creation::where('Status', 'InActive')->where('isDeleted', 'yes')->where('trainer_id', $loggedInTrainerID)->get();
      $PastModules = module_creation::where('endDateTime', '<', now())->where('trainer_id', $loggedInTrainerID)->get();
      // return redirect()->back()->with(['moduleinfo'=>$moduleinfo,'moduleinfoactiveUpcoming'=>$moduleinfoactiveUpcoming],'status', 'Module Updated Successfully..');
      return redirect()->back()->with(['moduleinfo'=>$moduleinfo,'moduleinfoactiveUpcoming'=>$moduleinfoactiveUpcoming, 'ModulesDeleted'=>$ModulesDeleted, 'PastModules'=>$PastModules], 'status', 'Module Updated Successfully..');
    }

    public function softDeleteModule(Request $request,$id)
    {
      $loggedInTrainerID = $request->session()->get('Trainer_ID');
      // $moduleinfo = module_creation::all();
      $thisModule_Data = module_creation::where('module_Id',$id)->get()->first();
      module_creation::where('module_Id',$id)->update(['isDeleted'=>'yes']);
      $moduleinfo = module_creation::where('Status','InActive')->where('isDeleted','no')->where('trainer_id', $loggedInTrainerID)->get();
      $moduleinfoactiveUpcoming = module_creation::where('Status','Active')->where('isDeleted','no')->where('trainer_id', $loggedInTrainerID)->get();
      $ModulesDeleted = module_creation::where('Status', 'InActive')->where('isDeleted', 'yes')->where('trainer_id', $loggedInTrainerID)->get();
      $PastModules = module_creation::where('endDateTime', '<', now())->where('trainer_id', $loggedInTrainerID)->get();
      // return view('trainer_backup.managemodules', ['moduleinfo'=>$moduleinfo,'moduleinfoactiveUpcoming'=>$moduleinfoactiveUpcoming])->with('status', 'Module Deleted Successfully..');
      $this->notification->savenotification("trainer", $loggedInTrainerID, $thisModule_Data->moduleTitle. " Module Deleted");

      return redirect()->back()->with(['moduleinfo'=>$moduleinfo,'moduleinfoactiveUpcoming'=>$moduleinfoactiveUpcoming, 'ModulesDeleted'=>$ModulesDeleted, 'PastModules'=>$PastModules], 'status', 'Module Deleted Successfully..');
    }

    public function create_module(Request $request,$type,$id=null)
    {   
        $module_details = [];
        $module_topic_details = [];
        if(!empty($id)){
          $search_request= ["criteria"=>["Module_ID"=>$id]];
          $response = $this->hooper->getTransactionList('svc_type_16',1,1,$search_request);
          if($response->status == true){
            $module_details=$response->data->data->content[0] ?? [];
            $search_request= ["criteria"=>["Module"=>$module_details->id]];
             //$search_request= ["sortCriteria"=>[""=>$module_details->id]];
            $response = $this->hooper->getTransactionList('svc_type_17',1,50,$search_request);
            if($response->status == true){
              $module_topic_details=$response->data->data->content ?? [];
            }
          }
        }


        if($request->isMethod('post')){

          // print_r($request);exit();
            $request->validate([
                'module_title' => ['required','string'],
                'start_date' => ['required'],
                'end_date' => ['required'],
            ]);


           $module_details = [
                "Trainer" => $request->session()->get('register_id'),
                "Type" => ucfirst($type),
                "Module_Status" => $request->module_status,
                "Module_Title" => $request->module_title,
                "Total_Number_of_Days" => (int)$request->total_number_of_days,
                "Session_Type" => $request->session_type,
                "Session_Details_If_Any" => $request->platform_details,
                "Skill_Tags" => $request->skill_tags,
                "Start_Date" => $request->start_date,
                "End_Date" => $request->end_date,
                "Max_Participants_Quorum_per_Batch" => (int)$request->max_participants,
                "Prework_requested_from_the_participant" => $request->prework_requested,
                "Lesson_Requirements_from_participants" => $request->lession_requirement,
                "Trainee_Handout" => $request->trainee_handout,
                "Payment_Type" => $request->payment_type,
                "Module_Price" => (int)$request->module_price,
           ];

           //print_r($module_details);exit;

           if(!empty($request->module_id)){
                    $response = $this->hooper->updateTransaction('svc_type_16',$request->module_id,$module_details);
                    $module_id = $request->module_id;
                }else{
                    $response = $this->hooper->createTransaction('svc_type_16',$module_details,null,null);
                    //print_r($response);exit; 
                    $module_id = $response->data->data->id;
                    //print_r($response);exit;   
                }
                //print_r($response);exit;  
          if($response->data->statusCode == 0){

          $topic_days = $request->topic_day;
          $topic_name = $request->topic_name;
          $topic_total_time = $request->topic_total_time;
          $topic_description = $request->topic_description;
          $topic_objective = $request->topic_objective;
          $topic_no_of_sessions = $request->topic_no_of_sessions;
          $topic_id = $request->topic_id;
          foreach($topic_days as $key=>$val){
           $module_topics = [
                "Module" => $module_id,
                "Day" => $val,
                "Total_time_in_Minutes" => (int)$topic_total_time[$key],
                "Topic_Objective" => $topic_objective[$key],
                "Topic_Description" => $topic_description[$key],
                "Number_of_Sessions" => (int)$topic_no_of_sessions[$key],
           ];  

            if(!empty($topic_id[$key])){//print_r($module_topics);exit;
                    $response = $this->hooper->updateTransaction('svc_type_17',$topic_id[$key],$module_topics);
                    $message = 'Module has been updated successfully';
                   // print_r($response);exit;
                }else{
                    $response = $this->hooper->createTransaction('svc_type_17',$module_topics,null,null);
                    $message = 'Module created successfully';  

            } 

            if($response->data->statusCode == 0){
              $request->session()->flash('success', $message);
              return redirect('/trainer/module/'.$type.'/active')->withInput();
            }
          }

          }else{
            $request->session()->flash('failed', $response->data->statusMessage);
            return redirect()->back()->withInput();
          }  
          



        }   
        return view('trainer.modules.managemodules',compact('module_details','module_topic_details','type'));
    } 

     
     public function module_status(Request $request,$txnid,$status)
    {   

        $request_json = [
                "Current_Module_Status" => $status
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

    public function getAspirantProfileBymodal(Request $request)
    {
      $AID = $request->aspirant_id;
      $apirant_data = aspirant::where('Aspirant_ID', $AID)->get()->first();
      $languages_known = @$apirant_data && @$apirant_data->languages_known ? implode(', ', json_decode($apirant_data->languages_known, true)) : '';
      
      $workExperienceArray = array();
      $workExperienceArray['recent_company'] = json_decode($apirant_data->recent_company, true);
      $workExperienceArray['employment_type'] = json_decode($apirant_data->employment_type, true);
      $workExperienceArray['job_title_designation'] = json_decode($apirant_data->job_title_designation, true);
      $workExperienceArray['industry'] = json_decode($apirant_data->industry, true);
      $workExperienceArray['job_end_date'] = json_decode($apirant_data->job_end_date, true);
      $workExperienceArray['job_description'] = json_decode($apirant_data->job_description, true);

      $certificationsArray = array();
      $certificationsArray['certification_name'] = json_decode($apirant_data->certification_name,true); 
      $certificationsArray['certification_expiry_date'] = json_decode($apirant_data->certification_expiry_date,true);

      $educationArray = array();
      $educationArray['school_college_university'] = json_decode($apirant_data->school_college_university, true);
      $educationArray['degree'] = json_decode($apirant_data->degree, true);
      $educationArray['final_year_date'] = json_decode($apirant_data->final_year_date, true);

      $projectArray = array();
      $projectArray['project_name'] = json_decode($apirant_data->project_name, true);
      $projectArray['project_end_date'] = json_decode($apirant_data->project_end_date, true);
      $projectArray['project_description'] = json_decode($apirant_data->project_description, true);

      $greenBlockArray = array(
          "healthCare"	=> "Health Care",
          "finance"		=> "Finance",
          "cyber"			=> "Cyber Security",
          "aiMl"			=> "AI/ML/Web 3",
          "industry"		=> "Industrial",
          "legalSkill"	=> "Legal",
          "softSkill"		=> "Soft skills"
      );

      $modalbodyHtml = '<div class="row justify-content-center align-center">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 p-3">
        <div class="p-2" style="background-color: white;">
        <img id="profilePic" class="pic" style="width: 100%;height: 60px;margin-bottom: 10px;" src="'.setProfilePic($apirant_data->profile_pic).'">
        <div class="mediumfont">'.$apirant_data->first_name.'<i class="fa fa-check-circle" aria-hidden="true" style="color: green;"></i></div>  
        <br>
          <div class="border-bottom">I&apos;m an '.(@$greenBlockArray[$apirant_data->parent_skill] ? $greenBlockArray[$apirant_data->parent_skill] : $apirant_data->parent_skill).' Aspirant</div>
          <br>
          <div class="mediumfont1">About me</div><br>
          <div class="normalfont2 bluefontcolor border-bottom ">'.$apirant_data->about_you.'</div><br>
          <div class="mediumfont1">Skills</div><br>
          <div class="border-bottom ">

            <span class="normalfont3 m10" style="color:#15284C;border-radius:5px;border: 1px solid #15284C;padding:2%;display:block;word-wrap: break-word;">'.trim($apirant_data->skills,",").'</span>
          </div>
          <div class="border-bottom "><br>
            <div class="mediumfont1">Additional information</div><br>
            <div class="normalfont2 p3">D.O.B: <span class="dob normalfont3">  '.dateFormatFromAny($apirant_data->dob, "d-m-Y").'</span></div>
            <div class="normalfont2 p3">Gender: <span class="dob normalfont3">'.$apirant_data->gender.'</span></div>
            <div class="normalfont2 p3">Work Permit:<span class="dob normalfont3">'.$apirant_data->work_permit.' </span></div>
            
          <div class="normalfont2 p3">Languages: <span class="dob normalfont3">'.$languages_known.'</span></div>
            <div class="normalfont2 p3">Preferred location: <span class="dob normalfont3">'.$apirant_data->preferred_location.'</span></div>
            <div class="normalfont2 p3">Industries: <span class="dob normalfont3">'.$apirant_data->industries.'</span></div>
          </div>
          <div>
            <br><br><br>
            <span class="normalfont3 m10 right" style="display: inline-block;color:#15284C;border-radius:5px;border: 1px solid #15284C;padding:2%"> <a href="'.setResumeUrl($apirant_data->resume_path).'" download>Download my Resume</a></span>
            <br><br><br>
          </div>
        </div>
      </div>

      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 p-3">
        <div style="background-color: white;">
          <br><br>
          <div class="work p5 border-bottom">
            <div class="mediumfont1">Work experience</div><br>';
            if(!empty($workExperienceArray['recent_company']))
            {
              foreach($workExperienceArray['recent_company'] as $key => $rowData){
              $modalbodyHtml .= '<div class="row border-bottom">
                  <br>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <center>
                     <div class="normalfont3"><i class="fa fa-briefcase" aria-hidden="true" style="font-size: 36px;"></i></div>
                    </center>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    <div class="">
                      <div class="normalfont1 bold"> '.$workExperienceArray['recent_company'][$key].' </div>
                      <div class="dob normalfont3"> '.$workExperienceArray['job_end_date'][$key].' </div><br>
                      <div class=" normalfont3">-  '.$workExperienceArray['employment_type'][$key].' <br>
                        - '.$workExperienceArray['job_title_designation'][$key].' <br>
                        - '.$workExperienceArray['industry'][$key].' <br>
                        - '.$workExperienceArray['job_description'][$key].'
                      </div>
                      <br><br>

                    </div>
                  </div>
                </div>';
               }
            }
            $modalbodyHtml .= '</div>
        </div>';
       
        $modalbodyHtml .= '<div class="certificate p5 border-bottom">
        <div class="mediumfont1">Certifications</div><br>';
          if(!empty($certificationsArray['certification_name']))
          {
            foreach($certificationsArray['certification_name'] as $key => $rowData)
            {
              $modalbodyHtml .= '<div class="row border-bottom">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                  <center>
                    <div class="normalfont3"><i class="fa fa-certificate" aria-hidden="true" style="font-size: 36px;color: gold;"></i></div>
                  </center>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                  <div class="">
                    <div class="normalfont1">'.$certificationsArray['certification_name'][$key].'</div>
                    <div class="normalfont2 bold"><span class="dob normalfont3">Expired On '.$certificationsArray['certification_expiry_date'][$key].'</span></div><br>
                  </div>
                </div>
              </div>
              <br>';
            }
          }
      $modalbodyHtml .= '</div>
      <div class="Education p5 border-bottom">
        <div class="mediumfont1">Education</div><br>';
        if(!empty($educationArray['school_college_university']))
        {
          foreach($educationArray['school_college_university'] as $key => $rowData)
          {
            $modalbodyHtml .= '<div class="row border-bottom">
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <center>
                  <div class="normalfont3"><i class="fa fa-book" aria-hidden="true" style="font-size: 36px;"></i></div>
                </center>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <div class="">
                  <div class="normalfont1">'.$educationArray['school_college_university'][$key].'</div>
                  <div class="normalfont2 bold">'.$educationArray['degree'][$key].' <br><span class="dob normalfont3">Final year - '.$educationArray['final_year_date'][$key].'</span></div><br>

                </div>
              </div>
            </div>
            <br>';
          }
        }
        
        $modalbodyHtml .= '</div>
      <div class="Projects p5">
        <div class="mediumfont1">Projects</div><br>';
  
        if(!empty($projectArray['project_name']))
        {
          foreach($projectArray['project_name'] as $key => $rowData)
          {
            $modalbodyHtml .= '<div class="row border-bottom">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <center>
                  <div class="normalfont3"><i class="fa fa-cogs" aria-hidden="true" style="font-size: 36px;"></i></div>
                </center>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <div class="">
                  <div class="normalfont1">'.$projectArray['project_name'][$key].'</div>
                  <div class="normalfont2 bold"><span class="dob normalfont3">'.$projectArray['project_end_date'][$key].'</span></div><br>
                  <div class="normalfont2"> '.$projectArray['project_description'][$key].' 
                  </div>
                </div>
              </div>
            </div>
            <br>';
          }
      }
      $modalbodyHtml .= '</div>
      </div>
    </div>';
      $moduleTitle = "Aspirant {$apirant_data->first_name} Profile";
      $moduleBody = $modalbodyHtml;
      
      $arrRetrn = array(
        'modaltitle'=> $moduleTitle,
        'modalbody'=> $moduleBody,
      );
      // pre($arrRetrn); die;
      return $arrRetrn;
    }


    
}