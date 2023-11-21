<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Session;
use App\Services\ApiService;
use App\Services\GuestApiService;
use App\Services\TeamApiService;
use App\Services\AspirantApiService;

class Hooper 
{	
	public function __construct(
        ApiService $apiservice,GuestApiService $guestapiservice,TeamApiService $teamapiservice,AspirantApiService $aspirantapiservice
    ) {
        $this->apiservice = $apiservice;
         $this->guestapiservice = $guestapiservice;
         $this->teamapiservice = $teamapiservice;
         $this->aspirantapiservice = $aspirantapiservice;
         $this->url=config('auth.url');
    }

	public function productFormService($product,$txnid=null)
	{	
		if($txnid==null){
			$url=$this->url.'/crud/svc_type_7/create';
			$response = $this->apiservice->post($url,$product);
		}else{
			$url=$this->url.'/crud/svc_type_7/update/'.$txnid;
			$response = $this->apiservice->patch($url,$product);
		}
		
        return $response=json_decode($response);
	}


	public function getTransactionDetails($service_id,$txnid,$request_json=array(""=>""),$guest=false)
	{	
		
		$url=$this->url.'/crud/'.$service_id.'/read/'.$txnid;
		if($guest==true){
			$response = $this->guestapiservice->get($url,$request_json);
		}else{
			$response = $this->apiservice->get($url,$request_json);
		}
		
		
        return $response=json_decode($response);
	}

	public function getProductDetails($service_id,$name,$request_json=array(""=>""),$guest=false)
	{	
		
		$url=$this->url.'/list/'.$service_id.'/1/1';
		if($guest==true){
			$response = $this->guestapiservice->post($url,$request_json);
		}else{//print_r($request_json);
		$response = $this->apiservice->post($url,$request_json);
		//print_r($response);exit;
		}
		
		
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

	public function getTeamList($service_id,$pageIndex,$pageSize,$request_json=array(""=>""))
	{	
		
		$url=$this->url.'/list/'.$service_id.'/'.$pageIndex.'/'.$pageSize;
		$response = $this->teamapiservice->post($url,$request_json);
		
		
        return $response=json_decode($response);
	}

	public function getAspirantList($service_id,$pageIndex,$pageSize,$request_json=array(""=>""))
	{	
		
		$url=$this->url.'/list/'.$service_id.'/'.$pageIndex.'/'.$pageSize;
		$response = $this->aspirantapiservice->post($url,$request_json);
		
		
        return $response=json_decode($response);
	}

	public function getTransactionTable($tableid,$service_id,$request_json=array(""=>""),$guest=false)
	{	
		
		$url=$this->url.'/list/table/'.$tableid.'/rows/of/transaction/'.$service_id;
		if($guest==true){
			$response = $this->guestapiservice->post($url,$request_json);
		}else{
			$response = $this->apiservice->post($url,$request_json);
		}
		
		
        return $response=json_decode($response);
	}

	public function CreateTransactionTable($tableid,$txnid,$request_json=array(""=>""),$type,$guest=false)
	{	
		if($type=='single'){
			$url=$this->url.'/crud/'.$txnid.'/table/'.$tableid.'/row';
		}elseif($type=='multiple'){
			$url=$this->url.'/crud/'.$txnid.'/table/'.$tableid.'/rows';
		}
		if($guest==true){
			$response = $this->guestapiservice->post($url,$request_json);
		}else{
			$response = $this->apiservice->post($url,$request_json);
		}
		
		
        return $response=json_decode($response);
	}

	public function getRelatedTransactionList($parentId,$service_id,$pageIndex,$pageSize,$request_json=array(""=>""))
	{	
		
		$url=$this->url.'/list/transaction/'.$parentId.'/rels/with/'.$service_id.'/'.$pageIndex.'/'.$pageSize; 
		$response = $this->apiservice->post($url,$request_json);
		
		
        return $response=json_decode($response);
	}

	public function createTransaction($service_id,$request_json,$guest=false)
	{	
		$url=$this->url.'/crud/'.$service_id.'/create';

		if($guest==true){
			$response = $this->guestapiservice->post($url,$request_json);
		}else{
		$response = $this->apiservice->post($url,$request_json);
		}
		
        return $response=json_decode($response);
	}

	public function updateTransaction($service_id,$txnid,$request_json)
	{	
		$url=$this->url.'/crud/'.$service_id.'/update/'.$txnid;
		$response = $this->apiservice->patch($url,$request_json);
		
        return $response=json_decode($response);
	}

	public function getProductIndustries($request_json)
	{	
		
		$url=$this->url.'/list/svc_type_6/1/10';
		$request= [
			"criteria" => [
				"Industry_Status" => 'Active'
				]
			];
		$response = json_decode($this->apiservice->post($url,$request));
		
        return (isset($response->data->data))?$response=$response->data->data : null;
	}

	public function getCategoryOfIndustry($id)
	{	
		$industry_array = explode(',',$id);
		$request= [
			"fields" => ["Industry","Description", "Product_Category_Status","Product_Category_Name","Category_ID"],
			"criteria" => [
				"Choose_Industries" => $industry_array
				]
			];

		$url=$this->url.'/list/svc_type_4/1/50';
		$response = json_decode($this->guestapiservice->post($url,$request));
        return (isset($response->data->data))?$response=$response->data->data : null;
	}

	public function getProductTypeOfCategory($id)
	{	
		$request= [
			"fields" => ["Product_Type_Name","Product_Type_ID"],
			"criteria" => [
				"Product_Category" => [$id],
				"Type_Status" => "ACTIVE"
				]
			];
		$url=$this->url.'/list/svc_type_5/1/10';

		$response = json_decode($this->guestapiservice->post($url,$request));
		
        return (isset($response->data->data))?$response=$response->data->data : null;
	}

	public function getCatalogueList($service_id,$pageIndex,$pageSize,$request_json=array(""=>""))
	{	
		
		$url=$this->url.'/list/'.$service_id.'/'.$pageIndex.'/'.$pageSize;
		$response = $this->guestapiservice->post($url,$request_json);
        return $response=json_decode($response);
	}



	

	
}


 