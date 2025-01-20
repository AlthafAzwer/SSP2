<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Livewire\AdminManageProducts; // Correct namespace for Livewire component
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

// Home Page Route - Accessible by all users
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products Page Route - Accessible by all users
Route::get('/products', [ProductsController::class, 'index'])->name('products');

// Contact Page Route - Accessible by all users
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

// Blog Page Route - Accessible by all users
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

// Dashboard - Accessible only by authenticated users
Route::get('/dashboard', function () {
    return redirect()->route('home'); // Redirect to home after login instead of dashboard
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Management (requires authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include Breeze authentication routes
require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Admin Login Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Admin Login
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    // Admin Dashboard and Protected Routes (requires 'admin' middleware)
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/manage-products', [AdminDashboardController::class, 'manage'])->name('manage-products');


        
        
        
        
        // Livewire Component for Manage Products
        
    });
});
