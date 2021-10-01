<?php

namespace App\Http\Controllers;

use App\Mail\SalonRegister;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Multi_img;
use App\Models\Service;
use App\Models\Staff;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function addProduct(){
        $category = Category::latest()->get();
        $brand = Brand::latest()->get();
       
            return view('backend.product.add_product',compact('category','brand'));
      
        
    }
    public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function storeProduct(Request $request){
        $request->validate([
            'product_name_en'=> 'required',
            'category_id'=> 'required',
            'subcategory_id'=> 'required',
            'city'=> 'required',
            'long_desc_en'=> 'required',
            'product_address'=> 'required',
            'product_mainImg'=> 'required',
            'phone'=> 'required',
            'opening_time'=> 'required',
            'closing_time'=> 'required',
            'multi_img'=> 'required',
        ],[

            'product_name_en.required'=> 'Salon Name is required',
            'category_id.required'=> 'Salon Category is required',
            'subcategory_id.required'=> 'Salon subcategory is required',
            'city.required'=> 'The city is required',
            'long_desc_en.required'=> 'Salon Description is required',
            'product_address.required'=> 'Salon address is required',
            'product_mainImg.required'=> 'Salon Image is required',
            'phone.required'=> 'Phone Number is required',
            'opening_time.required'=> 'Salon Opening time is required',
            'closing_time.required'=> 'Salon Closing time is required',
            'multi_img.required'=> 'Salon Images is required',
            
          ]
        );
        $mainImg = $request->file('product_mainImg');
        $filename = date('YmdHi').$request->product_name_en.$mainImg->getClientOriginalName();
        Image::make($mainImg)->resize(917,1000)->save('upload/product-images/mainImg/'.$filename);
        $save_img = 'upload/product-images/mainImg/'.$filename;

        $product_id = Product::insertGetId([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name_en'=>$request->product_name_en,
            'city'=>$request->city,
            'product_slug_en'=>strtolower(str_replace(' ','_',$request->city)),
            'product_slug_en'=>strtolower(str_replace(' ','_',$request->product_name_en)),
            'product_slug_hin'=>str_replace(' ','_',$request->product_name_hin),
            'long_desc_en'=>$request->long_desc_en,
            'user'=>$request->user_name,
            'product_mainImg'=>$save_img,
            'product_address'=>$request->product_address,
            'phone'=>$request->phone,
            'opening_time'=>$request->opening_time,
            'closing_time'=>$request->closing_time,
            'created_at'=>Carbon::now(),
        ]);
       
        // SENDING EMAIL ////

        $get_data = Product::findOrFail($product_id);
        $mail = Auth::user()->email;
        $data = [
            'user_name'=>$get_data->user,
            'product_name'=>$get_data->product_name_en,
            'category'=>$get_data->category_id,
            'subcategory'=>$get_data->subcategory_id,
            'city'=>$get_data->city,
        ];
        Mail::to($mail)->send(new SalonRegister($data));
        // END SENDING EMAIL ///

        // $product->brand_id = $request->brand_id;
        // $product->category_id = $request->category_id;
        // $product->subcategory_id = $request->subcategory_id;
      
        // $product->product_name_en= $request->product_name_en;
        // $product->city = $request->city;
        // $product->product_slug_en  = strtolower(str_replace(' ','_',$request->product_name_en));
        // $product->product_slug_hin  = str_replace(' ','_',$request->product_name_hin);
       
      
        // $product->long_desc_en   = $request->long_desc_en;
        // $product->user  = $request->user_name;
        // $product->product_mainImg = $save_img;
        // $product->product_address = $request->product_address;
        // $product->phone = $request->phone;
        // $product->opening_time = $request->opening_time;
        // $product->closing_time = $request->closing_time;
        // $product->created_at = Carbon::now();

        // $product->save();

        ////// Mlti Images upload //////////
        $multi = $request->file('multi_image');
        $request->validate([
           
            'multi_image'=> 'required',
        ],[

            
            'multi_image.required'=> 'Salon Images is required',
            
          ]
        );
        $get_prod = Product::findOrfail($product_id);
        foreach( $multi as $img){
            $imgname = date('YmdHi').$img->getClientOriginalName();
            Image::make($img)->resize(917,1000)->save('upload/product-images/multiImg/'.$imgname);
            $save_multi_img = 'upload/product-images/multiImg/'.$imgname;

            $multi_image = new Multi_img;
            $multi_image->product_id = $product_id;
            $multi_image->photo_name  = $save_multi_img ;
            $multi_image->created_at = Carbon::now();

            $multi_image->save();
        }
        ////// end Multi image upload //////

        $notification = array(
            'message'=> 'Salon Succesfully Registered',
            'alert-type'=>'success'
        ); 

        return redirect()->back()->with($notification);
   } //// end Method insert product /////

   public function ProductEdit($id){
        $category = Category::latest()->get();
        $brand = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $multiImg = Multi_img::where('product_id',$id)->get();
        $salon = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('salon','brand','subcategory','category','multiImg'));
    }

   public function ProductUpdate(Request $request){
       $salon_id = $request->id;
       
       $salon = Product::findOrfail($salon_id)->update([
    
        'brand_id' => $request->brand_id,
       'category_id' => $request->category_id,
        'subcategory_id' => $request->subcategory_id,
      
        'product_name_en'=> $request->product_name_en,
        'product_name_hin' => $request->product_name_hin,
        'product_slug_en'  => strtolower(str_replace(' ','_',$request->product_name_en)),
        'product_slug_hin'  => str_replace(' ','_',$request->product_name_hin),
       
        'short_desc_en'   => $request->short_desc_en,
        'short_desc_hin'   => $request->short_desc_hin,
        'long_desc_en'   => $request->long_desc_en,
        'long_desc_hin'  => $request->long_desc_hin,
       
        'product_address' => $request->product_address,
        'phone' => $request->phone,
        'opening_time' => $request->opening_time,
        'closing_time' => $request->closing_time,
        'created_at' => Carbon::now()

       ]);

       $notification = array(
        'message'=> 'Salon Succesfully Updated',
        'alert-type'=>'info'
         ); 

    return redirect()->route('product.view')->with($notification);
   } 

   public function SalonMultiImgUpdate(Request $request){
       $imgs = $request->multi_img;

       foreach($imgs as $id => $img){
           $imgDel = Multi_img::findOrFail($id);
           unlink($imgDel->photo_name);
           $imgname = date('YmdHi').$img->getClientOriginalName();
           Image::make($img)->resize(917,1000)->save('upload/product-images/multiImg/'.$imgname);
           $update_multi_img = 'upload/product-images/multiImg/'.$imgname;

           Multi_img::where('id',$id)->update([
               'photo_name'=> $update_multi_img,
               'updated_at'=> Carbon::now(),
           ]);
       }

       $notification = array(
        'message'=> 'Salon  Image Succesfully Updated',
        'alert-type'=>'info'
        ); 

        return redirect()->back()->with($notification);

   }

   public function SalonMainImgUpdate(Request $request){

    $salon = $request->id;
    $old_img = $request->old_img;
    unlink($old_img);
    $mainImg = $request->file('product_mainImg');
    $filename = date('YmdHi').$mainImg->getClientOriginalName();
    Image::make($mainImg)->resize(917,1000)->save('upload/product-images/mainImg/'.$filename);
    $update_main_img = 'upload/product-images/mainImg/'.$filename;

    Product::findOrFail($salon)->update([
        'product_mainImg'=> $update_main_img,
        'updated_at'=> Carbon::now(),
    ]);

    $notification = array(
        'message'=> 'Salon  Image Succesfully Updated',
        'alert-type'=>'info'
    ); 

        return redirect()->back()->with($notification);

   }

   public function SalonDelete($id){
       $main_img = Product::findOrFail($id);
       unlink($main_img->product_mainImg);
       Product::findOrFail($id)->delete();

       $images = Multi_img::where('product_id',$id)->get();
       
      foreach($images as $img){
          unlink($img->photo_name);
          Multi_img::where('product_id',$id)->delete();
      }
       return redirect()->back();
   }
   public function SalonMultiImgDelete($id){
       $old_img = Multi_img::findOrFail($id);
       unlink($old_img->photo_name);
       Multi_img::findOrFail($id)->delete();
       return redirect()->back();
   }

   public function SalonDetail($id){
    $category = Category::latest()->get();
    $brand = Brand::latest()->get();
    $subcategory = SubCategory::latest()->get();
    $multiImg = Multi_img::where('product_id',$id)->get();
    $salon = Product::findOrFail($id);
    $service = Service::where('product_id',$id)->get();
    $staff = Staff::where('product_id',$id)->get();
    return view('backend.product.product_detail',compact('salon','brand','subcategory','category','multiImg','service','staff'));
   }

   public function SalonInactive($id){
    
    $salon = Product::findOrFail($id)->update([
        'status'=> 0,
        'updated_at'=> Carbon::now(),
       
    ]);

    $notification = array(
        'message'=> 'Salon Inactive',
        'alert-type'=>'error'
    ); 
    return redirect()->back()->with($notification);
   }

   public function SalonActive($id){
   
    $salon = Product::findOrFail($id)->update([
        'status'=> 1,
        'updated_at'=> Carbon::now(),
    ]);
    $notification = array(
        'message'=> 'Salon Active',
        'alert-type'=>'success'
    ); 
    return redirect()->back()->with($notification);
   }

   public function productView(){
    $product = Product::latest()->get();

    return view('backend.product.manage_product',compact('product'));
    }

    public function SalonViewAjax($id){
        $service = Service::findOrFail($id);
        $salon_id = $service->product_id;
        $salon = Product::findOrFail($salon_id);
        $service_price = $service->price;
        $service_discount = $service->discount;

        return response()->json(array(
            'service' => $service,
            'service_price' => $service_price,
            'discount' => $service_discount,
            'salon' => $salon,
        ));

    }

    public function SearchSalon(Request $request){
        $item = $request->search;
        // echo"$item";
        $request->validate(["search"=>"required"]);
        $salons = Product::where('product_name_en','LIKE',"%$item%")->get();
        return view('frontend.search',compact('salons'));
    }

    public function AdvanceSearchSalon(Request $request){

        $item = $request->search;
       
        $request->validate(["search"=>"required"]);
        $salons = Product::where('product_name_en','LIKE',"%$item%")->where('status',1)->select('product_name_en','product_mainImg','city','id')->limit(5)->get();
        return view('frontend.advance_search',compact('salons'));

    }

    public function SingleSearchSalon(Request $request){
        $id = $request->salon_id;
        $salons = Product::where('id', $id)->get();
        // dd($salon);
        return view('frontend.search',compact('salons'));
    }

    
}
