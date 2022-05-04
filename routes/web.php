<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Users\PostController;
use App\Http\Controllers\Admin\PostCategoriesController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Users\CartController;
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

//cart

Route::get('carts/{cart}',[CartController::class,'show'])->name('addToCart');
Route::get('show-carts',[CartController::class,'index'])->name('cart');
Route::get('update-carts',[CartController::class,'update'])->name('update');
Route::get('delete-carts',[CartController::class,'destroy'])->name('delete');










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
    
    Route::resource('admin/products',ProductController::class);
       

    Route::get('admin/attr/{product:slug}',[AttributeController::class,'show']);
    Route::post('admin/attr/{product:slug}',[AttributeController::class,'store']);
    Route::get('admin/attr/{product:slug}/edit',[AttributeController::class,'edit']);
    Route::get('admin/attr/{product:slug}/delete',[AttributeController::class,'destroy']);
   // Route::put('admin/attr/size/{product:slug}',[AttributeController::class,'update']);


    Route::get('admin/size/{product:slug}',[AttributeController::class,'size']);
    Route::post('admin/size/{product:slug}',[AttributeController::class,'storesize']);
    Route::get('admin/size/{product:slug}/edit',[AttributeController::class,'sizeedit']);
    Route::get('admin/size/{product:slug}/delete',[AttributeController::class,'sizedestroy']);
 
});



