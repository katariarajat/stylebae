<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\AdminController;
use App\Http\controllers\BrandController;
use App\Http\controllers\AdminProfileController;
use App\Http\controllers\CategoryController;
use App\Http\controllers\SubCategoryController;
use App\Http\controllers\ServiceController;
use App\Http\controllers\ProductController;
use App\Http\controllers\StaffController;
use App\Http\controllers\UserController;
use App\Http\controllers\IndexController;
use App\Http\controllers\LanguageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminRoleControler;
use App\Models\Product;
use App\Models\Review;
use App\Models\Service;
use App\Models\SubCategory;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     $salon_type = SubCategory::latest()->get();
//     return view('frontend.index',compact('salon_type'));
// });

Route::get('/', [IndexController::class, 'HomeView']);

// Admin All Routes
Route::group(['prefix'=>'admin','middleware'=>['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});
Route::prefix('admin')->group(function(){
    Route::get('/logout',[AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/profile',[AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/profile/edit',[AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('/profile/store',[AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('/change/password',[AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('/update/password',[AdminProfileController::class, 'adminUpdatePassword'])->name('update.admin.password');
    Route::get('/user/view',[AdminProfileController::class, 'UserView'])->name('user.view');
    Route::get('/user/edit/{id}',[AdminProfileController::class, 'UserEdit'])->name('user.edit');
    Route::post('/profile/update',[AdminProfileController::class, 'UserProfileUpdate'])->name('admin.user.profile.update');
    Route::get('/delete/{id}',[AdminProfileController::class, 'userDelete'])->name('user.delete');
    
});


////// Admin User Role Route////////

Route::prefix('admin/role')->group(function(){
    Route::get('/user/all',[AdminRoleControler::class, 'allAdmin'])->name('all.admin');
    Route::get('/user/add',[AdminRoleControler::class, 'addAdmin'])->name('add.admin');
    Route::post('/user/store',[AdminRoleControler::class, 'storeAdmin'])->name('admin.user.store');
    Route::get('/user/edit/{id}',[AdminRoleControler::class, 'editAdmin'])->name('admin.role.edit');
    Route::get('/user/delete/{id}',[AdminRoleControler::class, 'deleteAdmin'])->name('admin.role.delete');
    Route::post('/user/update',[AdminRoleControler::class, 'updateAdmin'])->name('admin.user.update');
    Route::get('/transaction',[AdminRoleControler::class, 'allTransaction'])->name('all.transaction');
});


Route::middleware(['auth:sanctum,admin', 'verified'])->get('admin/dashboard', function () {
    return view('backend.admin.index');
})->name('dashboard');


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $salon_type = SubCategory::latest()->get();
    $service = Service::latest()->get();
    $salon = Product::latest()->get();
    $review = Review::where('status',1)->get();
    
    return view('frontend.index',compact('salon_type','service','salon','review'));
    
})->name('dashboard');

// Brand All Routes
Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class, 'brandView'])->name('all.brands');
    Route::post('/store',[BrandController::class, 'brandStore'])->name('brand.store');
    Route::get('/edit/{id}',[BrandController::class, 'brandEdit'])->name('brand.edit');
    Route::post('/update/{id}',[BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}',[BrandController::class, 'brandDelete'])->name('brand.delete');

});

// Category All Routes
Route::prefix('category')->group(function(){
    Route::get('/view',[CategoryController::class, 'categoryView'])->name('all.category');
    Route::post('/store',[CategoryController::class, 'categoryStore'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('/update/{id}',[CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class, 'categoryDelete'])->name('category.delete');

    //Sub Category All Routes
    Route::prefix('subcategory')->group(function(){
        Route::get('/view',[SubCategoryController::class, 'subcategoryView'])->name('all.subcategory');
        Route::post('/store',[SubCategoryController::class, 'subcategoryStore'])->name('subcategory.store');
        Route::get('/edit/{id}',[SubCategoryController::class, 'subcategoryEdit'])->name('subcategory.edit');
        Route::post('/update/{id}',[SubCategoryController::class, 'subcategoryUpdate'])->name('subcategory.update');
        Route::get('/delete/{id}',[SubCategoryController::class, 'subcategoryDelete'])->name('subcategory.delete');
        Route::get('/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    });

});    

// Product All Routes
Route::prefix('product')->group(function(){
     Route::get('/add',[ProductController::class, 'addProduct'])->name('add.product');
     Route::post('/store',[ProductController::class, 'storeProduct'])->name('product.store');
    Route::get('/view',[ProductController::class, 'productView'])->name('product.view');
    Route::get('/edit/{id}',[ProductController::class, 'ProductEdit'])->name('product.edit');
     Route::get('/subcategory/ajax/{category_id}', [ProductController::class, 'GetSubCategory']);
    // // Route::get('/subsubcategory/ajax/{subcategory_id}', [ProductController::class, 'GetSubSubCategory']);
    Route::get('/detail/{id}',[ProductController::class, 'SalonDetail'])->name('salon.detail');
    Route::post('/update',[ProductController::class, 'ProductUpdate'])->name('product.update');
    Route::post('/update/multi/images',[ProductController::class, 'SalonMultiImgUpdate'])->name('update.salon.multi.img');
    Route::post('/update/main/image',[ProductController::class, 'SalonMainImgUpdate'])->name('update.salon.main.img');
    Route::get('salon/delete/{id}',[ProductController::class, 'SalonDelete'])->name('salon.delete');
    Route::get('salon/multiImg/delete/{id}',[ProductController::class, 'SalonMultiImgDelete'])->name('salon.multi.img.delete');
    Route::get('/salon/active/{id}',[ProductController::class, 'SalonActive'])->name('salon.active');
    Route::get('/salon/inactive/{id}',[ProductController::class, 'SalonInactive'])->name('salon.inactive');
    Route::get('/view/modal/{id}',[ProductController::class, 'SalonViewAjax']);
    


    Route::prefix('service')->group(function(){
        Route::get('/view',[ServiceController::class, 'serviceView'])->name('all.service');
        Route::post('/store',[ServiceController::class, 'serviceStore'])->name('service.store');
        Route::get('/edit/{id}',[ServiceController::class, 'serviceEdit'])->name('service.edit');
        Route::post('/update/{id}',[ServiceController::class, 'serviceUpdate'])->name('service.update');
        Route::get('/delete/{id}',[ServiceController::class, 'serviceDelete'])->name('service.delete');
        Route::get('/ajax/{category_id}', [ServiceController::class, 'GetSubCategory']);
        // Route::get('/productview',[ServiceController::class, 'productView'])->name('product.view');
        // Route::get('/salon/edit/{id}',[ServiceController::class, 'ProductEdit'])->name('product.edit');
    });
    Route::prefix('staff')->group(function(){
        Route::get('/view',[StaffController::class, 'staffView'])->name('all.staff');
        Route::post('/store',[StaffController::class, 'staffStore'])->name('staff.store');
        Route::get('/edit/{id}',[StaffController::class, 'staffEdit'])->name('staff.edit');
        Route::post('/update',[StaffController::class, 'staffUpdate'])->name('staff.update');
        Route::get('/delete/{id}',[StaffController::class, 'staffDelete'])->name('staff.delete');
        Route::get('/ajax/{category_id}', [StaffController::class, 'GetSubCategory']);
       
       
    });

});

/////// User All Routes /////
Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'user'],function(){
    Route::get('/profile',[UserController::class, 'profileView'])->name('user.profile'); 
    Route::post('/profile/update',[UserController::class, 'UserProfileUpdate'])->name('user.profile.update'); 
    Route::get('/profile/edit',[UserController::class, 'EditProfile'])->name('user_profile.edit');
    Route::get('/change/password',[UserController::class, 'passwordChange'])->name('user.passowrd.change');
    Route::post('/password/update',[UserController::class, 'PasswordUpdate'])->name('update.user.password');
    Route::get('/logout',[UserController::class, 'Logout'])->name('user.logout');
    Route::get('/transaction',[UserController::class, 'UserTransaction'])->name('user.transaction');
    Route::get('/payment/details/{payment_id}',[UserController::class, 'paymentDetails']);
    Route::get('/invoice/download/{payment_id}',[UserController::class, 'invoiceDownload']);
    Route::get('/appointment',[UserController::class, 'Userappointment'])->name('user.appointment');
    Route::get('/app/delete/{payment_id}',[UserController::class, 'appDelete']);
    Route::get('/app/cancel/{payment_id}',[UserController::class, 'appcancel']);  
});
Route::prefix('user')->group(function(){
    
    
    Route::get('/contact',[UserController::class, 'Contact'])->name('contact');
    Route::post('/contact/store',[UserController::class, 'StoreContact'])->name('contact.store');
    Route::get('/salon/{id}/{slug}',[UserController::class, 'SpecificSalonView']);
    
    Route::get('/sort/city',[UserController::class, 'Citysort'])->name('city.sort');
    
   
 
});
Route::get('/salon',[UserController::class, 'SalonRegister'])->name('salon.registration');
Route::get('/salon/brand',[UserController::class, 'SalonBrand'])->name('salon.brand');
Route::post('/salon/detail',[UserController::class, 'Detail'])->name('detail.salon');
//////// Multi Language All Routes ////////

Route::get('/language/hindi',[languageController::class, 'Hindi'])->name('hindi.language');
Route::get('/language/english',[languageController::class, 'English'])->name('english.language');


/////// Cart All Routes //////
Route::post('/cart/data/store{id}',[CartController::class, 'AddToCartAjax']);
Route::get('/read/service/cart',[CartController::class, 'ReadCartContent']);
Route::get('/mycart',[CartController::class, 'MycartView'])->name('mycart');
Route::get('/user/mycart/get/ajax',[CartController::class, 'MycartGet']);
Route::get('/user/cart/remove/{rowId}',[CartController::class, 'CartRemove']);


/////// All Appointment Routes ///////
Route::post('/schedule/appointment',[AppointmentController::class, 'ScheduleAppointment'])->name('schedule.appointment');
Route::post('/appointment/store',[AppointmentController::class, 'addAppointment'])->name('appointment.store');
Route::get('/appointment/view',[AppointmentController::class, 'appointmentView'])->name('appointment.view');
Route::get('/appointment/cancel',[AppointmentController::class, 'appointmentCancel'])->name('appointment_cancel');
Route::get('/appointment/delete',[AppointmentController::class, 'appointmentDelete'])->name('appointment.delete');

Route::post('/appointment/exist',[AppointmentController::class, 'appointmentExist']);

////// WhishList All Route //////
Route::post('/add/wish/list/{id}',[WishListController::class, 'wishList']);


////// All Review Routes /////
Route::post('/review/add',[ReviewController::class, 'ReviewStore'])->name('add.review');
Route::get('/review/pending',[ReviewController::class, 'pendingReview'])->name('pending.review');
Route::get('/review/approve/{id}',[ReviewController::class, 'approveReview'])->name('review.approve');
Route::get('/review/published',[ReviewController::class, 'publishedReview'])->name('published.review');
Route::get('/review/unapprove/{id}',[ReviewController::class, 'deleteReview'])->name('review.delete');


////// All Search Routes //////
Route::post('/search',[ProductController::class, 'SearchSalon'])->name('search.salon');
Route::post('/advance-search',[ProductController::class, 'AdvanceSearchSalon']);
Route::post('/search/single',[ProductController::class, 'SingleSearchSalon'])->name('single-search');

/////// All Payment Routes ///////
Route::post('/payment/load',[PaymentController::class, 'loadPayment'])->name('loadpayment');
Route::post('/stripe/payment',[PaymentController::class, 'stripPayment'])->name('stripe_payment');
Route::post('/cash/payment',[PaymentController::class, 'cashPayment'])->name('cash_payment');