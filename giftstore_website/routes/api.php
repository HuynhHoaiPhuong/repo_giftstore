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
    Route::post('/save-role',[RoleController::class,'saveRole']);
    Route::post('/update-role',[RoleController::class,'updateRole']);
    Route::post('/remove-role',[RoleController::class,'removeRole']);
});
//Rank API
Route::group(['prefix'=>'/ranks'],function()
{
    Route::get('/get-all-rank-by-status/{status}',[RankController::class,'getAllRankByStatus']);
    Route::post('/save-rank',[RankController::class,'saveRank']);
    Route::post('/update-rank',[RankController::class,'updateRank']);
    Route::post('/remove-rank',[RankController::class,'removeRank']);
});
//Type Category API
Route::group(['prefix'=>'/type-categories'],function()
{
    Route::get('/get-all-type-category-by-status/{status}',[TypeCategoryController::class,'getAllTypeCategoryByStatus']);
    Route::post('/save-type-category',[TypeCategoryController::class,'saveTypeCategory']);
    Route::post('/update-type-category',[TypeCategoryController::class,'updateTypeCategory']);
    Route::post('/remove-type-category',[TypeCategoryController::class,'removeTypeCategory']);
});
//Category API
Route::group(['prefix'=>'/categories'],function()
{
    Route::get('/get-all-category-by-status/{status}',[CategoryController::class,'getAllCategoryByStatus']);
    Route::post('/save-category',[CategoryController::class,'saveCategory']);
    Route::post('/update-category',[CategoryController::class,'updateCategory']);
    Route::post('/remove-category',[CategoryController::class,'removeCategory']);
});
//Product API
Route::group(['prefix'=>'/products'],function()
{
    Route::get('/get-all-product-by-status/{status}',[ProductController::class,'getAllProductByStatus']);
    Route::post('/save-product',[ProductController::class,'saveProduct']);
    Route::post('/update-product',[ProductController::class,'updateProduct']);
    Route::post('/remove-product',[ProductController::class,'removeProduct']);
});
//Cart API
Route::group(['prefix'=>'/carts'],function()
{
    Route::get('/get-all-cart-by-id-member/{id_member}',[CartController::class,'getAllCartByIdMember']);
    Route::post('/save-cart',[CartController::class,'saveCart']);
    Route::post('/update-quantity-in-cart',[CartController::class,'updateQuantityInCart']);
    Route::post('/remove-cart',[CartController::class,'removeCart']);
    Route::post('/remove-all-cart',[CartController::class,'removeAllCart']);
});
//Favorite API
Route::group(['prefix'=>'/favorites'],function() {
    Route::get('/get-all-favorite-by-status/{status}',[FavoriteController::class,'getAllFavoriteByStatus']);
    Route::post('/save-favorite',[FavoriteController::class,'saveFavorite']);
    Route::post('/update-favorite',[FavoriteController::class,'updateFavorite']);
    Route::post('/remove-favorite',[FavoriteController::class,'removeFavorite']);
});
//Provider API
Route::group(['prefix'=>'/providers'],function() {
    Route::get('/get-all-provider-by-status/{status}',[ProviderController::class,'getAllProviderByStatus']);
    Route::post('/save-provider',[ProviderController::class,'saveProvider']);
    Route::post('/update-provider',[ProviderController::class,'updateProvider']);
    Route::post('/remove-provider',[ProviderController::class,'removeProvider']);
});
//Rate API
Route::group(['prefix'=>'/rates'],function() {
    Route::get('/get-all-rate-by-status/{status}',[RateController::class,'getAllRateByStatus']);
    Route::post('/save-rate',[RateController::class,'saveRate']);
    Route::post('/update-rate',[RateController::class,'updateRate']);
    Route::post('/remove-rate',[RateController::class,'removeRate']);
});
//Warehouse API
Route::group(['prefix'=>'/warehouses'],function() {
    Route::get('/get-all-warehouse-by-status/{status}',[WarehouseController::class,'getAllWareHouseByStatus']);
    Route::post('/save-warehouse',[WarehouseController::class,'saveWarehouse']);
    Route::post('/update-warehouse',[WarehouseController::class,'updateWarehouse']);
    Route::post('/remove-warehouse',[WarehouseController::class,'removeWarehouse']);
});
//Warehouse Detail API
Route::group(['prefix'=>'/warehouse-details'],function() {
    Route::get('/get-all-warehouse-detail-by-status/{status}',[WareHouseDetailController::class,'getAllWareHouseDetailByStatus']);
    Route::post('/save-warehouse-detail',[WareHouseDetailController::class,'saveWarehouseDetail']);
    Route::post('/update-warehouse-detail',[WareHouseDetailController::class,'updateWarehouseDetail']);
    Route::post('/remove-warehouse-detail',[WareHouseDetailController::class,'removeWarehouseDetail']);
});
//Bill Order API
Route::group(['prefix'=>'/bill-orders'],function() {
    Route::get('/get-all-bill-order-by-status/{status}',[BillOrderController::class,'getAllBillOrderByStatus']);
    Route::post('/save-bill-order',[BillOrderController::class,'saveBillOrder']);
});

//--------------------End 12 Head Tables--------------------------

//Bill API
Route::group(['prefix'=>'/bills'],function() {
    Route::get('/get-all-bill-by-status/{status}',[BillController::class,'getAllBillByStatus']);
    Route::post('/save-bill',[BillController::class,'save']);
    // Route::post('/update-bill',[BillController::class,'update']);
    // Route::post('/remove-bill',[BillController::class,'remove']);
});
//Bill-Detail API
Route::group(['prefix'=>'/bill-details'],function() {
    Route::get('/get-all-bill-detail-by-status/{status}',[BillDetailController::class,'getAllBillDetailByStatus']);
    Route::post('/save-bill-detail',[BillDetailController::class,'save']);
    Route::post('/update-bill-detail',[BillDetailController::class,'update']);
    Route::post('/remove-bill-detail',[BillDetailController::class,'remove']);
});

//Bill-Order-Detail API
Route::group(['prefix'=>'/bill-order-details'],function() {
    Route::get('/get-all-bill-order-detail-by-status/{status}',[BillOrderDetailController::class,'getAllBillOrderDetailByStatus']);
    Route::post('/save-bill-order-detail',[BillOrderDetailController::class,'save']);
    Route::post('/update-bill-order-detail',[BillOrderDetailController::class,'update']);
    Route::post('/remove-bill-order-detail',[BillOrderDetailController::class,'remove']);
});

//Discount API
Route::group(['prefix'=>'/discounts'],function() {
    Route::get('/get-all-discount-by-status/{status}',[DiscountController::class,'getAllDiscountByStatus']);
    Route::post('/save-discount',[DiscountController::class,'save']);
    Route::post('/update-discount',[DiscountController::class,'update']);
    Route::post('/remove-discount',[DiscountController::class,'remove']);
});

//Voucher API
Route::group(['prefix'=>'/vouchers'],function() {
    Route::get('/get-all-voucher-by-status/{status}',[VoucherController::class,'getAllVoucherByStatus']);
    Route::post('/save-voucher',[VoucherController::class,'save']);
    Route::post('/update-voucher',[VoucherController::class,'update']);
    Route::post('/remove-voucher',[VoucherController::class,'remove']);
});

//Activity-History API
Route::group(['prefix'=>'/activities-history'],function() {
    Route::get('/get-all-activity-history-by-status/{status}',[activityHistoryController::class,'getAllActivityHistoryByStatus']);
    Route::post('/save-activity-history',[activityHistoryController::class,'save']);
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
