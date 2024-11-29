<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HistoryActivityController;
use App\Http\Controllers\ProductLocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;


// Public Routes (No Authentication Required)
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// Authentication Routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('logout');
});

// Protected Routes (Requires Authentication)
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Category Management Routes
    Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Product Management Routes
    Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Show user profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

    // Show profile edit form
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Update profile
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');


    Route::get('/history', [HistoryActivityController::class, 'index'])->name('history.index');
    Route::post('/products/{id}/add-stock', [ProductController::class, 'addStock'])->name('products.addStock');
    // Route untuk mengurangi stok
    Route::post('/products/{id}/reduce-stock', [ProductController::class, 'reduceStock'])->name('products.reduceStock');
});

// Product Location Routes (requires authentication)
Route::middleware('auth')->prefix('locations')->name('locations.')->controller(ProductLocationController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');  // Create Location
    Route::post('/', 'store')->name('store');  // Store new location
    Route::get('/{id}/edit', 'edit')->name('edit');  // Edit Location
    Route::put('/{id}', 'update')->name('update');  // Update location
    Route::delete('/{id}', 'destroy')->name('destroy'); // Delete location
});

Route::middleware('auth')->group(function () {
    // Route untuk mengatur stok produk
    Route::get('/products/{id}/adjust-stock', [ProductController::class, 'adjustStockForm'])->name('products.adjustStockForm');
    Route::post('/products/{id}/adjust-stock', [ProductController::class, 'adjustStock'])->name('products.adjustStock');
});


Route::prefix('notifications')->name('notifications.')->middleware('auth')->group(function () {
    Route::get('/', [NotificationController::class, 'index'])->name('index');
    Route::get('/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('markAsRead');
    Route::get('/delete/{id}', [NotificationController::class, 'delete'])->name('delete');
});
