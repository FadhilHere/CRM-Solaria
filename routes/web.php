<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Pelanggan\LandingPageController;

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

// Register routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route untuk halaman admin, dilindungi oleh middleware checkRole:admin
Route::middleware('checkRole:admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

// Route untuk halaman pelanggan, dilindungi oleh middleware checkRole:pelanggan
Route::middleware('checkRole:pelanggan')->group(function () {
    Route::get('/landing', [LandingPageController::class, 'index'])->name('pelanggan.landing');
});

// Route untuk halaman unauthorized
Route::get('/unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');
