<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categoryView(){

        $category = Category::latest()->get();
        return view('backend.category.all_category',compact('category'));
    }

    public function categoryStore(Request $request){
        $request->validate([
            'category_name_en'=> 'required',
            'category_name_hin'=> 'required',
            // 'category_icon'=> 'required',
        ],[

            'category_name_en.required'=> 'input field should not be empty',
            'category_name_hin.required'=> 'input field should not be empty',
          ]
        );

       

        $category = new Category;
        $category->category_name_en = $request->category_name_en;
        $category->category_name_hin = $request->category_name_hin;
        $category->category_slug_en = strtolower(str_replace(' ','_',$request->category_name_en));
        $category->category_slug_hin = str_replace(' ','_',$request->category_name_hin);
        
        // $category->category_icon = $request->category_icon;

        $category->save();

        $notification = array(
            'message'=> 'category Succesfully Stored',
            'alert-type'=>'success'
        ); 

        return redirect()->back()->with($notification);

    }

    public function categoryEdit($id){

        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    public function categoryUpdate(Request $request, $id){

    
            $category = Category::findOrFail($id)->update([
                'category_name_en'=>$request->category_name_en,
                'category_name_hin'=>$request->category_name_hin,
                'category_slug_en'=>strtolower(str_replace(' ','_',$request->category_name_en)),
                'category_slug_hin'=>str_replace(' ','_',$request->category_name_hin),
                // 'category_icon'=>$request->category_icon,
               
            ]);

            $notification = array(
                'message'=> 'category Succesfully Updated',
                'alert-type'=>'info'
            ); 
    
            return redirect()->route('all.category')->with($notification);
            

    }

    public function categoryDelete($id){
        $category = Category::findOrFail($id);
        
        Category::findOrFail($id)->delete();
        return redirect()->back();
    }
}
