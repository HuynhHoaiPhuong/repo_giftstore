<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\services\RoleController;
use App\Http\ControlleStockController;
use App\Http\Controller\StockDetailController;
use App\Http\Controller\VoucherController;
use App\Http\Controller\BillController;
use App\Http\Controller\BillDetailkController;
use App\Http\Controller\BillOrderController;
use App\Http\Controller\BillOrderDetailController;
use App\Http\Controller\DiscountController;
use App\Http\Controller\FavoriteController;
use App\Http\Controller\ActivityHistoryController;
use App\Http\Controller\RateController;

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

//StockDetail-Api
Route::group(['prefix'=>'/stockDelails'],function() {
    
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
Route::group(['prefix'=>'/billDelails'],function() {
    
    Route::get('/get-all-bill-detail-by-status/{status}',[BillDetailController::class,'getAllBillDetailByStatus']);
    
    Route::get('/get-bill-detail-by-id-and-status/{id}&{status}',[BillDetailController::class,'getBillDetailByIdAndStatus']);
    
    Route::get('/get-bill-detail-by-id/{id}',[BillDetailController::class,'getBillDetailById']);
    
    Route::post('/save-bill-detail',[BillDetailController::class,'saveBillDetail']);
    
    Route::post('/update-bill-detail',[BillDetailController::class,'updateBillDetail']);
});

//Bill-Order-Api
Route::group(['prefix'=>'/billOrder'],function() {
    
    Route::get('/get-all-bill-order-by-status/{status}',[BillOrderController::class,'getAllBillOrderByStatus']);
    
    Route::get('/get-bill-order-by-id-and-status/{id}&{status}',[BillOrderController::class,'getSBillOrderByIdAndStatus']);
    
    Route::get('/get-bill-order-by-id/{id}',[BillOrderController::class,'getBillOrderById']);
    
    Route::post('/save-bill-order',[BillOrderController::class,'saveBillOrder']);
    
    Route::post('/update-bill-order',[BillOrderController::class,'updateBillOrder']);
});



//Bill-Order-Detail-Api
Route::group(['prefix'=>'/billOrderDetails'],function() {
    
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
Route::group(['prefix'=>'/acitvityHistory'],function() {
    
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

// End 12 last table