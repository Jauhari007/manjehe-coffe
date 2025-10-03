<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CoffeeProductController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProfileController;
use App\Models\CoffeeProduct;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::post('/contact', [HomeController::class, 'contact'])->name('contact.store');
// Product detail (public)
Route::get('/product/{product:product_id}', [HomeController::class, 'showProduct'])->name('product.show');
// Order selection (choose admin WhatsApp)
Route::get('/order/select', [HomeController::class, 'selectOrderAdmin'])->name('order.select');

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
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::post('/profile/info', [ProfileController::class, 'updateInfo'])->name('profile.update.info');
        Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
        
        // Coffee Products CRUD
        Route::resource('products', CoffeeProductController::class)->except(['show']);
        Route::get('products/{product}', [CoffeeProductController::class, 'show'])->name('products.show');
        
        // Contact Messages Management
        Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);
        Route::patch('/contacts/{contact}/status', [ContactController::class, 'updateStatus'])->name('contacts.updateStatus');
        Route::post('/contacts/mark-all-read', [ContactController::class, 'markAllAsRead'])->name('contacts.markAllAsRead');
        Route::get('/contacts/unread-count', [ContactController::class, 'getUnreadCount'])->name('contacts.unreadCount');
    });
});