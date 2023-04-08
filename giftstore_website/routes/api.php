<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\services\RoleController;
use App\Http\Controllers\services\RankController;
use App\Http\Controllers\services\RateController;
use App\Http\Controllers\services\CartController;
use App\Http\Controllers\services\TypeCategoryController;
use App\Http\Controllers\services\CategoryController;
use App\Http\Controllers\services\ProductController;
use App\Http\Controllers\services\WarehouseController;
use App\Http\Controllers\services\WarehouseDetailController;
use App\Http\Controllers\services\ProviderController;
use App\Http\Controllers\services\BillOrderController;
use App\Http\Controllers\services\FavoriteController;
use App\Http\Controllers\services\StaticPageController;
use App\Http\Controllers\services\TopicController;
use App\Http\Controllers\services\SettingController;
use App\Http\Controllers\services\VoucherController;
use App\Http\Controllers\services\BillController;
use App\Http\Controllers\services\BillDetailController;
use App\Http\Controllers\services\BillOrderDetailController;
use App\Http\Controllers\services\DiscountController;
use App\Http\Controllers\services\ActivityHistoryController;
use App\Http\Controllers\services\UserController;
use App\Http\Controllers\services\MemberController;
use App\Http\Controllers\services\PhotoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//--------------------12 Head Tables--------------------------
//Role API
Route::group(['prefix'=>'/roles'],function()
{
    Route::get('/get-all-role-by-status/{status}',[RoleController::class,'getAllRoleByStatus']);
    Route::post('/save-role',[RoleController::class,'store']);
    Route::post('/update-role',[RoleController::class,'update']);
    Route::post('/remove-role',[RoleController::class,'destroy']);
});
//Rank API
Route::group(['prefix'=>'/ranks'],function()
{
    Route::get('/get-all-rank-by-status/{status}',[RankController::class,'getAllRankByStatus']);
    Route::post('/save-rank',[RankController::class,'store']);
    Route::post('/update-rank',[RankController::class,'update']);
    Route::post('/remove-rank',[RankController::class,'destroy']);
});
//Type Category API
Route::group(['prefix'=>'/type-categories'],function()
{
    Route::get('/get-all-type-category-by-status/{status}',[TypeCategoryController::class,'getAllTypeCategoryByStatus']);
    Route::post('/save-type-category',[TypeCategoryController::class,'store']);
    Route::post('/update-type-category',[TypeCategoryController::class,'update']);
    Route::post('/remove-type-category',[TypeCategoryController::class,'destroy']);
});
//Category API
Route::group(['prefix'=>'/categories'],function()
{
    Route::get('/get-all-category-by-status/{status}',[CategoryController::class,'getAllCategoryByStatus']);
    Route::post('/save-category',[CategoryController::class,'store']);
    Route::post('/update-category',[CategoryController::class,'update']);
    Route::post('/remove-category',[CategoryController::class,'destroy']);
});
//Product API
Route::group(['prefix'=>'/products'],function()
{
    Route::get('/get-all-product-by-status/{status}',[ProductController::class,'getAllProductByStatus']);
    Route::post('/save-product',[ProductController::class,'store']);
    Route::post('/update-product',[ProductController::class,'update']);
    Route::post('/remove-product',[ProductController::class,'destroy']);
});
//Cart API
Route::group(['prefix'=>'/carts'],function()
{
    Route::get('/get-all-cart-by-id-member/{id_member}',[CartController::class,'getAllCartByIdMember']);
    Route::post('/save-cart',[CartController::class,'store']);
    Route::post('/update-quantity-in-cart',[CartController::class,'updateQuantityInCart']);
    Route::post('/remove-cart',[CartController::class,'removeCart']);
    Route::post('/remove-all-cart',[CartController::class,'removeAllCart']);
});
//Favorite API
Route::group(['prefix'=>'/favorites'],function() {
    Route::get('/get-all-favorite-by-status/{status}',[FavoriteController::class,'getAllFavoriteByStatus']);
    Route::post('/save-favorite',[FavoriteController::class,'store']);
    Route::post('/update-favorite',[FavoriteController::class,'update']);
    Route::post('/remove-favorite',[FavoriteController::class,'destroy']);
});
//Provider API
Route::group(['prefix'=>'/providers'],function() {
    Route::get('/get-all-provider-by-status/{status}',[ProviderController::class,'getAllProviderByStatus']);
    Route::post('/save-provider',[ProviderController::class,'store']);
    Route::post('/update-provider',[ProviderController::class,'update']);
    Route::post('/remove-provider',[ProviderController::class,'destroy']);
});
//Rate API
Route::group(['prefix'=>'/rates'],function() {
    Route::get('/get-all-rate-by-status/{status}',[RateController::class,'getAllRateByStatus']);
    Route::post('/save-rate',[RateController::class,'store']);
    Route::post('/update-rate',[RateController::class,'update']);
    Route::post('/remove-rate',[RateController::class,'destroy']);
});
//Warehouse API
Route::group(['prefix'=>'/warehouses'],function() {
    Route::get('/get-all-warehouse-by-status/{status}',[WarehouseController::class,'getAllWareHouseByStatus']);
    Route::post('/save-warehouse',[WarehouseController::class,'store']);
    Route::post('/update-warehouse',[WarehouseController::class,'update']);
    Route::post('/remove-warehouse',[WarehouseController::class,'destroy']);
});
//Warehouse Detail API
Route::group(['prefix'=>'/warehouse-details'],function() {
    Route::get('/get-all-warehouse-detail-by-status/{status}',[WareHouseDetailController::class,'getAllWareHouseDetailByStatus']);
    Route::post('/save-warehouse-detail',[WareHouseDetailController::class,'store']);
    Route::post('/update-warehouse-detail',[WareHouseDetailController::class,'update']);
    Route::post('/remove-warehouse-detail',[WareHouseDetailController::class,'destroy']);
});
//Bill Order API
Route::group(['prefix'=>'/bill-orders'],function() {
    Route::get('/get-all-bill-order-by-status/{status}',[BillOrderController::class,'getAllBillOrderByStatus']);
    Route::post('/save-bill-order',[BillOrderController::class,'store']);
});

//--------------------End 12 Head Tables--------------------------




//Bill API
Route::group(['prefix'=>'/bills'],function() {
    Route::get('/get-all-bill-by-status/{status}',[BillController::class,'getAllBillByStatus']);
    Route::post('/save-bill',[BillController::class,'store']);
    // Route::post('/update-bill',[BillController::class,'update']);
    // Route::post('/remove-bill',[BillController::class,'destroy']);
});
//Bill-Detail API
Route::group(['prefix'=>'/bill-details'],function() {
    Route::get('/get-all-bill-detail-by-status/{status}',[BillDetailController::class,'getAllBillDetailByStatus']);
    Route::post('/save-bill-detail',[BillDetailController::class,'store']);
    Route::post('/update-bill-detail',[BillDetailController::class,'update']);
    Route::post('/remove-bill-detail',[BillDetailController::class,'destroy']);
});

//Bill-Order-Detail API
Route::group(['prefix'=>'/bill-order-details'],function() {
    Route::get('/get-all-bill-order-detail-by-status/{status}',[BillOrderDetailController::class,'getAllBillOrderDetailByStatus']);
    Route::post('/save-bill-order-detail',[BillOrderDetailController::class,'store']);
    Route::post('/update-bill-order-detail',[BillOrderDetailController::class,'update']);
    Route::post('/remove-bill-order-detail',[BillOrderDetailController::class,'destroy']);
});

//Discount API
Route::group(['prefix'=>'/discounts'],function() {
    Route::get('/get-all-discount-by-status/{status}',[DiscountController::class,'getAllDiscountByStatus']);
    Route::post('/save-discount',[DiscountController::class,'store']);
    Route::post('/update-discount',[DiscountController::class,'update']);
    Route::post('/remove-discount',[DiscountController::class,'destroy']);
});

//Voucher API
Route::group(['prefix'=>'/vouchers'],function() {
    Route::get('/get-all-voucher-by-status/{status}',[VoucherController::class,'getAllVoucherByStatus']);
    Route::post('/save-voucher',[VoucherController::class,'store']);
    Route::post('/update-voucher',[VoucherController::class,'update']);
    Route::post('/remove-voucher',[VoucherController::class,'destroy']);
});

//Activity-History API
Route::group(['prefix'=>'/activities-history'],function() {
    Route::get('/get-all-activity-history-by-status/{status}',[activityHistoryController::class,'getAllActivityHistoryByStatus']);
    Route::post('/save-activity-history',[activityHistoryController::class,'store']);
    Route::post('/update-activity-history',[activityHistoryController::class,'update']);
    Route::post('/remove-activity-history',[activityHistoryController::class,'détroy']);
});

// API user
Route::group(['prefix'=>'/users'],function()
{
    Route::get('/get-all-user-by-status/{status}',[UserController::class,'getAllUserByStatus']);
    Route::post('/save-user',[UserController::class,'saveUser']);
    Route::post('/update-user',[UserController::class,'updateUser']);
    Route::post('/remove-user',[UserController::class,'removeUser']);
});

// API setting
Route::group(['prefix'=>'/settings'],function()
{
    Route::get('/get-all-setting-by-status/{status}',[SettingController::class,'getAllSettingByStatus']);
   
    Route::post('/save-setting',[SettingController::class,'saveSetting']);
   
    Route::post('/update-setting',[SettingController::class,'updateSetting']);
   
    Route::post('/remove-setting',[SettingController::class,'removeSetting']);
});

// API static
Route::group(['prefix'=>'/static_pages'],function()
{
    Route::get('/get-all-static-by-status/{status}',[StaticPageController::class,'getAllStaticByStatus']);
   
    Route::post('/save-static',[StaticPageController::class,'saveStatic']);
   
    Route::post('/update-static',[StaticPageController::class,'updateStatic']);
   
    Route::post('/remove-static',[StaticPageController::class,'removeStatic']);
});

// API topic
Route::group(['prefix'=>'/topics'],function()
{
    Route::get('/get-all-topic-by-status/{status}',[TopicController::class,'getAllTopicByStatus']);
   
    Route::post('/save-topic',[TopicController::class,'saveTopic']);
   
    Route::post('/update-topic',[TopicController::class,'updateTopic']);
   
    Route::post('/remove-topic',[TopicController::class,'removeTopic']);
});

// API photo
Route::group(['prefix'=>'/photos'],function()
{
    Route::get('/get-all-photo-by-status/{status}',[PhotoController::class,'getAllPhotoByStatus']);
   
    Route::post('/save-photo',[PhotoController::class,'savePhoto']);
   
    Route::post('/update-photo',[PhotoController::class,'updatePhoto']);
   
    Route::post('/remove-photo',[PhotoController::class,'removePhoto']);
});

// API member
Route::group(['prefix'=>'/members'],function()
{
    Route::get('/get-all-member-by-status/{status}',[MemberController::class,'getAllMemberByStatus']);
   
    Route::post('/save-member',[MemberController::class,'saveMember']);
   
    Route::post('/update-current-point-member',[MemberController::class,'updateCurrentPointMember']);
   
    Route::post('/remove-member',[MemberController::class,'removeMember']);
});
