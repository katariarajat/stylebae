<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
   public function ScheduleAppointment(Request $request){
      
    $service = $request->service_id;
    $product = $request->product_id;
    $get_services = Service::findOrFail($service);
    $get_products = Product::findOrFail($product);
 
        if ( Auth::check()) {
            return view('frontend.appointment_schedule',compact('get_services','get_products'));
        }
        else{
            $notification = array(
                'message' => "You must Login first for Appointment",
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }
    
   }

   public function addAppointment(Request $request){

        $user = Auth::id();
        $service = $request->service_id;
        $product = $request->product_id;
        $date = $request->date_app;
        $time = $request->time_app;
        $price = $request->service_price;
        $get_services = Service::findOrFail($service);
        $get_products = Product::findOrFail($product);

        $exists = Appointment::where('user_id',Auth::id())->where('product_id',$product)
                            ->where('service_id',$service)->where('date_app',$date)->where('time_app',$time)->first();
        if (!$exists) {
            $appointment_id = Appointment::insertGetId([
                'user_id' => $user,
                'service_id' => $service,
                'product_id' => $product,
                'date_app' => $date,
                'time_app' => $time,
                'price' => $price
            ]);
            return view('frontend.loadpaymethod',compact('get_services','get_products','date','time','price','appointment_id'));
            // return response()->json(['success'=> 'Your Appointment has been scheduled' ]);
        }
        else{
            $service = $request->service_id;
            $product = $request->product_id;
            $get_services = Service::findOrFail($service);
            $get_products = Product::findOrFail($product);

            $notification = array(
                'message' => "You already have an appointmnet scheduled on this particular time",
                'alert-type' => 'error'
            );

            return view('frontend.appointment_schedule',compact('get_services','get_products'))->with($notification);
            // return response()->json(['error'=> 'Your already have an appointment on this time' ]);
           
        }
   }

   public function appointmentExist(Request $request){
    $user = Auth::id();
    $service = $request->service_id;
    $product = $request->product_id;
    $date = $request->date_app;
    $time = $request->time_app;
    $price = $request->service_price;
    $get_services = Service::findOrFail($service);
    $get_products = Product::findOrFail($product);

    $exists = Appointment::where('user_id',Auth::id())->where('product_id',$product)
                        ->where('service_id',$service)->where('date_app',$date)->where('time_app',$time)->first();
    if ($exists) {
        // return response()->json(['error'=> 'Your already have an appointment on this time' ]);
        $error_mgs = "Your already have an appointment on this time";
    }
   }

   public function appointmentView(){

    $appointment = Appointment::where('status',null)->orderBy('date_app','DESC')->get();
    return view('backend.appointment.appointment_all',compact('appointment'));
   }
   public function appointmentCancel(){

    $appointment = Appointment::where('status','cancel')->orderBy('date_app','DESC')->get();
    return view('backend.appointment.appointment_cancel',compact('appointment'));
   }
   public function appointmentDelete(){

    $appointment = Appointment::where('status','delete')->orderBy('date_app','DESC')->get();
    return view('backend.appointment.appointment_delete',compact('appointment'));
   }
}
