<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Session;
use DateTime;
use DateInterval;
use Log;

class TeamApiService
{	

	private $headers;
	


    public function get($url)
	{	
		$headers = $this->getHeaders();

		$response = Http::withHeaders($this->getHeaders())->get($url);				
		$response_body = json_decode($response->body());

		if($response->successful()){
			return json_encode(['status'=>true,"data"=> $response_body]);
		}elseif($response->serverError()){
			return json_encode(['status'=>false,"message"=> $response_body->error_description]);
		}elseif($response->failed()){
			return json_encode(['status'=>false,"message"=> 'API request Failed']);
		}
	}



	public function post($url,$request=array(''=>''))
	{	//echo session('guest_access_token');exit;
		Log::info(print_r($request, true));
		$headers = $this->getHeaders();
		
		$response = Http::withHeaders($headers)->post($url,$request);				
		$response_body = json_decode($response->body());

		if($response->successful()){
			return json_encode(['status'=>true,"data"=> $response_body]);
		}elseif($response->serverError()){
			return json_encode(['status'=>false,"message"=> $response_body->error_description]);
		}elseif($response->failed()){
			return json_encode(['status'=>false,"message"=> 'processing failed!']);
		}
	}

	public function patch($url,$request)
	{	
		Log::info(print_r($request, true));
		$response = Http::withHeaders($this->getHeaders())->patch($url,$request);				
		$response_body = json_decode($response->body());

		if($response->successful()){
			return json_encode(['status'=>true,"data"=> $response_body]);
		}elseif($response->serverError()){
			return json_encode(['status'=>false,"message"=> $response_body->error_description]);
		}elseif($response->failed()){
			return json_encode(['status'=>false,"message"=> 'processing failed!']);
		}
	}

	public function getHeaders(){
		
		$user_type = 'usr_type_2';
		$guest_expires_time =  session('team_expires_time');

		$current = date('Y-m-d H:i:s');

		if(session('team_access_token')=='' || $current >= $guest_expires_time){

			$clientId=config('auth.'.$user_type.'.clientId');
	        $secret=config('auth.'.$user_type.'.secret');
	        $credentials=config('auth.'.$user_type.'.guest_credentials');
			$headers = [
	        	"Authorization" => "Basic " . base64_encode($clientId . ":" . $secret),
	        ];
			$response = Http::withHeaders($headers)
						->post(config('auth.url').'/uaa/oauth/token', $credentials);
			if($response->successful()){
				$response = json_decode($response->body());
				$access_token = $response->access_token;
				session(['team_access_token' => $response->access_token]);

				$minutes_to_add = $response->expires_in / 60;
                $time = new DateTime();
                $time->add(new DateInterval('PT' . floor($minutes_to_add) . 'M'));
                $stamp = $time->format('Y-m-d H:i:s');
                session(['team_expires_time' => $stamp]);

			}else{
				$response->throw();
			}


		}else{

			 $access_token= session('team_access_token');
		}

		return $headers = [
	        	"Authorization" => "Bearer " . $access_token
	        	];
	
	}

	

	
}
