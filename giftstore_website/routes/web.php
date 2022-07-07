<?php

use Illuminate\Support\Facades\Route;

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
//bill
Route::group(['prefix'=>'admin'],function(){
    Route::get('/add-bill',[App\Http\Controllers\web\BillController::class,'addBill']);
    Route::get('/all-bill',[App\Http\Controllers\web\BillController::class,'allBill']);
    Route::post('/save-bill',[App\Http\Controllers\web\BillController::class,'saveBill']);
    Route::get('/edit-bill/{id}',[App\Http\Controllers\web\BillController::class,'editBill']);
    Route::post('/update-bill/{id}',[App\Http\Controllers\web\BillController::class,'updateBill']);
    Route::get('/delete-bill/{id}',[App\Http\Controllers\web\BillController::class,'delBill']);
    Route::get('/unactive-bill/{id}', [App\Http\Controllers\web\BillController::class,'unActiveBill']);
    Route::get('/active-bill/{id}', [App\Http\Controllers\web\BillController::class,'activeBill']);
    
    Route::get('/show-bill',[App\Http\Controllers\web\BillController::class,'showBill']);

});

//bill-order
Route::group(['prefix'=>'admin'],function(){
    Route::get('/add-bill-order',[App\Http\Controllers\web\BillOrderController::class,'addBillOrder']);
    Route::get('/all-bill-order',[App\Http\Controllers\web\BillOrderController::class,'allBillOrder']);
    Route::post('/save-bill-order',[App\Http\Controllers\web\BillOrderController::class,'saveBillOrder']);
    Route::get('/edit-bill-order/{id}',[App\Http\Controllers\web\BillOrderController::class,'editBillOrder']);
    Route::post('/update-bill-order/{id}',[App\Http\Controllers\web\BillOrderController::class,'updateBillOrder']);
    Route::get('/delete-bill-order/{id}',[App\Http\Controllers\web\BillOrderController::class,'delBillOrder']);
    Route::get('/unactive-bill-order/{id}', [App\Http\Controllers\web\BillOrderController::class,'unActiveBillOrder']);
    Route::get('/active-bill-order/{id}', [App\Http\Controllers\web\BillOrderController::class,'activeBillOrder']);
    
    Route::get('/show-bill-order',[App\Http\Controllers\web\BillOrderController::class,'showBillOrder']);

});