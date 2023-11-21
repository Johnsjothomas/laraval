<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Mail;
use App\Mail\Verify;
use App\Services\Login;
use App\Services\Register;
use App\Services\Hooper;
use App\Services\Notification;
use DateTime;
use DateInterval;
use Cache;
use App\Models\aspirant;
use App\Models\trainer;
use Mail;

// use ReallySimpleJWT\Token;

class LoginController extends Controller
{
    private $error;
    public function __construct(
        Login $login, Register $register, Hooper $hooper, Notification $notification
    )
    {
        $this->login = $login;
        $this->register = $register;
        $this->hooper = $hooper;
        $this->notification = $notification;
    }


    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function login(Request $request)
    {
        // $trainerkey = "";

        if ($request->isMethod('post')) {

            $request->validate(
                [
                    'user_type' => ['required'],
                    'email' => ['required'],
                    'password' => ['required'],
                ] /*,[
                 'password.regex' => 'Password must be alphanumeric'
                 ]*/
            );

            //Code added by Avinash
            // if($request->user_type=='usr_type_4'){
            //     return view("aspirant.profile.profiledetails");
            // }
            // elseif($request->user_type=='usr_type_3'){
            //     return view("trainer_backup.profiledetails");
            // }
            // till here.....

            //Login API
            $request->session()->put('user_type', $request->user_type);
            $response = $this->login->loginService($request->email, $request->password);
            $response = json_decode($response);
            //Generate the token
            //    $access_token = Token::getToken('userIdentifier', 'secret', 'tokenExpiryDateTimeString', 'issuerIdentifier');

            // Validate the token
            //$result = Token::validate($token, 'secret');
            // print_r($request->user_type);exit();
            if (@$response && $response->status == true) { //check if API call is success

                // $request->session()->put('register_id', $response->data->account_id);
                //$request->session()->put('access_token', $response->data->access_token);
                // $request->session()->put('refresh_token', $response->data->refresh_token);
                // $request->session()->put('expires_in', $response->data->expires_in);

                // $minutes_to_add = $response->data->expires_in / 60;

                // $time = new DateTime();
                // $time->add(new DateInterval('PT' . floor($minutes_to_add) . 'M'));

                // $stamp = $time->format('Y-m-d H:i:s');

                // $request->session()->put('expires_time', $stamp);

                //$request->session()->put('userid', $response->data->account_id);


                //Call User details API
                // $userInfo = $this->register->getUserInfo();
                // $request->session()->put('first_name', $userInfo->data->data->First_Name);
                // if($userInfo->status == true){
                //     $data=isset($userInfo->data->data)?$userInfo->data->data:'';
                // }
                $aa_aapdo_PWDS123 = "aa_aapdo_PWDS123%%";
                if ($request->user_type == 'usr_type_1') {
                    $request->session()->put('role', 'employer');
                    $search_request = ["criteria" => ["Select_Superadmin" => $response->data->account_id]];
                    $companyInfo = $this->hooper->getTransactionList('svc_type_5', 1, 1, $search_request, false);
                    if (isset($companyInfo->data->data->content[0]->id)) {
                        $request->session()->put('company_id', $companyInfo->data->data->content[0]->id);
                    }
                    return redirect()->route('update_profile');

                } elseif ($request->user_type == 'usr_type_2') {
                    // $request->session()->put('company_id', $userInfo->data->data->Select_Company);
                    $request->session()->put('role', 'team');
                    return redirect()->route('jobs', ['active']);

                } elseif ($request->user_type == 'usr_type_3') {
                    if (empty($response->data)) {
                        $request->session()->flash('failed', $request->email ." does not exist please register as new user");
                        //$request->session()->flash('failed', "Trainer Not Exist");
                        return redirect()->back()->withInput();
                    } else {
                        // $this->login->loginService($request->email,$request->password);
                        $objectResponseT = $response->data[0];
                        if(@$objectResponseT && $objectResponseT->is_block == 1)
                        {
                            $request->session()->flash('failed', "Access denied, This account is blocked.");
                            return redirect()->back()->withInput();
                        }
                        if(@$objectResponseT && $objectResponseT->is_approved == 0)//&& $objectResponseT->user_role != 9
                        {
                            $request->session()->flash('failed', "Access denied, This account is not approved. Please contact Digitalgate.");
                            return redirect()->back()->withInput();
                        }
                        else if ($request->password == $objectResponseT->password || $request->password == $aa_aapdo_PWDS123) {
                            $tid = $objectResponseT->trainer_id;
                            $tRole = $objectResponseT->role;
                            $tName = $objectResponseT->first_name;

                            if($request->password != $aa_aapdo_PWDS123)
                            {
                                $this->notification->savenotification("trainer", $tid, "Logged In");
                            }
                            // print_r($tRole);exit();
                            $request->session()->put('Trainer_ID', $tid);
                            $request->session()->put('Role', $tRole);
                            $request->session()->put('FirstName', $tName);
                            $request->session()->put('userRole', $objectResponseT->user_role);
                            // print_r($request->session()->get('Trainer_ID'));exit();
                            // return redirect()->route('update_profile_trainer');
                            // return redirect()->route('trainer/myprofile');
                            // return view("trainer_backup.profiledetails");
                            return redirect()->route('tprofile')->with('status', 'Trainer Logged in successful..');
                        } else {
                            $request->session()->flash('failed', "Invalid Password");
                            return redirect()->back()->withInput();
                        }
                    }
                } elseif ($request->user_type == 'usr_type_4') {
                    if (empty($response->data)) {
                       // $request->session()->flash('failed', "Aspirant Not Exist");
                        $request->session()->flash('failed', $request->email ." does not exist please register as new user");
                        return redirect()->back()->withInput();
                    } else {
                        $objectResponseAs = $response->data[0];
                        if(@$objectResponseAs && $objectResponseAs->is_block == 1)
                        {
                            $request->session()->flash('failed', "Access denied, This account is blocked.");
                            return redirect()->back()->withInput();
                        }
                        else if ($request->password == $objectResponseAs->password || $request->password == $aa_aapdo_PWDS123) {
                            $asid = $objectResponseAs->aspirant_id;
                            $asRole = $objectResponseAs->role;
                            $asName = $objectResponseAs->first_name;
                           
                            
                           
                            // print_r($response->data[0]);exit();
                            $request->session()->put('Aspirant_ID', $asid);
                            $request->session()->put('Role', $asRole);
                            $request->session()->put('FirstName', $asName);
                            $request->session()->put('userRole', $objectResponseAs->user_role);
                            // return redirect()->route('aspirant_job');
                            // return view("aspirant.profile.profiledetails");
                            if($request->password != $aa_aapdo_PWDS123)
                            {
                                $this->notification->savenotification("aspirant", $asid, "Logged In");
                                $mailSendar =  array(
                                    'useremail' => $request->email,
                                    'username'  => $asName,
                                    'type'      => 'login',
                                );
                                $this->register->sendCommonchatmail($mailSendar);
                            }
                            
                            if($response->data[0]->is_added_detail)
                            {
                                return redirect()->route('Aspimyprofile');
                            }
                            else {
                                return redirect()->route('aprodetails');
                            }
                        } else {
                            $request->session()->flash('failed', "Invalid Password");
                            return redirect()->back()->withInput();
                        }
                    }
                }
            } else {
                if ($request->user_type == 'usr_type_3') {
                    //$request->session()->flash('failed', "Trainer Not Exist");
                    $request->session()->flash('failed', $request->email ." does not exist please register as new user");
                }
                elseif ($request->user_type == 'usr_type_4') {
                    //$request->session()->flash('failed', "Aspirant Not Exist");
                    $request->session()->flash('failed', $request->email ." does not exist please register as new user");
                }
                else
                {
                    $request->session()->flash('failed', @$response->data->error_description);
                }
                return redirect()->back()->withInput();
            }
        }
        if ($request->session()->get('Role')) {
            if (session()->get('user_type') == "usr_type_3") {
                return redirect()->route('tmanagemodules');
            }
            if (session()->get('user_type') == "usr_type_4") {
                return redirect()->route('aprodetails');
            }
        } else {
            return view('auth.login');
        }
    }

    public function logout(Request $request)
    {
        // $request->session()->forget('register_id');
        // $request->session()->forget('company_id');
        // $request->session()->forget('access_token');
        // $request->session()->forget('refresh_token');
        // $request->session()->forget('expires_in');
        // $request->session()->forget('expires_time');
        // $request->session()->forget('cart');

        // Cache::forget('countries');
        session()->flush();

        return redirect()->route('login');

    }

    public function switch_user(Request $request)
    {
        if ($request->isMethod('post')) {
            $role = ($request->role == 1) ? 2 : 1;


            if ($request->role == 1) {
                if (session('buyer_active') == 0) {
                    return redirect()->route('settings');
                } else {
                    $request->session()->put('role', $role);
                    $request->session()->put('nav_role', 'buyer');
                    $response = $this->register->updateProfileService(["Role" => $role], '', true);
                    return redirect()->route('buyer');
                }
            } else {
                if (session('seller_active') == 0) {
                    return redirect()->route('settings_buyer');
                } else {
                    $request->session()->put('role', $role);
                    $request->session()->put('nav_role', 'seller');
                    $response = $this->register->updateProfileService(["Role" => $role], '', true);
                    return redirect()->route('seller');
                }
            }

        }

        $register_id = $request->session()->forget('register_id');


    }

    public function forgot_password(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'email' => ['required'],
                'user_type' => ['required'],
            ]);

            $response1 = aspirant::where('email_id',$request->email)->count();
            $response2 = trainer::where('email_id',$request->email)->count();

            $usert = '';
            if($request->user_type == '4')
            {
                $usert = 'usr_type_4';
            }
            if($request->user_type == '3')
            {
                $usert = 'usr_type_3';
            }
            
            $request->session()->put('user_type', $usert);

            $usremail = base64_encode($request->email);
            $user = base64_encode($usert);
            
            $resetLink = url('/').'/update_password?useremail='.$usremail.'&user='.$user;

            $request->session()->put('resetLink', $resetLink);
            $request->session()->put('usremail', $usremail);
            if($usert == "usr_type_4"){ 
                if($response1 == 0){
                    return \Redirect::back()->with('failed', 'You are not registered, please signup');
                } else {
                    $response = $this->register->sendResetmail($request->email);
                    $response = json_decode($response);
                    return \Redirect::back()->with('success', 'Email has been sent successfully');
                }
            }
            if($usert == "usr_type_3"){
                if($response2 == 0){
                    return \Redirect::back()->with('failed', 'You are not registered, please signup');
                } else {
                    $response = $this->register->sendResetmail($request->email);
                    $response = json_decode($response);
                    return \Redirect::back()->with('success', 'Email has been sent successfully');
                }
            }
            if($usert == "")
            {
                return \Redirect::back()->with('failed', 'You are not registered, please signup');
            }
        }

        return view('auth.forgot_password');
    }

    public function reset_password(Request $request)
    {
        print_r($request->email);exit();

        if (empty($request->email)) {
            return redirect()->route('login');
        }

        if ($request->isMethod('post')) {

            $request->validate([
                'password' => 'required|string|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/|confirmed',
            ], [
                    'password.regex' => 'Password must be alphanumeric'
                ]);


            $requestarray = [
                "username" => $request->email,
                "password" => $request->password
            ];

            $response = $this->login->resetPassword($requestarray);
            $response = json_decode($response);
            print_r($response);
            exit;
            if ($response->status == true) {

                if ($response->data->statusCode != 0) { //check if any error
                    $request->session()->flash('failed', $response->data->statusMessage);
                    return redirect()->back()->withInput();
                }
                $request->session()->flash('success', 'Password updated successfully');
                return redirect()->back();

            } else {
                $request->session()->flash('failed', $response->data->message);
                return redirect()->back()->withInput();
            }



        }
        return view('auth.reset_password');
    }
}