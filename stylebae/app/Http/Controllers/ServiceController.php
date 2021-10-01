<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Service;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Multi_img;


class ServiceController extends Controller
{
    public function serviceView(){

        $category = Category::latest()->get();  
        $subcategory = SubCategory::latest()->get();
        $product = Product::latest()->get();
        $service = Service::latest()->get();
        return view('backend.product.service.all_service',compact('category','subcategory','service','product'));
    }

    // Javascript for getting sub categories automatic
    public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function serviceStore(Request $request){
        $request->validate([
            'scategory_id'=> 'required',
            'ssubcategory_id'=> 'required',
            'service_name_en'=> 'required',
            // 'service_name_hin'=> 'required',
            'service_price'=> 'required',
           
           
        ],[

            'service_name_en.required'=> 'input field should not be empty',
            // 'service_name_hin.required'=> 'input field should not be empty',
            'category_id.required'=> 'input field should not be empty',
            'service_price.required'=> 'input field should not be empty',
            'subcategory_id.required'=> 'input field should not be empty',
            
          ]
        );

       

        $service = new Service;
        $service->category_id = $request->scategory_id;
        $service->subcategory_id = $request->ssubcategory_id;
        $service->product_id = $request->sproduct_id;
        $service->service_name_en = $request->service_name_en;
        $service->service_name_hin = $request->service_name_hin;
        $service->service_slug_en = strtolower(str_replace(' ','_',$request->service_name_en));
        $service->service_slug_hin = str_replace(' ','_',$request->service_name_hin);
        $service->price = $request->service_price;
        $service->discount = $request->discount;
        
        

        $service->save();

        $notification = array(
            'message'=> 'Service Succesfully Stored',
            'alert-type'=>'success'
        ); 

        return redirect()->back()->with($notification);

    }

    public function serviceEdit($id){

        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $service = Service::findOrFail($id);
        return view('backend.product.service.service_edit', compact('subcategory','category','service'));
    }

    public function serviceUpdate(Request $request, $id){

    
            $service = Service::findOrFail($id)->update([
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'service_name_en'=>$request->service_name_en,
                'service_name_hin'=>$request->service_name_hin,
                'service_slug_en'=>strtolower(str_replace(' ','_',$request->service_name_en)),
                'service_slug_hin'=>str_replace(' ','_',$request->service_name_hin),
                'price'=>$request->price,
                'discount'=>$request->discount,
                
               
            ]);

            $notification = array(
                'message'=> 'service Succesfully Updated',
                'alert-type'=>'info'
            ); 
    
            return redirect()->route('all.service')->with($notification);
            

    }

    public function serviceDelete($id){
        $service = Service::findOrFail($id);
        
        Service::findOrFail($id)->delete();
        return redirect()->back();
    }

    //// Product methods /////
    // public function productView(){
    //     $product = Product::latest()->get();

    //     return view('backend.product.manage_product',compact('product'));
    // }

    // public function ProductEdit($id){
    //     $category = Category::latest()->get();
    //     $brand = Brand::latest()->get();
    //     $subcategory = SubCategory::latest()->get();
    //     $multiImg = Multi_img::where('product_id',$id)->get();
    //     $salon = Product::findOrFail($id);
    //         return view('backend.product.product_edit',compact('salon','brand','subcategory','category','multiImg'));
    // }

}
