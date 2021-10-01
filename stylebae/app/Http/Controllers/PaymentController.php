<?php

namespace App\Http\Controllers;

use App\Mail\PaymentSuccessfull;
use App\Models\Appointment;
use App\Models\Payment;
use App\Models\PaymentItem;
use App\Models\Service;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function loadPayment(Request $request){
        $user = Auth::id();
        $service = $request->service_id;
        $product = $request->product_id;
        $date = $request->date_app;
        $time = $request->time_app;
        $price = $request->service_price;
        $appointment_id = $request->appointment_id;
        $get_services = Service::findOrFail($service);
        $get_products = Product::findOrFail($product);
        $get_pay = $request->payment;

       
       
            if ($get_pay == "cash") {
                return view('frontend.loadcashpayment',compact('get_services','get_products','date','time','price','appointment_id'));
            }
            elseif ($get_pay == "card") {
                
                return view('frontend.loadpayment',compact('get_services','get_products','date','time','price','appointment_id'));
            }
             
     
    }

    public function stripPayment(Request $request){

        $amount = (int)$request->price;
        // Set your secret key. Remember to switch to your live secret key in production.
            // See your keys here: https://dashboard.stripe.com/apikeys
            \Stripe\Stripe::setApiKey('sk_test_51JQwLJSIIXq0xXvQH2sjYpYpsWqL8eDW6SnF9vr00kLTp30t4EHs2DtzY3ytoDzKhCOQUMFajNUV3Pagc9KFd2QQ00q4cmF6Q6');
                
                // Token is created using Checkout or Elements!
                // Get the payment token ID submitted by the form:
                $token = $_POST['stripeToken'];
                
                $charge = \Stripe\Charge::create([
                'amount' => $amount*100,
                'currency' => 'inr',
                'description' => 'StyleBae',
                'source' => $token,
                
                'metadata' => ['order_id' => uniqid()],
                ]);

                //  dd($charge);
                $payment_id = Payment::insertGetId([
                    'user_id'=> Auth::id(),
                    'appointment_id'=>$request->appointment_id,
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone ,
                    'payment_type'=>$charge->payment_method,
                    'payment_method'=>$charge->payment_method,
                    'transaction_id'=>$charge->balance_transaction,
                    'currency'=>$charge->currency,
                    'amount'=>$amount,
                    'payment_number'=>$charge->metadata->order_id,
                    'invoice_number'=>'SB'.mt_rand(10000000,99999999),
                    'payment_date'=>Carbon::now()->format('d F Y'),
                    'payment_month'=>Carbon::now()->format('F'),
                    'payment_year'=>Carbon::now()->format('Y'),
                    'salon'=>$request->product_name,
                    'service'=>$request->service_name,
                    'status'=>'pending',
                    'created_at'=>Carbon::now(),
                    
                ]);
                $get_payment = Payment::findOrFail($payment_id);
                $transaction_id = $get_payment->transaction_id;
                $item = PaymentItem::insertGetId([
                    'payment_id'=>$payment_id,
                    'salon'=>$request->product_name,
                    'service'=>$request->service_name,
                    'price'=>$amount,
                    'transaction_id'=>$transaction_id,
                    'created_at'=>Carbon::now(),
                    
                ]);
                // SENDING EMAIL ////

            $get_data = PaymentItem::findOrFail($item);
            
            $data = [
                'user_name'=>$request->name,
                'salon'=>$request->product_name,
                'transaction'=>$get_data->transaction_id,
                'amount'=>$amount,
                'service'=>$request->service_name,
            ];
            Mail::to($request->email)->send(new PaymentSuccessfull($data));
        // END SENDING EMAIL ///
                $notification = array(
                    'message' => "Your payment has been succefully done",
                    'alert-type' => 'success'
                );
                return view('frontend.success_transaction',compact('get_payment'))->with($notification);
    }
    public function cashPayment(Request $request){

        $amount = (int)$request->price;
       
                $payment_id = Payment::insertGetId([
                    'user_id'=> Auth::id(),
                    'appointment_id'=>$request->appointment_id,
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone ,
                    'payment_type'=>'CASH',
                    'currency'=>'INR',
                    'amount'=>$amount,
                    'invoice_number'=>'SB'.mt_rand(10000000,99999999),
                    'payment_date'=>Carbon::now()->format('d F Y'),
                    'payment_month'=>Carbon::now()->format('F'),
                    'payment_year'=>Carbon::now()->format('Y'),
                    'salon'=>$request->product_name,
                    'service'=>$request->service_name,
                    'status'=>'pending',
                    'created_at'=>Carbon::now(),
                    
                ]);
                // $get_payment = Payment::findOrFail($payment_id);
                // $transaction_id = $get_payment->transaction_id;
                // $item = PaymentItem::insertGetId([
                //     'payment_id'=>$payment_id,
                //     'salon'=>$request->product_name,
                //     'service'=>$request->service_name,
                //     'price'=>$amount,
                //     'transaction_id'=>$transaction_id,
                //     'created_at'=>Carbon::now(),
                    
                // ]);
                // SENDING EMAIL ////

            // $get_data = PaymentItem::findOrFail($item);
            
            $data = [
                'user_name'=>$request->name,
                'salon'=>$request->product_name,
                'transaction'=>'CASH',
                'amount'=>$amount,
                'service'=>$request->service_name,
            ];
            Mail::to($request->email)->send(new PaymentSuccessfull($data));
        // END SENDING EMAIL ///
                $notification = array(
                    'message' => "Your payment has been succefully done",
                    'alert-type' => 'success'
                );
                return redirect()->to('/')->with($notification);
    }
}
