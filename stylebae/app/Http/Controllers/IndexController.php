<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Mockery\Matcher\Subset;

class IndexController extends Controller
{
  public function HomeView(){

    $salon_type = SubCategory::latest()->get();
    $service = Service::latest()->get();
    $salon = Product::latest()->get();
    
    return view('frontend.index',compact('salon_type','service','salon'));
  }
}
