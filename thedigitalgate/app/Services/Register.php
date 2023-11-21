<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Session;
use App\Services\ApiService;
use App\Services\GuestApiService;
use Log;
use App\Models\aspirant;
use App\Models\trainer;
use Mail;

class Register 
{	
	/*public function __construct(){
        
    }*/

    public function __construct(
        ApiService $apiservice,GuestApiService $guestapiservice
    ) {
        $this->apiservice = $apiservice;
         $this->guestapiservice = $guestapiservice;
         $this->url=config('auth.url');
         $this->user_type=Session::get('user_type');
    }


    private $error;
	public function getToken($userType=null)
	{	
			$user_type = ($userType==null) ? Session::get('user_type') : $userType;
			$clientId=config('auth.'.$user_type.'.clientId');
        	$secret=config('auth.'.$user_type.'.secret');
		

		$headers = [
        	"Authorization" => "Basic " . base64_encode($clientId . ":" . $secret),
        ];

		$response = Http::withHeaders($headers)
					->post($this->url.'/uaa/oauth/token', [
		    			'grant_type' => 'client_credentials',
					]);
		if($response->successful()){
			$response = json_decode($response->body());
			return $response;
		}else{
			$response->throw();
		}
	}

	public function sendotpmail($useremail)
	{
		// $info = array(
        //     'name' => "Alex"
        // );
        // Mail::send('auth.mail', $info, function ($message)
        // {
        //     $message->to('hitesh.zhambare@tdtl.world', 'Demo')
        //         ->subject('Basic test eMail.');
        //     $message->from('adith.haridas@thedigitalgate.co', 'Adith');
        // });

		// $headers = "MIME-Version: 1.0" . "\r\n"; 
		// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		$name = session()->get('first_name');
		$otp = session()->get('otp');
		// $mesg = view('auth.mail',['name'=> $name,'otp'=>$otp]);
		// mail('hitesh.zhambare@tdtl.world','TEST',$mesg, $headers);
		// mail($useremail,'The DigitalGate',$mesg, $headers);

		$info = array(
			'name' => $name,
			'otp' => $otp
		);
		$mailDataArr = array(
			"email" => $useremail,
			"name" => $name,
		);
		//auth.mail
		Mail::send('auth.mail_new', $info, function ($message) use ($mailDataArr)
		{
			$message->to($mailDataArr['email'], $mailDataArr['name'])
				->subject('The DigitalGate');
		});
		return json_encode(['status'=>true,'response'=>$useremail]);
	}

	public function sendResetmail($useremail)
	{
		// $info = array(
        //     'name' => "Alex"
        // );
        // Mail::send('auth.mail', $info, function ($message)
        // {
        //     $message->to('hitesh.zhambare@tdtl.world', 'Demo')
        //         ->subject('Basic test eMail.');
        //     $message->from('adith.haridas@thedigitalgate.co', 'Adith');
        // });
		$headers = "MIME-Version: 1.0" . "\r\n"; 
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		$name = session()->get('first_name');
		$usremail = session()->get('usremail');
		// $otp = session()->get('otp');
		$resetLink = session()->get('resetLink').'&tl='.base64_encode(strtotime(now()));
		// $mesg = view('auth.mail1',['name'=> $name,'usremail'=>$usremail, 'resetLink'=>$resetLink]);
		$info = array(
			'name'=> $name,
			'usremail' => base64_decode($usremail),
			'resetLink' => $resetLink
		);
		$mailDataArr = array(
			"email" => $useremail,
			"name" => $name,
		);
		//auth.mail
		Mail::send('auth.mail1', $info, function ($message) use ($mailDataArr)
		{
			$message->to($mailDataArr['email'], $mailDataArr['name'])
				->subject('The DigitalGate');
		});

		// mail('hitesh.zhambare@tdtl.world','TEST',$mesg, $headers);
		// mail($useremail,'The DigitalGate',$mesg, $headers);
		return json_encode(['status'=>true,'response'=>$useremail]);
	}
	public function sendCommonchatmail($mailSendar)
	{
		// $info = array(
        //     'name' => "Alex"
        // );
        // Mail::send('auth.mail', $info, function ($message)
        // {
        //     $message->to('hitesh.zhambare@tdtl.world', 'Demo')
        //         ->subject('Basic test eMail.');
        //     $message->from('adith.haridas@thedigitalgate.co', 'Adith');
        // });
		$headers = "MIME-Version: 1.0" . "\r\n"; 
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		//$name = session()->get('first_name');
		$name = $mailSendar['username'];
		$useremail = $mailSendar['useremail'];
		$type = $mailSendar['type'];
		$attchment = @$mailSendar['attchment'] ? $mailSendar['attchment'] : '';

		$common_mes = '';
		$chatLink = url('talent/aspirant/message');
		$show_chart_link = 1;
		if($type == 'get_started' || $type == 'module_create' || $type == 'module_publish')
		{
			$show_chart_link = 0;
		}
		
		if($type == 'login')
		{
			$common_mes = 'Thank you for logging into the Digitalgate';
		}
		else
		{
			$common_mes = $mailSendar['message'];
		}
		
		//$mesg = view('auth.commonmail',['name'=> $name,'usremail'=>$usremail, 'common_mes'=> $common_mes , 'chatLink'=>$chatLink]);

		$info = array(
			'name'=> $name,
			'usremail' => $useremail,
			'common_mes'=> $common_mes,
			'chatLink' => $chatLink,
			'show_chart_link' => $show_chart_link,
		);
		
		$mailDataArr = array(
			"email" => $useremail,
			"name" => $name,
			'attchment' => $attchment,
		);
		// pre($info);
		// pre($mailDataArr);die;
		//auth.mail
		Mail::send('auth.commonmail', $info, function ($message) use ($mailDataArr)
		{
			$message->to($mailDataArr['email'], $mailDataArr['name'])
				->subject('The DigitalGate');
			if(@$mailDataArr['attchment'])
			{
				if(is_array($mailDataArr['attchment']))
				{
					foreach ($mailDataArr['attchment'] as $valueA) {
						$message->attach($valueA);
					}
				}
				else
				{
					$message->attach($mailDataArr['attchment']);
				}
			}
		});

		// mail('hitesh.zhambare@tdtl.world','TEST',$mesg, $headers);
		// mail($useremail,'The DigitalGate',$mesg, $headers);
		return json_encode(['status'=>true,'response'=>$useremail]);
	}

	public function registerService($username,$password,$userType=null)
	{	
		$user_type = ($userType==null) ? Session::get('user_type') : $userType;
		// pre($user_type); die;
		// $token_response = $this->getToken($user_type);
		// $access_token = $token_response->access_token;
		// $token_type = $token_response->token_type;

		// if($user_type == "usr_type_4"){

			$response = aspirant::where('email_id',$username)->update(['password' => $password, 'cpassword' => $password ]);
			
		// }
		// if($user_type == "usr_type_3"){
			if($response != 1)
			{
				$response = trainer::where('email_id',$username)->update(['password' => $password, 'cpassword' => $password ]);
			}
		// }
		if(@$response && $response == 1){
			return json_encode(['status'=>true,"data"=> $response]);
		} else {
			return json_encode(['status'=>false,"data"=> $response]);
		}

		
		
		// $headers = [
        // 	"Authorization" => "Bearer " . $access_token
        // ];

		// $response = Http::withHeaders($headers)
		// 			->post($this->url.'/account/register', [
		//     			'username' => $username,
		//     			'password' => $password,
		// 			]);
		// $response_body = json_decode($response->body());	

		// if($response->successful()){
		// 	return json_encode(['status'=>true,"data"=> $response_body,"token"=>$token_response]);
		// }else{
		// 	return json_encode(['status'=>false,"data"=> $response_body]);
		// }
	}

	public function checkUserExists($email,$userType=null)
	{	
		$user_type = ($userType==null) ? Session::get('user_type') : $userType;
		// $token_response = $this->getToken($user_type);
		// $access_token = $token_response->access_token;
		// $token_type = $token_response->token_type;

		// $headers = [
        // 	"Authorization" => "Bearer " . $access_token
        // ];
        // $url =$this->url.'/uaa/user/id/'.$email;
		// $response = Http::withHeaders($headers)
		// 			->get($url);
					
		// $response_body = json_decode($response->body());
		// if($email == ""){
		// 	return json_encode(['status'=>false,"data"=> "Invalid"]);
		// } else {
			$response = aspirant::where('email_id',$email)->get()->first();
			
			if(empty($response))
			{
				$response = trainer::where('email_id',$email)->get()->first();
			}
			if(@$response)
			{
				return json_encode(['status'=>true,"data"=> $response]);
			}

			// if($user_type == "usr_type_4"){
			// 	$response = aspirant::where('email_id',$email)->get();
			// 	return json_encode(['status'=>true,"data"=> $response]);
			// }
			// if($user_type == "usr_type_3"){
			// 	$response = trainer::where('email_id',$email)->get();
			// 	return json_encode(['status'=>true,"data"=> $response]);
			// }
			return json_encode(['status'=>false,"data"=> ""]);
		// }
		
		// if($response->successful()){
		// 	// return json_encode(['status'=>true,"data"=> $response_body]);
		// }else{
		// 	return json_encode(['status'=>false,"data"=> $response_body]);
		// }
	}

	public function createUserService($userdata,$userType=null)
	{	
		$user_type = ($userType==null) ? Session::get('user_type') : $userType;
		// $token_response = $this->getToken($user_type);
		// $access_token = $token_response->access_token;
		// $token_type = $token_response->token_type;

		// $headers = [
        // 	"Authorization" => "Bearer " . $access_token
        // ];

		// $response = Http::withHeaders($headers)
		// 			->post($this->url.'/crud/'.$user_type.'/create', $userdata);

		// $response_body = json_decode($response->body());
		
		if($user_type == "usr_type_4"){

			$newaspirant = new aspirant;
			$newaspirant->first_name = $userdata['First_Name'];
			$newaspirant->second_name = $userdata['Last_Name'];
			$newaspirant->email_id = $userdata['Email'];
			$newaspirant->mobile = $userdata['Mobile_Number']['value'];
			$newaspirant->country_code = $userdata['Mobile_Number']['code'];
			$newaspirant->status = $userdata['Status'];

			$newaspirant->role = "Aspirant";
			$newaspirant->password = "";
			$newaspirant->cpassword = "";
			$newaspirant->country = "";
			$newaspirant->team_flag = "";
			$newaspirant->address = "";
			$newaspirant->skills = "";
			$newaspirant->about_you = "";
			$newaspirant->recent_company = "";
			$newaspirant->aspirant_type = "";
			$newaspirant->job_title_designation = "";
			$newaspirant->employment_type = "";
			$newaspirant->job_end_date = "";
			$newaspirant->industry = "";
			$newaspirant->certification_name = "";
			$newaspirant->job_description = "";
			$newaspirant->project_name = "";
			$newaspirant->certification_expiry_date = "";
			$newaspirant->project_description = "";
			$newaspirant->project_end_date = "";
			$newaspirant->degree = "";
			$newaspirant->school_college_university = "";
			$newaspirant->resume_path = "";
			$newaspirant->final_year_date = "";
			$newaspirant->gender = "";
			$newaspirant->dob = date("Y-m-d");
			$newaspirant->languages_known = "";
			$newaspirant->work_permit = "";
			$newaspirant->industries = "";
			$newaspirant->preferred_location = "";

			$response = $newaspirant->save();

			return json_encode(['status'=>true,"data"=> $response,"registeremail"=>$userdata['Email']]);
		}
		if($user_type == "usr_type_3"){
			$newtrainer = new trainer;

			$newtrainer->first_name = $userdata['First_Name'];
			$newtrainer->second_name = $userdata['Last_Name'];
			$newtrainer->email_id = $userdata['Email'];
			$newtrainer->mobile = $userdata['Mobile_Number']['value'];
			$newtrainer->status = $userdata['Status'];
			$newtrainer->country_code = $userdata['Mobile_Number']['code'];

			$newtrainer->salutation = "";
			$newtrainer->role = "Trainer";
			$newtrainer->skills = "";
			$newtrainer->password = "";
			$newtrainer->cpassword = "";
			$newtrainer->country = "";
			$newtrainer->address = "";
			$newtrainer->about_you = "";
			$newtrainer->linkedin_url = "";
			$newtrainer->trainer_type = "";

			$newtrainer->modules = json_encode([]);
			$newtrainer->companies_deliver_at = "";
			$newtrainer->details_other_module = json_encode([]);

			$newtrainer->modules = json_encode([]);
			$newtrainer->companies_deliver_at =json_encode([]);
			// $newtrainer->details_other_module = "";

			$newtrainer->relevant_module_experience = 0;
			$newtrainer->total_experience = "0";
			$newtrainer->preferred_online_platform = json_encode([]);
			$newtrainer->equipment_for_training = json_encode([]);
			$newtrainer->gamification_tool = json_encode([]);
			$newtrainer->specialization = json_encode([]);
			$newtrainer->school_college_university = "";
			$newtrainer->degree = "";
			$newtrainer->final_year_date = '';
			$newtrainer->certification_name = json_encode([]);
			// $newtrainer->certification_expiry_date = json_encode([date("Y-m-d")]);
			$newtrainer->certification_expiry_date = json_encode([]);
			$newtrainer->certification_description = json_encode([]);
			$newtrainer->dob = date("Y-m-d");
			$newtrainer->gender = "";
			$newtrainer->languages_known = json_encode([]);
			$newtrainer->trainer_level = "";
			$newtrainer->nation_id_path = "";
			$newtrainer->resume_path = "";
			$newtrainer->demo_intro_videolink = "";


			$response = $newtrainer->save();
			return json_encode(['status'=>true,"data"=> $response,"registeremail"=>$userdata['Email']]);
		}
		return json_encode(['status'=>false,"data"=> $response_body,"message"=> $response_body->statueMessage ?? ""]);
		// if($response->successful()){
		// 	return json_encode(['status'=>true,"data"=> $response_body]);
		// }else{
		// 	return json_encode(['status'=>false,"data"=> $response_body,"message"=> $response_body->statueMessage ?? ""]);
		// }
	}

	public function updateProfileService($profile,$userId=null,$login=false)
	{	
	
		// $user_type = Session::get('user_type');

		// if($user_type == "usr_type_4"){

			$response = aspirant::where('email_id',$userId)->update($profile);
			if($response == 0 || !$response)
			{
				$response = trainer::where('email_id',$userId)->update($profile);
			}
			return json_encode(['status'=>true,"data"=> $response]);
		// }
		// if($user_type == "usr_type_3"){

			// return json_encode(['status'=>true,"data"=> $response]);
		// }
		// if($login==true){
		// 	$access_token =  session('access_token');
		// }else{
		// 	$token_response = $this->getToken();
		// 	$access_token = $token_response->access_token;
		// }
		
		// $register_id  =  ($userId == null) ? session('register_id') : $userId;

		// $headers = [
        // 	"Authorization" => "Bearer " . $access_token
        // ];

		// $response = Http::withHeaders($headers)
		// 			->patch($this->url.'/crud/'.$user_type.'/update/'.$register_id, $profile);

		// $response_body = json_decode($response->body());
		// //print_r($response_body);exit;
		
		// if($response->successful()){
		// 	return json_encode(['status'=>true,"data"=> $response_body]);
		// }else{
			return json_encode(['status'=>false,"data"=> $response_body]);
		// }
	}

	public function updateCompanyDetails($profile,$companyId=null)
	{	
	
		$access_token =  session('access_token');

		$headers = [
        	"Authorization" => "Bearer " . $access_token
        ];

        if($companyId == null){
        	$response = Http::withHeaders($headers)
					->post($this->url.'/crud/svc_type_5/create/', $profile);
        }else{
		$response = Http::withHeaders($headers)
					->patch($this->url.'/crud/svc_type_5/update/'.$companyId, $profile);
		}

		$response_body = json_decode($response->body());
		//print_r($response_body);exit;
		
		if($response->successful()){
			return json_encode(['status'=>true,"data"=> $response_body]);
		}else{
			return json_encode(['status'=>false,"data"=> $response_body]);
		}
	}

	public function getUserInfo($register_id=null)
	{	
		$user_type = Session::get('user_type');
		$register_id  =  $register_id ?? session('register_id');
		$url = $this->url.'/crud/'.$user_type.'/read/'.$register_id;
		$response = $this->guestapiservice->get($url);
		//print_r($response);exit;
	
		return $response=json_decode($response);
	}

	public function getTransactionList($service_id,$pageIndex,$pageSize,$request_json=array(""=>""),$guest=false)
	{	
		
		$url=$this->url.'/list/'.$service_id.'/'.$pageIndex.'/'.$pageSize;
		if($guest==true){
			$response = $this->guestapiservice->post($url,$request_json);
		}else{
			$response = $this->apiservice->post($url,$request_json);
		}
		
        return $response=json_decode($response);
	}

	

	
}
