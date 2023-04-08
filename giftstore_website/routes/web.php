<?php

use Illuminate\Support\Facades\Route;

//admin
use App\Http\Controllers\web\IndexController;
use App\Http\Controllers\web\RoleController;
use App\Http\Controllers\web\StaticPageController;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\TopicController;
use App\Http\Controllers\web\SettingController;
use App\Http\Controllers\web\PhotoController;
use App\Http\Controllers\web\BillController;
use App\Http\Controllers\web\BillOrderController;
use App\Http\Controllers\web\MemberController;
use App\Http\Controllers\web\RankController;
use App\Http\Controllers\web\LoginController;

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
    Route::get('/login', [LoginController::class,'login']);
    Route::post('/login', [LoginController::class,'checkLogin'])->name('check-login');
    Route::get('/register', [LoginController::class,'register'])->name('register');
    Route::post('/save', [LoginController::class,'save'])->name('save');
});
//Check Login
Route::group(['middleware' => ['hasrole']], function(){
    Route::get('/logout', [LoginController::class,'logout'])->name('logout');
    Route::group(['prefix' => 'admin'], function(){
        Route::get('/index',[IndexController::class,'index'])->name('/index');
        Route::get('/role-management',[RoleController::class,'index'])->name('role-management');
        Route::get('/static-page-management',[StaticPageController::class,'index'])->name('static-page-management');
        Route::get('/product-management',[ProductController::class,'index'])->name('product-management');
        Route::get('/topic-management',[TopicController::class,'index'])->name('topic-management');
        Route::get('/setting',[SettingController::class,'index'])->name('setting');
        Route::get('/photo-management',[PhotoController::class,'index'])->name('photo-management');
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