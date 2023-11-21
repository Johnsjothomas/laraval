<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use App\Models\aspirant;
use App\Models\trainer;
use App\Models\module_creation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\DateTimeZone;
use App\Services\Hooper;
use App\Services\Register;
use App\Services\Notification;
use Session;
use Storage;
use Cache;
use DB;
use Mail;
use App\Models\Conversationasptran;
use App\Models\Notifications;
use PDF;

class TrainerController extends Controller
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
        $this->register = $register;
        $this->hooper = $hooper;
        $this->notification = $notification;
    }

    
    // public function profiledetails()
    // {
    //     return view('/trainer/profiledetails');
    // }

    public function tmanagemodules(Request $request)
    {
        $loggedInTrainerID = $request->session()->get('Trainer_ID');
        $moduleinfo = module_creation::where('isDeleted','no')->where('endDateTime', '>', now())->where('trainer_id', $loggedInTrainerID)->get();
        $trainer_Data = trainer::where('trainer_id', $loggedInTrainerID)->get()->first();
        $trainer_Data = @$trainer_Data ? $trainer_Data->toArray() : array();
        $moduleinfoactiveUpcoming = module_creation::where('Status','Active')->where('isDeleted','no')->where('endDateTime', '>', now())->where('trainer_id', $loggedInTrainerID)->get();
        // print_r($moduleinfoactiveUpcoming);exit;
        $ModulesDeleted = module_creation::where('Status', 'InActive')->where('isDeleted', 'yes')->where('trainer_id', $loggedInTrainerID)->get();
        $PastModules = module_creation::where('endDateTime', '<', now())->where('isDeleted', 'no')->where('trainer_id', $loggedInTrainerID)->get();
       // $timezonelist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
       $timezones = array(
                'Pacific/Midway'       => "(GMT-11:00) Midway Island",
                'US/Samoa'             => "(GMT-11:00) Samoa",
                'US/Hawaii'            => "(GMT-10:00) Hawaii",
                'US/Alaska'            => "(GMT-09:00) Alaska",
                'US/Pacific'           => "(GMT-08:00) Pacific Time (US &amp; Canada)",
                'America/Tijuana'      => "(GMT-08:00) Tijuana",
                'US/Arizona'           => "(GMT-07:00) Arizona",
                'US/Mountain'          => "(GMT-07:00) Mountain Time (US &amp; Canada)",
                'America/Chihuahua'    => "(GMT-07:00) Chihuahua",
                'America/Mazatlan'     => "(GMT-07:00) Mazatlan",
                'America/Mexico_City'  => "(GMT-06:00) Mexico City",
                'America/Monterrey'    => "(GMT-06:00) Monterrey",
                'Canada/Saskatchewan'  => "(GMT-06:00) Saskatchewan",
                'US/Central'           => "(GMT-06:00) Central Time (US &amp; Canada)",
                'US/Eastern'           => "(GMT-05:00) Eastern Time (US &amp; Canada)",
                'US/East-Indiana'      => "(GMT-05:00) Indiana (East)",
                'America/Bogota'       => "(GMT-05:00) Bogota",
                'America/Lima'         => "(GMT-05:00) Lima",
                'America/Caracas'      => "(GMT-04:30) Caracas",
                'Canada/Atlantic'      => "(GMT-04:00) Atlantic Time (Canada)",
                'America/La_Paz'       => "(GMT-04:00) La Paz",
                'America/Santiago'     => "(GMT-04:00) Santiago",
                'Canada/Newfoundland'  => "(GMT-03:30) Newfoundland",
                'America/Buenos_Aires' => "(GMT-03:00) Buenos Aires",
                'Greenland'            => "(GMT-03:00) Greenland",
                'Atlantic/Stanley'     => "(GMT-02:00) Stanley",
                'Atlantic/Azores'      => "(GMT-01:00) Azores",
                'Atlantic/Cape_Verde'  => "(GMT-01:00) Cape Verde Is.",
                'Africa/Casablanca'    => "(GMT) Casablanca",
                'Europe/Dublin'        => "(GMT) Dublin",
                'Europe/Lisbon'        => "(GMT) Lisbon",
                'Europe/London'        => "(GMT) London",
                'Africa/Monrovia'      => "(GMT) Monrovia",
                'Europe/Amsterdam'     => "(GMT+01:00) Amsterdam",
                'Europe/Belgrade'      => "(GMT+01:00) Belgrade",
                'Europe/Berlin'        => "(GMT+01:00) Berlin",
                'Europe/Bratislava'    => "(GMT+01:00) Bratislava",
                'Europe/Brussels'      => "(GMT+01:00) Brussels",
                'Europe/Budapest'      => "(GMT+01:00) Budapest",
                'Europe/Copenhagen'    => "(GMT+01:00) Copenhagen",
                'Europe/Ljubljana'     => "(GMT+01:00) Ljubljana",
                'Europe/Madrid'        => "(GMT+01:00) Madrid",
                'Europe/Paris'         => "(GMT+01:00) Paris",
                'Europe/Prague'        => "(GMT+01:00) Prague",
                'Europe/Rome'          => "(GMT+01:00) Rome",
                'Europe/Sarajevo'      => "(GMT+01:00) Sarajevo",
                'Europe/Skopje'        => "(GMT+01:00) Skopje",
                'Europe/Stockholm'     => "(GMT+01:00) Stockholm",
                'Europe/Vienna'        => "(GMT+01:00) Vienna",
                'Europe/Warsaw'        => "(GMT+01:00) Warsaw",
                'Europe/Zagreb'        => "(GMT+01:00) Zagreb",
                'Europe/Athens'        => "(GMT+02:00) Athens",
                'Europe/Bucharest'     => "(GMT+02:00) Bucharest",
                'Africa/Cairo'         => "(GMT+02:00) Cairo",
                'Africa/Harare'        => "(GMT+02:00) Harare",
                'Europe/Helsinki'      => "(GMT+02:00) Helsinki",
                'Europe/Istanbul'      => "(GMT+02:00) Istanbul",
                'Asia/Jerusalem'       => "(GMT+02:00) Jerusalem",
                'Europe/Kiev'          => "(GMT+02:00) Kyiv",
                'Europe/Minsk'         => "(GMT+02:00) Minsk",
                'Europe/Riga'          => "(GMT+02:00) Riga",
                'Europe/Sofia'         => "(GMT+02:00) Sofia",
                'Europe/Tallinn'       => "(GMT+02:00) Tallinn",
                'Europe/Vilnius'       => "(GMT+02:00) Vilnius",
                'Asia/Baghdad'         => "(GMT+03:00) Baghdad",
                'Asia/Kuwait'          => "(GMT+03:00) Kuwait",
                'Africa/Nairobi'       => "(GMT+03:00) Nairobi",
                'Asia/Riyadh'          => "(GMT+03:00) Riyadh",
                'Europe/Moscow'        => "(GMT+03:00) Moscow",
                'Asia/Tehran'          => "(GMT+03:30) Tehran",
                'Asia/Baku'            => "(GMT+04:00) Baku",
                'Europe/Volgograd'     => "(GMT+04:00) Volgograd",
                'Asia/Muscat'          => "(GMT+04:00) Muscat",
                'Asia/Tbilisi'         => "(GMT+04:00) Tbilisi",
                'Asia/Yerevan'         => "(GMT+04:00) Yerevan",
                'Asia/Kabul'           => "(GMT+04:30) Kabul",
                'Asia/Karachi'         => "(GMT+05:00) Karachi",
                'Asia/Tashkent'        => "(GMT+05:00) Tashkent",
                'Asia/Kolkata'         => "(GMT+05:30) Kolkata",
                'Asia/Kathmandu'       => "(GMT+05:45) Kathmandu",
                'Asia/Yekaterinburg'   => "(GMT+06:00) Ekaterinburg",
                'Asia/Almaty'          => "(GMT+06:00) Almaty",
                'Asia/Dhaka'           => "(GMT+06:00) Dhaka",
                'Asia/Novosibirsk'     => "(GMT+07:00) Novosibirsk",
                'Asia/Bangkok'         => "(GMT+07:00) Bangkok",
                'Asia/Jakarta'         => "(GMT+07:00) Jakarta",
                'Asia/Krasnoyarsk'     => "(GMT+08:00) Krasnoyarsk",
                'Asia/Chongqing'       => "(GMT+08:00) Chongqing",
                'Asia/Hong_Kong'       => "(GMT+08:00) Hong Kong",
                'Asia/Kuala_Lumpur'    => "(GMT+08:00) Kuala Lumpur",
                'Australia/Perth'      => "(GMT+08:00) Perth",
                'Asia/Singapore'       => "(GMT+08:00) Singapore",
                'Asia/Taipei'          => "(GMT+08:00) Taipei",
                'Asia/Ulaanbaatar'     => "(GMT+08:00) Ulaan Bataar",
                'Asia/Urumqi'          => "(GMT+08:00) Urumqi",
                'Asia/Irkutsk'         => "(GMT+09:00) Irkutsk",
                'Asia/Seoul'           => "(GMT+09:00) Seoul",
                'Asia/Tokyo'           => "(GMT+09:00) Tokyo",
                'Australia/Adelaide'   => "(GMT+09:30) Adelaide",
                'Australia/Darwin'     => "(GMT+09:30) Darwin",
                'Asia/Yakutsk'         => "(GMT+10:00) Yakutsk",
                'Australia/Brisbane'   => "(GMT+10:00) Brisbane",
                'Australia/Canberra'   => "(GMT+10:00) Canberra",
                'Pacific/Guam'         => "(GMT+10:00) Guam",
                'Australia/Hobart'     => "(GMT+10:00) Hobart",
                'Australia/Melbourne'  => "(GMT+10:00) Melbourne",
                'Pacific/Port_Moresby' => "(GMT+10:00) Port Moresby",
                'Australia/Sydney'     => "(GMT+10:00) Sydney",
                'Asia/Vladivostok'     => "(GMT+11:00) Vladivostok",
                'Asia/Magadan'         => "(GMT+12:00) Magadan",
                'Pacific/Auckland'     => "(GMT+12:00) Auckland",
                'Pacific/Fiji'         => "(GMT+12:00) Fiji",
            );
       // print_r($timezones);exit;
        return view('/trainer_backup/managemodules', ['moduleinfo'=> $moduleinfo,'moduleinfoactiveUpcoming'=>$moduleinfoactiveUpcoming, 'ModulesDeleted'=>$ModulesDeleted, 'PastModules'=>$PastModules,"timezones" => $timezones,'trainer_Data'=>$trainer_Data]);
    }    
    public function tdashboardacc(Request $request)
    {
        $loggedInTrainerID = $request->session()->get('Trainer_ID');
        // print_r($loggedInTrainerID);exit;
        $inActiveModuleCounts = 0;//module_creation::where('isDeleted','no')->where('Status','InActive')->where('trainingType','individual')->where('module_creations.endDateTime', '<', now())->where('trainer_id', $loggedInTrainerID)->count();
        
        $ActiveModuleCounts_data = module_creation::where('Status','Active')->where('isDeleted','no')->where('trainingType','individual')->where('trainer_id', $loggedInTrainerID)->where('module_creations.endDateTime', '>=', now())->get()->toArray();
        $ActiveModuleCounts = count($ActiveModuleCounts_data);
        $all_active_module_id = array_column($ActiveModuleCounts_data,"module_Id");

        $pastModuleCounts_data = module_creation::where('endDateTime', '<', now())->where('trainingType','individual')->where('trainer_id', $loggedInTrainerID)->where('isDeleted', 'no')->get()->toArray();
        $pastModuleCounts = count($pastModuleCounts_data);
        $all_past_module_id = array_column($pastModuleCounts_data,"module_Id");
        $all_active_past_module_id = array_merge($all_active_module_id,$all_past_module_id);

        $deletedModuleCounts = module_creation::where('Status', 'InActive')->where('trainingType','individual')->where('isDeleted', 'yes')->where('trainer_id', $loggedInTrainerID)->count();

        $participantsCount = DB::table('aspirant_payment')
        ->join('aspirant_master','aspirant_payment.aspirant_id','=','aspirant_master.aspirant_id')
        ->join('cart','cart.module_Id','=','aspirant_payment.module_Id')
        ->select('aspirant_payment.payment_id')
        ->whereIN('aspirant_payment.module_Id',$all_active_past_module_id)
        ->where('aspirant_master.status', '=','Active')
        ->where('cart.is_deleted', '=', 1)
        ->count();//aspirant::where('status', 'Active')->count();

        $issueCertificateIndividualCounts = DB::table('aspirant_payment')
        ->whereIN('module_Id', $all_past_module_id)
        ->whereNotNull('issue_certificate_date')
        ->count();

        // corporate tab query start
        $inActiveCorporateModuleCounts = 0;//module_creation::where('isDeleted','no')->where('Status','InActive')->where('trainingType','corporate')->where('trainer_id', $loggedInTrainerID)->count();
        $ActiveCorporateModuleCounts_data = module_creation::where('Status','Active')->where('isDeleted','no')->where('trainingType','corporate')->where('trainer_id', $loggedInTrainerID)->where('module_creations.endDateTime', '>=', now())->get()->toArray();
        $ActiveCorporateModuleCounts = count($ActiveCorporateModuleCounts_data);
        $all_corporate_active_module_id = array_column($ActiveCorporateModuleCounts_data,"module_Id");

        $pastCorporateModuleCounts_data = module_creation::where('endDateTime', '<', now())->where('trainingType','corporate')->where('trainer_id', $loggedInTrainerID)->where('isDeleted', 'no')->get()->toArray();
        $pastCorporateModuleCounts = count($pastCorporateModuleCounts_data);
        $all_corporate_past_module_id = array_column($pastCorporateModuleCounts_data,"module_Id");

        $all_corporate_active_past_module_id = array_merge($all_corporate_active_module_id,$all_corporate_past_module_id);

        $deletedCorporateModuleCounts = module_creation::where('Status', 'InActive')->where('trainingType','corporate')->where('isDeleted', 'yes')->where('trainer_id', $loggedInTrainerID)->count();

        $participantsCorporateCount = DB::table('aspirant_payment')
        ->join('aspirant_master','aspirant_payment.aspirant_id','=','aspirant_master.aspirant_id')
        ->join('cart','cart.module_Id','=','aspirant_payment.module_Id')
        ->select('aspirant_payment.payment_id')
        ->whereIN('aspirant_payment.module_Id',$all_corporate_active_past_module_id)
        ->where('aspirant_master.status', '=','Active')
        ->where('cart.is_deleted', '=', 1)
        ->count();

        $issueCertificateCorporateCounts =  DB::table('aspirant_payment')
        ->whereIN('module_Id', $all_corporate_active_past_module_id)
        ->whereNotNull('issue_certificate_date')
        ->count();

        //inActiveModuleCounts,inActiveCorporateModuleCounts- not use
        return view('/trainer/dashboardacc', ['inActiveModuleCounts'                => $inActiveModuleCounts, 
                                                'ActiveModuleCounts'                => $ActiveModuleCounts, 
                                                'participantsCount'                 => $participantsCount,
                                                'pastModuleCounts'                  => $pastModuleCounts,
                                                'deletedModuleCounts'               => $deletedModuleCounts, 
                                                'issueCertificateIndividualCounts'  => $issueCertificateIndividualCounts,
                                                'inActiveCorporateModuleCounts'     => $inActiveCorporateModuleCounts,'ActiveCorporateModuleCounts'       => $ActiveCorporateModuleCounts, 
                                                'participantsCorporateCount'        => $participantsCorporateCount, 
                                                'pastCorporateModuleCounts'         => $pastCorporateModuleCounts, 'deletedCorporateModuleCounts'      => $deletedCorporateModuleCounts, 
                                                'issueCertificateCorporateCounts'   => $issueCertificateCorporateCounts,
                                            ]);
    }
    public function tsettings(Request $request)
    {
        $TID = $request->session()->get('Trainer_ID');
        $loggedInUser = trainer::where('trainer_id', $TID)->get();
        return view('/trainer/settings', ['loggedInUser' => $loggedInUser]);
    }
    public function tmybank()
    {
        // $accstatment = module_creation::join('trainer_master','module_creations.trainer_id','=','trainer_master.trainer_id')
        // ->join('aspirant_payment','aspirant_payment.module_Id','=','module_creations.module_Id')
        // ->where('module_creation.trainer_id',session()->get('Trainer_ID'))->get();
        $accstatment = module_creation::join('trainer_master','module_creations.trainer_id','=','trainer_master.trainer_id')
        ->join('aspirant_payment','aspirant_payment.module_Id','=','module_creations.module_Id')
        ->join('aspirant_master','aspirant_master.aspirant_id','=','aspirant_payment.aspirant_id')
        ->select('aspirant_master.first_name as fname','aspirant_master.second_name as sname','aspirant_payment.payment_date as paydate','module_creations.amount as mamt','module_creations.currency as mcurr','aspirant_payment.status')
        ->where('module_creations.trainer_id',session()->get('Trainer_ID'))->get();
        // print_r($accstatment);exit();
        return view('trainer/mybank/earned',['accstatment'=>$accstatment]);
    }
    public function getAspirantBox(Request $request)
    {        
        $skip = isset($request->skip) ? $request->skip : 0;
        $limit = @$request->limit ? $request->limit : 6;

        $next_start_length = $skip + $limit;
        
        // $aspiMasterData = aspirant::where('status', 'Active')->skip($skip)->take($limit)->get();

        //SELECT aspirant_id,first_name,parent_skill,skills,POSITION("," IN skills) AS MatchPosition,(substr(skills, 1, (POSITION("," IN skills) -1))) AS subSkill FROM `aspirant_master` ORDER BY ISNULL(parent_skill), parent_skill = 0 ,field(parent_skill, 'cyber','healthCare','finance','aiMl','industry','legalSkill','softSkill') ASC, ISNULL(skills), skills = 0  DESC,field(subSkill, 'Technology','Awareness','GRC & Privacy') ASC;
        $TID = $request->session()->get('Trainer_ID');
        $trainer = trainer::where('trainer_id', $TID)->get()->first();
        $trainer = @$trainer ? $trainer->toArray() : array();
        $location_search = $request->location_search;
        $aspirantname_search = $request->aspirantname_search;

        $trainer_parent_skill = @$trainer['parent_skill'] ? "'".$trainer['parent_skill']."'," : '';
        $trainer_skills = @$trainer['skills'] ? "'".implode("','",array_reverse(explode(',',(trim(trim(trim($trainer['skills']), ','))))))."'," : '';

        $where_query = "";
        $return_filter_bar  = "";
        if($aspirantname_search != "")
        {
            $where_query .= " AND (aspirant_master.first_name LIKE '%".$aspirantname_search."%' OR aspirant_master.second_name LIKE '%".$aspirantname_search."%')";
            $return_filter_bar .= '<li class="" data-type="aspirant_name"><span class="text_filter_name_css">Aspirant Name : '.$aspirantname_search.'</span><span class="fa fa-close remove_this_filter_jss"></span></li>';
        }
        if($location_search != "")
        {
            $location_search_ar = explode(",",$location_search);
            $where_location_query = "";
            if(!empty($location_search_ar))
            {
                foreach($location_search_ar as $key_location => $single_location)
                {
                    $where_location_query .= " aspirant_master.preferred_location LIKE '%".$single_location."%'";
                    if((count($location_search_ar) - 1) != $key_location)
                    {
                        $where_location_query .= " OR ";
                    }
                }
            }
            if($where_location_query != "")
            {
                $where_query .= " AND  (".$where_location_query.") ";
            }

            $return_filter_bar .= '<li class="" data-type="location"><span class="text_filter_name_css"> Location : '.$location_search.'</span><span class="fa fa-close remove_this_filter_jss"></span></li>';
            
        }
     
        $aspiMasterData = DB::select("SELECT *,POSITION(',' IN skills) AS MatchPosition,(substr(skills, 1, (POSITION(',' IN skills) -1))) AS subSkill 
        FROM `aspirant_master` 
        WHERE status = 'Active' ".$where_query."
        ORDER BY ISNULL(parent_skill), 
        parent_skill = 0,
        field(parent_skill, ".$trainer_parent_skill." 'cyber','healthCare','finance','aiMl','industry','legalSkill','softSkill') ASC, 
        ISNULL(skills), 
        skills = 0 DESC,
        field(subSkill, ".$trainer_skills." 'Technology') DESC LIMIT ".$skip.", ".$limit);
        
        $html = '';
        if(@$aspiMasterData)
        {
            foreach($aspiMasterData as $rowData)
            {
                $html .= '<div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="aspirant-card hover_cards">

                        <div class="" style="display: inline-flex;">
                            <div style="height: 50px; width: 50px;" class="aprofile">
                                <img id="profilePic" class="pic"
                                    src="'.setProfilePic($rowData->profile_pic).'">
                            </div>
                            <div style="" class="normalfont1 bold">
                                <span class="normalfont4"><b>'.$rowData->first_name.' '.$rowData->second_name.'</b></span>
                            </div>
                            <div style="padding-left: 30px" class="normalfont1 bold">
                               <span class="normalfont4 ">'.@$rowData->job_title_designation.'</span>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="normalfont1 bold">
                                <span class="normalfont4 ">Gender 
                                    : <b>'.@$rowData->gender.'</b></span>
                                </div>
                                <div class="normalfont1 bold">
                                <span class="normalfont4 ">Preferred Location 
                                    : <b>'.@$rowData->preferred_location.'</b></span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="normalfont3 aspirant_about_text_overflow_css">'. $rowData->about_you .'</div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn bluebtn aspirant_modal_jss" data-id="'.$rowData->aspirant_id.'">View Resume</button>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn whitebtn aspiranttrainingcode_modal_btn" aspirant_id="'.$rowData->aspirant_id.'">Send Training Details</button>
                            </div>
                        </div>
                    </div><br><br>
                </div>';
            }
        }

        $resArr = array(
            "status" => 1,
            "html" => $html,
            "next_start_length" => $next_start_length,
            "return_filter_bar" => $return_filter_bar,
        );
        return $resArr;
    }
    public function tmanageAspirant(Request $request)
    {
        $loggedInTrainerID = $request->session()->get('Trainer_ID');
        // $aspiMasterData = aspirant::where('status', 'Active')->get();
        
        $Modules = module_creation::where('endDateTime', '>', now())->where('trainer_id',$loggedInTrainerID)->where('Status', 'Active')->where('isDeleted', 'no')->get();
        $eModule = $Modules;


        $aspiSubscribed = DB::table('cart as c')
        ->join('aspirant_master as am', 'c.aspirant_id', '=', 'am.aspirant_id')
        ->join('module_creations as mc', 'c.module_Id', '=', 'mc.module_Id')
        ->leftJoin('aspirant_payment as ap1', 'c.module_Id', '=', 'ap1.module_Id')
        ->leftJoin('aspirant_payment as ap2', 'c.aspirant_id', '=', 'ap2.aspirant_id')
        ->select('c.*', 'am.*', 'mc.*','ap2.issue_certificate_date')
        ->where('mc.trainer_id', $loggedInTrainerID)
        ->where('c.status', 'Pending')
        ->where('mc.endDateTime', '<', now())
        ->get();

        // pre($loggedInTrainerID); die;
        // DB::enableQueryLog();
        $applicantList = DB::table('aspirant_payment as ap')
        ->join('aspirant_master as am', 'ap.aspirant_id', '=', 'am.aspirant_id')
        ->join('module_creations as mc', 'ap.module_Id', '=', 'mc.module_Id')
        ->select('mc.*', 'am.*', 'mc.*')
        ->where('mc.trainer_id', $loggedInTrainerID)
        ->where('ap.status', 'Paid')
        ->where('mc.Status', 'Active')
        ->where('mc.isDeleted', 'no')
        ->where('mc.endDateTime','>', now())
        ->groupBy('ap.aspirant_id', 'mc.module_Id')
        ->get();

        $aspiSubscribedOption = module_creation::where('endDateTime', '<', now())->where('isDeleted', 'no')->where('trainer_id', $loggedInTrainerID)->get();

        // pre(DB::getQueryLog()); die;

        return view('trainer/aspirant/searchaspirant', [
            'eModule'=>$eModule, 
            // 'aspiMasterData'=>$aspiMasterData, 
            'loggedInTrainerID'=>$loggedInTrainerID, 
            'Modules'=>$Modules, 
            'aspiSubscribed'=>$aspiSubscribed, 
            'applicantList'=>$applicantList,
            "aspiSubscribedOption" => $aspiSubscribedOption
        ]);
    }
    public function tmanageAspByID(Request $request, $id)
    {
        $loggedInTrainerID = $request->session()->get('Trainer_ID');
        // $aspiMasterData = aspirant::where('status', 'Active')->get();
        $eModule = module_creation::where('endDateTime', '>', now())->where('trainer_id',$loggedInTrainerID)->where('Status', 'Active')->where('isDeleted', 'no')->get();
        $Modules = module_creation::where('module_Id', $id)->where('trainer_id',$loggedInTrainerID)->where('endDateTime', '>', now())->where('isDeleted', 'no')->where('Status', 'Active')->get();

        $aspiSubscribed = DB::table('cart as c')
        ->join('aspirant_master as am', 'c.aspirant_id', '=', 'am.aspirant_id')
        ->join('module_creations as mc', 'c.module_Id', '=', 'mc.module_Id')
        ->select('c.*', 'am.*', 'mc.*')
        ->where('mc.trainer_id', $loggedInTrainerID)
        ->where('c.status', 'Pending')
        ->where('c.module_Id', $id)
        ->where('mc.endDateTime', '<', now())
        ->get();


        $applicantList = DB::table('aspirant_payment as ap')
        ->join('aspirant_master as am', 'ap.aspirant_id', '=', 'am.aspirant_id')
        ->join('module_creations as mc', 'ap.module_Id', '=', 'mc.module_Id')
        ->select('mc.*', 'am.*', 'mc.*')
        ->where('mc.trainer_id', $loggedInTrainerID)
        ->where('ap.status', 'Paid')
        ->where('mc.Status', 'Active')
        ->where('mc.isDeleted', 'no')
        ->where('mc.endDateTime','>', now())
        ->where('ap.module_Id', $id)
        ->groupBy('ap.aspirant_id', 'mc.module_Id')
        ->get();

        $aspiSubscribedOption = module_creation::where('endDateTime', '<', now())->where('isDeleted', 'no')->where('trainer_id', $loggedInTrainerID)->get();
        
        return view('trainer/aspirant/searchaspirant', [
            'eModule'=>$eModule,
            // 'aspiMasterData'=>$aspiMasterData, 
            'loggedInTrainerID'=>$loggedInTrainerID, 
            'Modules'=>$Modules, 
            'aspiSubscribed'=>$aspiSubscribed,
            "applicantList" => $applicantList,
            "activeModule" => $id,
            "aspiSubscribedOption" => $aspiSubscribedOption
        ]);

    }
    public function tmanageAspByID_1(Request $request, $id)
    {
        $loggedInTrainerID = $request->session()->get('Trainer_ID');
        $aspiMasterData = aspirant::where('status', 'Active')->get();
        $Modules = module_creation::where('endDateTime', '>', now())->where('trainer_id',$loggedInTrainerID)->where('Status', 'Active')->get();
        $eModule = module_creation::where('module_Id', $id)->where('trainer_id',$loggedInTrainerID)->where('endDateTime', '>', now())->where('Status', 'Active')->get();
        // return response()->json([
        //   'status'=> 200,
        //   'Module'=> $eModule,
        // ]);
        $aspiSubscribed = DB::table('cart as c')
        ->join('aspirant_master as am', 'c.aspirant_id', '=', 'am.aspirant_id')
        ->join('module_creations as mc', 'c.module_Id', '=', 'mc.module_Id')
        ->select('c.*', 'am.*', 'mc.*')
        ->where('c.module_Id', '=', $id, 'and', 'mc.trainer_id', '=', $loggedInTrainerID, 'and', 'c.status', '=', 'Pending')
        ->get();

        // $aspiSubscribed = DB::table('cart as c')
        //     ->join('aspirant_master as am', 'c.aspirant_id', '=', 'am.aspirant_id')
        //     ->join('module_creations as mc', 'c.module_Id', '=', 'mc.module_Id')
        //     ->select('c.*', 'am.*', 'mc.*')
        //     ->where('c.module_Id', '=', $id, 'and', 'am.aspirant_id', '=', $loggedInTrainerID, 'and', 'c.status', '=', 'Pending')
        //     ->get();
         
            // $moduleid = Session::put('module_Id', 'module_Id');
            // print_r($aspiSubscribed[0]->skills); exit();
        return view('trainer/aspirant/aspirantlist', ['eModule'=>$eModule, 'loggedInTrainerID'=>$loggedInTrainerID, 'Modules'=>$Modules, 'aspiMasterData'=>$aspiMasterData, 'aspiSubscribed'=>$aspiSubscribed,"activeModule" => $id]);
    }
    public function tmessage()
    {
        $userArr = module_creation::select('module_creations.module_Id','aspirant_master.*')
        ->join('cart', 'cart.module_Id', '=', 'module_creations.module_Id')
        ->join('aspirant_master', 'cart.aspirant_id', '=', 'aspirant_master.aspirant_id')
        ->where('module_creations.trainer_id', session()->get('Trainer_ID'))
        ->groupBy('aspirant_master.aspirant_id')
        ->get();
        $userArr = @$userArr ? $userArr->toArray() : array();

        $showmesg = false;
        return view('trainer/message',['getasplist'=>@$getasplist,'showmesg'=>$showmesg, "userArr" => $userArr]);
    }

    public function tmessagecon(Request $request)
    {
        $Conversationasptran = new Conversationasptran;
        $Conversationasptran->trainer_id = session()->get('Trainer_ID');
        $Conversationasptran->module_id = 0;
        $Conversationasptran->aspirant_id = $request->aspirant_id;
        $Conversationasptran->chats = $request->message;
        $Conversationasptran->mesgfrom = "trainer";
        $Conversationasptran->created_date = date("Y-m-d H:i:s");

        $saved = $Conversationasptran->save();
        if($saved)
        {
            $array = array(
                "status" => 1,
                "aspirant_id" => $request->aspirant_id,
            );
        }
        else
        {
            $array = array(
                "status" => 0,
                "msg" => "message not sent",
            );
        }
        return $array;
    }

    public function tnotify(Request $request)
    {
        if ($request->isMethod('post')) {
            $notiid = $request->notiid;
            Notifications::where('notification_id',$notiid)->update(['status'=>'Y']);
            return redirect()->route('tnotify');
        }
        $notifications = Notifications::where('notifrom','trainer')->where('trainer_id',session()->get('Trainer_ID'))->where('status','N')->orderBy('notification_id','DESC')->get();
        return view('trainer/notify',['notifications'=>$notifications]);
    }

    public function profile(Request $request)
    { 
        $userInfo = $this->register->getUserInfo();
        $data = $userInfo->data->data;

        $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id'),"Module_Type"=>"Top"]];
        //$search_request['sortCriteria'] = ["sortOn"=>"createdOn","sortBy"=>"DESC"];
        $response = $this->register->getTransactionList('svc_type_12',1,3,$search_request);
        if($response->status == true){
            $top_modules=$response->data->data->content ?? [];
        }

        $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id'),"Module_Type"=>"Other"]];
        $response = $this->register->getTransactionList('svc_type_12',1,100,$search_request);
        if($response->status == true){
            $other_modules=$response->data->data->content ?? [];
        }

        $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id')]];
        $response = $this->register->getTransactionList('svc_type_13',1,100,$search_request);
        if($response->status == true){
            $specializations=$response->data->data->content ?? [];
        }

        $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id')]];
        $response = $this->register->getTransactionList('svc_type_14',1,100,$search_request);
        if($response->status == true){
            $educations=$response->data->data->content ?? [];
        }

        $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id')]];
        $response = $this->register->getTransactionList('svc_type_15',1,100,$search_request);
        if($response->status == true){
            $certifications=$response->data->data->content ?? [];
        }
        return view('trainer.myprofile',compact('data','top_modules','other_modules','specializations','educations','certifications'));
    }

     public function update_profile(Request $request,$id=null)
    {    
       
           $userInfo = $this->register->getUserInfo();
           $data = $userInfo->data->data;
           $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id'),"Module_Type"=>"Top"]];
           //$search_request['sortCriteria'] = ["sortOn"=>"createdOn","sortBy"=>"DESC"];
           $response = $this->register->getTransactionList('svc_type_12',1,3,$search_request);
           if($response->status == true){
            $top_modules=$response->data->data->content ?? [];
           }

           $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id'),"Module_Type"=>"Other"]];
           $response = $this->register->getTransactionList('svc_type_12',1,100,$search_request);
           if($response->status == true){
            $other_modules=$response->data->data->content ?? [];
           }

           $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id')]];
           $response = $this->register->getTransactionList('svc_type_13',1,100,$search_request);
           if($response->status == true){
            $specializations=$response->data->data->content ?? [];
           }

           $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id')]];
           $response = $this->register->getTransactionList('svc_type_14',1,100,$search_request);
           if($response->status == true){
            $educations=$response->data->data->content ?? [];
           }

           $search_request= ["criteria"=>["Trainer"=>$request->session()->get('register_id')]];
           $response = $this->register->getTransactionList('svc_type_15',1,100,$search_request);
           if($response->status == true){
            $certifications=$response->data->data->content ?? [];
           }

         if($request->isMethod('post')){

            $request->validate([
                'designation' => ['required','string'],
                'profile_summary' => ['required','string'],
                'trainer_type' => ['required','string'],
                'date_of_birth' => ['required','string'],
            ]);


           $job_details = [
                "Designation" => $request->designation,
                "Profile_Summary" => $request->profile_summary,
                "LinkedIn_URL" => $request->linkedin,
                "Trainer_Type" => $request->trainer_type,
                "Total_relevant_training_delivery_experience_in_year" => $request->delivery_experience,
                "Total_years_of_work_experience" => $request->work_experience,
                "Current_equipment_used_for_online_training" => $request->equipment,
                "Gamification_tools_used" => $request->gamification,
                "Date_of_Birth" => $request->date_of_birth,
                "Gender" => $request->gender,
           ];

            //print_r($job_details);exit;

            if(!empty($request->resume)){
                $fileName = time().'.'.$request->resume->extension();  
                $request->resume->move(public_path('uploads/resume'), $fileName);
                //$image->move($path, $image_name);
                $job_details['Upload_Resume'] =$fileName;
            }

            if(!empty($request->profile_image)){
                $fileName = time().'.'.$request->profile_image->extension();  
                $request->profile_image->move(public_path('uploads/profile'), $fileName);
                //$image->move($path, $image_name);
                $job_details['Upload_Resume'] =$fileName;
            }


            //Update Modules
            $modules = $request->module_name;
            $company_name = $request->company_name;
            $number_of_sessions = $request->number_of_sessions;
            $module_id = $request->module_id;
            foreach($modules as $key=>$val){

                $modules = [
                    "Trainer" => $request->session()->get('register_id'),
                    "Module_Status" => 'Active',
                    "Module_Type" => 'Top',
                    "Name_of_Module" => $val,
                    "Name_of_Companies_Delivered_At" => $company_name[$key],
                    "Total_number_of_sessions_delivered_per_module" => $number_of_sessions[$key],
                ];
                if(!empty($module_id[$key])){
                    $response = $this->hooper->updateTransaction('svc_type_12',$module_id[$key],$modules);
                }else{
                    $response = $this->hooper->createTransaction('svc_type_12',$modules,null,null);   
                }
                
               // print_r(json_encode($response));exit;
            }

            $other_modules = $request->other_modules;
            $other_module_id = $request->other_module_id;
            foreach($other_modules as $key=>$val){

                if(!empty($val)){
                    $modules = [
                        "Trainer" => $request->session()->get('register_id'),
                        "Module_Status" => 'Active',
                        "Module_Type" => 'Other',
                        "Details_of_other_module" => $val
                    ];

                    if(!empty($other_module_id[$key])){
                        $response = $this->hooper->updateTransaction('svc_type_12',$other_module_id[$key],$modules);
                    }else{
                        $response = $this->hooper->createTransaction('svc_type_12',$modules,null,null);   
                    }
                }
                
               // print_r(json_encode($response));exit;
            }

            $specializations = $request->specialization;//print_r($specializations);exit;
            $specialization_id = $request->specialization_id;
            foreach($specializations as $key=>$val){

                if(!empty($val)){
                    $spec_array = [
                        "Trainer" => $request->session()->get('register_id'),
                        "Specialization_Status" => 'Active',
                        "Specialization" => $val
                    ];

                    if(!empty($specialization_id[$key])){
                        $response = $this->hooper->updateTransaction('svc_type_13',$specialization_id[$key],$spec_array);
                    }else{
                        $response = $this->hooper->createTransaction('svc_type_13',$spec_array,null,null);  
                    }
                }
            }

            $college_name = $request->college_name;//print_r($specializations);exit;
            $education_id = $request->education_id;
            $degree = $request->degree;
            $specialization = $request->edu_specialization;
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            foreach($college_name as $key=>$val){

                if(!empty($val)){
                    $education_array = [
                        "Trainer" => $request->session()->get('register_id'),
                        "School_or_College/University" => $val  ,
                        "Degree" => $degree[$key],
                        "Specialization" => $specialization[$key],
                        "Start_Date" => $start_date[$key],
                        "End_Date" => $end_date[$key],
                    ];
        
                    if(!empty($education_id[$key])){
                        $response = $this->hooper->updateTransaction('svc_type_14',$education_id[$key],$education_array);
                    }else{
                        $response = $this->hooper->createTransaction('svc_type_14',$education_array,null,null);  
                    }
                }
            }

            $certificate_name = $request->certificate_name;//print_r($specializations);exit;
            $certificate_id = $request->certificate_id;
            $cert_description = $request->cert_description;
            $cert_expiry_date = $request->cert_expiry_date;
            foreach($certificate_name as $key=>$val){

                if(!empty($val)){
                    $certificate_array = [
                        "Trainer" => $request->session()->get('register_id'),
                        "Certification_Status" => 'Status' ,
                        "Name_of_the_Certification" => $val,
                        "Expiry_Date" => $cert_expiry_date[$key],
                        "Description" => $cert_description[$key],
                    ];
        
                    if(!empty($certificate_id[$key])){
                        $response = $this->hooper->updateTransaction('svc_type_15',$certificate_id[$key],$certificate_array);
                    }else{
                        $response = $this->hooper->createTransaction('svc_type_15',$certificate_array,null,null);  
                    }
                }
            }

            $response = $this->hooper->updateTransaction('usr_type_3',$request->session()->get('register_id'),$job_details);
            $success_msg = 'Profile updated successfully';

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


        return view('trainer.profiledetails',compact('data','top_modules','other_modules','specializations','educations','certifications'));
    }


    public function training_requests(Request $request,$keyword=null)
    {   
        $search_request= ["criteria"=>["Request_Status"=>"Published"]];
       $response = $this->hooper->getTransactionList('svc_type_10',1,100,$search_request);
          if($response->status == true){
            $data=$response->data->data->content ?? [];
          }
       return view('trainer.employer.trainingrequest',compact('data'));
    }

    public function training_request_info(Request $request,$id)
    {   
        $search_request= ["criteria"=>["Training_Request_ID"=>$id]];
       $response = $this->hooper->getTransactionList('svc_type_10',1,1,$search_request);
          if($response->status == true){
            $data=$response->data->data->content[0] ?? [];
          }

           if($request->isMethod('post')){
              $request_array=[
                "Company" => $request->company,
                "Posted_by_User" => $request->session()->get('register_id'),
                "Trainer" => $request->session()->get('register_id'),
                "Proposed_Fee" => $request->proposed_fee,
                "Application_Status" => "Applied"
              ];

               $response = $this->hooper->createTransaction('svc_type_21',$request_array,null,null);
               if($response->status == true){

                if($response->data->statusCode != 0){//check if any error

                    $request->session()->flash('failed', $response->data->statusMessage);
                    return redirect()->back()->withInput();
                }
                $request->session()->flash('success', 'Your Application has been submited. We will get back to you soon');
                sleep(1);
                return redirect()->back();

               }else{
                 $request->session()->flash('failed', $response->data->message);
                 return redirect()->back()->withInput();
               }
           }

       return view('trainer.employer.moduleinfo',compact('data'));
    }

    public function applied_training(Request $request,$keyword=null)
    {   
        $search_request= [
          "criteria"=>["Application_Status"=> "Applied"],
          "resolveRefs"=> [
            "Company" => ["Company_Name"],
          ]];
       $response = $this->hooper->getTransactionList('svc_type_21',1,100,$search_request);
          if($response->status == true){
            $data=$response->data->data->content ?? [];
          }
       return view('trainer.employer.appliedtrainingrequest',compact('data'));
    }

    public function negotiations(Request $request,$keyword=null)
    {   
        $search_request= [
          "criteria"=>["Application_Status"=> "Applied"],
          "resolveRefs"=> [
            "Company" => ["Company_Name"],
          ]];
       $response = $this->hooper->getTransactionList('svc_type_21',1,100,$search_request);
          if($response->status == true){
            $data=$response->data->data->content ?? [];
          }
       return view('trainer.employer.negotiationschedule',compact('data'));
    }

    public function employersummary(Request $request,$keyword=null)
    {   
        $search_request= ["criteria"=>["Current_Module_Status"=>ucfirst($keyword)]];
       $response = $this->hooper->getTransactionList('svc_type_16',1,100,$search_request);
          if($response->status == true){
            $data=$response->data->data->content ?? [];
          }
       return view('trainer.employer.employersummary',compact('data'));
    }
    public function changeTrainerPassword(Request $request)
    {
        $loggedInTrainerID = $request->session()->get('Trainer_ID');
        
        $old_pwd = $request->old_pwd;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;

        $request->validate([
            'password'   => 'required|string|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/|confirmed',
        ],[
            'password.regex' => 'Password must be alphanumeric'
        ]);

        if($password != $password_confirmation)
        {
            return array(
                "status" => 0,
                "msg"   => "Password not match."
            );
        }
        
        $trainer_Data = trainer::where('trainer_id', $loggedInTrainerID)->where('password', $old_pwd)->get()->first();
        
        if(empty($trainer_Data))
        {
            return array(
                "status" => 0,
                "msg"   => "Old password does not match."
            );
        }

        $upd = trainer::where('trainer_id', $loggedInTrainerID)->update(['password'=>$password,'cpassword'=>$password]);

        if($upd)
        {
            return array(
                "status" => 1,
                "msg"   => "Password update successfully."
            );
        }
        else
        {
            return array(
                "status" => 0,
                "msg"   => "Password update failed."
            );
        }
    }
    public function getChatWithAspirant(Request $request)
    {
        $TID = $request->session()->get('Trainer_ID');
        $data_id = $request->data_id;
        
        $aspirant = aspirant::where('aspirant_id', $data_id)->get()->first();
        $aspirant = @$aspirant ? $aspirant->toArray() : array();

        $Conversationasptran = Conversationasptran::where('trainer_id',$TID)->where('aspirant_id', $data_id)->get();
        $Conversationasptran = @$Conversationasptran ? $Conversationasptran->toArray() : array();


        $html = '';
        if(@$Conversationasptran)
        {
            foreach ($Conversationasptran as $key => $value) {

                $created_dateFormat = date("h:i A", strtotime($value['created_date']));
                $chatsMsg = $value['chats'];

                if($value['mesgfrom'] == 'trainer')
                {
                    $html .= '<div class="chat_msg the_digital_gate_send">
                        <div class="boxess send_class_box">
                            <div class="boxes_content1">
                                <div class="boxes_content2">
                                    <div class="txts cus_data_text send_text">
                                        '.$chatsMsg.'
                                        <sub>'.$created_dateFormat.'</sub>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
                else
                {
                    $html .= '<div class="chat_msg the_digital_gate_receive">
                        <div class="boxess the_digital_gate_receive_class">
                            <div class="boxes_content1">
                                <div class="boxes_content2">
                                    <div class="txts receive_in_text">
                                    '.$chatsMsg.'
                                    <sub>'.$created_dateFormat.'</sub>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                }
            }
        }
        $aspirant['name'] = $aspirant['first_name'].' '.$aspirant['second_name'];
        $aspirant['profile'] = setProfilePic($aspirant['profile_pic']);
        return array(
            "status" => 1,
            "html" => $html,
            "aspirant" => $aspirant
        );
    }
    public function join_now_send_to_aspirant(Request $request)
    {
        $TID = $request->session()->get('Trainer_ID');
        $aspirant_id = $request->aspirant_id;
        $data_module_id = $request->data_module_id;

        $moduleinfo = module_creation::where('module_Id', $data_module_id)->get()->first();
        
        $aspirant = aspirant::where('aspirant_id', $aspirant_id)->get()->first();
        $trainer = trainer::where('trainer_id', $TID)->get()->first();
        $aspirant = @$aspirant ? $aspirant->toArray() : array();

        $resArr = array("status" => 0, "msg" => "Failed...!");
        if(@$moduleinfo && @$aspirant)
        {
            $info = array(
                'name' => $aspirant['first_name'],
                'moduleinfo' => $moduleinfo,
            );
            $mailDataArr = array(
                "email" => $aspirant['email_id'],
                "name" => $aspirant['first_name'],
            );
            Mail::send('emails.moduleinfo', $info, function ($message) use ($mailDataArr)
            {
                $message->to($mailDataArr['email'], $mailDataArr['name'])
                    ->subject('The DigitalGate');
            });
            
            $this->notification->savenotification("aspirant", $aspirant_id, 'You get new email from '.$trainer['first_name'].' about '.$moduleinfo['moduleTitle'].' training.');
            $resArr = array("status" => 1, "msg" => "Email send successfully...!");
        }

        return $resArr;
    }

    public function profileDetailsUpdateBysetting(Request $request)
    {
        $return_status = 0;
        $return_mes = "Failed..!!";
        // $TID = $request->trainer_id;
        $TID = $request->session()->get('Trainer_ID');
        $updateValue = $request->update_value;
        $updateColumn = $request->data_type;

        if($updateColumn == 'email_id')
        {
            $response = aspirant::where('email_id',$updateValue)->get()->first();
            if(empty($response))
            {
                $response = trainer::where('email_id',$updateValue)->get()->first();
            }
            if(@$response)
            {
                return array(
                    "status" => 0,
                    "msg" => "Email ID is already taken",
                );
                die;
            }
        }
        $updateProfile = trainer::where('trainer_id',$TID)->update([$updateColumn=> $updateValue]);
        if($updateProfile)
        {
            $return_status = 1;
            $return_mes = "Success..!!";
        }
        
        return array(
            "status" => $return_status,
            "msg" => $return_mes,
        );
    }
    public function generateCertificate(Request $request)
    {
        $TID = $request->session()->get('Trainer_ID');
        $aspirant_id = $request->aspirant_id;
        $data_module_id = $request->data_module_id;

        $moduleinfo = module_creation::where('module_Id', $data_module_id)->get()->first();
        $moduleinfo = @$moduleinfo ? $moduleinfo->toArray() : array();
        
        $aspirant = aspirant::where('aspirant_id', $aspirant_id)->get()->first();
        $aspirant = @$aspirant ? $aspirant->toArray() : array();

        $trainer = trainer::where('trainer_id', $TID)->get()->first();
        $trainer = @$trainer ? $trainer->toArray() : array();

       // $update_issue_certificate = aspirant_payment::where('aspirant_id', $aspirant_id)
        $date_time_now = date("Y-m-d H:i:s");
        $update_issue_certificate = DB::table('aspirant_payment')
        ->where('aspirant_id', $aspirant_id)
        ->where('module_Id', $data_module_id)
        ->whereNull('issue_certificate_date')
        ->update(['issue_certificate_date' => $date_time_now]);
        return array(
            "status" => 1,
            "msg" => "success",
            "id" => urlencode(base64_encode(@$aspirant['first_name']."~@~".@$trainer['first_name']."~@~".@$moduleinfo['moduleTitle'])),
            "userName" => @$aspirant['first_name'], //asp
            "employerName" => @$trainer['first_name'], //triner name
            "moduleName" => @$moduleinfo['moduleTitle'], //module name
            "date_time_now" => date("d/m/Y H:i", strtotime($date_time_now)),
        );
    }
    public function downloadModulePDF(Request $request, $id)
    {
        $moduleinfo = module_creation::where('module_Id', $id)->get()->first();
        // $moduleinfo = @$moduleinfo ? $moduleinfo->toArray() : array();
        if($moduleinfo)
        {
            $pdf = PDF::loadView('modulepdf', array("moduleinfo" => $moduleinfo));
            return $pdf->download('module-details.pdf');
        }
        return redirect()->back();
    }
}