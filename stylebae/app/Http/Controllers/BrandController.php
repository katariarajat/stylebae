<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use Image;

class BrandController extends Controller
{
    public function brandView(){

        $brand = Brand::latest()->get();
        $salon = Product::latest()->get();
        return view('backend.brand.all_brand', compact('brand','salon'));
    }

    public function brandStore(Request $request){
        $exist = Brand::where('salon',$request->salon)->get();
        // dd($exist);
        // if ($exist) {
        //     $notification = array(
        //         'message'=> 'This salon has already a Brand assigned',
        //         'alert-type'=>'error'
        //     ); 
    
        //     return redirect()->back()->with($notification);
    
        // }
        
            
        
        $request->validate([
            'brand_name_en'=> 'required',
            
            'brand_image'=> 'required',
            'salon'=>'required',
        ],[

            'brand_name_en.required'=> 'brand name field should not be empty',
            
          ]
        );

        $image = $request->file('brand_image');
        $filename = date('YmdHi').$image->getClientOriginalName();
        Image::make($image)->resize(300,300)->save('upload/brand-images/'.$filename);
        $save_img = 'upload/brand-images/'.$filename;

        $brand = new Brand;
        $brand->brand_name_en = $request->brand_name_en;
        $brand->brand_name_hin = $request->brand_name_hin;
        $brand->salon = $request->salon;
        $brand->user = $request->user;
        $brand->brand_slug_en = strtolower(str_replace(' ','_',$request->brand_name_en));
        $brand->brand_slug_hin = str_replace(' ','_',$request->brand_slug_hin);
        
        $brand->brand_image = $save_img;
        
        $brand->save();

        $notification = array(
            'message'=> 'Brand Succesfully Stored',
            'alert-type'=>'success'
        ); 

        return redirect()->back()->with($notification);
    
    

    }

    public function brandEdit($id){

        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    }

    public function BrandUpdate(Request $request, $id){

        $old_img = $request->oldImage;

        if($request->file('brand_image')){
            unlink($old_img);
            $image = $request->file('brand_image');
            $filename = date('YmdHi').$image->getClientOriginalName();
            Image::make($image)->resize(300,300)->save('upload/brand-images/'.$filename);
            $save_img = 'upload/brand-images/'.$filename;

            $brand = Brand::findOrFail($id)->update([
                'brand_name_en'=>$request->brand_name_en,
                'brand_name_hin'=>$request->brand_name_hin,
                'brand_slug_en'=>strtolower(str_replace('','_',$request->brand_name_en)),
                'brand_slug_hin'=>str_replace('','_',$request->brand_name_hin),
                'brand_image'=> $save_img ,
            ]);

            $notification = array(
                'message'=> 'Brand Succesfully Updated',
                'alert-type'=>'info'
            ); 
    
            return redirect()->route('all.brands')->with($notification);

        }else{

            $brand = Brand::findOrFail($id)->update([
                'brand_name_en'=>$request->brand_name_en,
                'brand_name_hin'=>$request->brand_name_hin,
                'brand_slug_en'=>strtolower(str_replace('','_',$request->brand_name_en)),
                'brand_slug_hin'=>str_replace('','_',$request->brand_name_hin),
               
            ]);

            $notification = array(
                'message'=> 'Brand Succesfully Updated',
                'alert-type'=>'info'
            ); 
    
            return redirect()->route('all.brands')->with($notification);
        }        

    }


    public function brandDelete($id){
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;

        unlink($img);
        Brand::findOrFail($id)->delete();
        return redirect()->back();
    }
}
