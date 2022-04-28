<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Users\PostController;
use App\Http\Controllers\Admin\PostCategoriesController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Users\PostCommentController;
use App\Http\Controllers\Users\ProductCommentController;
use App\Http\Controllers\Users\ProductController as UsersProductController;
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

// home/user
Route::get('/',[PostController::class,'index']);
Route::get('users/{post}',[PostController::class,'show']);
Route::post('users/{post:slug}/comments',[PostCommentController::class,'store']);
//HOME/PRODCT
Route::get('products',[UsersProductController::class,'index']);
Route::get('products/{product}',[UsersProductController::class,'show']);
Route::post('products/{product:slug}/comments',[ProductCommentController::class,'store']);

// auth
Route::get('register',[RegisterController::class,'create'])->middleware('guest');
Route::post('register',[RegisterController::class,'store'])->middleware('guest');
Route::get('login',[LoginController::class,'create'])->middleware('guest');
Route::post('login',[LoginController::class,'store'])->middleware('guest');
Route::post('logout',[LoginController::class,'destroy'])->middleware('auth');

//admin
Route::middleware('can:admin')->group(function(){
Route::resource('admin/categories',PostCategoriesController::class);
Route::resource('admin/posts',AdminPostController::class);
Route::patch('admin/posts/{post:slug}',[AdminPostController::class,'update']);

Route::resource('admin/productcategories',ProductCategoryController::class);
// Route::get('admin/productcategories',[ProductCategoryController::class,'index']);
    // Route::get('admin/productcategories/create',[ProductCategoryController::class,'create']);
    // Route::post('admin/productcategories',[ProductCategoryController::class,'store']);
    // Route::get('admin/productcategories/{categoryproduct:slug}/edit',[ProductCategoryController::class,'edit']);
    // Route::put('admin/productcategories/{categoryproduct}',[ProductCategoryController::class,'update']);
    // Route::delete('admin/productcategories/{categoryproduct}/delete',[ProductCategoryController::class,'destroy']);
Route::resource('admin/products',ProductController::class);
    // Route::get('admin/products',[ProductController::class,'index']);
    // Route::get('admin/products/create',[ProductController::class,'create']);
    // Route::post('admin/products',[ProductController::class,'store']);
    // Route::get('admin/products/{product}/edit',[ProductController::class,'edit']);
    // Route::put('admin/products/{product:slug}',[ProductController::class,'update']);
    // Route::delete('admin/products/{product}/delete',[ProductController::class,'destroy']);
    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');
    
    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');
  
});



