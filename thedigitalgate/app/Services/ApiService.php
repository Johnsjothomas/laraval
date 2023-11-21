<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Session;
use DateTime;
use DateInterval;
use Illuminate\Http\Request;
use Redirect;
use GuzzleHttp\Profiling\Debugbar\Profiler;
use GuzzleHttp\Profiling\Middleware;
use Illuminate\Support\Facades\App;
use Log;

class ApiService
{	

	private $headers;
	public function __construct()
	{	
        $access_token =  session('access_token');
		$register_id  =  session('register_id');

		$this->headers = [
        	"Authorization" => "Bearer " . $access_token
        ];
    }


    public function get($url)
	{	
		
		$response = Http::withHeaders($this->getHeaders())->get($url);				
		$response_body = json_decode($response->body());

		if($response->successful()){
			return json_encode(['status'=>true,"data"=> $response_body]);
		}elseif($response->serverError()){
			return json_encode(['status'=>false,"message"=> 'Server Error....Try Again']);
		}elseif($response->failed()){
			//abort(redirect('login')->with('alert-warning', 'Your session token has expired. Please login to continue.'));
			return json_encode(['status'=>false,"message"=> 'API request Failed']);
		}
	}



	public function post($url,$request=array(''=>''))
	{	
        Log::info(print_r($request, true));
		$response = Http::withHeaders($this->getHeaders())->post($url,$request);				
		$response_body = json_decode($response->body());
		//print_r($response_body);exit;
		if($response->successful()){
			return json_encode(['status'=>true,"data"=> $response_body]);
		}elseif($response->serverError()){
			return json_encode(['status'=>false,"message"=> 'Server Error....Try Again']);
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
			return json_encode(['status'=>false,"message"=> 'Server Error....Try Again']);
		}elseif($response->failed()){
			return json_encode(['status'=>false,"message"=> 'processing failed!']);
		}
	}

	public function getHeaders(){

		$expires_time =  session('expires_time');
		$user_type = session('user_Type');;
		$current = date('Y-m-d H:i:s');

		if($current >= $expires_time){
			

			//abort(redirect('/logout'));
		   $clientId=config('auth.'.$user_type.'.clientId');
           $secret=config('auth.'.$user_type.'.secret');

		   $headers = [
        	"Authorization" => "Basic " . base64_encode($clientId . ":" . $secret),
        	];
        	 $refresh_token=session('refresh_token');
			$response = Http::withHeaders($headers)
					->post('https://stg3.hooperlabs.com/capi/uaa/oauth/token', [
		    			'grant_type' => 'refresh_token',
		    			'refresh_token' => $refresh_token,
					]); 
    
           if($response->successful()){

           	$response=json_decode($response);

           		$access_token =  $response->access_token;
                session(['access_token' => $response->access_token]);
                session(['refresh_token' => $response->refresh_token]);
                session(['expires_in' => $response->expires_in]);
                $minutes_to_add = $response->expires_in / 60;

                $time = new DateTime();
                $time->add(new DateInterval('PT' . floor($minutes_to_add) . 'M'));

                $stamp = $time->format('Y-m-d H:i:s');

                session(['expires_time' => $stamp]);

                session(['timeout' => 1]);

           }else{
           	//print_r($response->body());exit;
           		abort(redirect('/logout'));
           }
		}else{

			$access_token =  session('access_token');
				

		}

		return $headers = [
		        	"Authorization" => "Bearer " . $access_token
		        ];

		
		        


	}

	

	
}
