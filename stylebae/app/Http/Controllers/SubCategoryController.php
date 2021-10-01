<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Image;


class SubCategoryController extends Controller
{
    public function subcategoryView(){

        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory.all_subcategory',compact('subcategory','category'));
    }

    public function subcategoryStore(Request $request){
        $request->validate([
            'category_id'=> 'required',
            'subcategory_name_en'=> 'required',
            'subcategory_name_hin'=> 'required',
           
        ],[

            'subcategory_name_en.required'=> 'input field should not be empty',
            'subcategory_name_hin.required'=> 'input field should not be empty',
            'category_id.required'=> 'input field should not be empty',
          ]
        );

        $mainImg = $request->file('image');
        $filename = date('YmdHi').$mainImg->getClientOriginalName();
        Image::make($mainImg)->resize(917,1000)->save('upload/subcategory-images/'.$filename);
        $save_img = 'upload/subcategory-images/'.$filename;

        $subcategory = new Subcategory;
        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name_en = $request->subcategory_name_en;
        $subcategory->subcategory_name_hin = $request->subcategory_name_hin;
        $subcategory->subcategory_slug_en = strtolower(str_replace(' ','_',$request->subcategory_name_en));
        $subcategory->subcategory_slug_hin = str_replace(' ','_',$request->subcategory_name_hin);
        $subcategory->image = $save_img ;
        
        

        $subcategory->save();

        $notification = array(
            'message'=> 'category Succesfully Stored',
            'alert-type'=>'success'
        ); 

        return redirect()->back()->with($notification);

    }

    public function subcategoryEdit($id){

        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory.subcategory_edit', compact('subcategory','category'));
    }

    public function subcategoryUpdate(Request $request, $id){

        $old_img = SubCategory::findOrFail($id);
        unlink($old_img->image);
        $mainImg = $request->file('image');
       
        $filename = date('YmdHi').$mainImg->getClientOriginalName();
        Image::make($mainImg)->resize(917,1000)->save('upload/subcategory-images/'.$filename);
        $save_img = 'upload/subcategory-images/'.$filename;

            $subcategory = SubCategory::findOrFail($id)->update([
                'category_id'=>$request->category_id,
                'subcategory_name_en'=>$request->subcategory_name_en,
                'subcategory_name_hin'=>$request->subcategory_name_hin,
                'subcategory_slug_en'=>strtolower(str_replace(' ','_',$request->subcategory_name_en)),
                'subcategory_slug_hin'=>str_replace(' ','_',$request->subcategory_name_hin),
                'image'=>$save_img,
                
               
            ]);

            $notification = array(
                'message'=> 'subcategory Succesfully Updated',
                'alert-type'=>'info'
            ); 
    
            return redirect()->route('all.subcategory')->with($notification);
            

    }

    public function subcategoryDelete($id){
        $subcategory = SubCategory::findOrFail($id);
        
        SubCategory::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }
}
