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
Route::controller(\App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/home', 'index');
    Route::get('/', 'index')->name('home');
});

Auth::routes();

Route::get('account', [App\Http\Controllers\AccountController::class, 'index'])->name('account.index')->middleware('auth');
Route::post('account', [App\Http\Controllers\AccountController::class, 'update'])->name('account.update')->middleware('auth');
Route::get('account/edit', [App\Http\Controllers\AccountController::class, 'edit'])->name('account.edit')->middleware('auth');
Route::get('account/password', [App\Http\Controllers\AccountController::class, 'editPassword'])->name('account.password')->middleware('auth');
Route::delete('account', [App\Http\Controllers\AccountController::class, 'update'])->name('account.update')->middleware('auth');

Route::get('products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('products/show', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');

Route::post('newsletter', [App\Http\Controllers\NewsletterSubscriptionController::class, 'register'])->name('newsletter.register');


// Route::middleware('auth')->prefix('admin')->group(function() {
//     Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
//     Route::resource('products', App\Http\Controllers\ProductController::class)->names('product');
    
// });


// Route::fallback(function () {
//     //
// });

// Route::prefix('products')->group(function() {
//     Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
//     Route::resource('product', App\Http\Controllers\ProductController::class)->names('products.product');
    
// });