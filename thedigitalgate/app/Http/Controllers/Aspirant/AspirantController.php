<?php

namespace App\Http\Controllers\Aspirant;

use App\Http\Controllers\Controller;
use App\Models\aspirant;
use App\Models\cart;
use App\Models\trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Hooper;
use App\Services\Register;
use App\Models\module_creation;
use Google\Service\CloudTrace\Module;
use Illuminate\Support\Facades\DB;
use App\Models\AspirantPayment;
use App\Models\Conversationasptran;
use App\Models\Notifications;
use App\Models\save_module;
use App\Services\Notification;
use Carbon\Carbon;
use DateTime;

class AspirantController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    // public function AspModuleInfo(Request $request)
    // {
    //     // $moduleidBuy = module_creation::where('module_Id', $id)->get();
    //     $moduleinformation = module_creation::get();
    //     return view('aspirant/moduleinfo', ['moduleinformation'=> $moduleinformation[0]]);
    // }


    public function profile()
    {
        // return view('aspirant.profile.myprofile');
        return view("aspirant.profile.profiledetails");
    }

    public function __construct(
        Hooper $hooper,
        Register $register,
        Notification $notification
    ) {
        $this->hooper = $hooper;
        $this->register = $register;
        $this->notification = $notification;
    }

    public function dashboard()
    {

        return view('talent.aspirant.dashboardacc');
    }

    // public function profile(Request $request)
    // { 
    //     $userInfo = $this->register->getUserInfo();
    //        $data = $userInfo->data->data;


    //     return view('aspirant.profile.myprofile',compact('data',));
    // }

    public function aspinoti(Request $request)
    {
        if ($request->isMethod('post')) {
            $notiid = $request->notiid;
            Notifications::where('notification_id',$notiid)->update(['status'=>'Y']);
            return redirect()->route('aspinoti');
        }
        $notifications = Notifications::where('notifrom','aspirant')->where('aspirant_id',session()->get('Aspirant_ID'))->where('status','N')->orderBy('notification_id', 'DESC')->get();
        return view('/aspirant/notify',['notifications'=>$notifications]);
    }

    public function aspirantmessage()
    {
        $userArr = cart::select('cart.module_Id','trainer_master.*')
        ->join('module_creations', 'cart.module_Id', '=', 'module_creations.module_Id')
        ->join('trainer_master', 'module_creations.trainer_id', '=', 'trainer_master.trainer_id')
        ->where('cart.aspirant_id', session()->get('Aspirant_ID'))
        ->groupBy('trainer_master.trainer_id')
        ->get();


        $userArr = @$userArr ? $userArr->toArray() : array();

        $showmesg = false;
        return view('/aspirant/message',['startedtraining'=>@$startedtraining,'showmesg'=>$showmesg, "userArr" => $userArr]);
    }

    public function aspirantmessagesupid(Request $request,$moduleid)
    {
        // print_r($moduleid);
        $trainerdetails = module_creation::join('trainer_master', 'module_creations.trainer_id', '=', 'trainer_master.trainer_id')
        ->where('module_Id',$moduleid)->get();
        // print_r($trainerdetails);
        $showmesg = true;
        $startedtraining = [];

        $conversation = Conversationasptran::where('aspirant_id',session()->get('Aspirant_ID'))->where('trainer_id',$trainerdetails[0]->trainer_id)->get();
        // print_r($conversation);
        if ($request->isMethod('post')) {
            // print_r($request->all());
            // print_r($moduleid);
            // print_r($trainerdetails[0]->trainer_id);
            // print_r(session()->get('Aspirant_ID'));

            $Conversationasptran = new Conversationasptran;
            $Conversationasptran->trainer_id = $trainerdetails[0]->trainer_id;
            $Conversationasptran->module_id = $moduleid;
            $Conversationasptran->aspirant_id = session()->get('Aspirant_ID');
            $Conversationasptran->chats = $request->message;
            $Conversationasptran->mesgfrom = "aspirant";
            $Conversationasptran->created_date = date("Y-m-d H:i:s");

            $Conversationasptran->save();

            return redirect()->route('aspirantmessagesupid',['supid'=>$moduleid]);

        }

        return view('/aspirant/message',['startedtraining'=>$startedtraining,'showmesg'=>$showmesg,'trainerdetails'=>$trainerdetails[0],'conversation'=>$conversation]);
    }

    // public function savemesg(Request $request)
    // {
    //     print_r($request->all());
    //     exit();
    // }

    public function Aspimyprofile(Request $request)
    {
        $SID = $request->session()->get('Aspirant_ID');
        $loggedInUserAspi = aspirant::where('Aspirant_ID', $SID)->get();
        // return $loggedInUserAspi[0]->first_name;
        return view('/aspirant_2/myprofile', ['loggedInUserAspi' => $loggedInUserAspi]);
    }

    public function moduleDetailsByID($id)
    {
        $SID = session()->get('Aspirant_ID');
        $loggedInUserAspi = aspirant::where('Aspirant_ID', $SID)->get();

        $moduleinfo = module_creation::where('module_Id', $id)->where('Status', 'Active')->where('isDeleted', 'no')->get();
        $trainerinfo = trainer::where('trainer_id', $moduleinfo[0]['trainer_id'])->get();
        $findcart = cart::where('aspirant_id',session()->get('Aspirant_ID'))->where('module_Id',$id)->get();
        $findcart = @$findcart ? $findcart->toArray() : array();

        if(empty($findcart)){
            $incart = false;
        } else {
            $incart = true;
        }
        
        // print_r($findcart);
        // print_r(empty($findcart));
        // print_r(session()->get('Aspirant_ID'));
        // print_r($id);
        // print_r($trainerinfo[0]);
        // return view('/aspirant/moduleinfo',['moduleinfo'=>$moduleinfo[0]['moduleTitle']]);
        return view('/aspirant/moduleinfo', ['moduleinfo' => @$moduleinfo[0] ? $moduleinfo[0] : array(), 'trainerinfo' => @$trainerinfo[0] ? $trainerinfo[0] : array(),'incart'=>$incart,'loggedInUserAspi' => $loggedInUserAspi]);
    }

    public function myBankAsp(Request $request)
    {
        // print_r("run");exit();
        $MayCartData = cart::join('module_creations', 'module_creations.module_Id', '=', 'cart.module_Id')
            ->join('trainer_master', 'trainer_master.trainer_id', '=', 'module_creations.trainer_id')
            ->join('aspirant_master', 'aspirant_master.aspirant_id', '=', 'cart.aspirant_id')
            ->select('aspirant_master.email_id as ame','aspirant_master.first_name as afn','aspirant_master.mobile as amm','cart.aspirant_id','cart.module_Id','trainer_master.first_name', 'module_creations.moduleTitle','module_creations.endDateTime', 'module_creations.trainingClassification', 'cart.created_date','cart.cart_id','module_creations.amount', 'module_creations.currency')
            ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
            ->where('cart.aspirant_id','=', $request->session()->get('Aspirant_ID'))
            ->where('cart.is_deleted','=', 0)
            ->get();

        $accountstatment = AspirantPayment::join('module_creations','module_creations.module_Id','=','aspirant_payment.module_Id')
        ->join('trainer_master','module_creations.trainer_id','=','trainer_master.trainer_id')
        ->select('trainer_master.first_name as fname','trainer_master.second_name as sname','module_creations.trainingClassification as typeofmod','aspirant_payment.payment_date','aspirant_payment.status','module_creations.amount as mamt','module_creations.currency as mcurr','module_creations.moduleTitle as modtitle')
        ->where('aspirant_payment.aspirant_id',$request->session()->get('Aspirant_ID'))
        ->groupBy('aspirant_payment.module_Id')
        ->orderBy('aspirant_payment.payment_id', 'desc')->get();

        // $aspID = $request->session()->get('Aspirant_ID');
        // $MayCartData = cart
        // ::join('module_creations', 'module_creations.module_Id', '=', 'cart.module_Id')
        //     ->join('trainer_master', 'trainer_master.trainer_id', '=', 'module_creations.trainer_id')
        //     ->join('aspirant_master', 'aspirant_master.aspirant_id', '=', 'cart.aspirant_id')
        //     ->select('cart.module_Id','trainer_master.first_name', 'module_creations.moduleTitle', 'module_creations.trainingClassification', 'cart.created_date', 'module_creations.amount', 'module_creations.currency')
        //     ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
        //     ->where('cart.aspirant_id','=', $request->session()->get('Aspirant_ID'))
        //     ->get();
        return view('aspirant.mybank.earned', ['MayCartData' => $MayCartData,'accountstatment'=>$accountstatment]);
    }
    public function addModuleToCart(Request $request)
    {
        $Mycart = new cart;
        $Mycart->module_Id = $request->module_Id;
        $Mycart->aspirant_id = $request->session()->get('Aspirant_ID');
        $Mycart->created_date = date('Y-m-d');
        $Mycart->status = 'Pending';
        $Mycart->save();
        //   return redirect()->back()->with('status', 'Module Created Successfully..');    
        $module_Data = module_creation::where('module_Id', $request->module_Id)->get()->first();
        $module_name = $module_Data->moduleTitle;

        $aspirantData = aspirant::where('aspirant_id', $request->session()->get('Aspirant_ID'))->get()->first();
        
        $this->notification->savenotification("aspirant",$request->session()->get('Aspirant_ID'), $module_name.' Module Added to the Cart');
        $mailSendar =  array('useremail' => $aspirantData->email_id,
                            'username'  => $aspirantData->first_name,
                            'type'      => 'add_to_cart',
                            'message'   => $module_name.' Module Added to the Cart',
                            );
        
                            $this->register->sendCommonchatmail($mailSendar);
                            
        return redirect()->route('myBankAsp')->with('status', 'Module Added to the Cart..');

        // return view('aspirant/moduleinfoo');
    }

    public function aspirantDashboard(Request $request)
    {
        $loggedAspirant = $request->session()->get('Aspirant_ID');
        $aspirantData = aspirant::where('aspirant_id', $loggedAspirant)->get();
        
        //$ReccomenModules = module_creation::where('Status', 'Active')->where('is_saved', '0')->where('endDateTime', '>', now())->get()->count();
        $saveModuleIdArrQuery = save_module::where('aspirant_id',$loggedAspirant)->get("module_Id");
        $saveModuleIdArrQuery = @$saveModuleIdArrQuery ? $saveModuleIdArrQuery->toArray() : array();
        if(@$saveModuleIdArrQuery)
        {
            $saveModuleIdArr = array_values(array_unique(array_column($saveModuleIdArrQuery,'module_Id')));
        }
        $modulesArr = module_creation::where('Status', 'Active');
        if(!empty($saveModuleIdArr))
        {
            $modulesArr->whereNotIn('module_Id', $saveModuleIdArr);
        }
        $ReccomenModules = $modulesArr->where('endDateTime', '>', now())->get()->count();

        //$savedModules = module_creation::where('Status', 'Active')->where('is_saved', '1')->where('endDateTime', '>', now())->get()->count();
        $savedModules = module_creation::where('module_creations.Status', 'Active')
        ->Join('save_modules', function ($join){
            $join->on('save_modules.module_Id', '=', 'module_creations.module_Id');
        })
        ->select('save_modules.id as isSaved','module_creations.*')
        ->where('save_modules.aspirant_id', '=', $loggedAspirant)
        ->where('module_creations.endDateTime', '>', now())->get()->count();

        // ->where('endDateTime', '>', now())
        //$appliedModules = cart::where('aspirant_id', $loggedAspirant)->where('status', 'Paid')->get()->count();
        $cartModuleIdArrQuery = cart::where('aspirant_id',$loggedAspirant)->where('status','Pending')->get("module_Id");
        $cartModuleIdArrQuery = @$cartModuleIdArrQuery ? $cartModuleIdArrQuery->toArray() : array();
        $cartModuleIdArr = array();
        if(@$cartModuleIdArrQuery)
        {
            $cartModuleIdArr = array_values(array_unique(array_column($cartModuleIdArrQuery,'module_Id')));
        }
        $appliedModules = 0;
        if(@$cartModuleIdArr)
        {
           $appliedModules = module_creation::where('Status', 'Active')
           ->whereIn('module_Id', $cartModuleIdArr)
           ->where('endDateTime', '>', now())
           ->get()->count();
           
            // $appliedModules_ar = module_creation::where('Status', 'Active')->whereIn('module_Id', $cartModuleIdArr)->get();
            // if(!empty($appliedModules_ar))
            // {
            //     foreach($appliedModules_ar as $row_data)
            //     {
            //         if(strtotime($row_data['startDate']) < strtotime(now()))
            //         {
            //             $appliedModules++;
            //         }
            //     }
            // }
            //->where('startDate', '<','Active')
        }
       
        // $completedModules = cart::join('module_creations', 'module_creations.module_Id', '=', 'cart.module_Id')
        // ->select('cart.module_Id', 'module_creations.endDateTime')->where('cart.status', 'Paid')->where('aspirant_id', $loggedAspirant)->where('module_creations.endDateTime', '<', now())->get()->count();

        $completedModules = cart::join('module_creations', 'module_creations.module_Id', '=', 'cart.module_Id')
        ->join('trainer_master', 'trainer_master.trainer_id', '=', 'module_creations.trainer_id')
        ->join('aspirant_master', 'aspirant_master.aspirant_id', '=', 'cart.aspirant_id')
        ->select('aspirant_master.email_id as ame', 'aspirant_master.first_name as afn', 'aspirant_master.mobile as amm', 'cart.aspirant_id', 'cart.module_Id', 'trainer_master.first_name', 'module_creations.moduleTitle', 'module_creations.trainingClassification', 'cart.created_date', 'module_creations.amount', 'module_creations.currency','module_creations.endDateTime')
        ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
        ->where('cart.aspirant_id', '=', $loggedAspirant)
        ->where('module_creations.endDateTime', '<', now())
        ->get()
        ->count();

        $total_issue_certificate = DB::table('aspirant_payment as ap')
        ->where('aspirant_id', $loggedAspirant)
        ->whereNotNull('issue_certificate_date')
        ->get()
        ->count();

        $total_download_certificate = DB::table('aspirant_payment as ap')
        ->where('aspirant_id', $loggedAspirant)
        ->whereNotNull('download_cerificate_date')
        ->get()
        ->count();

        // print_r($completedModules);exit;
        return view('/aspirant/dashboardtraining', ['ReccomenModules'=>$ReccomenModules, 'appliedModules'=>$appliedModules, 'savedModules'=>$savedModules, 'completedModules'=>$completedModules,"total_download_certificate" => $total_download_certificate,"total_issue_certificate" => $total_issue_certificate]);
    }
    public function listModule(Request $request)
    {
        $AID = $request->session()->get('Aspirant_ID');
        $type = @$request->type ? $request->type : '';
        $sub_type = @$request->sub_type ? $request->sub_type : '';
        $skip = isset($request->skip) ? $request->skip : 0;
        $limit = @$request->limit ? $request->limit : 6;
        $training_name = $request->training_name;

        $return_filter_bar  = "";
        
        if($training_name != "")
        {
           $return_filter_bar .= '<li class=""><span class="text_filter_name_css">Training Name : '.$training_name.'</span><span class="fa fa-close remove_this_filter_jss"></span></li>';
        }

        $next_start_length = $skip + $limit;
        $saveModuleIdArr = array();
        $paidModuleIdArr = array();

        $paidModuleIdArrQuery = AspirantPayment::where('aspirant_id',$AID)->where('status','Paid')->get("module_Id");
        $paidModuleIdArrQuery = @$paidModuleIdArrQuery ? $paidModuleIdArrQuery->toArray() : array();
        
        if(@$paidModuleIdArrQuery)
        {
            $paidModuleIdArr = array_values(array_unique(array_column($paidModuleIdArrQuery,'module_Id')));
        }


        if($type == 'recommended')
        {
            $saveModuleIdArrQuery = save_module::where('aspirant_id',$AID)->get("module_Id");
            $saveModuleIdArrQuery = @$saveModuleIdArrQuery ? $saveModuleIdArrQuery->toArray() : array();
        
            if(@$saveModuleIdArrQuery)
            {
                $saveModuleIdArr = array_values(array_unique(array_column($saveModuleIdArrQuery,'module_Id')));
            }
           
            $modulesArr = module_creation::where('Status', 'Active');
            if(!empty($saveModuleIdArr))
            {
                //$modulesArr->whereNotIn('module_Id', $saveModuleIdArr);
            }
            if(!empty($paidModuleIdArr))
            {
                $modulesArr->whereNotIn('module_Id', $paidModuleIdArr);
            }
            if($training_name != "")
            {
                //$modulesArr->where('moduleTitle', $training_name);
                $modulesArr->where('moduleTitle', 'like', '%' . $training_name . '%');
            }
            $modulesArr = $modulesArr->where('trainingClassification', $sub_type)
            ->where('endDateTime', '>', now())->skip($skip)->take($limit)->get();
            // ->where('endDateTime', '>', now())
        }
        elseif($type == 'saved')  
        {
            
            $modulesArr = module_creation::where('module_creations.Status', 'Active')
            ->Join('save_modules', function ($join) use ($AID){
                //$join->on('save_modules.aspirant_id', '=', $AID)
                $join->on('save_modules.module_Id', '=', 'module_creations.module_Id');
            })
            ->select('save_modules.id as isSaved','module_creations.*')
            ->where('save_modules.aspirant_id', '=', $AID)
            ->where('module_creations.endDateTime', '>', now())->skip($skip)->take($limit);
            if($training_name != "")
            {
                //$modulesArr->where('module_creations.moduleTitle', $training_name);
                $modulesArr->where('module_creations.moduleTitle', 'like', '%' . $training_name . '%');
            }
            if(!empty($paidModuleIdArr))
            {
                $modulesArr->whereNotIn('module_Id', $paidModuleIdArr);
            }
            $modulesArr = $modulesArr->get();
           
            //->orderBy('created_at', 'desc')
        }
        elseif($type == 'applied')
        {
            $saveModuleIdArrQuery = save_module::where('aspirant_id',$AID)->get("module_Id");
            $saveModuleIdArrQuery = @$saveModuleIdArrQuery ? $saveModuleIdArrQuery->toArray() : array();
            if(@$saveModuleIdArrQuery)
            {
                $saveModuleIdArr = array_values(array_unique(array_column($saveModuleIdArrQuery,'module_Id')));
            }
          
            /*$cartModuleIdArrQuery = cart::where('cart.aspirant_id',session()->get('Aspirant_ID'))
            ->where('cart.status','Pending')
            ->get("cart.module_Id");
            $cartModuleIdArrQuery = @$cartModuleIdArrQuery ? $cartModuleIdArrQuery->toArray() : array();
            $cartModuleIdArr = array();
            if(@$cartModuleIdArrQuery)
            {
                $cartModuleIdArr = array_values(array_unique(array_column($cartModuleIdArrQuery,'module_Id')));
            }*/
            //cartModuleIdArr
            if(@$paidModuleIdArr)
            {
                //$desiredFormat = 'Y-m-d H:i:s';
                $modulesArr = module_creation::where('Status', 'Active')
                ->whereIn('module_Id', $paidModuleIdArr)
                ->where('endDateTime','>',now());
                if($training_name != "")
                {
                    //$modulesArr->where('moduleTitle', $training_name);
                    $modulesArr->where('moduleTitle', 'like', '%' . $training_name . '%');
                }
                //->whereRaw('DATE_FORMAT(endDateTime, ?) < ?', [$desiredFormat, now()])
                $modulesArr = $modulesArr->skip($skip)->take($limit)->orderBy('publish_date', 'desc')->orderBy('module_Id', 'desc')->get();
            }
            else 
            {
                $modulesArr = array();
            }
        }
        $html = '';
        if(@$modulesArr)
        {
            foreach($modulesArr as $rowData)
            {
                
                $secondButton = '';
                $messageDisplay = '';
                if($type == 'saved' || $type == 'recommended')
                {
                    $incart = cart::where('aspirant_id',session()->get('Aspirant_ID'))->where('module_Id', $rowData->module_Id)->get("module_Id")->first();

                    $disableAfterStartCond = strtotime(date("Y-m-d H:i:s")) > strtotime($rowData->startDateTime);
                        
                    if($disableAfterStartCond)
                    {
                        $messageDisplay = '<div class="col-12"><b>Session Under Progress Cannot Join</b></div>';
                    }

                    if(@$incart)
                    {
                        $secondButton = '<a class="bluebtn mr-2 gotocart" href="'.((($rowData->maxParticipantPerModule - $rowData->leftParticipantPerModule) == 0 || $disableAfterStartCond) ? "javascript:;" : route('myBankAsp')).'" '.((($rowData->maxParticipantPerModule - $rowData->leftParticipantPerModule) == 0 || $disableAfterStartCond) ? ' style="background-color: #ccc;border-color: #ccc;color: #000;cursor: default;"' : "").'><i class="fa fa-shopping-cart mr-2" aria-hidden="true"></i>Add to Cart </a>';
                        // $secondButton = '<a class="whitebtn pull-rigt btn-md" style="width:100%; display:block; border:1px solid #bfbfe9; padding:5px 10px;" href="'.route('myBankAsp').'" >Add to cart</a>';
                    } else {
                        
                        $secondButton = '<form action="'.route('addModuleToCart').'" method="POST" class="d-inline-block">
                        <input type="hidden" name="_token" value="'.csrf_token().'">
                            <input type="hidden" name="module_Id" value="'.$rowData->module_Id.'">
                            <button type="submit" class="bluebtn mr-2" '.((($rowData->maxParticipantPerModule - $rowData->leftParticipantPerModule) == 0 || $disableAfterStartCond) ? 'disabled style="background-color: #ccc;border-color: #ccc;color: #000;"' : "").'><i class="fa fa-shopping-cart mr-2" aria-hidden="true"></i> Add to cart</button>
                        </form>';
                    }
                    
                }
                elseif($type == 'applied')
                {
                    
                    $target_set_Var = 'target="_blank"'; 
                    $link_set_Var = $rowData->lmsURL; 
                    $style_set_Var = ''; 
                  //  $start_timeOnly1 = date("Y/m/d H:i:s",strtotime($rowData->startDateTime));
                   // $current_timeOnly1 = date("Y/m/d H:i:s",strtotime(now()));
                    $start_timeOnly = date("H:i:s",strtotime($rowData->startDateTime));
                    $current_timeOnly = date("H:i:s",strtotime(now()));
                   
                    //$carbonTime = Carbon::parse($start_timeOnly);
                   // $newstart_timeOnly = $carbonTime->subMinutes(10)->format('H:i:s');
                    $start_timeOnly = new DateTime($start_timeOnly);
                    $current_timeOnly = new DateTime($current_timeOnly);
                    $interval_get = $start_timeOnly->diff($current_timeOnly);
                    $minutesDifference = $interval_get->h * 60 + $interval_get->i;
                    if($minutesDifference > 10)
                    {
                        $target_set_Var = ""; 
                        $link_set_Var = "javascript:;"; 
                        $style_set_Var = 'style="background: gray;cursor: not-allowed;"'; 
                    }
                    $secondButton = '<a class="bluebtn mr-2 open_new_with_jquery" '.$target_set_Var.' href="'.$link_set_Var.'" id="" '.$style_set_Var.'>Join Now </a>';
                    
                    
                }
               
                $jobTypehtml = '';
                if($rowData->jobtype_of_customer_contact != "")
                {
                    $jobTypehtml .= '<div class="col-md-6">
                        <i class="fa fa-tasks" aria-hidden="true"></i>';
                        if($rowData->jobtype_of_customer_contact == "fulltime")
                        {
                            $jobTypehtml .= 'Full Time -';
                        }
                        else if($rowData->jobtype_of_customer_contact == "internship")
                        {
                            $jobTypehtml .= 'Internship -';
                        }
                        $jobTypehtml .= ' Job Type
                    </div>';
                }
                $companyNamehtml = '';
                if($rowData->name_of_customer != "")
                {
                    $companyNamehtml .= " For ".$rowData->name_of_customer;
                }
               
                if($type == 'applied' || $type == 'recommended')
                {
                    $is_saved_value = 0;
                    if(!empty($saveModuleIdArr) && in_array($rowData->module_Id,$saveModuleIdArr))
                    {
                        $is_saved_value = 1;
                    }
                }
                else
                {
                    $is_saved_value = $rowData->isSaved;
                }
                $html .= '<div class="col-md-4 single_module_card_js">
                    <div class="card remove_br">
                        <div class="card-header p-0 ">
                            <img src="/talent/trainer/assets/img/myprofile.png" width="100%" style="height: 150px;">
                            <div class="p-3">
                                <div class="row">
                                    <div class="col-10">
                                        <h4 class="card-title">'.$rowData->moduleTitle.$companyNamehtml.'</h4>
                                    </div>
                                    <div class="col-2 bookmarkSave">
                                        <i class="pt-1 fa '.($is_saved_value ? "fa-heart" : "fa-heart-o").' right bookmark_this_module_js bookmark_this_module_css" data_id="'.$rowData['module_Id'].'" data_is_saved="'.$is_saved_value.'" title="'.($is_saved_value ? 'Click to remove from save' : 'Click to save').'" style="'.($is_saved_value ? 'color: red;' : 'color:#FC6717').'" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <span class="card-description">
                                '.$rowData->moduleDescription.'
                                </span>
                            </div>
                        </div>
                        <div class="card-body">';
                            if($rowData->maxParticipantPerModule - $rowData->leftParticipantPerModule == 0)
                            {
                                $html .= '<h6 style="color:red;">No Seats Remaining</h6>';
                            }
                            $html .= '<h6>First Session on</h6>
                            <div class="row">
                                <div class="col-md-6"><i class="fa fa-briefcase" aria-hidden="true"></i> '.date("Y-m-d \T\:\-H:i",strtotime($rowData->startDateTime)).'</div>
                                '.$jobTypehtml.'
                                <div class="col-md-6"><i class="fa fa-users" aria-hidden="true"></i> '.($rowData->maxParticipantPerModule - $rowData->leftParticipantPerModule).'/'.$rowData->maxParticipantPerModule.' Seats remaining</div>
                            </div>
                            <br />
                            <h6>Next Session on</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    Start Time <br /> 
                                    '.date("H:i",strtotime($rowData->startDateTime)).'
                                </div>
                                <div class="col-md-6">
                                    End Time <br /> 
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                    '.date("Y-m-d \T\:\-H:i",strtotime($rowData->endDateTime)).'
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <br />
                                    <a class="bluebtn mr-2" href="'.(url('aspirant/moduleinfo/')).'/'.($rowData->module_Id).'" id="editOnModal">View more details</a>
                                    '.$secondButton.'
                                </div>
                                '.$messageDisplay.'
                            </div>
                        </div>
                    </div>
                </div>';
            }
        }

        $resArr = array("status" => 1, "html" => $html, "next_start_length" => $next_start_length,"return_filter_bar" => $return_filter_bar);
        return $resArr;
    }
    public function saveModule(Request $request)
    {
        $AID = $request->session()->get('Aspirant_ID');
        $module_Id = $request->module_Id;
        $is_saved = $request->is_saved;
        
        if($is_saved)
        {
            $saveModule = new save_module;
            $saveModule->aspirant_id = $AID;
            $saveModule->module_Id = $module_Id;
            $saveModule->save();
            $upd = 1;
        }
        else
        {
            $upd = save_module::where('aspirant_id', $AID)->where('module_Id', $module_Id)->delete();
        }
    
        if($upd)
        {
            $module_Data = module_creation::where('module_Id', $module_Id)->get()->first();
            $module_name = $module_Data->moduleTitle;
            if($is_saved == 1)
            {
                $message = "Module save successfully!";
                $noty_mes = $module_name." Module saved";
            }
            else
            {
                $message = "Module unsave successfully!";
                $noty_mes = $module_name." Module unsaved";
            }
            $this->notification->savenotification("aspirant",$request->session()->get('Aspirant_ID'), $noty_mes);
            $resArr = array("status" => 1, "msg" => $message);
        }
        else
        {
            $resArr = array("status" => 0, "msg" => "Failed!");
        }
        return $resArr;
    }
    public function update_profile(Request $request, $id = null)
    {

        $userInfo = $this->register->getUserInfo();
        $data = $userInfo->data->data;

        $search_request = ["criteria" => ["Aspirant" => $request->session()->get('register_id')]];
        $response = $this->register->getTransactionList('svc_type_23', 1, 100, $search_request);
        if ($response->status == true) {
            $work_experience = $response->data->data->content ?? [];
        }

        $search_request = ["criteria" => ["Aspirant" => $request->session()->get('register_id')]];
        $response = $this->register->getTransactionList('svc_type_24', 1, 100, $search_request);
        if ($response->status == true) {
            $certifications = $response->data->data->content ?? [];
        }

        $search_request = ["criteria" => ["Aspirant" => $request->session()->get('register_id')]];
        $response = $this->register->getTransactionList('svc_type_25', 1, 100, $search_request);
        if ($response->status == true) {
            $projects = $response->data->data->content ?? [];
        }

        $search_request = ["criteria" => ["Aspirant" => $request->session()->get('register_id')]];
        $response = $this->register->getTransactionList('svc_type_26', 1, 100, $search_request);
        if ($response->status == true) {
            $education = $response->data->data->content ?? [];
        }


        if ($request->isMethod('post')) {

            $request->validate([
                'profile_summary' => ['required', 'string'],
            ]);


            $job_details = [
                // "Designation" => $request->designation,
                "Profile_Summary" => $request->profile_summary,
                "Date_of_Birth" => $request->date_of_birth,
                "Gender" => $request->gender
                /*"LinkedIn_URL" => $request->linkedin,
                "Trainer_Type" => $request->trainer_type,
                "Total_relevant_training_delivery_experience_in_year" => $request->delivery_experience,
                "Total_years_of_work_experience" => $request->work_experience,
                "Current_equipment_used_for_online_training" => $request->equipment,
                "Gamification_tools_used" => $request->gamification,,*/
            ];

            //print_r($job_details);exit;

            if (!empty($request->resume)) {
                $fileName = time() . '.' . $request->resume->extension();
                $request->resume->move(public_path('uploads/resume'), $fileName);
                //$image->move($path, $image_name);
                $job_details['Upload_Resume'] = $fileName;
            }

            if (!empty($request->profile_image)) {
                $fileName = time() . '.' . $request->profile_image->extension();
                $request->profile_image->move(public_path('uploads/profile'), $fileName);
                //$image->move($path, $image_name);
                $job_details['Upload_Resume'] = $fileName;
            }

            //Update Modules
            $job_title = $request->job_title;
            $employment_type = $request->employment_type;
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $currently_working = $request->currently_working;
            $description = $request->description;
            $experience_id = $request->experience_id;
            foreach ($job_title as $key => $val) {

                if (!empty($val)) {
                    $experience_array = [
                        "Aspirant" => $request->session()->get('register_id'),
                        "Most_Recent_Job_Title" => $val,
                        "Employment_Type" => $employment_type[$key],
                        "Start_Date" => $start_date[$key],
                        "End_Date" => $end_date[$key],
                        //"Currently_Working" => $currently_working[$key],
                        "Description" => $description[$key],
                    ];

                    if (!empty($experience_id[$key])) {
                        $response = $this->hooper->updateTransaction('svc_type_23', $experience_id[$key], $experience_array);
                    } else {
                        $response = $this->hooper->createTransaction('svc_type_23', $experience_array, null, null);
                    }
                }
            }

            $certificate_name = $request->certificate_name;
            $certificate_expiry = $request->certificate_expiry;
            $certificate_id = $request->certificate_id;
            foreach ($certificate_name as $key => $val) {

                if (!empty($val)) {
                    $certificate_array = [
                        "Aspirant" => $request->session()->get('register_id'),
                        "Certificate_Name" => $val,
                        "Expiry_Date" => $certificate_expiry[$key],
                    ];
                    //print_r($certificate_array);exit;

                    if (!empty($certificate_id[$key])) {
                        $response = $this->hooper->updateTransaction('svc_type_24', $certificate_id[$key], $certificate_array);
                    } else {
                        $response = $this->hooper->createTransaction('svc_type_24', $certificate_array, null, null); //print_r($response);exit;
                    }
                }
            }

            $project_name = $request->project_name;
            $project_start_date = $request->project_start_date;
            $project_end_date = $request->project_end_date;
            $project_description = $request->project_description;
            $project_id = $request->project_id;
            foreach ($project_name as $key => $val) {

                if (!empty($val)) {
                    $project_array = [
                        "Aspirant" => $request->session()->get('register_id'),
                        "Project_Name" => $val,
                        "Start_Date" => $project_start_date[$key],
                        "End_Date" => $project_end_date[$key],
                        "Project_Description" => $project_description[$key],
                    ];
                    //print_r($certificate_array);exit;

                    if (!empty($project_id[$key])) {
                        $response = $this->hooper->updateTransaction('svc_type_25', $project_id[$key], $project_array);
                    } else {
                        $response = $this->hooper->createTransaction('svc_type_25', $project_array, null, null); //print_r($response);exit;
                    }
                }
            }

            $school_name = $request->school_name;
            $degree = $request->degree;
            $education_start_date = $request->education_start_date;
            $education_id = $request->education_id;
            foreach ($school_name as $key => $val) {

                if (!empty($val)) {
                    $education_array = [
                        "Aspirant" => $request->session()->get('register_id'),
                        "School_Name" => $val,
                        "Degree" => $degree[$key],
                        "Start_Date" => $education_start_date[$key]
                    ];
                    //print_r($certificate_array);exit;

                    if (!empty($education_id[$key])) {
                        $response = $this->hooper->updateTransaction('svc_type_26', $education_id[$key], $education_array);
                    } else {
                        $response = $this->hooper->createTransaction('svc_type_26', $education_array, null, null); //print_r($response);exit;
                    }
                }
            }



            $response = $this->hooper->updateTransaction('usr_type_4', $request->session()->get('register_id'), $job_details);
            $success_msg = 'Profile updated successfully';

            if ($response->status == true) {

                if ($response->data->statusCode != 0) { //check if any error

                    $request->session()->flash('failed', $response->data->statusMessage);
                    return redirect()->back()->withInput();
                }
                $request->session()->flash('success', $success_msg);
                sleep(1);
                return redirect()->back();
            } else {
                $request->session()->flash('failed', $response->data->message);
                return redirect()->back()->withInput();
            }
        }


        return view('aspirant.profile.profiledetails', compact('data', 'work_experience', 'certifications', 'projects', 'education'));
    }

    public function message()
    {

        return view('talent.aspirant.message');
    }

    public function notify()
    {

        return view('talent.aspirant.notify');
    }

    public function settings()
    {

        return view('talent.aspirant.settings');
    }

    public function mytraining()
    {

        return view('talent.aspirant.mytraining');
    }

    public function moduleinfo()
    {

        return view('talent.aspirant.moduleinfo');
    }

    public function mybank_earned()
    {

        return view('talent.aspirant.mybank.earned');
    }

    public function mybank_upgrade()
    {

        return view('talent.aspirant.mybank.upgrade');
    }
    public function changeAspirantPassword(Request $request)
    {
        $SID = $request->session()->get('Aspirant_ID');
        
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
        
        $aspirant_Data = aspirant::where('Aspirant_ID', $SID)->where('password', $old_pwd)->get()->first();
        
        if(empty($aspirant_Data))
        {
            return array(
                "status" => 0,
                "msg"   => "Old password does not match."
            );
        }

        $upd = aspirant::where('Aspirant_ID', $SID)->update(['password'=>$password,'cpassword'=>$password]);

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
    public function getChatWithTrainer(Request $request)
    {
        $AID = $request->session()->get('Aspirant_ID');
        $data_id = $request->data_id;
        
        $trainer = trainer::where('trainer_id', $data_id)->get()->first();
        $trainer = @$trainer ? $trainer->toArray() : array();

        $Conversationasptran = Conversationasptran::where('aspirant_id',$AID)->where('trainer_id', $data_id)->get();
        $Conversationasptran = @$Conversationasptran ? $Conversationasptran->toArray() : array();


        $html = '';
        if(@$Conversationasptran)
        {
            foreach ($Conversationasptran as $key => $value) {

                $created_dateFormat = date("h:i A", strtotime($value['created_date']));
                $chatsMsg = $value['chats'];

                if($value['mesgfrom'] == 'aspirant')
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
        $trainer['name'] = $trainer['first_name'].' '.$trainer['second_name'];
        $trainer['profile'] = setProfilePic($trainer['profile_pic']);
        return array(
            "status" => 1,
            "html" => $html,
            "trainer" => $trainer
        );
    }
    public function amessagecon(Request $request)
    {
        $Conversationasptran = new Conversationasptran;
        $Conversationasptran->trainer_id = $request->trainer_id;
        $Conversationasptran->module_id = 0;
        $Conversationasptran->aspirant_id = session()->get('Aspirant_ID');
        $Conversationasptran->chats = $request->message;
        $Conversationasptran->mesgfrom = "aspirant";
        $Conversationasptran->created_date = date("Y-m-d H:i:s");

        $saved = $Conversationasptran->save();
        if($saved)
        {
            $array = array(
                "status" => 1,
                "trainer_id" => $request->trainer_id,
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

    public function aspitantprofileDetailsUpdateBysetting(Request $request)
    {
        $return_status = 0;
        $return_mes = "Failed..!!";
        // $AID = $request->aspirant_id;
        $AID = $request->session()->get('Aspirant_ID');
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
        $updateProfile = aspirant::where('aspirant_id',$AID)->update([$updateColumn=> $updateValue]);
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
    public function trainingRemoveFromCart(Request $request)
    {
        $return_status = 0;
        $return_mes = "Failed..!!";
        // $AID = $request->aspirant_id;
        $AID = $request->session()->get('Aspirant_ID');
        $recorId = $request->recorId;

        if($recorId && $AID)
        {
            $delete = cart::where('cart_id', $recorId)->delete();
            if($delete)
            {
                $return_status = 1;
                $return_mes = "Success..!!";
            }
        }
        
        return array(
            "status" => $return_status,
            "msg" => $return_mes,
        );
    }
    public function generateCertificateAspirant(Request $request)
    {
        $AID = $request->session()->get('Aspirant_ID');
        $trainer_id = $request->trainer_id;
        $data_module_id = $request->data_module_id;

        $moduleinfo = module_creation::where('module_Id', $data_module_id)->get()->first();
        $moduleinfo = @$moduleinfo ? $moduleinfo->toArray() : array();
        
        $aspirant = aspirant::where('aspirant_id', $AID)->get()->first();
        $aspirant = @$aspirant ? $aspirant->toArray() : array();

        $trainer = trainer::where('trainer_id', $trainer_id)->get()->first();
        $trainer = @$trainer ? $trainer->toArray() : array();

        $update_download_certificate = DB::table('aspirant_payment')
        ->where('aspirant_id', $AID)
        ->where('module_Id', $data_module_id)
        ->whereNull('download_cerificate_date')
        ->update(['download_cerificate_date' => date("Y-m-d H:i:s")]);

        return array(
            "status" => 1,
            "msg" => "success",
            "id" => urlencode(base64_encode(@$trainer['first_name']."~@~".@$aspirant['first_name']."~@~".@$moduleinfo['moduleTitle'])),
            "userName" => @$trainer['first_name'], //asp
            "employerName" => @$aspirant['first_name'], //triner name
            "moduleName" => @$moduleinfo['moduleTitle'], //module name
        );
    }
}
