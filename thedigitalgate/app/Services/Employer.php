<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Session;
use App\Services\ApiService;

class Employer 
{	
	public function __construct(
        ApiService $apiservice
    ) {
        $this->apiservice = $apiservice;
        $this->url=config('auth.url');
    }

	

	public function getTransactionList($service_id,$pageIndex,$pageSize,$request_json=array(""=>""))
	{	
		$url=$this->url.'/list/'.$service_id.'/'.$pageIndex.'/'.$pageSize;
		$response = $this->apiservice->post($url,$request_json);
        return $response=json_decode($response);
	}


	

	
}
