<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AspirantPayment;
use App\Models\module_creation;
use App\Models\aspirant;
use App\Models\cart;
use App\Services\Register;
use App\Services\Notification;

class RazorpayPaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct(
        Register $register,
        Notification $notification
    ) {
        $this->register = $register;
        $this->notification = $notification;
    }
    public function index(Request $request)
    {
        // print_r($request->all());exit();
        if(@$request->module_id)
        {
            $module_creation = module_creation::where('module_Id', $request->module_id)->select("related_module_id", "endDateTime", "startDateTime")->first();
            if(@$module_creation)
            {
                if(strtotime(date("Y-m-d H:i:s")) > strtotime($module_creation->startDateTime))
                {
                    $request->session()->flash('failed', "Session Under Progress Cannot Join...!");
                    return redirect()->back();
                    die;
                }
                $idsArray = module_creation::where('related_module_id', '=', $module_creation->related_module_id)->pluck('module_Id');
                $idsArray = @$idsArray ? $idsArray->toArray() : array();
                if(@$idsArray)
                {
                    $AspirantPaymentCheck = AspirantPayment::whereIn('module_Id', $idsArray)->where('aspirant_id', $request->aspirant_id)->pluck("payment_id");
                    $AspirantPaymentCheck = @$AspirantPaymentCheck ? $AspirantPaymentCheck->toArray() : array();
                    if(@$AspirantPaymentCheck)
                    {
                        $request->session()->flash('failed', "You already join this module...!");
                        return redirect()->back();
                        die;
                    }
                }
            }
        }

        $AspirantPayment = new AspirantPayment;
        $AspirantPayment->aspirant_id = $request->aspirant_id;
        $AspirantPayment->module_Id = $request->module_id;
        $AspirantPayment->status = empty($request->amount) ? "Paid" : "Pending";
        $AspirantPayment->payment_date = date("Y-m-d H:i:s");
        $AspirantPayment->razorpay_payment_id = "";
        $AspirantPayment->reason = "";
        $AspirantPayment->description = "";
        $AspirantPayment->save();
        $paymentid = $AspirantPayment->id;

        if(empty($request->amount))
        {
            module_creation::where('module_Id', $request->module_id)->increment('leftParticipantPerModule', 1);

           cart::where('module_Id',$request->module_id)->where('aspirant_id',$request->aspirant_id)->update(['is_deleted'=> 1]);

            $AID = $request->aspirant_id;
            $aspirantData = aspirant::select('email_id', 'first_name')->where('Aspirant_ID', $AID)->get()->first();

            $module_name = module_creation::where('module_Id', $request->module_id)->pluck('moduleTitle')->first();

            $this->notification->savenotification("aspirant",$AID, $module_name.' Module Paid Successfully');
            $mailSendar =  array(
                'useremail' => $aspirantData->email_id,
                'username'  => $aspirantData->first_name,
                'type'      => 'module_paid',
                'message'   => $module_name.' Module Paid Successfully',
            );
            $this->register->sendCommonchatmail($mailSendar);

            $request->session()->flash('success', "Payment Received, this Training has been moved to Applied Training Tab");
           // return redirect()->route('myBankAsp');
            return redirect()->back();
            die;
        }

        return view('razorpayView',['paymentid'=>$paymentid,'aspirant_id'=>$request->aspirant_id,'module_id'=>$request->module_id,'currency'=>$request->currency,'aspirant_mobile'=>$request->aspirant_mobile,'aspirant_name'=>$request->aspirant_name,'aspirant_email'=>$request->aspirant_email,'amount'=>$request->amount]);
    }
    public function saverazorpayid(Request $request)
    {
        $request->session()->flash('success', "Payment Received, this Training has been moved to Applied Training Tab");
        AspirantPayment::where('payment_id',$request->paymentid)->update(['razorpay_payment_id'=>$request->res['razorpay_payment_id'],'status'=>'Paid']);
        
        cart::where('module_Id',$request->module_id)->where('aspirant_id',$request->session()->get('Aspirant_ID'))->update(['is_deleted'=> 1]);
       
        /** add notification */
        $module_name = module_creation::where('module_Id', $request->module_id)->pluck('moduleTitle')->first();
        
        $AID = $request->session()->get('Aspirant_ID');
        $aspirantData = aspirant::select('email_id', 'first_name')->where('Aspirant_ID', $AID)->get()->first();

        $this->notification->savenotification("aspirant",$AID, $module_name.' Module Paid Successfully');
        $mailSendar =  array(
            'useremail' => $aspirantData->email_id,
            'username'  => $aspirantData->first_name,
            'type'      => 'module_paid',
            'message'   => $module_name.' Module Paid Successfully',
        );
        $this->register->sendCommonchatmail($mailSendar);

        module_creation::where('module_Id', $request->module_id)->increment('leftParticipantPerModule', 1);
    }
    
    public function savefailrazorpayid(Request $request)
    {
        // print_r($request->paymentid);
        // print_r($request->res['error']['metadata']['payment_id']);
        // print_r($request->res['error']['description']);
        // print_r($request->res['error']['reason']);
        // exit();
        $request->session()->flash('failed', "Payment failed...!");
        AspirantPayment::where('payment_id',$request->paymentid)->update(['status'=>'Failed','razorpay_payment_id'=>$request->res['error']['metadata']['payment_id'],'reason'=>$request->res['error']['reason'],'description'=>$request->res['error']['description']]);

        /** add notification */
        $module_name = module_creation::where('module_Id', $request->module_id)->pluck('moduleTitle')->first();
        
        $AID = $request->session()->get('Aspirant_ID');
        $aspirantData = aspirant::where('Aspirant_ID', $AID)->get()->first();

        $this->notification->savenotification("aspirant",$AID, $module_name.' Module Payment Failed');
        $mailSendar =  array(
            'useremail' => $aspirantData->email_id,
            'username'  => $aspirantData->first_name,
            'type'      => 'module_paid',
            'message'   => $module_name.' Module Payment Failed',
        );
        $this->register->sendCommonchatmail($mailSendar);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        // $input = $request->all();
  
        // $api = new Api(env('rzp_test_efOaNgaTPytR1v'), env('sIzLyNIatOBpuYpxk1QSgWPS'));
  
        // $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        // if(count($input)  && !empty($input['razorpay_payment_id'])) {
        //     try {
        //         $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
        //     } catch (Exception $e) {
        //         return  $e->getMessage();
        //         Session::put('error',$e->getMessage());
        //         // return redirect()->back();
        //         return view('razorpayView');
        //     }
        // }
          
        // Session::put('success', 'Payment successful');
        // // return redirect()->back();
        return view('razorpayView');
    }
}