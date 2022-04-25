<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

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
    return redirect()->route('dashboard.index');
});

Route::get('login', [AuthController::class, 'index'])->name('login');

Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('dashboard/cart', [ \App\Http\Controllers\DashboardController::class, 'cart'])->name('cart');
Route::post('dashboard/checkout', [ \App\Http\Controllers\DashboardController::class, 'checkout'])->name('checkout');
Route::get('orders', [ \App\Http\Controllers\DashboardController::class, 'orders'])->name('orders');
Route::resource('dashboard', \App\Http\Controllers\DashboardController::class)->only('index');//


