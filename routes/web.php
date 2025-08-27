<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CoffeeProductController;
use App\Models\CoffeeProduct;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::post('/contact', [HomeController::class, 'contact'])->name('contact.store');
// Product detail (public)
Route::get('/product/{product:product_id}', [HomeController::class, 'showProduct'])->name('product.show');

// Alias global untuk route('login') agar tidak error
Route::get('/login', function() {
    return redirect()->route('admin.login');
})->name('login');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Redirect /admin to /admin/login
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });
    
    // Login routes (accessible to everyone)
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    
    // Authenticated routes (perlu login admin)
    Route::middleware('auth:admin')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
        // Coffee Products CRUD
        Route::resource('products', CoffeeProductController::class)->except(['show']);
        Route::get('products/{product}', [CoffeeProductController::class, 'show'])->name('products.show');
    });
});