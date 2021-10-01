<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Staff;
use App\Models\Multi_img;
use Image;
use Carbon\Carbon;
class StaffController extends Controller
{
    public function staffView(){

        $salon = Product::latest()->get();
        $staff = Staff::latest()->get();
        return view('backend.product.staff.all_staff',compact('salon','staff'));
    }

    public function staffStore(Request $request){

        $photo = $request->file('photo');
       
        $filename = date('YmdHi').$photo->getClientOriginalName();
        Image::make($photo)->resize(80,80)->save('upload/product-images/staffImg/'.$filename);
        $save_img = 'upload/product-images/staffImg/'.$filename;

        $staff = new Staff;
        $staff->product_id = $request->product_id;
        $staff->staff_member_name_en= $request->staff_member_name_en;
        $staff->staff_member_name_hin = $request->staff_member_name_hin;
        $staff->staff_member_slug_en  = strtolower(str_replace(' ','_',$request->staff_member_name_en));
        $staff->staff_member_slug_hin  = str_replace(' ','_',$request->staff_member_name_hin);
       
        $staff->title   = $request->title;
       
        $staff->photo = $save_img;
       
        $staff->created_at = Carbon::now();

        $staff->save();
       

        $notification = array(
            'message'=> 'Staff member successfully added',
            'alert-type'=>'success'
        ); 

        return redirect()->back()->with($notification);
   } //// end Method insert product /////


   public function staffEdit($id){
    $salon = Product::latest()->get();
    $staff = Staff::findOrFail($id);
    return view('backend.product.staff.staff_edit',compact('salon','staff'));
   }

   public function staffUpdate(Request $request){

    $staff_id = $request->id;
    $imgDel = Staff::findOrFail($staff_id);
    $photo = $request->file('photo');
   
    @unlink($imgDel->photo);
    $filename = date('YmdHi').$photo->getClientOriginalName();
    Image::make($photo)->resize(80,80)->save('upload/product-images/staffImg/'.$filename);
    $save_img = 'upload/product-images/staffImg/'.$filename;

    $staff = Staff::findOrFail($staff_id)->update([
        'product_id'=>$request->product_id,
        'staff_member_name_en'=>$request->staff_member_name_en,
        'staff_member_name_en'=>$request->staff_member_name_en,
        'staff_member_name_hin'=>$request->staff_member_name_hin,
        'staff_member_slug_en' => strtolower(str_replace(' ','_',$request->staff_member_name_en)),
         'staff_member_slug_hin' => str_replace(' ','_',$request->staff_member_name_hin),
        'title'=>$request->title,
        'photo'=>$save_img,
        
    ]);
    $notification = array(
        'message'=> 'Staff Succesfully Updated',
        'alert-type'=>'info'
    ); 

    return redirect()->route('all.staff')->with($notification);
   }

   public function staffDelete($id){
    $staff = Staff::findOrFail($id);
    
     $staff->delete();
    return redirect()->back();
    }

   

}
