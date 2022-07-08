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

Route::group(['prefix'=>'admin'],function(){
//bill
    Route::get('/add-bill',[App\Http\Controllers\web\BillController::class,'addBill']);
    Route::get('/all-bill',[App\Http\Controllers\web\BillController::class,'allBill']);
    Route::post('/save-bill',[App\Http\Controllers\web\BillController::class,'saveBill']);
    Route::get('/edit-bill/{id}',[App\Http\Controllers\web\BillController::class,'editBill']);
    Route::post('/update-bill/{id}',[App\Http\Controllers\web\BillController::class,'updateBill']);
    Route::get('/delete-bill/{id}',[App\Http\Controllers\web\BillController::class,'delBill']);
    Route::get('/unactive-bill/{id}', [App\Http\Controllers\web\BillController::class,'unActiveBill']);
    Route::get('/active-bill/{id}', [App\Http\Controllers\web\BillController::class,'activeBill']);
    
    Route::get('/show-bill',[App\Http\Controllers\web\BillController::class,'showBill']);

//bill-order
    Route::get('/add-bill-order',[App\Http\Controllers\web\BillOrderController::class,'addBillOrder']);
    Route::get('/all-bill-order',[App\Http\Controllers\web\BillOrderController::class,'allBillOrder']);
    Route::post('/save-bill-order',[App\Http\Controllers\web\BillOrderController::class,'saveBillOrder']);
    Route::get('/edit-bill-order/{id}',[App\Http\Controllers\web\BillOrderController::class,'editBillOrder']);
    Route::post('/update-bill-order/{id}',[App\Http\Controllers\web\BillOrderController::class,'updateBillOrder']);
    Route::get('/delete-bill-order/{id}',[App\Http\Controllers\web\BillOrderController::class,'delBillOrder']);
    Route::get('/unactive-bill-order/{id}', [App\Http\Controllers\web\BillOrderController::class,'unActiveBillOrder']);
    Route::get('/active-bill-order/{id}', [App\Http\Controllers\web\BillOrderController::class,'activeBillOrder']);
    
    Route::get('/show-bill-order',[App\Http\Controllers\web\BillOrderController::class,'showBillOrder']);
    
//member
    Route::get('/add-member',[App\Http\Controllers\web\MemberController::class,'addMember']);
    Route::get('/all-member',[App\Http\Controllers\web\MemberController::class,'allMember']);
    Route::post('/save-member',[App\Http\Controllers\web\MemberController::class,'saveMember']);
    Route::get('/edit-member/{id}',[App\Http\Controllers\web\MemberController::class,'editMember']);
    Route::post('/update-member/{id}',[App\Http\Controllers\web\MemberController::class,'updateMember']);
    Route::get('/delete-member/{id}',[App\Http\Controllers\web\MemberController::class,'delMember']);
    Route::get('/unactive-member/{id}', [App\Http\Controllers\web\MemberController::class,'unActiveMember']);
    Route::get('/active-member/{id}', [App\Http\Controllers\web\MemberController::class,'activeMember']);
    
//rank-member
    Route::get('/add-rank',[App\Http\Controllers\web\RankController::class,'addRank']);
    Route::get('/all-rank',[App\Http\Controllers\web\RankController::class,'allRank']);
    Route::post('/save-rank',[App\Http\Controllers\web\RankController::class,'saveRank']);
    Route::get('/edit-rank/{id}',[App\Http\Controllers\web\RankController::class,'editRank']);
    Route::post('/update-rank/{id}',[App\Http\Controllers\web\RankController::class,'updateRank']);
    Route::get('/delete-rank/{id}',[App\Http\Controllers\web\RankController::class,'delRank']);
    Route::get('/unactive-rank/{id}', [App\Http\Controllers\web\RankController::class,'unActiveRank']);
    Route::get('/active-rank/{id}', [App\Http\Controllers\web\RankController::class,'activeRank']);
    
//visitor
    Route::get('/all-visitor',[App\Http\Controllers\web\VisitorController::class,'allVisitor']);
});