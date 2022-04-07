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

Route::get('/', [App\Http\Controllers\ProductsController::class, 'index'])->name('products');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products');
Route::get('/detail/{id}', [App\Http\Controllers\ProductsController::class, 'detail']);
Route::post('/addToShopcart', [App\Http\Controllers\ProductsController::class, 'addToShopcart'])->name('addToShopcart');


Route::get('/shopcart', [App\Http\Controllers\ShopcartController::class, 'index'])->name('shopcart');

Route::get('/orders', [App\Http\Controllers\OrdersController::class, 'index'])->name('orders');
