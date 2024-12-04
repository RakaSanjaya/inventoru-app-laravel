<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryActivityController;
use App\Http\Controllers\ProductLocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegistrationForm')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('categories')->name('categories.')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
        Route::post('/{id}/add-stock', 'addStock')->name('addStock');
        Route::post('/{id}/reduce-stock', 'reduceStock')->name('reduceStock');
        Route::get('/{id}/adjust-stock', 'adjustStockForm')->name('adjustStockForm');
        Route::post('/{id}/adjust-stock', 'adjustStock')->name('adjustStock');
    });

    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/edit', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
    });

    Route::get('/history', [HistoryActivityController::class, 'index'])->name('history.index');
    Route::delete('/history/{id}', [HistoryActivityController::class, 'destroy'])->name('history.destroy');
    Route::delete('/history', [HistoryActivityController::class, 'destroyAll'])->name('history.destroyAll');
    Route::get('/account', [AccountController::class, 'show'])->name('account.show');
});

Route::middleware('auth')->prefix('locations')->name('locations.')->controller(ProductLocationController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});

Route::prefix('notifications')->name('notifications.')->middleware('auth')->group(function () {
    Route::get('/', [NotificationController::class, 'index'])->name('index');
    Route::get('/mark-as-read/{id}', [NotificationController::class, 'markAsRead'])->name('markAsRead');
    Route::get('/delete/{id}', [NotificationController::class, 'delete'])->name('delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('accounts.index');
    Route::post('/account/update', [AccountController::class, 'updateAccount'])->name('accounts.update');
    Route::post('/account/change-password', [AccountController::class, 'changePassword'])->name('accounts.changePassword');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    // Menampilkan semua akun pengguna
    Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');

    // Menampilkan detail akun pengguna
    Route::get('/accounts/{id}', [AccountController::class, 'show'])->name('accounts.show');

    // Menampilkan halaman form untuk mengedit akun pengguna
    Route::get('/accounts/{id}/edit', [AccountController::class, 'edit'])->name('accounts.edit');

    // Memperbarui data akun pengguna
    Route::put('/accounts/{id}', [AccountController::class, 'update'])->name('accounts.update');

    // Menghapus akun pengguna
    Route::delete('/accounts/{id}', [AccountController::class, 'destroy'])->name('accounts.destroy');
});
