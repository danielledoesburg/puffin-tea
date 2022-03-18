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

Route::get('/account', [App\Http\Controllers\UserController::class, 'index'])->name('account.index')->middleware('auth');
Route::put('/account', [App\Http\Controllers\UserController::class, 'update'])->name('account.update')->middleware('auth');
Route::delete('/account', [App\Http\Controllers\UserController::class, 'destroy'])->name('account.destroy')->middleware('auth');
Route::get('/account/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('account.edit')->middleware('auth');
Route::get('/account/password', [App\Http\Controllers\UserController::class, 'password'])->name('account.password')->middleware('auth');
Route::patch('/account/password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('account.password.update')->middleware('auth');
Route::get('/account/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('account.orders')->middleware('auth');

Route::post('/newsletter', [App\Http\Controllers\NewsletterSubscriptionController::class, 'register'])->name('newsletter.register');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
// Route::get('/products/get', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show'); //temporary route for vue axios calls

Route::get('/help',[App\Http\Controllers\HelpController::class, 'index'])->name('help');
Route::post('/help',[App\Http\Controllers\HelpController::class, 'store'])->name('help.store');


Route::fallback(function () {
    return view('errors.404');
});



// Route::middleware('auth')->prefix('admin')->group(function() {
//     Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
//     Route::resource('products', App\Http\Controllers\ProductController::class)->names('product');
    
// });


// Route::prefix('products')->group(function() {
//     Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
//     Route::resource('product', App\Http\Controllers\ProductController::class)->names('products.product');
    
// });