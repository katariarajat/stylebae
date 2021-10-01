<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;
use Image;

use function PHPUnit\Framework\isEmpty;

class AdminProfileController extends Controller
{
    public function adminProfile(){
        
            $id = Auth::guard('admin')->user();
            $admindata = Admin::find($id);
            dd($id);
            return view('backend.admin.admin_profile_view', compact('admindata'));
        
       
    }

    public function adminProfileEdit(){
        $id = Auth::user()->id;
        $editdata = Admin::find($id);
        return view('backend.admin.admin_profile_edit', compact('editdata'));
    }


    public function adminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin-images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin-images/'),$filename);
            // Image::make($file)->resize(300,300)->save('upload/admin-images/'.$filename);
            // $save_img = 'upload/admin-images/'.$filename;
            $data->profile_photo_path = $filename;
        }
        $data->save();

        $notification = array(
            'message'=> 'Admin Profile Updated Succesfully',
            'alert-type'=>'success'
        ); 

        return redirect()->route('admin.profile')->with($notification);
    }

    public function adminChangePassword(){
        return view('backend.admin.admin_change_password');
    }

    public function adminUpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashPassword)){
            $admin = Admin::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }
        else{
            return redirect()->back();
        }
    }

    public function UserView(){
        $users = User::latest()->get();
        return view('backend.user.user_all',compact('users'));
    }
    public function UserEdit(Request $request,$id){

        $user = User::findOrfail($id);

        return view('backend.user.user_edit',compact('user'));
    }
    public function UserProfileUpdate(Request $request){
        $users = User::latest()->get();
        $myid = $request->id;
        $data = User::find($myid);
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
 
         return view('backend.user.user_all',compact('users'))->with($notification);
    }

    public function userDelete($id){
        $user = User::findOrFail($id);
        $img = $user->profile_photo_path;
        
        if ($img) {
            
            @unlink(public_path('upload/user-images/'.$user->profile_photo_path));
            User::findOrFail($id)->delete();
            return redirect()->back();
        }
        else {
            User::findOrFail($id)->delete();
            return redirect()->back(); 
        }
       
    }
}
