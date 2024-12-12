<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;

// Client Routes  
Route::middleware('guest:client')->group(function () {  
    Route::get('/client/register', [ClientAuthController::class, 'showRegisterForm']);  
    Route::post('/client/register', [ClientAuthController::class, 'register']);  
    Route::get('/client/login', [ClientAuthController::class, 'showLoginForm'])->name('client.login');  
    Route::post('/client/login', [ClientAuthController::class, 'login']);  
});  

Route::middleware('auth:client')->group(function () {  
    Route::get('/client/dashboard', [ClientAuthController::class, 'dashboard']);  
    Route::get('/products', [ClientAuthController::class, 'products'])->name('client.products');  
    Route::get('/products/{product}/buy', [ClientAuthController::class, 'buy'])->name('client.products.buy'); // Ubah metode ke GET  
    Route::post('/products/{product}/confirm-purchase', [ClientAuthController::class, 'confirmPurchase'])->name('client.products.confirm-purchase'); // Pastikan ini ada  
    Route::post('/client/logout', [ClientAuthController::class, 'logout'])->name('client.logout');  
});

// Admin Routes
Route::middleware('guest:admin')->group(function () {
    Route::get('/admin/register', [AdminAuthController::class, 'showRegisterForm']);
    Route::post('/admin/register', [AdminAuthController::class, 'register']);
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm']);
    Route::post('/admin/login', [AdminAuthController::class, 'login']);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard']);
    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class)->except(['show']);
});