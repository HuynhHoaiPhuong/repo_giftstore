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

Route::get('/', function () {
    return view('welcome');
});


//admin
Route::get('/dashboard',[App\Http\Controllers\adminController::class,'index']);
Route::get('/admin/login',[App\Http\Controllers\adminController::class,'login']);
Route::get('/logout', [App\Http\Controllers\adminController::class,'logout']);
Route::post('/admin-dashboard', [App\Http\Controllers\adminController::class,'dashboard']);


//Category Product
Route::get('/add-category-product', [App\Http\Controllers\categoriesController::class,'addCategoryProduct']);
Route::get('/edit-category-product/{id}', [App\Http\Controllers\categoriesController::class,'editCategoryProduct']);
Route::get('/delete-category-product/{id}', [App\Http\Controllers\categoriesController::class,'deleteCategoryProduct']);
Route::get('/all-category-product', [App\Http\Controllers\categoriesController::class,'allCategoryProduct']);
Route::get('/unactive-category-product/{id}', [App\Http\Controllers\categoriesController::class,'unActiveCategoryProduct']);
Route::get('/active-category-product/{id}', [App\Http\Controllers\categoriesController::class,'activeCategoryProduct']);
Route::post('/save-category-product', [App\Http\Controllers\categoriesController::class,'saveCategoryProduct']);
Route::post('/update-category-product/{id}', [App\Http\Controllers\categoriesController::class,'updateCategoryProduct']);


//Brand Product
Route::get('/add-brand-product', [App\Http\Controllers\brandController::class,'addBrandProduct']);
Route::get('/edit-brand-product/{id}', [App\Http\Controllers\brandController::class,'editBrandProduct']);
Route::get('/delete-brand-product/{id}', [App\Http\Controllers\brandController::class,'deleteBrandProduct']);
Route::get('/all-brand-product', [App\Http\Controllers\brandController::class,'allBrandProduct']);
Route::get('/unactive-brand-product/{id}', [App\Http\Controllers\brandController::class,'unActiveBrandProduct']);
Route::get('/active-brand-product/{id}', [App\Http\Controllers\brandController::class,'activeBrandProduct']);
Route::post('/save-brand-product', [App\Http\Controllers\brandController::class,'saveBrandProduct']);
// Route::post('/update-brand-product/{id}', [App\Http\Controllers\brandController::class,'updateBrandProduct']);


//Product
Route::get('/add-product', [App\Http\Controllers\productController::class,'addProduct']);
Route::get('edit-product/{id}', [App\Http\Controllers\productController::class,'editProduct']);
Route::get('/delete-product/{id}', [App\Http\Controllers\productController::class,'deleteProduct']);
Route::get('/all-product', [App\Http\Controllers\productController::class,'allProduct']);
Route::get('/unactive-product/{id}', [App\Http\Controllers\productController::class,'unActiveProduct']);
Route::get('/active-product/{id}', [App\Http\Controllers\productController::class,'activeProduct']);
Route::post('/save-product', [App\Http\Controllers\productController::class,'saveProduct']);
Route::post('/update-product/{id}', [App\Http\Controllers\productController::class,'updateProduct']);
