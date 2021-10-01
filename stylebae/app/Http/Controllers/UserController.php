<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Multi_img;
use App\Models\Product;
use App\Models\Review;
use App\Models\Service;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Staff;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\PaymentItem;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
   
    public function ProfileView(){
        
       $id = Auth::user()->id;
       $user = User::find($id);
      
        return view('frontend.profile.profile_index', compact('user'));
    }
    public function EditProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.edit_profile', compact('user'));
    }
    public function UserProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
         $data->name = $request->name;
         $data->email = $request->email;
         $data->phone = $request->phone;
         if($request->file('profile_photo_path')){
             $file = $request->file('profile_photo_path');
             @unlink(public_path('upload/user-images/'.$data->profile_photo_path));
             $filename = date('YmdHi').$file->getClientOriginalName();
             $file->move(public_path('upload/user-images'),$filename);
             $data->profile_photo_path = $filename;
         }
         $data->save();
 
         $notification = array(
             'message'=> 'User Profile Updated Succesfully',
             'alert-type'=>'success'
         ); 
 
         return redirect()->route('dashboard')->with($notification);
    }
    public function passwordChange(){

        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password',compact('user'));
    }
    public function PasswordUpdate(Request $request){
        $id = Auth::user()->id;
       $user_id = User::find($id);
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashPassword = User::find($user_id)->password;
        if(Hash::check($request->oldpassword, $hashPassword)){
            $user = User::find($user_id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return view('auth.login');
        }
        else{
            return redirect()->back();
        }
    }

    public function SpecificSalonView( Request $request,$id,$slug){
        $salon_type = SubCategory::findOrFail($id); 
        $salon_name = $salon_type->subcategory_slug_en;
       $services = Service::with('salon')->where('subcategory_id',$salon_type->id)->get();
       
        
       
            if($slug == $salon_name ){
                $salons = Product::where('subcategory_id',$id)->paginate(3);
               
                return view('frontend.specific_salon',compact('salons','salon_type','services'));
            }
       
        
       
       
    }

    public function Citysort(Request $request){
        $city = $request->city;
    //     $salon_type = SubCategory::findOrFail($id); 
    //     $salon_name = $salon_type->subcategory_slug_en;
    //    $services = Service::with('salon')->where('subcategory_id',$salon_type->id)->get();
        $salons = Product::where('city_slug',$city)->paginate(3);
        return view('frontend.salon_sort_city',compact('salons','city'));
     }

    public function Logout(){
        Auth::logout();
        $notification = array(
            'message'=> 'User Profile Updated Succesfully',
            'alert-type'=>'success'
        ); 
        return redirect()->route('dashboard')->with($notification);
    }

    public function Detail(Request $request){
        $id = $request->id;
      
        $detail = Product::findOrFail($id);
        // dd($detail);
        $images = Multi_img::where('product_id',$id)->get();
        $staff = Staff::where('product_id',$id)->get();
        $service = Service::where('product_id',$id)->get();
        return view('frontend.detail',compact('detail','images','staff','service'));

    }

    public function SalonRegister(){
        $category = Category::latest()->get();
        $brand = Brand::latest()->get();  
        $product = Product::latest()->get(); 
        if (Auth::check()) {
            return view('frontend.salon_register',compact('category','brand','product'));
        }
        else{
            $notification = array(
                'message'=> 'You have To login First',
                'alert-type'=>'error'
            ); 
    
            return redirect()->route('login')->with($notification);
        }
    }

    public function UserTransaction(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $trans = Payment::where('user_id',$id)->orderBy('id','DESC')->get();
        // $trans = DB::table('payments')->where('user_id',$id)->paginate(5);
        return view('frontend.profile.usertransaction',compact('trans','user'));
    }

    public function paymentDetails($payment_id){
        $id = Auth::user()->id;
        $user = User::find($id);
        $transaction = Payment::where('id',$payment_id)->where('user_id',Auth::user()->id)->first();
        return view('frontend.profile.transactionDetails',compact('transaction','user'));

    }

    public function invoiceDownload($payment_id){
        $id = Auth::user()->id;
        $user = User::find($id);
        $transaction = Payment::where('id',$payment_id)->where('user_id',Auth::user()->id)->first();
        // return view('frontend.profile.invoicePdf',compact('transaction','user'));
        $pdf = PDF::loadView('frontend.profile.invoicePdf',compact('transaction','user'));
        return $pdf->download('invoice.pdf');
    
    }

    public function Userappointment(){
        $id = Auth::user()->id;
        $user = User::find($id);
        $appointment = Appointment::where('user_id',$id)->where('status',null)->orderBy('date_app','DESC')->get();
        // dd($appointment);
        return view('frontend.profile.userappointment',compact('appointment','user'));
    }
    public function appDelete($payment_id){
        
        
        $delete = Appointment::findOrFail($payment_id)->update([
            'status'=>'delete',
        ]);
       
        $notification = array(
            'message'=> 'Your Appointment has been deleted',
            'alert-type'=>'error'
        ); 
        
        return redirect()->back()->with($notification);
    }
    public function appcancel($payment_id){
        
        
        $delete = Appointment::findOrFail($payment_id)->update([
            'status'=>'cancel',
        ]);
       
        $notification = array(
            'message'=> 'Your Appointment has been Canceled',
            'alert-type'=>'info'
        ); 
        
        return redirect()->back()->with($notification);
    }

    public function SalonBrand(){

        
        $salon = Product::latest()->get();
        if (Auth::check()) {

            return view('frontend.brandregister',compact('salon'));
        }
        else{
            $notification = array(
                'message'=> 'You have To login First',
                'alert-type'=>'error'
            ); 
    
            return redirect()->route('login')->with($notification);
        }
        
    }

    public function Contact(){

        return view('frontend.contact');
    }

    public function StoreContact(Request $request){
        $request->validate([
           
            'name'=> 'required',
            'email'=> 'required',
            'subject'=> 'required',
            'message'=> 'required',
        ],[

            
            'name.required'=> 'Name is required',
            'email.required'=> 'email is required',
            'subject.required'=> 'subject is required',
            'message.required'=> 'message is required',
            
          ]
        );
        Contact::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message'=> 'Your Message Has been successfully send',
            'alert-type'=>'success'
        ); 

        return redirect()->back()->with($notification); 
    }
}
