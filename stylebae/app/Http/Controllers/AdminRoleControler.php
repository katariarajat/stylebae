<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminRoleControler extends Controller
{
    public function allAdmin(){

        $users = Admin::where('type',2)->latest()->get();
        return view('backend.adminrole.all_admin',compact('users'));
    }

    public function addAdmin(){
        return view('backend.adminrole.add_admin');
    }

    public function storeAdmin(Request $request){
        $mail = $request->email;
        $exist = Admin::where('email',$mail)->get();
       
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'password'=> 'required',
        ],[

            'name.required'=> 'Name field should not be empty',
            'email.required'=> 'Email field should not be empty',
            'password.required'=> 'password field should not be empty',
          ]
        );

        $image = $request->file('profile_photo_path');
        $filename = date('YmdHi').$image->getClientOriginalName();
        Image::make($image)->resize(300,300)->save('upload/admin-images/'.$filename);
        $save_img = 'upload/admin-images/'.$filename;

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->phone = $request->phone;
        $admin->brand = $request->brand;
        $admin->category = $request->category;
        $admin->salon = $request->salon;
        $admin->user = $request->user;
        $admin->service = $request->service;
        $admin->staff = $request->staff;
        $admin->review = $request->review;
        $admin->appointment = $request->appointment;
        $admin->adminrole  = $request->adminrole;
        $admin->type  = 2;
        $admin->profile_photo_path = $save_img;
        $admin->created_at  = Carbon::now();
        $admin->save();

        $notification = array(
            'message'=> 'Admin Succesfully Stored',
            'alert-type'=>'success'
        ); 

        return redirect()->route('all.admin')->with($notification);
      
   }

   public function editAdmin($id){
       $myadmin = Admin::findOrFail($id);
       return view('backend.adminrole.edit_admin',compact('myadmin'));
   }

   public function updateAdmin(Request $request){
       $id = $request->id;
       $old_image = $request->old_img;
       if($request->file('profile_photo_path')){
        @unlink($old_image);
        $image = $request->file('profile_photo_path');
        $filename = date('YmdHi').$image->getClientOriginalName();
        Image::make($image)->resize(300,300)->save('upload/admin-images/'.$filename);
        $save_img = 'upload/admin-images/'.$filename;
        
        $admin = Admin::findOrFail($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'salon'=>$request->salon,
            'service'=>$request->service,
            'staff'=>$request->staff,
            'brand'=>$request->brand,
            'category'=>$request->category,
            'appointment'=>$request->appointment,
            'review'=>$request->review,
            'adminrole'=>$request->adminrole,
            'user'=>$request->user,
            'type'=>2,
            'profile_photo_path'=>$save_img,
            'updated_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message'=> 'admin Succesfully Updated',
            'alert-type'=>'info'
        ); 

        return redirect()->route('all.admin')->with($notification);

    }else{

        $admin = Admin::findOrFail($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'salon'=>$request->salon,
            'service'=>$request->service,
            'staff'=>$request->staff,
            'brand'=>$request->brand,
            'category'=>$request->category,
            'appointment'=>$request->appointment,
            'review'=>$request->review,
            'adminrole'=>$request->adminrole,
            'user'=>$request->user,
            'updated_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message'=> 'Admin Succesfully Updated',
            'alert-type'=>'info'
        ); 

        return redirect()->route('all.admin')->with($notification);
    }        
   }

   public function deleteAdmin($id){
    $admin = Admin::findOrFail($id);
     $img = $admin->profile_photo_path;

     unlink($img);
     Admin::findOrFail($id)->delete();

     $notification = array(
        'message'=> 'Admin Succesfully Deleted',
        'alert-type'=>'info'
    ); 

    return redirect()->route('all.admin')->with($notification);
   }

   public function allTransaction(){

    $trans = Payment::latest()->get();
    return view('backend.adminrole.all_transaction',compact('trans'));
   }
}
