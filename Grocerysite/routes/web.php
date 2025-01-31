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
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QueryController;


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

// Home Page Route - Accessible by all users
Route::get('/', [HomeController::class, 'index'])->name('home');

// Products Page Route - Accessible by all users
// User Products Page
Route::get('/products', App\Livewire\ProductsListing::class)->name('products');
// Route for Products page
Route::get('/products', [ProductsController::class, 'index'])->name('products');

Route::get('/cart', App\Livewire\CartPage::class)->name('cart');
Route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');

Route::get('/orders', [OrderController::class, 'userOrders'])->name('user.orders');
    Route::get('/orders/{id}', [OrderController::class, 'userOrderDetails'])->name('user.orders.show');

Route::get('/test', function () {
    return view('test'); // This matches resources/views/test.blade.php
});





// Contact Page Route - Accessible by all users
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

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
        Route::get('/manage-users', [AdminDashboardController::class, 'manageUsers'])->name('admin.manage-users');
        Route::delete('/delete-user/{id}', [AdminDashboardController::class, 'deleteUser'])->name('admin.delete-user');
        Route::get('/manage-products', [AdminDashboardController::class, 'manage'])->name('manage-products');
        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
        Route::post('/orders/{id}/update-status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
        Route::delete('/orders/{id}', [OrderController::class, 'deleteOrder'])->name('admin.orders.delete');
        Route::get('/queries', [QueryController::class, 'index'])->name('admin.queries.index');
Route::get('/queries/{id}', [QueryController::class, 'show'])->name('admin.queries.show');
Route::delete('/queries/{id}', [QueryController::class, 'delete'])->name('admin.queries.delete');

        




        
        
        
        
        // Livewire Component for Manage Products
        
    });
});
