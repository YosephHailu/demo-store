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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{store}', [App\Http\Controllers\StoreController::class, 'detail'])->name('store.detail');
Route::resource('/users', App\Http\Controllers\UserController::class)->names('user');
Route::resource('/stores', App\Http\Controllers\StoreController::class)->names('store');
Route::resource('/product_categories', App\Http\Controllers\ProductCategoryController::class)->names('product_category');
Route::resource('/products', App\Http\Controllers\ProductController::class)->names('product');
