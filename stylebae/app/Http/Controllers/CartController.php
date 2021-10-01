<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddToCartAjax(Request $request, $id)
    {
        $service = Service::findOrFail($id);
            if($service->discount == "No Discount"){
                Cart::add([
                    'id' => $id,
                     'name' => $request->salon_name,
                     'qty' => 1,
                     'tax' => 0,
                       'price' => $service->price,
                       'weight' => 1,
                        'options' => [
                            'image' => $request->salon_img,
                            'service' => $request->service_name,
                         ]
                ]);
                return response()->json(['success'=> 'successfully added on Your Cart' ]);
            }
            else{
                Cart::add([
                    'id' => $id,
                     'name' => $request->salon_name,
                     'service' => $request->service_name,
                     'qty' => 1,
                     'tax' =>0,
                       'price' => $service->discount,
                       'weight' => 1,
                        'options' => [
                            'image' => $request->salon_img,
                            'service' => $request->service_name,
                         ]
                ]);
                return response()->json(['success'=> 'successfully added on Your Cart' ]);
            }
       
    }

    public function ReadCartContent(){
        $carts =Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $tax = Cart::setGlobalTax(0);
        return response()->json(array(
            'carts' =>  $carts,
            'cartQty' =>   $cartQty,
            'cartTotal' => round($cartTotal),
        ));
    }

   public function MycartView(){
    
    $cartTotal = Cart::total();
    if ($cartTotal == 0) {

        $notification = array(
            'message'=> 'Cart is empty',
            'alert-type'=>'info'
        ); 
        return redirect()->to('/')->with($notification);
    }
    else {
        return view('frontend.mycart_view');
    }
        
  
    
   }

   public function MycartGet(){
    $carts =Cart::content();
    $cartQty = Cart::count();
    $cartTotal = Cart::total();
    return response()->json(array(
        'carts' =>  $carts,
        'cartQty' =>   $cartQty,
        'cartTotal' => round($cartTotal),
    ));
  }

  public function CartRemove($rowId){
      Cart::remove($rowId);
      return response()->json(['error'=> 'successfully Removed from your cart' ]);

  }
}
