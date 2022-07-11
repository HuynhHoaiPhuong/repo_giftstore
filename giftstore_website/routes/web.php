<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\RoleController;
use App\Http\Controllers\web\StaticPageController;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\TopicController;
use App\Http\Controllers\web\SettingController;
use App\Http\Controllers\web\PhotoController;

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

    Route::get('/role-management',[RoleController::class,'roleManagement'])->name('role-management');
    Route::get('/static-page-management',[StaticPageController::class,'staticPageManagement'])->name('static-page-management');
    Route::get('/product-management',[ProductController::class,'productManagement'])->name('product-management');
    Route::get('/topic-management',[TopicController::class,'topicManagement'])->name('topic-management');
    Route::get('/setting',[SettingController::class,'setting'])->name('setting');
    Route::get('/photo-management',[PhotoController::class,'photoManagement'])->name('photo-management');
    Route::get('/add-photo',[PhotoController::class,'addPhoto'])->name('add-photo');
    
 //bill
    Route::get('/add-bill',[App\Http\Controllers\web\BillController::class,'addBill'])->name('add-bill');
    Route::get('/all-bill',[App\Http\Controllers\web\BillController::class,'allBill'])->name('all-bill');
    Route::post('/save-bill',[App\Http\Controllers\web\BillController::class,'saveBill'])->name('save-bill');
    Route::get('/edit-bill/{id}',[App\Http\Controllers\web\BillController::class,'editBill'])->name('edit-bill');
    Route::post('/update-bill/{id}',[App\Http\Controllers\web\BillController::class,'updateBill'])->name('update-bill');
    Route::get('/delete-bill/{id}',[App\Http\Controllers\web\BillController::class,'delBill'])->name('delete-bill');
    Route::get('/unactive-bill/{id}', [App\Http\Controllers\web\BillController::class,'unActiveBill'])->name('unactive-bill');
    Route::get('/active-bill/{id}', [App\Http\Controllers\web\BillController::class,'activeBill'])->name('active-bill');
 
//bill-order
    Route::get('/add-bill-order',[App\Http\Controllers\web\BillOrderController::class,'addBillOrder'])->name('add-bill-order');
    Route::get('/all-bill-order',[App\Http\Controllers\web\BillOrderController::class,'allBillOrder'])->name('all-bill-order');
    Route::post('/save-bill-order',[App\Http\Controllers\web\BillOrderController::class,'saveBillOrder'])->name('save-bill-order');
    Route::get('/edit-bill-order/{id}',[App\Http\Controllers\web\BillOrderController::class,'editBillOrder'])->name('edit-bill-order');
    Route::post('/update-bill-order/{id}',[App\Http\Controllers\web\BillOrderController::class,'updateBillOrder'])->name('update-bill-order');
    Route::get('/delete-bill-order/{id}',[App\Http\Controllers\web\BillOrderController::class,'delBillOrder'])->name('delete-bill-order');
    Route::get('/unactive-bill-order/{id}', [App\Http\Controllers\web\BillOrderController::class,'unActiveBillOrder'])->name('unactive-bill-order');
    Route::get('/active-bill-order/{id}', [App\Http\Controllers\web\BillOrderController::class,'activeBillOrder'])->name('active-bill-order');
        
//member
    Route::get('/add-member',[App\Http\Controllers\web\MemberController::class,'addMember'])->name('add-member');
    Route::get('/all-member',[App\Http\Controllers\web\MemberController::class,'allMember'])->name('all-member');
    Route::post('/save-member',[App\Http\Controllers\web\MemberController::class,'saveMember'])->name('save-member');
    Route::get('/edit-member/{id}',[App\Http\Controllers\web\MemberController::class,'editMember'])->name('edit-member');
    Route::post('/update-member/{id}',[App\Http\Controllers\web\MemberController::class,'updateMember'])->name('update-member');
    Route::get('/delete-member/{id}',[App\Http\Controllers\web\MemberController::class,'delMember'])->name('delete-member');
    Route::get('/unactive-member/{id}', [App\Http\Controllers\web\MemberController::class,'unActiveMember'])->name('unactive-member');
    Route::get('/active-member/{id}', [App\Http\Controllers\web\MemberController::class,'activeMember'])->name('active-member');
    
//rank-member
    Route::get('/add-rank',[App\Http\Controllers\web\RankController::class,'addRank'])->name('add-rank');
    Route::get('/all-rank',[App\Http\Controllers\web\RankController::class,'allRank'])->name('all-rank');
    Route::post('/save-rank',[App\Http\Controllers\web\RankController::class,'saveRank'])->name('save-rank');
    Route::get('/edit-rank/{id}',[App\Http\Controllers\web\RankController::class,'editRank'])->name('edit-rank');
    Route::post('/update-rank/{id}',[App\Http\Controllers\web\RankController::class,'updateRank'])->name('update-rank');
    Route::get('/delete-rank/{id}',[App\Http\Controllers\web\RankController::class,'delRank'])->name('delete-rank');
    Route::get('/unactive-rank/{id}', [App\Http\Controllers\web\RankController::class,'unActiveRank'])->name('unactive-rank');
    Route::get('/active-rank/{id}', [App\Http\Controllers\web\RankController::class,'activeRank'])->name('active-rank');
    
//login-admin
    Route::get('/login', [App\Http\Controllers\web\AdminController::class,'login'])->name('login');
    Route::post('/check-login', [App\Http\Controllers\web\AdminController::class,'checkLogin'])->name('check-login');
    Route::get('/logout', [App\Http\Controllers\web\AdminController::class,'logout'])->name('logout');

});
//index admin
Route::get('/',function(){
    return view('admin.index');
})->name('all-visitor');