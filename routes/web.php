<?php
//frontend controllers
use App\Http\Controllers\frontend\frontController;

//Admin contrllers
use App\Http\Controllers\instraMojoTestController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\cuponController;
use App\Http\Controllers\backend\SizeController;
use App\Http\Controllers\backend\ColorController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\TaxController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\OrderController;
use Illuminate\Support\Facades\Route;
/*
// ****************** frontend routes ****************************/
    Route::get('/',[frontController::class,'index'])->name('index');
    Route::get('product/{id}',[frontController::class,'Product']);
    Route::post('add_to_cart',[frontController::class,'addToCart']);
    Route::get('/cart',[frontController::class,'ProductCart']);
    Route::get('/category/{id}',[frontController::class,'CategoryPage']);
    Route::get('/search/{str}',[frontController::class,'Search']);
    // front authentication
    Route::get('/registration',[frontController::class,'Registraion']);
    Route::post('registration_process',[frontController::class,'RegistraionProcess'])->name('Registraion.process');
    Route::post('login_process',[frontController::class,'LoginProcess'])->name('Login.process');
    Route::get('logout',function(){
        session()->forget('FRONT_USER_LOGIN');
        session()->forget('FRONT_USER_ID');
        session()->forget('FRONT_USER_NAME');
        session()->forget('TEMP_USER_ID');
        session()->put('logout_msg','You are Successfully Logout');
        return redirect('/');

    });
    Route::get('/verification/{id}',[frontController::class,'EmailVerification']);
    //end email verify
    Route::post('forgot_password',[frontController::class,'ForgotPassword']);
    Route::get('/chage_forgot_password/{id}',[frontController::class,'ChangeForgotPassword']);
    Route::post('create_new_password_process',[frontController::class,'CreateNewPasswordProcess']);
    //checkout
    Route::get('/checkout',[frontController::class,'Checout']);
    //cupon code
    Route::get('/apply_cupon_code',[frontController::class,'ApplyCuponCode']);
    Route::get('/remove_cupon_code',[frontController::class,'RemoveCuponCode']);
    //order
    Route::post('place_order',[frontController::class,'PlaceOrder']);
    Route::get('/order_success',[frontController::class,'OrderSuccess'])->name('order.success');
    Route::get('redirect_pay_success',[frontController::class,'RedirectPaySuccess']);
    ///test instramojo payment
    // Route::get('test_intramojo',[instraMojoTestController::class,'TestIntramojo']);
    // Route::get('redirect_pay_success',[instraMojoTestController::class,'RedirectPaySuccess']);
    /// end test instramojo payment

    //my account section 
    Route::group(['middleware'=>'user_auth'],function(){
        Route::get('/my-account',[frontController::class,'myAccount']);
        Route::get('/order-detail/{id}',[frontController::class,'orderDetail']);

    });//end my account section

//customer review route start
    Route::post('/rating/insert/{rating}',[frontController::class,'addRating']);
    Route::get('get/product/review/{id}',[frontController::class,'showReview']);
//customer review route end


    //end front authentication
//****************** frontend routes ***************************/


// ************************************* admin routes *************************************/

    Route::group(['middleware'=>'Admin_auth'],function(){
    Route::get('admin/login',[AdminController::class,'index'])->name('admin.login');
    Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');
    Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
// *************category routes ************
    Route::get('admin/category',[CategoryController::class,'Category'])->name('category');
    Route::get('admin/category/manage/category',[CategoryController::class,'manageCategory'])->name('add.category');
    Route::get('admin/category/manage/category/{id}',[CategoryController::class,'manageCategory']);
    Route::post('admin/category/manage/category_process',[CategoryController::class,'categoryProcess'])->name('category.manage.process');
    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);
    Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);

// *************brands routes ************    
    Route::get('admin/brand',[BrandController::class,'Brand'])->name('brand');
    Route::get('admin/brand/manage/brand',[BrandController::class,'manageBrand'])->name('add.brand');
    Route::get('admin/brand/manage/brand/{id}',[BrandController::class,'manageBrand']);
   
    Route::post('admin/brand/manage/brand_process',[BrandController::class,'BrandProcess'])->name('brand.manage.process');

    Route::get('admin/brand/delete/{id}',[BrandController::class,'Delete']);
    Route::get('admin/brand/status/{status}/{id}',[BrandController::class,'Status']);

// *************cupon routes ************
    Route::get('admin/cupon',[CuponController::class,'Cupon'])->name('cupon');
    Route::get('admin/cupon/manage/cupon',[CuponController::class,'manageCupon'])->name('add.cupon');
    Route::get('admin/cupon/manage/cupon/{id}',[CuponController::class,'manageCupon']);
    Route::post('admin/cupon/manage/cupon_process',[CuponController::class,'cuponProcess'])->name('cupon.manage.process');
    Route::get('admin/cupon/delete/{id}',[CuponController::class,'delete']);
    Route::get('admin/cupon/status/{status}/{id}',[CuponController::class,'status']);

// *************size routes ************
    Route::get('admin/size',[SizeController::class,'Size'])->name('size');
    Route::get('admin/size/manage/size',[SizeController::class,'manageSize'])->name('add.size');
    Route::get('admin/size/manage/size/{id}',[SizeController::class,'manageSize']);
    Route::post('admin/size/manage/size_process',[SizeController::class,'SizeProcess'])->name('size.manage.process');
    Route::get('admin/size/delete/{id}',[SizeController::class,'delete']);
    Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);
// *************tax routes ************
    Route::get('admin/tax',[TaxController::class,'Tax'])->name('tax');
    Route::get('admin/tax/manage/tax',[TaxController::class,'manageTax'])->name('add.tax');
    Route::get('admin/tax/manage/tax/{id}',[TaxController::class,'manageTax']);
    Route::post('admin/tax/manage/tax_process',[TaxController::class,'TaxProcess'])->name('tax.manage.process');
    Route::get('admin/tax/delete/{id}',[TaxController::class,'delete']);
    Route::get('admin/tax/status/{status}/{id}',[TaxController::class,'status']);

// *************size routes ************    
    Route::get('admin/color',[ColorController::class,'Color'])->name('color');
    Route::get('admin/color/manage/color',[ColorController::class,'manageColor'])->name('add.color');
    Route::get('admin/color/manage/color/{id}',[ColorController::class,'manageColor']);
    Route::post('admin/color/manage/color_process',[ColorController::class,'colorProcess'])->name('color.manage.process');
    Route::get('admin/color/delete/{id}',[ColorController::class,'Delete']);
    Route::get('admin/color/status/{status}/{id}',[ColorController::class,'Status']);

// *************Product routes ************    
    Route::get('admin/product',[ProductController::class,'Product'])->name('product');
    Route::get('admin/product/manage/product',[ProductController::class,'manageProuct'])->name('add.product');
    Route::get('admin/product/manage/product/{id}',[ProductController::class,'manageProuct']);
   
    Route::post('admin/product/manage/product_process',[ProductController::class,'ProductProcess'])->name('product.manage.process');

    Route::get('admin/product/delete/{id}',[ProductController::class,'Delete']);
    Route::get('admin/product/status/{status}/{id}',[ProductController::class,'Status']);
    Route::get('admin/product/product_attr_delete/{paid}/{pid}',[ProductController::class,'ProductAttrDelete']);
    Route::get('admin/product/product_images_delete/{paid}/{pid}',[ProductController::class,'ProductImgsDelete']);


// *************Banner routes ************    
    Route::get('admin/banner',[BannerController::class,'Banner'])->name('banner');
    Route::get('admin/banner/manage/banner',[BannerController::class,'manageBanner'])->name('add.banner');
    Route::get('admin/banner/manage/banner/{id}',[BannerController::class,'manageBanner']);
    Route::post('admin/banner/manage/banner_process',[BannerController::class,'bannerProcess'])->name('banner.manage.process');
    Route::get('admin/banner/delete/{id}',[BannerController::class,'Delete']);
    Route::get('admin/banner/status/{status}/{id}',[BannerController::class,'Status']);


// *************Customer routes ************    
    Route::get('admin/customer',[CustomerController::class,'Customer'])->name('customer');
    Route::get('admin/customer/show/{id}',[CustomerController::class,'ShowCustomer']);

    Route::get('admin/customer/delete/{id}',[CustomerController::class,'Delete']);
    // Route::get('admin/color/status/{status}/{id}',[ColorController::class,'Status']);

// *************orders routes ************ 
    Route::get('admin/order',[OrderController::class,'index'])->name('order');
    Route::get('admin/order_details/{id}',[OrderController::class,'orderDetail']);


});
 