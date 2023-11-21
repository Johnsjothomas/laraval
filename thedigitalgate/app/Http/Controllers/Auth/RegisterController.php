<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Mail;
use App\Mail\Verify;
use App\Services\Register;
use App\Services\Login;
use App\Services\Hooper;
use App\Country;
use DateTime;
use DateInterval;
use Storage;
use Cache;
use Log;
use Session;
use Mail;


class RegisterController extends Controller
{   
    private $error;
    public function __construct(
        Register $register,Login $login,Hooper $hooper
    ) {
        $this->register = $register;
        $this->login = $login;
        $this->hooper = $hooper;
    }


    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function register(Request $request)
    {  
        // print_r($request->user_type); 
        $errors = Session::get('errors');
        if(!isset($request->user_type) ){

            if(empty($errors) && empty(Session::get('register_failed'))){
                return redirect()->route('signup');
            }
        }
        $user_type = $request->user_type;
        $request->session()->put('user_type',$user_type);
        $countries = Cache::get('countries');
/*        $new = array_filter($countries, function ($var) {
                    return ($var->fields->Phone_Code == '93');
                });
        print_r(array_shift($new));exit;*/
     /*   $countries = Country::getCountry();
        $countries = collect($countries)->sortBy('code')->toArray();
        $codes =  array_column($countries, 'code');*/
        
        
        //$countries= isset($response->data->data->content)? $response->data->data->content : [];

      

        return view('auth.register',compact('countries','user_type')); 
    }

    public function register_save(Request $request)
    {   
         //Code added by Avinash
        //  if($request->user_type=='usr_type_4'){
        //     return view("aspirant.awesome");
        // }
        //Code till here

        

        if(!Session::has('user_type')){
            return redirect()->route('signup');
        }
        if($request->isMethod('post')){

            
            $request->validate([
                'first_name' => ['required', 'string', 'max:30','regex:/(^([a-zA-Z]+)(\d+)?$)/u'],
                'second_name'  => ['required', 'string', 'max:30','regex:/(^([a-zA-Z ]+)(\d+)?$)/u'],
                //'company_name'  => ['required', 'string', 'max:30','regex:/(^([a-zA-Z0-9 ]+)(\d+)?$)/u'],
                //'designation'  => ['required', 'string', 'max:30'],
                'email' => ['required', 'string', 'email', 'max:50'],
                //'mobile_code' => ['required', 'integer'],
                'mobile' => ['required', 'numeric', 'regex:/(^([0-9]+)(\d+)?$)/u'],
            ]);
            
            $register_details = [
                "First_Name" => $request->first_name,
                "Last_Name" => $request->second_name,
                "Email" => $request->email,
                //"Email_ID" => $request->email,
                //"Designation" => $request->designation,
                //"Company_Name" => $request->company_name,
                'Mobile_Number' => [
                    "code" => $request->mobile_code,
                    "value"=> $request->mobile,
                ],
                "Status" => "Inactive"
                //"Seller_Active" => ($request->role==1)? 1 : 0,
                //"Buyer_Active" => ($request->role==2)? 1 : 0, 
                //"Role" => $request->role 
            ];
            // pre($register_details); die;
            
            $request->session()->put('first_name', $request->first_name);
            $request->session()->put('register_email', $request->email);
            $request->session()->put('role', $request->role);
            
            $response = $this->register->checkUserExists($request->email);
            $response=json_decode($response);

            // print_r(session()->get('user_type'));
            // print_r($register_details);
            if(@$response && !empty($response->data)){
                $request->session()->flash('register_failed', 'Email ID is already taken');
                return redirect()->back()->withInput();
            } else {
                $response = $this->register->createUserService($register_details);
                $response=json_decode($response);
                if($response->status == true){
                    if($response->data == true){

                        // print_r($response->registeremail);exit();


                        $request->session()->flash('register_success', 'We have sent a verification link with OTP to your email-id');
                        return redirect()->route('register_success');
                    } else {
                        $request->session()->flash('register_failed', "Registration Failed");
                        return redirect()->back()->withInput();
                    }
                } else {
                    $request->session()->flash('register_failed', "Registration Failed");
                    return redirect()->back()->withInput();
                }
            }
        }

    }


    public function register_success(Request $request)
    {
        // $role = $request->session()->get('role');
        // return view('auth.register_success',compact('role'));
        // print_r($request->session()->get('register_email'));
        // print_r($request->session()->get('user_type'));

        $otp = rand(1000,9999);
        $request->session()->put('otp', $otp);
        // print_r($otp);exit();
        $response = $this->register->sendotpmail($request->session()->get('register_email'));
        $response = json_decode($response);
        // print_r($response);exit();

        return view('auth.awesome');
    }
    
    public function verify_email(Request $request)
    {
        /*
            OTP and Email code here
        */
        
        if($request->session()->get('register_email') == ''){
            return redirect()->route('register');
        }
        if($request->isMethod('post')){
            if($request->submit=='verify'){

                $request->validate([
                    'verify_otp' => ['required', 'string', 'max:6']
                ]);

                $verify_otp = $request->verify_otp;
                $register_email = $request->session()->get('register_email');

                // if($verify_otp == '1111'){
                if($verify_otp == session()->get('otp')){
                    // $request->session()->put('register_email', '');
                    // return redirect()->route('register_success');
                    return redirect()->route('new_password');
                }else{
                        $request->session()->flash('failed', "Invalid OTP. Please check your code and try again.");
                        return redirect()->back()->withInput();
                    // return \Redirect::back()->with('failed','Invalid OTP. Please check your code and try again.');
                }

            }elseif(($request->submit=='resend')){
                
                //update OTP
                    $request->session()->flash('success', "A new code has been sent to your mail.");
                    return redirect()->back()->withInput();
                // return \Redirect::back()->with('success','A new code has been sent to your mail.');
            }
        }
        return view('auth.verify_email');
    }


    public function new_password(Request $request)
    {
        if($request->isMethod('post')){
            
            $request->validate([
                'password'   => 'required|string|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/|confirmed',
            ],[
                'password.regex' => 'Password must be alphanumeric'
            ]);
            
            $register_email = $request->session()->get('register_email');

            $response = $this->register->registerService($register_email,$request->password);
            $response = json_decode($response);
            if(@$response && $response->status == true){
                $response = $this->register->updateProfileService(["status"=>"Active"],$register_email,false);

                $response=json_decode($response);
                
                if(@$response && $response->status == true){
                    return redirect()->route('login');
                }
            }
            $request->session()->flash('failed', "Something went wrong...!");
            return redirect()->back()->withInput();
        }
        return view('auth.new_password');
    }
    public function update_password(Request $request)
    {
        if($request->isMethod('post')){
            $request->validate([
                'password'   => 'required|string|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/|confirmed',
            ],[
                'password.regex' => 'Password must be alphanumeric'
            ]);
            
            // $userId = $request->user;   
            // $response = $this->register->getUserInfo($userId);
            // if($response->status == true){
            //     $data=isset($response->data->data)?$response->data->data:[];
            //     if(empty($data)){
            //         return redirect()->route('register');
            //     }
            // }
            
            
            $register_email = $request->user;//$data->Email;
            
            
            
            $response = $this->register->registerService($register_email,$request->password);
            $response=json_decode($response);
            // print_r($response);exit;
            if(@$response && $response->status == true){//check if API call is success
                
                // if($response->data->statusCode != 0){//check if any error
                //     return \Redirect::back()->with('failed', $response->data->statusMessage);
                // }
                if($response->data == 0){//check if any error
                    $request->session()->flash('failed', "Password Already Updated or Inavlid account.");
                    return redirect()->back()->withInput();
                }
                /*$response = $this->register->checkUserExists($register_email);
                $response=json_decode($response);*/
                
                if($response->data == 1){
                    $userId = $register_email;//$response->data->data->userId;
                    $response = $this->register->updateProfileService(["status"=>"Active"],$userId,false);
                    $response=json_decode($response);
                    if(@$response && $response->status == true){
                        $response = $this->login->loginService($register_email,$request->password);
                        $response=json_decode($response);
                        
                        
                        if(@$response && $response->status == true){//check if API call is success
                            
                            // $request->session()->put('register_id', $response->data->account_id);
                            // $request->session()->put('access_token', $response->data->access_token);
                            // $request->session()->put('refresh_token', $response->data->refresh_token);
                            // $request->session()->put('expires_in', $response->data->expires_in);
                            
                            // $minutes_to_add = $response->data->expires_in / 60;
                            
                            // $time = new DateTime();
                            // $time->add(new DateInterval('PT' . floor($minutes_to_add) . 'M'));
                            
                            // $stamp = $time->format('Y-m-d H:i:s');
                            
                            // $request->session()->put('expires_time', $stamp);
                            
                            // //Call User details API
                            // $userInfo = $this->register->getUserInfo();
                            // if($userInfo->status == true){
                                //     $data=isset($userInfo->data->data)?$userInfo->data->data:'';
                                // }   
                            // print_r($request->all());
                            // print_r($response);
                            // print_r($request->password);
                            // print_r($register_email);
                            // exit();
                            
                            if($request->user_type=='usr_type_1'){
                                $request->session()->put('role', 'employer');
                                $search_request = ["criteria"=>["Select_Superadmin" => $response->data->account_id]];
                                $companyInfo = $this->hooper->getTransactionList('svc_type_5',1,1,$search_request,false);
                                if(isset($companyInfo->data->data->content[0]->id)){
                                    $request->session()->put('company_id', $companyInfo->data->data->content[0]->id);
                                }
                                return redirect()->route('update_profile');
                                
                            }elseif($request->user_type=='usr_type_2'){
                                $request->session()->put('company_id', $userInfo->data->data->Select_Company);
                                $request->session()->put('role', 'team');
                                return redirect()->route('jobs',['active']);
                            }elseif($request->user_type=='usr_type_3'){
                                if(empty($response->data)){
                                    $request->session()->flash('failed', "Invalid Login Credentials");
                                    return redirect()->back()->withInput();
                                } else {
                                    $objectResponseT = $response->data[0];
                                    if($request->password == $objectResponseT->password){
                                        $tid = $objectResponseT->trainer_id;
                                        $tRole = $objectResponseT->role;
                                        $tName = $objectResponseT->first_name;
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
                            }elseif($request->user_type=='usr_type_4'){
                                if(empty($response->data)){
                                    $request->session()->flash('failed', "Invalid Login Credentials");
                                    return redirect()->back()->withInput();
                                } else {
                                    $objectResponseAs = $response->data[0];
                                    if($request->password == $objectResponseAs->password){
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
                                        return redirect()->route('Aspimyprofile');
                                    } else {
                                        $request->session()->flash('failed', "Invalid Password");
                                        return redirect()->back()->withInput();
                                    }
                                }
                                // $request->session()->put('role', 'aspirant');
                                // return redirect()->route('aspirant_job');
                            }
                            
                            
                            
                            
                            
                            
                            
                        }else{
                            
                            return \Redirect::back()->with('failed', 'Something gone wrong.Try again');
                        } 
                    }
                }
                
            }else{
                
                return \Redirect::back()->with('failed', 'Something gone wrong.Try again');
                //$request->session()->flash('failed', $response->data->message);   
            }
            
            
        }
        else
        {
            $timelimit = isset($_GET['tl']) ? $_GET['tl'] : '';
            if($timelimit != "")
            {
                $timelimit = base64_decode($timelimit);
                $current_time = strtotime(now());
                $mins = ($current_time - $timelimit) / 60;
                if(round($mins) >= 30)
                {
                    $request->session()->flash('failed', 'Link was expired.Try again');
                    return redirect()->route('forgot_password');
                }
            }
            else
            {
                //$request->session()->flash('failed', 'Link was expired.Try again');
                return redirect()->route('forgot_password');
            }
            // $userid = (isset($_GET['id'])) ? $_GET['id'] : null ;

            //  $request->session()->put('user_type',strtolower($_GET['user_type']));
            
            /*if($request->session()->get('register_email') == '' || $email == null || ($request->session()->get('register_email') != $email)){
                return redirect()->route('register');
            }*/
            
            // if($userid == null){
                //    return redirect()->route('register'); 
                // }
                
                
        }
            
        return view('auth.update_password');
        }
        

    public function register_profile(Request $request)
    {   
        $countries = Cache::get('countries');

        if($request->isMethod('post')){
            if($request->submit=='update_profile'){
            $request->validate([
            'city' => ['required', 'string', 'max:30'],
            'country'  => ['required', 'string', 'max:30'],
            'office_code'  => ['required', 'integer'],
            'office_phone'  => ['required', 'integer'],
            'company_website'  => ['required', 'string', 'max:30'],
            'delivery_address' => ['required', 'string'],
            'company_registration_no' => ['required', 'string'],
            'company_logo' => ['nullable']
            ]/*,[
                'password.regex' => 'Password must be alphanumeric'
            ]*/);

           $profile_details = [
                "City" => $request->city,
                "Country" => $request->country,
                "Office_Phone_Number" => ["code"=>$request->office_code,"value"=>$request->office_phone],
                "Company_Website" => $request->company_website,
                "Delivery_Address" => $request->delivery_address,
                "Company_Registration_ID" => $request->company_registration_no,
           ];

           if(!empty($request->company_logo_blob)){
            $url = $request->company_logo_blob;
            $contents = file_get_contents($url);
            $name = 'User_'.time().'.png';
            $path = 'public/images/'.$name;
            Storage::put($path, $contents);

               $profile_details["Profile_Image"] = $name; 
               $request->session()->put('profile_image', $name);
           }

           /*if ($request->hasFile('company_logo')) {

              $destinationPath = public_path().'/uploads';
              $i=1;
              
                $extension       = $request->company_logo->extension(); 
                $fileName        = uniqid(time()).'.'.$extension;
                $request->company_logo->move($destinationPath, $fileName);
                $product_details["Profile_Image"] =  url('uploads').'/'.$fileName;
                $i++;
              
              
          }*/

       
           //Account Registration API
           $response = $this->register->updateProfileService($profile_details);
           $response=json_decode($response);

           if($response->status == true){

                if($response->data->statusCode != 0){//check if any error
                    $request->session()->flash('failed', $response->data->statusMessage);
                    return redirect()->back()->withInput();
                }
                $register_email = $request->session()->get('register_email');
                return redirect()->route('register_success');

           }else{
             $request->session()->flash('failed', $response->data->message);
             return redirect()->back()->withInput();
           }

          
            }
        }

        return view('employer.superadmin.profile_details',compact('countries'));
    }

    


    
}