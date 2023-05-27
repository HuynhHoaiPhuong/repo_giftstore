<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

//admin
use App\Http\Controllers\web\IndexController;
use App\Http\Controllers\web\RoleController;
use App\Http\Controllers\web\PostController;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\TopicController;
use App\Http\Controllers\web\SettingController;
use App\Http\Controllers\web\PhotoController;
use App\Http\Controllers\web\BillController;
use App\Http\Controllers\web\BillOrderController;
use App\Http\Controllers\web\MemberController;
use App\Http\Controllers\web\RankController;
use App\Http\Controllers\web\LoginController;
use App\Http\Controllers\web\PaymentController;
use App\Http\Controllers\web\VoucherController;
use App\Http\Controllers\web\WarehouseController;
use App\Http\Controllers\web\WarehouseDetailController;

//user
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\ProductClientController;
use App\Http\Controllers\user\ShopController;
use App\Http\Controllers\user\LoginClientController;

//admin
Route::group(['prefix' => 'admin'],function(){

    Route::get('/login', [LoginController::class,'login'])->name('login');
    Route::post('/authenticate', [LoginController::class,'authenticate'])->name('authenticate');
    Route::get('/register', [LoginController::class,'register'])->name('register');
    Route::post('/save', [LoginController::class,'save'])->name('save');
    
    //Check authenticate
    Route::group(['middleware' => ['auth','hasrole']], function(){

        Route::get('/logout', [LoginController::class,'logout'])->name('logout');

        Route::get('/index',[IndexController::class,'index'])->name('index');

        Route::get('/role-management',[RoleController::class,'index'])->name('role-management');

        Route::get('/post-management/{id_topic}',[PostController::class,'postManagement'])->name('post-management');

        Route::get('/product-management',[ProductController::class,'index'])->name('product-management');

        Route::get('/topic-management',[TopicController::class,'topicManagement'])->name('topic-management');

        Route::get('/setting-management',[SettingController::class,'settingManagement'])->name('setting-management');

        Route::get('/photo-management',[PhotoController::class,'photoManagement'])->name('photo-management');

        Route::get('/payment-management',[PaymentController::class,'paymentManagement'])->name('payment-management');

        Route::get('/voucher-management',[VoucherController::class,'voucherManagement'])->name('voucher-management');

        Route::get('/member-management',[MemberController::class,'memberManagement'])->name('member-management');

        Route::get('/warehouse-management',[WarehouseController::class,'warehouseManagement'])->name('warehouse-management');

        Route::get('/warehouse-detail-management/{id_warehouse}',[WarehouseDetailController::class,'warehouseDetailManagement'])->name('warehouse-detail-management');

    });
});


//web-user
Route::get('/', [HomeController::class,'index'])->name('/');
Route::get('/cart', [CartController::class,'index'])->name('cart');
Route::get('/check-out', [CheckoutController::class,'index'])->name('checkout');
Route::get('/contact', [ContactController::class,'index'])->name('contact');
Route::get('/product', [ProductClientController::class,'index'])->name('product');
Route::get('/shop', [ShopController::class,'index'])->name('shop');
Route::get('/log-in', [LoginClientController::class,'index'])->name('log-in');