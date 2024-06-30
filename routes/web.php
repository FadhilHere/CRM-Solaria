<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Pelanggan\LandingPageController;
use App\Http\Controllers\Pelanggan\ContactController;
use App\Http\Controllers\Admin\UserController;

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
});

// Route untuk halaman pelanggan, dilindungi oleh middleware checkRole:pelanggan
Route::middleware('checkRole:pelanggan')->group(function () {
    Route::get('/landing', [LandingPageController::class, 'index'])->name('pelanggan.landing');
});

// Route untuk halaman unauthorized
Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');
