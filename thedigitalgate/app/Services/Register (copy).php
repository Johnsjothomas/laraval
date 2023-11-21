<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Session;
use App\Services\ApiService;
use App\Services\GuestApiService;
use Log;

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
	public function getToken()
	{	
			$user_type =  Session::get('user_type');
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

	public function registerService($username,$password)
	{	
		$token_response = $this->getToken();
		$access_token = $token_response->access_token;
		$token_type = $token_response->token_type;

		$headers = [
        	"Authorization" => "Bearer " . $access_token
        ];

		$response = Http::withHeaders($headers)
					->post($this->url.'/account/register', [
		    			'username' => $username,
		    			'password' => $password,
					]);
		$response_body = json_decode($response->body());	

		if($response->successful()){
			return json_encode(['status'=>true,"data"=> $response_body,"token"=>$token_response]);
		}else{
			return json_encode(['status'=>false,"data"=> $response_body]);
		}
	}

	public function checkUserExists($email)
	{	

		$token_response = $this->getToken();
		$access_token = $token_response->access_token;
		$token_type = $token_response->token_type;

		$headers = [
        	"Authorization" => "Bearer " . $access_token
        ];

		$response = Http::withHeaders($headers)
					->get($this->url.'/uaa/user/id/'.$email);
					
		$response_body = json_decode($response->body());
		
		if($response->successful()){
			return json_encode(['status'=>true,"data"=> $response_body]);
		}else{
			return json_encode(['status'=>false,"data"=> $response_body]);
		}
	}

	public function createUserService($userdata)
	{	
		$user_type = Session::get('user_type');
		$token_response = $this->getToken();
		$access_token = $token_response->access_token;
		$token_type = $token_response->token_type;

		$headers = [
        	"Authorization" => "Bearer " . $access_token
        ];

		$response = Http::withHeaders($headers)
					->post($this->url.'/crud/'.$user_type.'/create', $userdata);

		$response_body = json_decode($response->body());
		
		if($response->successful()){
			return json_encode(['status'=>true,"data"=> $response_body]);
		}else{
			return json_encode(['status'=>false,"data"=> $response_body,"message"=> $response_body->statueMessage ?? ""]);
		}
	}

	public function updateProfileService($profile,$userId=null,$login=false)
	{	
	
		$user_type = Session::get('user_type');
		if($login==true){
			$access_token =  session('access_token');
		}else{
			$token_response = $this->getToken();
			$access_token = $token_response->access_token;
		}
		
		$register_id  =  ($userId == null) ? session('register_id') : $userId;

		$headers = [
        	"Authorization" => "Bearer " . $access_token
        ];

		$response = Http::withHeaders($headers)
					->patch($this->url.'/crud/'.$user_type.'/update/'.$register_id, $profile);

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
