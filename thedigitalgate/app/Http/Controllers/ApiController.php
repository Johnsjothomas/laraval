<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Hooper;

class ApiController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function __construct(
        Hooper $hooper
    ) {
        $this->hooper = $hooper;
    }

    public function get_user_review(Request $request)
    {   
        $fromdate = date('Y-m-d',strtotime('last day'));
        $todate = date('Y-m-d');

        $search_request['criteria']['Product'] = $request->id;
        $search_request['criteria']['User'] = $request->user_id;
        $search_request['dateCriteria']['fieldName'] = "_Created_Date";
        $search_request['dateCriteria']['fromDate'] = $fromdate;
        $search_request['dateCriteria']['toDate'] = $todate;
        $response = $this->hooper->getTransactionList('svc_type_12',1,1,$search_request,true);
        if($response->status == true){

            if($response->data->statusCode != 0){
                $result = ["status"=>false,"error"=>$response->data->statusMessage];
            }else{
                $result= ["status"=>true,"reviewExist"=>isset($response->data->data)?true:false];
            }
            return json_encode($result);
        
        }

        return json_encode(["data"=>$data,"total"=>$total]);
    }


    public function get_product_reviews(Request $request)
    { 
        $search_request=["criteria"=>["Review_Status"=>"Approved"]];
        $search_request['criteria']['Product'] = $request->id;
        $search_request['resolveRefs'] = [
                    "Product" => ["Product_Name"],
                    "User" => ["First_Name","Last_Name","Profile_Image"],
        ];
        $response = $this->hooper->getTransactionList('svc_type_12',1,'10',$search_request,true);
        if($response->status == true){

            if($response->data->statusCode != 0){//check if any error
               
                    $request->session()->flash('failed', $response->data->statusMessage);
                    //return redirect()->back()->withInput();
            }else{
                $data=isset($response->data->data)?$response->data->data->content:[];
                $total = isset($response->data->data->totalRecords)?$response->data->data->totalRecords:0;
               
            }
        
        }

        return json_encode(["data"=>$data,"total"=>$total]);
    }

    public function get_related_products(Request $request)
    { 
        $search_request=["criteria"=>["Status"=>"ACTIVE"]];
        $search_request['criteria']['Product_Type'] = $request->id;
        $response = $this->hooper->getTransactionList('svc_type_7',1,5,$search_request,true);
        if($response->status == true){

            if($response->data->statusCode != 0){//check if any error
               
                    $request->session()->flash('failed', $response->data->statusMessage);
                    //return redirect()->back()->withInput();
            }else{
                $data=isset($response->data->data)?$response->data->data->content:[];
                $total = isset($response->data->data->totalRecords)?$response->data->data->totalRecords:0;
               
            }
        
        }

        return json_encode(["data"=>$data]);
    }

    public function get_product_faqs(Request $request)
    { 
        $search_request['criteria']['Product'] = $request->id;
        $response = $this->hooper->getTransactionList('svc_type_21',1,'10',$search_request,true);
        if($response->status == true){
            
            if($response->data->statusCode != 0){//check if any error
               
                    $request->session()->flash('failed', $response->data->statusMessage);
                    //return redirect()->back()->withInput();
            }else{
                $data=isset($response->data->data)?$response->data->data->content:[];
                $total = isset($response->data->data->totalRecords)?$response->data->data->totalRecords:0;
            }
        
        }

        return json_encode(["data"=>$data,"total"=>$total]);
    }

    public function get_featured_products($search_request=array(""=>""))
    {  
        $search_request['criteria']['Featured_Status'] = 'Featured';
        $search_request['criteria']['Status'] = 'ACTIVE';
        $response = $this->hooper->getTransactionList('svc_type_7',1,'16',$search_request,true);
        if($response->status == true){
            if($response->data->statusCode != 0){//check if any error
               
                    $request->session()->flash('failed', $response->data->statusMessage);
                    //return redirect()->back()->withInput();
            }else{
                $data=isset($response->data->data)?$response->data->data->content:[];
                
                $fields =  array_column($data, "fields");
               
            }
        
        }

        return json_encode($data);
    }

    public function sellerStatistics(Request $request)
    { 
        $search_request['criteria']['Seller'] = $request->id;
        $search_request['criteria']['Review_Status'] = "Approved";
        $search_request['criteria']['fields'] = ["Review_Score"];
        $response = $this->hooper->getTransactionList('svc_type_12',1,'50',$search_request);
        if($response->status == true){
            
            if($response->data->statusCode != 0){//check if any error
               
                    $request->session()->flash('failed', $response->data->statusMessage);
                    //return redirect()->back()->withInput();
            }else{
                $data=isset($response->data->data)?$response->data->data->content:[];
               
                $total = isset($response->data->data->totalRecords)?$response->data->data->totalRecords:0;
            }
        
        }

        return json_encode(["data"=>$data,"total"=>$total]);
    }

    public function getCodes($search_criteria=array(""=>""))
    {   
        $page=isset($_GET['page'])?$_GET['page']:1;
        $search=isset($_GET['search'])?$_GET['search']:'';
        $search_criteria['fields'] = ["Name","Phone_Code"];
        $search_criteria['sortCriteria'] = ["sortOn"=>"Name","sortBy"=>"ASC"];
        if($search!=''){
         $search_criteria['fieldTextSearch'] = ["field"=>"Name","value"=>$search];
        }
        $response = $this->hooper->getTransactionList('svc_type_16',$page,'50',$search_criteria,true);
       // print_r($response);exit;
        $countries= isset($response->data->data->content)? $response->data->data->content : [];
        return json_encode(["countries"=>$countries,"total_count"=>$response->data->data->totalRecords]);              
                  
    }


    public function setCountries($page=1,$search_criteria=array(""=>""))
    {   
       
        $search_criteria['fields'] = ["Name","ISO2","Phone_Code"];
        $search_criteria['sortCriteria'] = ["sortOn"=>"Name","sortBy"=>"ASC"];
        $search_criteria['criteria'] = ["Country_Status"=>"Active"];
        return $response = $this->hooper->getTransactionList('svc_type_16',$page,'50',$search_criteria,true);              
                  
    }
    
    public function getCountries($search_criteria=array(""=>""))
    {   
        $page=isset($_GET['page'])?$_GET['page']:1;
        $search=isset($_GET['search'])?$_GET['search']:'';
        $search_criteria['fields'] = ["Name","ISO2"];
        $search_criteria['sortCriteria'] = ["sortOn"=>"Name","sortBy"=>"ASC"];
        if($search!=''){
        $search_criteria['fieldTextSearch'] = ["field"=>"Name","value"=>$search];
        }
        $search_criteria['criteria'] = ["Country_Status"=>"Active"];
        $response = $this->hooper->getTransactionList('svc_type_16',$page,'50',$search_criteria,true);
        //print_r($response);exit;
        $countries= isset($response->data->data->content)? $response->data->data->content : [];
        return json_encode(["countries"=>$countries,"total_count"=>$response->data->data->totalRecords]);              
                  
    }

    public function getCategories($search_criteria=array(""=>""))
    {   
        $page=isset($_GET['page'])?$_GET['page']:1;
        $search=isset($_GET['search'])?$_GET['search']:'';
        $search_criteria['fields'] = ["Name"];
        $search_criteria['sortCriteria'] = ["sortOn"=>"Name","sortBy"=>"ASC"];
        $search_criteria['criteria'] = ["Status"=>"Active"];
        if($search!=''){
        $search_criteria['fieldTextSearch'] = ["field"=>"Name","value"=>$search];
        }
        $response = $this->hooper->getTransactionList('svc_type_6',$page,'50',$search_criteria,true);
        
        $categories= isset($response->data->data->content)? $response->data->data->content : [];
       
        return json_encode(["categories"=>$categories,"total_count"=>$response->data->data->totalRecords]);              
                  
    }

    public function getSkillset($search_criteria=array(""=>""))
    {   
        $page=isset($_GET['page'])?$_GET['page']:1;
        $search=isset($_GET['search'])?$_GET['search']:'';
        $search_criteria['fields'] = ["Name"];
        $search_criteria['sortCriteria'] = ["sortOn"=>"Name","sortBy"=>"ASC"];
        $search_criteria['criteria'] = ["Status"=>"Active"];
        if($search!=''){
        $search_criteria['fieldTextSearch'] = ["field"=>"Name","value"=>$search];
        }
        $response = $this->hooper->getTransactionList('svc_type_7',$page,'50',$search_criteria,true);
        $skillsets= isset($response->data->data->content)? $response->data->data->content : [];
       
        return json_encode(["skillsets"=>$skillsets,"total_count"=>$response->data->data->totalRecords]);              
                  
    }

    public function getBrands($search_criteria=array(""=>""))
    {   
        $page=isset($_GET['page'])?$_GET['page']:1;
        $search=isset($_GET['search'])?$_GET['search']:'';
        $search_criteria['fields'] = ["Brand_Name"];
        $search_criteria['sortCriteria'] = ["sortOn"=>"Brand_Name","sortBy"=>"ASC"];
        $search_criteria['criteria'] = ["Brand_Status"=>"Approved"];
        if($search!=''){
        $search_criteria['fieldTextSearch'] = ["field"=>"Brand_Name","value"=>$search];
        }
        $response = $this->hooper->getTransactionList('svc_type_18',$page,'50',$search_criteria,true);
        
        $brands= isset($response->data->data->content)? $response->data->data->content : [];
       
        return json_encode(["brands"=>$brands,"total_count"=>$response->data->data->totalRecords]);              
                  
    }

    public function getStates($search_criteria=array(""=>""))
    {   
        $page=isset($_GET['page'])?$_GET['page']:1;
        $search=isset($_GET['search'])?$_GET['search']:'';
        $search_criteria['fields'] = ["Name"];
        $search_criteria['criteria'] = ["Country_Code"=>$_GET['country']];
        $search_criteria['sortCriteria'] = ["sortOn"=>"Name","sortBy"=>"ASC"];
        if($search!=''){
        $search_criteria['fieldTextSearch'] = ["field"=>"Name","value"=>$search];
        }
        $response = $this->hooper->getTransactionList('svc_type_17',$page,'50',$search_criteria,true);
        //print_r($response->data->data->content);exit;
        $states= isset($response->data->data->content)? $response->data->data->content : [];
        return json_encode(["states"=>$states,"total_count"=>$response->data->data->totalRecords]);              
                  
    }

    public function getPaymentTerms($search_criteria=array(""=>""))
    {   
        $page=isset($_GET['page'])?$_GET['page']:1;
        $search=isset($_GET['search'])?$_GET['search']:'';
        $search_criteria['fields'] = ["Name"];
        $search_criteria['sortCriteria'] = ["sortOn"=>"Name","sortBy"=>"ASC"];
        if($search!=''){
        $search_criteria['fieldTextSearch'] = ["field"=>"Name","value"=>$search];
        }
        $response = $this->hooper->getTransactionList('svc_type_19',$page,'50',$search_criteria,true);
        //print_r($response->data->data->content);exit;
        $payment_terms= isset($response->data->data->content)? $response->data->data->content : [];
        return json_encode(["payment_terms"=>$payment_terms,"total_count"=>$response->data->data->totalRecords]);              
                  
    }

    public function getSalesAdvisors($search_criteria=array(""=>""))
    {   
        $page=isset($_GET['page'])?$_GET['page']:1;
        $search=isset($_GET['search'])?$_GET['search']:'';
        $search_criteria['fields'] = ["Name"];
        $search_criteria['sortCriteria'] = ["sortOn"=>"Name","sortBy"=>"ASC"];
        if($search!=''){
        $search_criteria['fieldTextSearch'] = ["field"=>"Name","value"=>$search];
        }
        $response = $this->hooper->getTransactionList('svc_type_15',$page,'50',$search_criteria,true);
        //print_r($response->data->data->content);exit;
        $sales_advisors= isset($response->data->data->content)? $response->data->data->content : [];
        return json_encode(["sales_advisors"=>$sales_advisors,"total_count"=>$response->data->data->totalRecords]);                 
    }

    public function getCategoryOfIndustry($industryId,$categoryId=null)
    {   
        $categories = $this->hooper->getCategoryOfIndustry($industryId);
        $html='<select onchange="getProductTypeOfCategory(this.value)" required name="category_id" class="js-states form-control" id="category_id">';
        $html.='<option value="">Select from the below list</option>';

        if(isset($categories->content)){
        foreach($categories->content as $val){
         // $html.= '<option>';
          if($categoryId == $val->id){
             $html.='<option selected value="'.$val->id.'">'.$val->fields->Product_Category_Name.'</option>';
            }else{
              $html.='<option value="'.$val->id.'">'.$val->fields->Product_Category_Name.'</option>';
            }
            
        }}
        $html.='</select>';

        return $html;         
                  
    }

    public function getProductTypeOfCategory($id,$type=null)
    {   
        $categories = $this->hooper->getProductTypeOfCategory($id);
        $html='<select id="product_type" name="product_type" class="js-states form-control search-filter" id="product_type">';
        $html.='<option value="">Select from the below list</option>';
        if(isset($categories->content)){
          foreach($categories->content as $key=>$val){
            if($type == $val->id){
             $html.='<option selected value="'.$val->id.'">'.$val->fields->Product_Type_Name.'</option>';
            }else{
            $html.= '<option value="'.$val->id.'">'.$val->fields->Product_Type_Name.'</option>';
            }
          }}
        $html.='</select>';

        return $html;
                     
                  
    }

    public function update_alert($txnid)
    {   
        $date=date('Y-m-d');
        $request_json = [
                "Status" => "Inactive",
                "Opened_Read_Date" => $date
        ];
       
        $response = $this->hooper->updateTransaction('svc_type_26',$txnid,$request_json);
        
        if($response->status==true){
            return json_encode(["status" => true]);
        }
        
        
     }

     public function getTrainingModule($search_criteria=array(""=>""))
    {   
        $page=isset($_GET['page'])?$_GET['page']:1;
        $search=isset($_GET['search'])?$_GET['search']:'';
        $search_criteria['fields'] = ["Module_Title"];
        $search_criteria['sortCriteria'] = ["sortOn"=>"Module_Title","sortBy"=>"ASC"];
        $search_criteria['criteria'] = ["Current_Module_Status"=>"Active"];
        if($search!=''){
        $search_criteria['fieldTextSearch'] = ["field"=>"Module_Title","value"=>$search];
        }
        $response = $this->hooper->getTransactionList('svc_type_16',$page,'50',$search_criteria,true);
        //print_r($response);exit;
        $modules= isset($response->data->data->content)? $response->data->data->content : [];
       
        return json_encode(["modules"=>$modules,"total_count"=>$response->data->data->totalRecords]);              
                  
    }

    


    
}
