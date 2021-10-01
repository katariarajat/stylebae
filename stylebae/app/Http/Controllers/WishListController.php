<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\WishList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function wishList(Request $request, $id){

        if (Auth::check()) {
            $exists = WishList::where('user_id',Auth::id())->where('product_id',$id)->first();
            $get_id = Service::findOrFaile($id);
            $product_id = $get_id->product_id;
            WishList::insert([
                'user_id' => Auth::id(),
                'service_id' => $id,
                'product_id' => $product_id,
                'create_at' => Carbon::now(),
            ]);

            return response()->json(['success'=>'successfully added on your wishlist']);
        }
        else{
            return response()->json(['error'=>'login first to add wishlist']);
        }
    }
}
