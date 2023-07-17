<?php

use App\Http\Controllers\services\GoogleController;
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
use App\Http\Controllers\web\BillDetailController;
use App\Http\Controllers\web\BillOrderController;
use App\Http\Controllers\web\BillOrderDetailController;
use App\Http\Controllers\web\MemberController;
use App\Http\Controllers\web\RankController;
use App\Http\Controllers\web\ProviderController;
use App\Http\Controllers\web\TypeCategoryController;
use App\Http\Controllers\web\CategoryController;
use App\Http\Controllers\web\DiscountController;
use App\Http\Controllers\web\LoginController;
use App\Http\Controllers\web\PaymentController;
use App\Http\Controllers\web\VoucherController;
use App\Http\Controllers\web\WarehouseController;
use App\Http\Controllers\web\WarehouseDetailController;

//client
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CheckoutController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\ProductController as userProductController;
use App\Http\Controllers\user\BillController as userBillController;
use App\Http\Controllers\user\ShopController;
use App\Http\Controllers\user\SearchController;
use App\Http\Controllers\user\LoginClientController;
use App\Http\Controllers\user\ProfileController;
use App\Http\Controllers\user\CategoryController as userCategoryController;
use App\Http\Controllers\user\TypeCategoryController as userTypeCategoryController;

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

        Route::get('/post-management/{id_topic}',[PostController::class,'postManagement'])->name('post-management');

        Route::get('/topic-management',[TopicController::class,'topicManagement'])->name('topic-management');

        Route::get('/setting-management',[SettingController::class,'settingManagement'])->name('setting-management');

        Route::get('/photo-management',[PhotoController::class,'photoManagement'])->name('photo-management');

        Route::get('/payment-management',[PaymentController::class,'paymentManagement'])->name('payment-management');
        Route::post('/add-payment',[PaymentController::class,'addPayment'])->name('add-payment');
        Route::post('/update-payment',[PaymentController::class,'updatePayment'])->name('update-payment');
        Route::get('/recycle-payment',[PaymentController::class,'recyclePayment'])->name('recycle-payment');

        Route::get('/voucher-management',[VoucherController::class,'voucherManagement'])->name('voucher-management');
        Route::post('/add-voucher',[VoucherController::class,'addVoucher'])->name('add-voucher');
        Route::post('/update-voucher',[VoucherController::class,'updateVoucher'])->name('update-voucher');
        Route::get('/recycle-voucher',[VoucherController::class,'recycleVoucher'])->name('recycle-voucher');

        Route::get('/member-management',[MemberController::class,'memberManagement'])->name('member-management');

        Route::get('/warehouse-management',[WarehouseController::class,'warehouseManagement'])->name('warehouse-management');
        Route::post('/update-warehouse',[WarehouseController::class,'updateWarehouse'])->name('update-warehouse');

        Route::get('/warehouse-detail-management/{id_warehouse}',[WarehouseDetailController::class,'warehouseDetailManagement'])->name('warehouse-detail-management');
        Route::post('/update-warehouse-detail',[WarehouseDetailController::class,'updateWarehouseDetail'])->name('update-warehouse-detail');

        Route::get('/rank-management',[RankController::class,'rankManagement'])->name('rank-management');
        Route::post('/update-rank',[RankController::class,'updateRank'])->name('update-rank');

        Route::get('/discount-management',[DiscountController::class,'discountManagement'])->name('discount-management');

        Route::get('/role-management',[RoleController::class,'roleManagement'])->name('role-management');
        Route::post('/add-role',[RoleController::class,'addRole'])->name('add-role');
        Route::post('/update-role',[RoleController::class,'updateRole'])->name('update-role');


        Route::get('/type-category-management',[TypeCategoryController::class,'typeCategoryManagement'])->name('type-category-management');
        Route::post('/add-type-category',[TypeCategoryController::class,'addTypeCategory'])->name('add-type-category');

        Route::get('/category-management',[CategoryController::class,'categoryManagement'])->name('category-management');
        Route::post('/add-category',[CategoryController::class,'addCategory'])->name('add-category');
        Route::post('/update-category',[CategoryController::class,'updateCategory'])->name('update-category');

        Route::get('/product-management',[ProductController::class,'productManagement'])->name('product-management');
        Route::get('/product-management/add-product-management',[ProductController::class,'addproductManagement'])->name('add-product-management');
        Route::post('/add-product',[ProductController::class,'addProduct'])->name('add-product');
        Route::post('/update-product',[ProductController::class,'updateProduct'])->name('update-product');
        Route::get('/recycle-product',[ProductController::class,'recycleProduct'])->name('recycle-product');

        Route::get('/bill-management',[BillController::class,'billManagement'])->name('bill-management');
        
        Route::get('/bill-detail-management/{id_bill}',[BillDetailController::class,'billDetailManagement'])->name('bill-detail-management');

        Route::get('/bill-order-management',[BillOrderController::class,'billOrderManagement'])->name('bill-order-management');
        Route::get('/add-bill-order-management',[BillOrderController::class,'addBillOrderManagement'])->name('add-bill-order-management');
        Route::post('/save-bill-order',[BillOrderController::class,'saveBillOrder'])->name('save-bill-order');

        Route::get('/bill-order-detail-management/{id_bill_order}',[BillOrderDetailController::class,'billOrderDetailManagement'])->name('bill-order-detail-management');

        Route::get('/provider-management',[ProviderController::class,'providerManagement'])->name('provider-management');
        Route::post('/add-provider',[ProviderController::class,'addProvider'])->name('add-provider');
    });
});


//web-client
Route::get('/', [HomeController::class,'index'])->name('/');
Route::get('/check-out', [CheckoutController::class,'index'])->name('checkout');
Route::get('/profile', [ProfileController::class,'index'])->name('profile');
Route::get('/contact', [ContactController::class,'index'])->name('contact');
Route::get('/shop', [ShopController::class,'index'])->name('shop');
Route::get('/product/{id?}', [userProductController::class,'productDetail'])->name('product-detail');
Route::get('/log-in', [LoginClientController::class,'login'])->name('log-in');
Route::post('/register-member', [LoginClientController::class,'register'])->name('register-member');
Route::get('/search', [SearchController::class,'search'])->name('search');
Route::post('/client-authenticate', [LoginClientController::class,'authenticate'])->name('client-authenticate');
Route::get('/category/{id}', [userCategoryController::class,'category'])->name('category');
Route::get('/type-category/{id}', [userTypeCategoryController::class,'type'])->name('type-category');

Route::group(['middleware' => ['redirectIfNotLoggedIn']], function (){
    Route::get('/log-out', [LoginClientController::class, 'logout'])->name('log-out');
    Route::get('cart/{id_member?}', [CartController::class,'cart'])->name('cart');
});
Route::group(['prefix' => 'cart'],function(){
    Route::post('/buy-now', [CartController::class,'buyNow'])->name('buy-now');
    Route::post('/buy-now-detail', [CartController::class,'buyNowDetail'])->name('buy-now-detail');
    Route::post('/update-quantity', [CartController::class,'updateQuantity'])->name('update-quantity');
    Route::post('/remove-item', [CartController::class,'removeItem'])->name('remove-item');
});
Route::group(['prefix' => 'bill'],function(){
    Route::post('/pay-bill', [userBillController::class,'payBill'])->name('pay-bill');
});

Route::get('/filter-products', [ShopController::class,'filterProducts'])->name('filter-products');
