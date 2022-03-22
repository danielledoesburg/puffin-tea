<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
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

Route::prefix('account')->controller(App\Http\Controllers\UserController::class)->name('account.')->middleware('auth')->group(function() {
    Route::get('/', 'index')->name('index');
    Route::put('/', 'update')->name('update');
    Route::delete('/', 'destroy')->name('destroy');
    Route::get('/edit', 'edit')->name('edit');
    Route::get('/password', 'password')->name('password');
    Route::patch('/password', 'updatePassword')->name('password.update');
    Route::get('/orders', 'orders')->name('orders');
});

Route::post('/newsletter', [App\Http\Controllers\NewsletterSubscriptionController::class, 'register'])->name('newsletter.register');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('/products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');

Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
Route::get('/checkout/calculate', [App\Http\Controllers\CheckoutController::class, 'calculate'])->name('checkout.calculate');


Route::get('/help',[App\Http\Controllers\HelpController::class, 'index'])->name('help');
Route::post('/help',[App\Http\Controllers\HelpController::class, 'store'])->name('help.store');

Route::prefix('admin')->controller(App\Http\Controllers\AdminController::class)->name('admin.')->middleware('auth')->group(function() {
    Route::get('/', 'index')->name('index');
});

Route::fallback(function (Request $request) {
    if ($request->ajax()) {
        return Response::json(['error' => '404 - Route not found'], 404);
    }
    return view('errors.404');
});





// Route::middleware('auth')->prefix('admin')->group(function() {
//     Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
//     Route::resource('products', App\Http\Controllers\ProductController::class)->names('product');
    
// });