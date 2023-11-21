<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Session;
use App\Services\ApiService;

class Seller 
{	
	public function __construct(
        ApiService $apiservice
    ) {
        $this->apiservice = $apiservice;
        $this->url=config('auth.url');
    }

	

	public function changePassword($request_array)
	{	

		$access_token =  session('access_token');
		$register_id  =  session('register_id');

		$headers = [
        	"Authorization" => "Bearer " . $access_token
        ];

		$response = Http::withHeaders($headers)
					->post($this->url.'/account/change/password',$request_array);

		$response_body = json_decode($response->body());
		
	
		
		if($response->successful()){
			return json_encode(['status'=>true,"data"=> $response_body]);
		}else{
			return json_encode(['status'=>false,"data"=> $response_body]);
		}
	}


	

	
}
