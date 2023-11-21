<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Models\trainer;
use App\Models\aspirant;
use Log;
use Session;
use DB;

class Login
{

	public function __construct(ApiService $apiService)
	{
		$this->apiService = $apiService;
		$this->clientId = config('auth.employer.clientId');
		$this->secret = config('auth.employer.secret');
		$this->url = config('auth.url');
	}

	private $error;

	public function getToken()
	{
		$user_type =  Session::get('user_type');
		$clientId = config('auth.' . $user_type . '.clientId');
		$secret = config('auth.' . $user_type . '.secret');


		$headers = [
			"Authorization" => "Basic " . base64_encode($clientId . ":" . $secret),
		];

		$response = Http::withHeaders($headers)
			->post($this->url . '/uaa/oauth/token', [
				'grant_type' => 'client_credentials',
			]);
		if ($response->successful()) {
			$response = json_decode($response->body());
			return $response;
		} else {
			$response->throw();
		}
	}


	public function loginService($username, $password)
	{

		$user_type =  Session::get('user_type');
		// $clientId = config('auth.' . $user_type . '.clientId');
		// $secret = config('auth.' . $user_type . '.secret');
		// $headers = [
		// 	"Authorization" => "Basic " . base64_encode($clientId . ":" . $secret),
		// ];

		// $response = Http::withHeaders($headers)
		// 			->post($this->url.'/uaa/oauth/token', [
		//     			"grant_type" => "password",
		//     			"username"   => $username,
		// 				"password"  => $password
		// 			]);	


		if(@$user_type)
		{
			if ($user_type == 'usr_type_4') {
				// $response = DB::select('select * from aspirant_master where email_id = ?', array($username));
				$response = aspirant::where('email_id',$username)->get();
				return json_encode(['status' => true, "data" => $response]);
			}
			if ($user_type == 'usr_type_3') {
				// $response = DB::select('select * from trainer_master where email_id = ?', array($username));
				$response = trainer::where('email_id',$username)->get();
				return json_encode(['status' => true, "data" => $response]);
			}
			return json_encode(['status' => false]);
		}
		else
		{
			$response = aspirant::where('email_id',$username)->get();
			if(empty($response))
			{
				$response = trainer::where('email_id',$username)->get();
			}
			if(@$response)
			{
				return json_encode(['status' => true, "data" => $response]);
			}
			else
			{
				return json_encode(['status' => false]);
			}
		}


		// $response_body = json_decode($response->body());
		// return json_encode(['status' => true, "data" => $response]);
		// if ($response->successful()) {
		// 	return json_encode(['status' => true, "data" => $response]);
		// } else {
		// 	return json_encode(['status' => false, "data" => $response]);
		// }
	}

	public function setSession(Request $request, $response)
	{
		$request->session()->put('register_id', $response->data->account_id);
		$request->session()->put('access_token', $response->data->access_token);
		$request->session()->put('refresh_token', $response->data->refresh_token);
		$request->session()->put('expires_in', $response->data->expires_in);
	}

	public function resetPassword($request_array)
	{

		$token_response = $this->getToken();
		$access_token = $token_response->access_token;

		$headers = [
			"Authorization" => "Bearer " . $access_token
		];


		$response = Http::withHeaders($headers)
			->post($this->url . '/account/change/password', $request_array);

		$response_body = json_decode($response->body());



		if ($response->successful()) {
			return json_encode(['status' => true, "data" => $response_body]);
		} else {
			return json_encode(['status' => false, "data" => $response_body]);
		}
	}
}
