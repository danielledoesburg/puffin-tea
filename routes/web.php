<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('products/{product:slug}',[App\Http\Controllers\ProductController::class, 'show'])->name('products.show');


// Route::get('products/show', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
// Route::prefix('products')->group(function() {
//     Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
//     Route::resource('product', App\Http\Controllers\ProductController::class)->names('products.product');
    
// });





Route::middleware('auth')->prefix('admin')->group(function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
    Route::resource('products', App\Http\Controllers\ProductController::class)->names('product');
    
});

