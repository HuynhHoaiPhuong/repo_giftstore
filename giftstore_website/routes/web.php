<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\RoleController;
use App\Http\Controllers\web\StaticPageController;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\TopicController;
use App\Http\Controllers\web\SettingController;
use App\Http\Controllers\web\PhotoController;
use App\Http\Controllers\web\BillController;
use App\Http\Controllers\web\BillOrderController;
use App\Http\Controllers\web\IndexController;
use App\Http\Controllers\web\MemberController;
use App\Http\Controllers\web\RankController;
use App\Http\Controllers\web\LoginController;


Route::group(['prefix' => 'admin'],function(){
    Route::get('/login', [LoginController::class,'login']);
    Route::post('/login', [LoginController::class,'checkLogin'])->name('check-login');
    Route::get('/register', [LoginController::class,'register'])->name('register');
    Route::post('/save', [LoginController::class,'save'])->name('save');
});

Route::group(['middleware' => ['hasrole']], function(){
// Route::prefix('admin')->middleware('hasrole')->group(function() {
    Route::get('/logout', [LoginController::class,'logout'])->name('logout');

    Route::group(['prefix' => 'admin'], function(){
        
        Route::get('/index',[IndexController::class,'index'])->name('/index');

        Route::get('/role-management',[RoleController::class,'roleManagement'])->name('role-management');
        Route::get('/static-page-management',[StaticPageController::class,'staticPageManagement'])->name('static-page-management');
        Route::get('/product-management',[ProductController::class,'productManagement'])->name('product-management');
        Route::get('/topic-management',[TopicController::class,'topicManagement'])->name('topic-management');
        Route::get('/setting',[SettingController::class,'setting'])->name('setting');
        Route::get('/photo-management',[PhotoController::class,'photoManagement'])->name('photo-management');
        Route::get('/add-photo',[PhotoController::class,'addPhoto'])->name('add-photo');
        
    //bill
        Route::get('/all-bill',[BillController::class,'allBill'])->name('all-bill');
     
    //bill-order
        Route::get('/add-bill-order',[BillOrderController::class,'addBillOrder'])->name('add-bill-order');
        Route::get('/all-bill-order',[BillOrderController::class,'allBillOrder'])->name('all-bill-order');
        Route::post('/save-bill-order',[BillOrderController::class,'saveBillOrder'])->name('save-bill-order');
        Route::get('/edit-bill-order/{id}',[BillOrderController::class,'editBillOrder'])->name('edit-bill-order');
        Route::post('/update-bill-order/{id}',[BillOrderController::class,'updateBillOrder'])->name('update-bill-order');
        Route::get('/delete-bill-order/{id}',[BillOrderController::class,'delBillOrder'])->name('delete-bill-order');
        Route::get('/unactive-bill-order/{id}', [BillOrderController::class,'unActiveBillOrder'])->name('unactive-bill-order');
        Route::get('/active-bill-order/{id}', [BillOrderController::class,'activeBillOrder'])->name('active-bill-order');
            
    //member
        Route::get('/add-member',[MemberController::class,'addMember'])->name('add-member');
        Route::get('/all-member',[MemberController::class,'allMember'])->name('all-member');
        Route::post('/save-member',[MemberController::class,'saveMember'])->name('save-member');
        Route::get('/edit-member/{id}',[MemberController::class,'editMember'])->name('edit-member');
        Route::post('/update-member/{id}',[MemberController::class,'updateMember'])->name('update-member');
        Route::get('/delete-member/{id}',[MemberController::class,'delMember'])->name('delete-member');
        Route::get('/unactive-member/{id}', [MemberController::class,'unActiveMember'])->name('unactive-member');
        Route::get('/active-member/{id}', [MemberController::class,'activeMember'])->name('active-member');
        
    //rank
        Route::get('/add-rank',[RankController::class,'addRank'])->name('add-rank');
        Route::get('/all-rank',[RankController::class,'allRank'])->name('all-rank');
        Route::post('/save-rank',[RankController::class,'saveRank'])->name('save-rank');
        Route::get('/edit-rank/{id}',[RankController::class,'editRank'])->name('edit-rank');
        Route::post('/update-rank/{id}',[RankController::class,'updateRank'])->name('update-rank');
        Route::get('/delete-rank/{id}',[RankController::class,'delRank'])->name('delete-rank');
        Route::get('/unactive-rank/{id}', [RankController::class,'unActiveRank'])->name('unactive-rank');
        Route::get('/active-rank/{id}', [RankController::class,'activeRank'])->name('active-rank');
    });
});




