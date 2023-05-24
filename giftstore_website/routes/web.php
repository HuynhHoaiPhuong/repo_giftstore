<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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
use App\Http\Controllers\web\ProviderController;
use App\Http\Controllers\web\TypeCategoryController;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\web\DiscountController;
use App\Http\Controllers\web\LoginController;

//client
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\ProductClientController;
use App\Http\Controllers\user\ShopController;
use App\Http\Controllers\user\LoginClientController;


//web-admin
Route::group(['prefix' => 'admin'],function(){

    Route::get('/login', [LoginController::class,'login'])->name('login');
    Route::post('/authenticate', [LoginController::class,'authenticate'])->name('authenticate');
    Route::get('/register', [LoginController::class,'register'])->name('register');
    Route::post('/save', [LoginController::class,'save'])->name('save');
    
    //Check Authenticate
    Route::group(['middleware' => ['auth','hasrole']], function(){

        Route::get('/logout', [LoginController::class,'logout'])->name('logout');

        Route::get('/index',[IndexController::class,'index'])->name('index');

        Route::get('/static-page-management',[StaticPageController::class,'index'])->name('static-page-management');

        Route::get('/topic-management',[TopicController::class,'index'])->name('topic-management');

        Route::get('/setting',[SettingController::class,'index'])->name('setting');

        Route::get('/photo-management',[PhotoController::class,'index'])->name('photo-management');

        Route::get('/rank-management',[RankController::class,'rankManagement'])->name('rank-management');
        Route::get('/discount-management',[DiscountController::class,'discountManagement'])->name('discount-management');
        Route::get('/role-management',[RoleController::class,'roleManagement'])->name('role-management');
        Route::get('/type-category-management',[TypeCategoryController::class,'typeCategoryManagement'])->name('type-category-management');
        Route::get('/category-management',[CategoryController::class,'categoryManagement'])->name('category-management');
        Route::get('/product-management',[ProductController::class,'productManagement'])->name('product-management');
        Route::get('/add-product',[ProductController::class,'addProduct'])->name('add-product');
        Route::get('/bill-management',[BillController::class,'billManagement'])->name('bill-management');
        Route::get('/bill-order-management',[BillOrderController::class,'billOrderManagement'])->name('bill-order-management');
        Route::get('/provider-management',[ProviderController::class,'providerManagement'])->name('provider-management');

    });
});


//web-client
Route::get('/', [HomeController::class,'index'])->name('/');
Route::get('/cart', [CartController::class,'index'])->name('cart');
Route::get('/check-out', [CheckoutController::class,'index'])->name('checkout');
Route::get('/contact', [ContactController::class,'index'])->name('contact');
Route::get('/product', [ProductClientController::class,'index'])->name('product');
Route::get('/shop', [ShopController::class,'index'])->name('shop');
Route::get('/log-in', [LoginClientController::class,'index'])->name('log-in');