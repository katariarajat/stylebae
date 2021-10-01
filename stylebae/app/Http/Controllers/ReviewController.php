<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function ReviewStore(Request $request){
        
        
        $user = Auth::id();
       
            
        
        $request->validate([
            'summary'=> 'required',
            'comment'=> 'required',
  
        ],[

            'summary.required'=> 'input field should not be empty',
            'comment.required'=> 'input field should not be empty',
            
          ]
        );

        Review::insert([
            'service_id'=>$request->service_id,
            'product_id'=>$request->product_id,
            'user_id'=> $user,
            'comment'=> $request->comment,
            'summary'=> $request->summary,
            'rating'=> $request->rating,
            'created_at'=> Carbon::now(),
        ]);

    
        return response()->json(['success'=> 'The Review will be approved by the Admin within 24 hours' ]);
         
    }

    public function pendingReview(){
        $review = Review::where('status',0)->orderBy('id','DESC')->get();

        return view('backend.review.pending_review',compact('review'));
    }

    public function approveReview($id){

        $review = Review::where('id',$id)->update(['status' => 1]);

        $notification = array(
            'message' => "Review has been Successfully Approved ",
            'alert-type' => 'info'
        );
    
        return redirect()->back()->with($notification);
    }

    public function publishedReview(){
        $review = Review::where('status',1)->orderBy('id','DESC')->get();

        return view('backend.review.published_review',compact('review'));
    }

    public function deleteReview($id){

        $review = Review::findOrFail($id)->delete();

        $notification = array(
            'message' => "Review has been Deleted Succeffully ",
            'alert-type' => 'error'
        );
    
        return redirect()->back()->with($notification);
    }
}
