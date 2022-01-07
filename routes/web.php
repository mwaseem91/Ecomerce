<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductBookingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetail;
use App\Http\Controllers\UserController;
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


Route::get('/',[BaseController::class, 'home'])->name('home');
Route::get('redirect',[BaseController::class, 'redirect'])->name('redirect');
Route::get('/contant',[BaseController::class, 'contant'])->name('contant');
Route::get('/delivery',[BaseController::class, 'delivery'])->name('delivery');
Route::get('contant',[BaseController::class, 'contant'])->name('contant');
Route::get('/spacialOffer',[BaseController::class, 'spacialOffer'])->name('spacialOffer');
Route::get('/cart',[BaseController::class, 'cart'])->name('cart');
Route::get('/productView/{id}',[BaseController::class, 'product'])->name('productView');
Route::get('/user/login',[BaseController::class, 'user_login'])->name('user_login');
Route::get('/user/logout',[BaseController::class, 'user_logout'])->name('user_logout');
Route::post('/user/store',[BaseController::class, 'user_store'])->name('user_store');
Route::post('/login/check',[BaseController::class, 'login_check'])->name('login_check');

Route::get('/admin/login',[AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login',[AdminController::class, 'makelogin'])->name('admin.makelogin');

//user controller
Route::get('/admin/user',[UserController::class, 'index'])->name('admin.user');
Route::post('/admin/user/delete',[UserController::class, 'delete'])->name('admin.user.delete');

Route::get('/admin/dashboard',[AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout',[AdminController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => 'auth'],function(){
   
   
});
 //categories controller route
 Route::get('/categories',[CategoryController::class, 'index'])->name('category.list');
 Route::get('/category/create',[CategoryController::class, 'create'])->name('category.add');
 Route::post('/category/add',[CategoryController::class, 'store'])->name('category.store');
 Route::get('/category/edit/{id}',[CategoryController::class, 'edit'])->name('category.edit');
 Route::post('/category/update/{id}',[CategoryController::class, 'update'])->name('category.update');
 Route::get('/category-delete/{id}',[CategoryController::class, 'destroy'])->name('category.delete');
//  Route::get('/category-delete/{id}',[CategoryController::class, 'delete'])->name('users.destroy');
 Route::delete('selected/delete',[CategoryController::class, 'selectedDelete'])->name('deleteSelect');

//  Route::delete('myproductsDeleteAll',[CategoryController::class,'deleteAll']);


//Product controller route
Route::resource('products', ProductController::class);
Route::get('/ProductDetail/extraDetail/{id}',[ProductDetail::class,'extraDetail'])->name('ProductDetail.extraDetail');
Route::post('/ProductDetail/extraDetailStore/{id}',[ProductDetail::class,'extraDetailStore'])->name('ProductDetail.extraDetailStore');

//Cart controller route
Route::post('/cart/store',[CartController::class,'store'])->name('cart.store');
Route::get('/cart/delete/{id}',[CartController::class,'destroy'])->name('cart.destroy');

//ProductBooking controller route
Route::post('/product/booking',[ProductBookingController::class,'store'])->name('product.booking');
Route::get('product/bookingSuccess', [ProductBookingController::class,'bookingSuccess'])->name('product.bookingSuccess');
Route::get('product/bookingFail', [ProductBookingController::class,'bookingFail'])->name('product.bookingFail');