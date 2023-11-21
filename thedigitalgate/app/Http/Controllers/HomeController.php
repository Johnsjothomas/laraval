<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Contact;
use App\Http\Requests\CsvImportRequest;
use App\Models\aspirant;
use App\Models\module_creation;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Webpatser\Uuid\Uuid;
// use App\Services\Product;
use Google_Client;
use App\Models\trainer;
use App\Services\Notification;
use App\Services\Register;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(Product $product)
    // {
    //     //$this->middleware('auth:admin');
    //     $this->product = $product;
    // }
    public function __construct(
        Notification $notification,Register $register
    )
    {
        $this->register = $register;
        $this->notification = $notification;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function tmyprofile(Request $request)
    {
        $TID = $request->session()->get('Trainer_ID');
        $loggedInUser = trainer::where('trainer_id', $TID)->get();
        // return print_r($loggedInUser[0]->specialization);
        return view('/trainer/myprofile', ['loggedInUser' => $loggedInUser]);
    }

    public function tprofiledetails(Request $request)
    {
        $TID = session()->get('Trainer_ID');
        // print_r($TID);exit;
        $loggedInUser = trainer::where('trainer_id', $TID)->get();
        // print_r($loggedInUser[0]->preferred_online_platform);exit;
        return view('/trainer_backup/profiledetails', ['loggedInUser' => $loggedInUser]);
    }

    public function tprofiledetailssave(Request $request)
    {
        // print_r($request->checkPreferPlatformName);exit;
        $loggedInTrainerID = $request->session()->get('Trainer_ID');
        $TID = $request->session()->get('Trainer_ID');
        $TrainerDetails = new trainer();
        
        $file = $request->file('myResume');
        if($file)
        {
            $request->validate([
                'myResume' => ['max:1536'],
            ]);

            $getClientOriginalName = $file->getClientOriginalName();
            $getClientOriginalExtension = $file->getClientOriginalExtension();

            $getClientOriginalNameNew = $TID.'-trainer-'.time().'-'.uniqid().'.'.$getClientOriginalExtension;
            $destinationPath = '../public/uploads';
            if(empty($file->move($destinationPath, $getClientOriginalNameNew)))
            {
                $getClientOriginalNameNew = '';
                $getClientOriginalName = '';
            }
        }
        else
        {
            $getClientOriginalNameNew = isset($request->oldResumeName) ? $request->oldResumeName : "";
            $getClientOriginalName = isset($request->oldResumeFileOriginalName) ? $request->oldResumeFileOriginalName : "";
        }
        $request_modulesName = array();
        $request_noOfSessionName = array();
        $request_companiesDeliverName = array();
        if(isset($request->modulesName))
        {
            foreach($request->modulesName as $index_m => $mod)
            {
                if($mod != "" || (@$request->companiesDeliverName[$index_m] && $request->companiesDeliverName[$index_m] != "") || (@$request->noOfSessionName[$index_m] && $request->noOfSessionName[$index_m] != ""))
                {
                    $request_modulesName[] = $mod;
                    $request_noOfSessionName[] = $request->noOfSessionName[$index_m];
                    $request_companiesDeliverName[] = $request->companiesDeliverName[$index_m];
                }
            }
            
        }
        trainer::where('trainer_id', $TID)->update(
            [
                'Status' => 'Active',
                'salutation' => isset($request->salutationName) ? $request->salutationName : "",
                'about_you' => isset($request->aboutYouName) ? $request->aboutYouName : "",
                'role' => isset($request->profileDescName) ? $request->profileDescName : "",
                'skills' => isset($request->inputSkilsName) ? $request->inputSkilsName : "",
                'parent_skill' => isset($request->parent_skill) ? $request->parent_skill : "",
                'linkedin_url' => isset($request->linkedinURLName) ? $request->linkedinURLName : "",
                // 'specialization' => isset($request->specializationName) ? $request->specializationName : "" ,
                
                //'modules' => isset($request->modulesName) ? json_encode($request->modulesName) : [""],
                'modules' => !empty($request_modulesName) ? json_encode($request_modulesName) : [],

                //'companies_deliver_at' => isset($request->companiesDeliverName) ? json_encode($request->companiesDeliverName) : [""],
                
                'companies_deliver_at' => !empty($request_companiesDeliverName) ? json_encode($request_companiesDeliverName) : [],

                //'no_of_session_name' => isset($request->noOfSessionName) ? json_encode($request->noOfSessionName) : [""],

                'no_of_session_name' => !empty($request_noOfSessionName) ? json_encode($request_noOfSessionName) : [],
                // 'details_other_module' => isset($request->detailOtherModuleName) ? $request->detailOtherModuleName : "" ,
                'relevant_module_experience' => isset($request->totalRelExperienceName) ? $request->totalRelExperienceName : "" ,
                // 'details_other_module' => isset($request->other_modules) ? json_encode($request->other_modules) : [""],
                'total_experience' => isset($request->totalEaxperienceName) ? $request->totalEaxperienceName : "",
                'preferred_online_platform' => isset($request->checkPreferPlatformName) ? json_encode($request->checkPreferPlatformName) : [""],
                'equipment_for_training' => isset($request->equipName) ? $request->equipName : [""],
                'gamification_tool' => isset($request->gamificationName) ? $request->gamificationName : [""],
                'specialization' => isset($request->specialization) ? json_encode($request->specialization) : [""],
                'school_college_university' => isset($request->schoolName) ? $request->schoolName : "",
                'degree' => isset($request->degreeName) ? $request->degreeName : "",
                'final_year_date' => isset($request->finalYearName) ? $request->finalYearName : "",
                'certification_name' => isset($request->certificationName) ? json_encode($request->certificationName) : [""],
                'certification_expiry_date' => isset($request->certiExpiryDateName, ) ? json_encode($request->certiExpiryDateName) : [""],
                'certification_description' => isset($request->certiDescName, ) ? json_encode($request->certiDescName) : [""],
                'dob' => isset($request->dobName, ) ? $request->dobName : "",
                'gender' => isset($request->genderName) ? $request->genderName : "",
                'languages_known' => isset($request->languageName) ?    json_encode($request->languageName) : [""],
                'resume_path' => $getClientOriginalNameNew,
                'resume_file_original_name' => $getClientOriginalName,
                // 'trainer_level' => isset($request->trainerLevelName) ? $request->trainerLevelName : ""
            ]
        );
        $this->notification->savenotification("trainer", $TID, "Profile Updated");
        $data = array("status" => 1, "msg" => "Success! Your data save successfully.");
        return $data;
        // return route('tprofile');
        // return redirect()->route('tprofile');
    }
    public function trainerDetailsSaveProfilePic(Request $request)
    {
        $loggedInTrainerID = $request->session()->get('Trainer_ID');
        $TID = $request->session()->get('Trainer_ID');
        
        $file = $request->file('profile_pic');
        if($file)
        {
            $request->validate([
                'profile_pic' => ['max:1536'],
            ]);
            $getClientOriginalExtension = $request->ext;

            $getClientOriginalNameNew = $TID.'-trainer-'.time().'-'.uniqid().'.'.$getClientOriginalExtension;
            $destinationPath = '../public/uploads/profile';
            if(!empty($file->move($destinationPath, $getClientOriginalNameNew)))
            {
                $TrainerDetails = new trainer();
                trainer::where('trainer_id', $TID)->update(
                    [
                        'profile_pic' => $getClientOriginalNameNew
                    ]
                );
                $this->notification->savenotification("trainer", $TID, "Profile Image Updated Successfully");
                $data = array("status" => 1, "msg" => "Success! Your profile save successfully.");
            }
            else
            {
                $this->notification->savenotification("trainer", $TID, "Profile Image Updated Failed");
                $data = array("status" => 0, "msg" => "Failed! Your profile save failed.");
            }
        }
        else
        {
            $data = array("status" => 0, "msg" => "Failed! Your profile save failed.");
        }
        return $data;
    }


    public function aprofiledetails(Request $request)
    {
        $AID = session()->get('Aspirant_ID');
        // print_r($TID);exit;
        $loggedInAUser = aspirant::where('Aspirant_ID', $AID)->get();
        // print_r($loggedInUser[0]->preferred_online_platform);exit;
        return view('/aspirant/profile/profiledetails', ['loggedInAUser' => $loggedInAUser]);
    }
    public function aprofiledetailssave(Request $request)
    {
        $loggedInTrainerID = $request->session()->get('Aspirant_ID');
        $AID = $request->session()->get('Aspirant_ID');

        $request->jobEndDateName = dateFormatFromAny($request->jobEndDateName);
        $request->projectEnddateName = dateFormatFromAny($request->projectEnddateName);
        $request->finalYearDateName = dateFormatFromAny($request->finalYearDateName);
        $request->dobName = dateFormatFromAny($request->dobName);
        
        /************** */
        $file = $request->file('myResume');
        if($file)
        {
            $request->validate([
                'myResume' => ['max:1536'],
            ]);
            $getClientOriginalName = $file->getClientOriginalName();
            $getClientOriginalExtension = $file->getClientOriginalExtension();

            $getClientOriginalNameNew = $AID.'-aspirant-'.time().'-'.uniqid().'.'.$getClientOriginalExtension;
            $destinationPath = '../public/uploads';
            if(empty($file->move($destinationPath, $getClientOriginalNameNew)))
            {
                $getClientOriginalNameNew = '';
                $getClientOriginalName = '';
            }
        }
        else
        {
            $getClientOriginalNameNew = isset($request->oldResumeName) ? $request->oldResumeName : "";
            $getClientOriginalName = isset($request->oldResumeFileOriginalName) ? $request->oldResumeFileOriginalName : "";
        }
        /************** */

        $AspirantDetails = new aspirant();
        $industriesName = "";
        if(isset($request->industriesName) && $request->industriesName != 'Other')
        {
            $industriesName =  $request->industriesName;
        }
        else
        {
            $industriesName =  $request->industriesNameOther;
        }
        aspirant::where('Aspirant_ID', $AID)->update(
            [
                'status' => 'Active',
                'is_added_detail' => 1,
                'about_you' => isset($request->aboutYouName) ? $request->aboutYouName : "",
                'skills' => isset($request->skillsName) ? $request->skillsName : "",
                'parent_skill' => isset($request->parent_skill) ? $request->parent_skill : "",
                'aspirant_type' => isset($request->AspiTypeName) ? $request->AspiTypeName : "",
                'recent_company' => isset($request->recentCompName) ? $request->recentCompName : "",
                'employment_type' => isset($request->employTypeName) ? $request->employTypeName : "",
                'job_title_designation' => isset($request->recentJobTitleName) ? $request->recentJobTitleName : "",
                'industry' => $this->setWhenOther((isset($request->industryName) ? $request->industryName : array()), (isset($request->industryNameOther) ? $request->industryNameOther : array())),
                'job_end_date' => isset($request->jobEndDateName) ? $request->jobEndDateName : NULL,
                'job_description' => isset($request->jobDescrpName) ? $request->jobDescrpName : "",
                'certification_name' => isset($request->certificationName) ? $request->certificationName : "",
                'certification_expiry_date' => isset($request->certiExpiryYearName) ? $request->certiExpiryYearName : "",
                'project_name' => isset($request->projectName) ? $request->projectName : "",
                'project_end_date' => isset($request->projectEnddateName) ? $request->projectEnddateName : NULL,
                'project_description' => isset($request->projectDescName) ? $request->projectDescName : "",
                'school_college_university' => isset($request->schoolName) ? $request->schoolName : "",
                'degree' => $this->setWhenOther((isset($request->degreeName) ? $request->degreeName : array()), (isset($request->degreeNameOther) ? $request->degreeNameOther : array())),
                'final_year_date' => isset($request->finalYearDateName) ? $request->finalYearDateName : NULL,
                'dob' => isset($request->dobName) ? $request->dobName : NULL,
                'gender' => isset($request->genderName) ? $request->genderName : "",
                'work_permit' => isset($request->workPermitName) ? $request->workPermitName : "",
                'languages_known' => isset($request->checkLanguageName) ? $request->checkLanguageName : [""],
                'preferred_location' => isset($request->preferLocationName) ? $request->preferLocationName : "",
                'industries' => $industriesName,
                'resume_path' => $getClientOriginalNameNew,
                'resume_file_original_name' => $getClientOriginalName,
                // 'preferred_online_platform' => isset($request ->checkPreferPlatformName) ?  json_encode( $request ->checkPreferPlatformName) : ""
            ]
        );
        // return route('tprofile');
        //return redirect()->route('aprodetails');
        $this->notification->savenotification("aspirant", $AID, "Profile Updated Successfully");
        $data = array("status" => 1, "msg" => "Success! Your data save successfully.");
        return $data;
    }
    public function setWhenOther($mainArr, $otherArr)
    {
        $returnArr = $mainArr;
        if(@$mainArr)
        {
            for($i = 0; $i < count($mainArr); $i++)
            {
                if($mainArr[$i] == 'Other')
                {
                    $returnArr[$i] = isset($otherArr[$i]) ? $otherArr[$i] : '';
                }
            }
        }
        return $returnArr;
    }
    public function aproDetailsSaveProfilePic(Request $request)
    {
        $loggedInTrainerID = $request->session()->get('Aspirant_ID');
        $AID = $request->session()->get('Aspirant_ID');

        $file = $request->file('profile_pic');
        if($file)
        {
            $request->validate([
                'profile_pic' => ['max:1536'],
            ]);

            $getClientOriginalExtension = $request->ext;

            $getClientOriginalNameNew = $AID.'-aspirant-'.time().'-'.uniqid().'.'.$getClientOriginalExtension;
            $destinationPath = '../public/uploads/profile';
            if(!empty($file->move($destinationPath, $getClientOriginalNameNew)))
            {
                $AspirantDetails = new aspirant();
                aspirant::where('Aspirant_ID', $AID)->update(
                    [
                        'profile_pic' => $getClientOriginalNameNew
                    ]
                );
                $data = array("status" => 1, "msg" => "Success! Your profile save successfully.");
                $this->notification->savenotification("aspirant", $AID, "Profile Image Updated Successfully");
            }
            else
            {
                $this->notification->savenotification("aspirant", $AID, "Profile Image Updated Failed");
                $data = array("status" => 0, "msg" => "Failed! Your profile save failed.");
            }
        }
        else
        {
            $data = array("status" => 0, "msg" => "Failed! Your profile save failed.");
        }
        return $data;
    }
    public function delete_aspirant(Request $request)
    {
        $AID = $request->session()->get('Aspirant_ID');
        $delete = aspirant::where('Aspirant_ID', $AID)->delete();
        if($delete)
        {
            $returnArr = array("status" => 1, "msg" => "Success!");
        }
        else
        {
            $returnArr = array("status" => 0, "msg" => "Failed!");
        }
        return $returnArr;
    }
    public function delete_trainer(Request $request)
    {
        $TID = $request->session()->get('Trainer_ID');

        $moduleinfoactiveUpcoming = module_creation::where('Status','Active')->where('isDeleted','no')->where('endDateTime', '>', now())->where('trainer_id', $TID)->first();
        $moduleinfoactiveUpcoming = @$moduleinfoactiveUpcoming ? $moduleinfoactiveUpcoming->toArray() : array();
        if(@$moduleinfoactiveUpcoming)
        {
            $returnArr = array("status" => 0, "msg" => "You can not close your account before completion of active modules!");
            return $returnArr;
            die;
        }

        $delete = trainer::where('trainer_id', $TID)->delete();
        if($delete)
        {
            $returnArr = array("status" => 1, "msg" => "Success!");
        }
        else
        {
            $returnArr = array("status" => 0, "msg" => "Failed!");
        }
        return $returnArr;
    }

    // public function tprofile(Request $request)
    // {

    //     return view('/trainer_backup/profiledetails');
    // }

    public function indexAbout()
    {
        return view('/index2');
    }


    public function save_enquiry()
    {

        if (!empty($_GET['name']) && !empty($_GET['email'])) {
            $contact = [
                'name' => $_GET['name'],
                'email' => $_GET['email'],
                'phone' => $_GET['mobile'],
                'message' => $_GET['comments'],
            ];
            Contact::create($contact);
            $data = 'Thank you for getting in touch!';

            //$mail=Mail::to('ma.sidhique@gmail.com')->send(new EventMail($contact));


        } else {
            $data = 'Sorry...Please enter your name and email';
        }

        return $data;

    }

    public function enquiry_list()
    {

        $enquiries = Contact::get();
        return view('enquiry_list', compact('enquiries'));


    }

    public function google_oauth_success()
    {
        $contents = $_POST;
        $id_token = $contents['credential'];

        $client = new Google_Client(['client_id' => '936562733540-sfn0sjfj5dn8dqkekk8st66k56tngm64.apps.googleusercontent.com']); // Specify the CLIENT_ID of the app that accesses the backend
        $payload = $client->verifyIdToken($id_token);
        print_r($payload);
        exit;
        if ($payload) {
            $userid = $payload['sub'];
            // If request specified a G Suite domain:
            //$domain = $payload['hd'];
        } else {
            // Invalid ID token
        }


    }

    public function contactus(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'name' => ['required'],
                'email' => ['required'],
                'subject' => ['required'],
                'message' => ['required'],
            ]);

            $request_json = [
                "Name" => $request->name,
                "Email" => $request->email,
                "Support_Description" => $request->message,
                "Support_Type" => 'Other',
                "Subject" => $request->subject,
                "Report_Status" => "Submitted",
            ];
            // $response = $this->product->createTransaction('svc_type_14', $request_json, true);
            //return redirect()->back()->withInput();
            $request->session()->flash('success', 'Request submitted successfully');
            // if ($response->status == true) {
            //     if ($response->data->statusCode == 0) {
            //         $request->session()->flash('success', 'Request submitted successfully');
            //     } else {
            //         $request->session()->flash('failed', $response->data->statusMessage);
            //     }

            // } else {
            //     $request->session()->flash('failed', "Something went wrong.Please try again.");
            // }
            return redirect()->back();
        }
        return view('contactus');
    }

    public function settingsPageDeatils()
    {
        $AID = session()->get('Aspirant_ID');
        $loggedInAUser = aspirant::where('Aspirant_ID', $AID)->get();
        return view('/aspirant/settings', ['loggedInAUser' => $loggedInAUser]);
    }


    public function get_started_mail_send(Request $request)
    {
      
        $from_address = $request->email_address;
        //$email_message = $request->email_message;

        $resArr = array("status" => 0, "msg" => "Please Fill Details");
        if(@$from_address)
        {
            $mailSendar =  array('useremail' => 'adith.haridas@thedigitalgate.co',
                            'username'  => '',
                            'type'      => 'get_started',
                            'message'   => 'Get Started By Email:'.$from_address,
                            );
        
            $this->register->sendCommonchatmail($mailSendar);
            $resArr = array("status" => 1, "msg" => "Email send successfully...!");
        }
        return $resArr;
    }
    public function changelang(Request $request)
    {
        $request->session()->put('sitelang', $request->lang_set);
        
        return array("status" => 1, "msg" => "successfully...!");
    }
}