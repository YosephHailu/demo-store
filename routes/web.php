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

Auth::routes();

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/', [App\Http\Controllers\HomeController::class, 'landing'])->name('landing');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/coming-soon', [App\Http\Controllers\HomeController::class, 'comingSoon'])->name('coming-soon');
Route::resource('/users', App\Http\Controllers\UserController::class)->names('user');
Route::get('/admins', [App\Http\Controllers\UserController::class, 'admins'])->name('user.admins');
Route::get('/store/mystore', [App\Http\Controllers\StoreController::class, 'myStore'])->name('store.mystore');
Route::get('/store/{store}/login', [App\Http\Controllers\StoreController::class, 'login'])->name('store.login');
Route::get('/store/{user}/logout', [App\Http\Controllers\StoreController::class, 'logout'])->name('store.logout');
Route::resource('/stores', App\Http\Controllers\StoreController::class)->names('store');
Route::resource('/product_categories', App\Http\Controllers\ProductCategoryController::class)->names('product_category');
Route::get('product_categories/{productCategory}/toggle', [App\Http\Controllers\ProductCategoryController::class, 'toggle'])->name('product_category.toggle');
Route::resource('/products', App\Http\Controllers\ProductController::class)->names('product');
Route::resource('/orders', App\Http\Controllers\OrderController::class)->names('order');

Route::get('my-cart', [App\Http\Controllers\CartController::class, 'myCart'])->name('cart.my-cart');
Route::post('order', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
Route::get('order', [App\Http\Controllers\OrderController::class, 'show'])->name('order.show');
Route::get('order/{order}/complete', [App\Http\Controllers\OrderController::class, 'complete'])->name('order.complete');
Route::get('my-order', [App\Http\Controllers\OrderController::class, 'index'])->name('order.my-order');
Route::get('/{store}/products', [App\Http\Controllers\StoreController::class, 'products'])->name('store.products');
Route::get('/{store}/product/{product}', [App\Http\Controllers\ProductController::class, 'detail'])->name('store.product.listing');
Route::get('/{store}/{productCategory}', [App\Http\Controllers\StoreController::class, 'productCategoryListing'])->name('store.category.listing');
Route::get('/{store}', [App\Http\Controllers\StoreController::class, 'detail'])->name('store.detail');
