<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Employer;
use App\Services\Register;
use App\Services\Hooper;
use Session;
use Storage;
use Cache;

class TeamController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function __construct(
        Employer $employer,Register $register,Hooper $hooper
    ) {
        $this->employer = $employer;
        $this->register = $register;
        $this->hooper = $hooper;
    }

    public function index(Request $request)
    {

        $search_request=["criteria"=>
            [
                "Select_Company"=>$request->session()->get('company_id'),
                "Status"=>"Active"
            ]
        ];
        $response = $this->hooper->getTeamList('usr_type_2',1,10,$search_request);
        $users = $response->data->data->content ?? [];
        return view('employer.users.index',compact('users'));   
    }

    public function assign_user(Request $request)
    {   

        if($request->isMethod('post')){

            

            $request->validate([
                'first_name' => ['required', 'string', 'max:30','regex:/(^([a-zA-Z]+)(\d+)?$)/u'],
                //'mobile_code' => ['required', 'integer'],
                'email' => ['required'],
            ]/*,[
                'password.regex' => 'Password must be alphanumeric'
            ]*/);

           $register_details = [
                "First_Name" => $request->first_name,
                //"Last_Name" => $request->second_name,
                "Email" => $request->email,
                //"Email_ID" => $request->email,
                "Designation" => $request->designation,
                "Select_Company" => $request->session()->get('company_id'),
                "Status" => "Inactive", 
                //"Seller_Active" => ($request->role==1)? 1 : 0,
                //"Buyer_Active" => ($request->role==2)? 1 : 0, 
                //"Role" => $request->role     
           ];
            

                $response = $this->register->checkUserExists($request->email,'usr_type_2');
                $response=json_decode($response);
               // echo $response->data->statusCode;exit;
                if($response->data->statusCode == 0){

                    $request->session()->flash('register_failed', 'Email ID is already taken');
                    return redirect()->back()->withInput();

                }

                //Log::info(print_r($register_details, true));    
                //Create User if registration is successfull
                $response = $this->register->createUserService($register_details,'usr_type_2');
                $response=json_decode($response);
                if($response->status == true){//check if API call is success

                    if($response->data->statusCode != 0){//check if any error
                        $request->session()->flash('register_failed', $response->data->statusMessage);
                        return redirect()->back()->withInput();
                    }

                    $request->session()->flash('register_success', 'Invitation sent successfully');
                    return redirect()->back();
 
                    
                }else{
                    $request->session()->flash('register_failed', $response->data->statueMessage ?? '');
                    return redirect()->back()->withInput(); 
                }

        }

    }
    



    
}