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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[App\Http\Controllers\HomeController::class,'index']);
Route::group(['prefix'=>'admin'],function(){
    Route::get('/role-management',[RoleController::class,'roleManagement'])->name('role-management');
    Route::get('/static-page-management',[StaticPageController::class,'staticPageManagement'])->name('static-page-management');
    Route::get('/product-management',[ProductController::class,'productManagement'])->name('product-management');
    Route::get('/topic-management',[TopicController::class,'topicManagement'])->name('topic-management');
    Route::get('/setting',[SettingController::class,'setting'])->name('setting');
    Route::get('/photo-management',[PhotoController::class,'photoManagement'])->name('photo-management');
    Route::get('/add-photo',[PhotoController::class,'addPhoto'])->name('add-photo');
});