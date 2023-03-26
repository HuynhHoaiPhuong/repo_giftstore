<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\services\RoleController;
use App\Http\Controllers\services\RankController;
use App\Http\Controllers\services\PhotoController;
use App\Http\Controllers\services\ProductController;
use App\Http\Controllers\services\ProductListController;
use App\Http\Controllers\services\ProductCatController;
use App\Http\Controllers\services\StaticPageController;
use App\Http\Controllers\services\CartController;
use App\Http\Controllers\services\TopicController;
use App\Http\Controllers\services\SettingController;
use App\Http\Controllers\services\StockController;
use App\Http\Controllers\services\StockDetailController;
use App\Http\Controllers\services\ProducerController;
use App\Http\Controllers\services\VoucherController;
use App\Http\Controllers\services\BillController;
use App\Http\Controllers\services\BillDetailController;
use App\Http\Controllers\services\BillOrderController;
use App\Http\Controllers\services\BillOrderDetailController;
use App\Http\Controllers\services\DiscountController;
use App\Http\Controllers\services\FavoriteController;
use App\Http\Controllers\services\ActivityHistoryController;
use App\Http\Controllers\services\RateController;
use App\Http\Controllers\services\UserController;
use App\Http\Controllers\services\MemberController;

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
//--------------------12 Bang cuoi--------------------------
//Stock-Api
Route::group(['prefix'=>'/stocks'],function() {
    Route::get('/get-all-stock-by-status/{status}',[StockController::class,'getAllStockByStatus']);
    Route::get('/get-stock-by-id-and-status/{id}&{status}',[StockController::class,'getStockByIdAndStatus']);
    Route::get('/get-stock-by-id/{id}',[StockController::class,'getStockById']);
    Route::post('/save-stock',[StockController::class,'saveStock']);
    Route::post('/update-stock',[StockController::class,'updateStock']);
});

//Stock-Detail-Api
Route::group(['prefix'=>'/stock-details'],function() {
    Route::get('/get-all-stock-detail-by-status/{status}',[StockDetailController::class,'getAllStockDetailByStatus']);
    Route::get('/get-stock-detail-by-id-and-status/{id}&{status}',[StockDetailController::class,'getStockDetailByIdAndStatus']);
    Route::get('/get-stock-detail-by-id/{id}',[StockDetailController::class,'getStockDetailById']);
    Route::post('/save-stock-detail',[StockDetailController::class,'saveStockDetail']);
    Route::post('/update-stock-detail',[StockDetailController::class,'updateStockDetail']);
});

//Bill-Api
Route::group(['prefix'=>'/bills'],function() {
    Route::get('/get-all-bill-by-status/{status}',[BillController::class,'getAllBillByStatus']);
    Route::get('/get-bill-by-id-and-status/{id}&{status}',[BillController::class,'getBillByIdAndStatus']);
    Route::get('/get-bill-by-id/{id}',[BillController::class,'getBillById']);
    Route::post('/save-bill',[BillController::class,'saveBill']);
    Route::post('/update-bill',[BillController::class,'updateBill']);
});
//Bill-Detail-Api
Route::group(['prefix'=>'/bill-details'],function() {
    Route::get('/get-all-bill-detail-by-status/{status}',[BillDetailController::class,'getAllBillDetailByStatus']);
    Route::get('/get-bill-detail-by-id-and-status/{id}&{status}',[BillDetailController::class,'getBillDetailByIdAndStatus']);
    Route::get('/get-bill-detail-by-id/{id}',[BillDetailController::class,'getBillDetailById']);
    Route::post('/save-bill-detail',[BillDetailController::class,'saveBillDetail']);
    Route::post('/update-bill-detail',[BillDetailController::class,'updateBillDetail']);
});

//Bill-Order-Api
Route::group(['prefix'=>'/bill-orders'],function() {
    Route::get('/get-all-bill-order-by-status/{status}',[BillOrderController::class,'getAllBillOrderByStatus']);
    Route::get('/get-bill-order-by-id-and-status/{id}&{status}',[BillOrderController::class,'getSBillOrderByIdAndStatus']);
    Route::get('/get-bill-order-by-id/{id}',[BillOrderController::class,'getBillOrderById']);
    Route::post('/save-bill-order',[BillOrderController::class,'saveBillOrder']);
    Route::post('/update-bill-order',[BillOrderController::class,'updateBillOrder']);
});

//Bill-Order-Detail-Api
Route::group(['prefix'=>'/bill-order-details'],function() {
    Route::get('/get-all-bill-order-detail-by-status/{status}',[BillOrderDetailController::class,'getAllBillOrderDetailByStatus']);
    Route::get('/get-bill-order-detail-by-id-and-status/{id}&{status}',[BillOrderDetailController::class,'getBillOrderDetailByIdAndStatus']);
    Route::get('/get-bill-order-detail-by-id/{id}',[BillOrderDetailController::class,'getBillOrderDetailById']);
    Route::post('/save-bill-order-detail',[BillOrderDetailController::class,'saveBillOrderDetail']);
    Route::post('/update-bill-order-detail',[BillOrderDetailController::class,'updateBillOrderDetail']);
});

//Discount-Api
Route::group(['prefix'=>'/discounts'],function() {
    Route::get('/get-all-discount-by-status/{status}',[DiscountController::class,'getAllDiscountByStatus']);
    Route::get('/get-discount-by-id-and-status/{id}&{status}',[DiscountController::class,'getDiscountByIdAndStatus']);
    Route::get('/get-discount-by-id/{id}',[DiscountController::class,'getDiscountById']);
    Route::post('/save-discount',[DiscountController::class,'saveDiscount']);
    Route::post('/update-discount',[DiscountController::class,'updateDiscount']);
});

//Favorite-Api
Route::group(['prefix'=>'/favorites'],function() {
    Route::get('/get-all-favorite-by-status/{status}',[FavoriteController::class,'getAllFavoriteByStatus']);
    Route::get('/get-favorite-by-id-and-status/{id}&{status}',[FavoriteController::class,'getFavoriteByIdAndStatus']);
    Route::get('/get-favorite-by-id/{id}',[FavoriteController::class,'getFavoriteById']);
    Route::post('/save-favorite',[FavoriteController::class,'saveFavorite']);
    Route::post('/update-favorite',[FavoriteController::class,'updateFavorite']);
});

//Producer-Api
Route::group(['prefix'=>'/producers'],function() {
    Route::get('/get-all-producer-by-status/{status}',[ProducerController::class,'getAllProducerByStatus']);
    Route::get('/get-producer-by-id-and-status/{id}&{status}',[ProducerController::class,'getProducerByIdAndStatus']);
    Route::get('/get-producer-by-id/{id}',[ProducerController::class,'getProducerById']);
    Route::post('/save-producer',[ProducerController::class,'saveProducer']);
    Route::post('/update-producer',[ProducerController::class,'updateProducer']);
});

//Rate-Api
Route::group(['prefix'=>'/rates'],function() {
    Route::get('/get-all-rate-by-status/{status}',[RateController::class,'getAllRateByStatus']);
    Route::get('/get-rate-by-id-and-status/{id}&{status}',[RateController::class,'getRateByIdAndStatus']);
    Route::get('/get-rate-by-id/{id}',[RateController::class,'getRateById']);
    Route::post('/save-rate',[RateController::class,'saveRate']);
    Route::post('/update-rate',[RateController::class,'updateRate']);
});

//Voucher-Api
Route::group(['prefix'=>'/vouchers'],function() {
    Route::get('/get-all-voucher-by-status/{status}',[VoucherController::class,'getAllVoucherByStatus']);
    Route::get('/get-voucher-by-id-and-status/{id}&{status}',[VoucherController::class,'getVoucherByIdAndStatus']);
    Route::get('/get-voucher-by-id/{id}',[VoucherController::class,'getVoucherById']);
    Route::post('/save-voucher',[VoucherController::class,'saveVoucher']);
    Route::post('/update-voucher',[VoucherController::class,'updateVoucher']);
});

//Activity-History-Api
Route::group(['prefix'=>'/acitvities-history'],function() {
    Route::get('/get-all-activity-history-by-status/{status}',[activityHistoryController::class,'getAllActivityHistoryByStatus']);
    Route::get('/get-activity-history-by-id-and-status/{id}&{status}',[activityHistoryController::class,'getActivityHistoryByIdAndStatus']);
    Route::get('/get-activity-history-by-id/{id}',[activityHistoryController::class,'getActivityHistoryById']);
    Route::post('/save-activity-history',[activityHistoryController::class,'saveActivityHistory']);
    Route::post('/update-activity-history',[activityHistoryController::class,'updateActivityHistory']);
});
//--------------------End 12 bang cuoi---------------------

// Start 12 first table

// API Role
Route::group(['prefix'=>'/roles'],function()
{
    Route::get('/get-all-role-by-status/{status}',[RoleController::class,'getAllRoleByStatus']);
   
    Route::post('/save-role',[RoleController::class,'saveRole']);
   
    Route::post('/update-role',[RoleController::class,'updateRole']);
   
    Route::post('/remove-role',[RoleController::class,'removeRole']);
});

// API rank
Route::group(['prefix'=>'/ranks'],function()
{
    Route::get('/get-all-rank-by-status/{status}',[RankController::class,'getAllRankByStatus']);
   
    Route::post('/save-rank',[RankController::class,'saveRank']);
   
    Route::post('/update-rank',[RankController::class,'updateRank']);
   
    Route::post('/remove-rank',[RankController::class,'removeRank']);
});

// API product list
Route::group(['prefix'=>'/product_lists'],function()
{
    Route::get('/get-all-product-list-by-status/{status}',[ProductListController::class,'getAllProductListByStatus']);
   
    Route::post('/save-product-list',[ProductListController::class,'saveProductList']);
   
    Route::post('/update-product-list',[ProductListController::class,'updateProductList']);
   
    Route::post('/remove-product-list',[ProductListController::class,'removeProductList']);
});

// API product cat
Route::group(['prefix'=>'/product_cats'],function()
{
    Route::get('/get-all-product-cat-by-status/{status}',[ProductCatController::class,'getAllProductCatByStatus']);
   
    Route::post('/save-product-cat',[ProductCatController::class,'saveProductCat']);
   
    Route::post('/update-product-cat',[ProductCatController::class,'updateProductCat']);
   
    Route::post('/remove-product-cat',[ProductCatController::class,'removeProductCat']);
});

// API product
Route::group(['prefix'=>'/products'],function()
{
    Route::get('/get-all-product-by-status/{status}',[ProductController::class,'getAllProductByStatus']);
   
    Route::post('/save-product',[ProductController::class,'saveProduct']);
   
    Route::post('/update-product',[ProductController::class,'updateProduct']);
   
    Route::post('/remove-product',[ProductController::class,'removeProduct']);
});

// API user
Route::group(['prefix'=>'/users'],function()
{
    Route::get('/get-all-user-by-status/{status}',[UserController::class,'getAllUserByStatus']);
    Route::post('/save-user',[UserController::class,'saveUser']);
    Route::post('/update-user',[UserController::class,'updateUser']);
    Route::post('/remove-user',[UserController::class,'removeUser']);
});

// API cart
Route::group(['prefix'=>'/carts'],function()
{
    Route::get('/get-all-cart-by-id-member/{id_member}',[CartController::class,'getAllCartByIdMember']);
    Route::post('/save-cart',[CartController::class,'saveCart']);
    Route::post('/update-quantity-in-cart',[CartController::class,'updateQuantityInCart']);
    Route::post('/remove-cart',[CartController::class,'removeCart']);
    Route::post('/remove-all-cart',[CartController::class,'removeAllCart']);
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
Route::group(['prefix'=>'/statics'],function()
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

// End 12 last table