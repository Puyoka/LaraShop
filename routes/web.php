<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
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

//puff count:999+

Route::get('/', [App\Http\Controllers\ProductsController::class, 'index'])->name('products');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products');
Route::get('/product/{id}', [App\Http\Controllers\ProductsController::class, 'detail']);
Route::post('/addToShopcart', [App\Http\Controllers\ProductsController::class, 'addToShopcart'])->name('addToShopcart');
Route::get('/search', [App\Http\Controllers\ProductsController::class, 'search'])->name('search');
Route::get('/orderby', [App\Http\Controllers\ProductsController::class, 'orderby'])->name('orderby');


Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/remove/{id}', [App\Http\Controllers\CartController::class, 'remove'])->name('remove');
Route::post('/cart', [App\Http\Controllers\CartController::class, 'order'])->name('order');

Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders');

