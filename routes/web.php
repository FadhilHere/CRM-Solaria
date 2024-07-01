<?php

use Illuminate\Support\Facades\Route;

// Auth
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Pelanggan
use App\Http\Controllers\Pelanggan\LandingPageController;
use App\Http\Controllers\Pelanggan\ContactController;
use App\Http\Controllers\Pelanggan\CartController;

// Admin
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PromoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingPageController::class, 'index']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/contact-submit', [ContactController::class, 'submit'])->name('contact.submit');

// Register routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route untuk halaman admin, dilindungi oleh middleware checkRole:admin
Route::middleware('checkRole:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
    Route::post('/menus', [MenuController::class, 'store'])->name('menus.store');
    Route::get('/menus/{id}', [MenuController::class, 'show'])->name('menus.show');
    Route::put('/menus/{id}', [MenuController::class, 'update'])->name('menus.update');
    Route::delete('/menus/{id}', [MenuController::class, 'destroy'])->name('menus.destroy');

    // Routes untuk Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::put('orders/{id}/change-status', [OrderController::class, 'changeStatus'])->name('orders.changeStatus');

    // Routes untuk Order Details
    Route::get('/order-details', [OrderDetailController::class, 'index'])->name('order-details.index');
    Route::get('/order-details/{id}', [OrderDetailController::class, 'show'])->name('order-details.show');

    // Routes for Kritik & Saran
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    // Routes for User Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Routes for Promo
    Route::get('promos', [PromoController::class, 'index'])->name('promos.index');
    Route::get('promos/create', [PromoController::class, 'create'])->name('promos.create');
    Route::post('promos', [PromoController::class, 'store'])->name('promos.store');
    Route::get('promos/{id}/edit', [PromoController::class, 'edit'])->name('promos.edit');
    Route::put('promos/{id}', [PromoController::class, 'update'])->name('promos.update');
    Route::delete('promos/{id}', [PromoController::class, 'destroy'])->name('promos.destroy');
});

// Route untuk halaman pelanggan, dilindungi oleh middleware checkRole:pelanggan
Route::middleware('checkRole:pelanggan')->group(function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('pelanggan.landing');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/menus/{id}/detail', [LandingPageController::class, 'show'])->name('menus.detail');

    Route::post('/cart/{id}/add', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/calculate-discount', [CartController::class, 'calculateDiscount'])->name('cart.calculate-discount');

    Route::get('/profile', [LandingPageController::class, 'profile'])->name('profile');
});
