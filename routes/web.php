<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ServiceController; // Controller Admin (CRUD)
use App\Http\Controllers\OrderController;   // Controller Order (Guest Checkout)
use App\Models\Service;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. HOMEPAGE (LANDING)
Route::get('/', [LandingController::class, 'index'])->name('landing');

// 2. AUTHENTICATION (Login, Register, Logout)
Auth::routes();

// 3. DASHBOARD (Halaman setelah login)
Route::get('/home', [HomeController::class, 'index'])->name('home');

// 4. HALAMAN MENU (Navbar)
Route::get('/promo', function () {
    return view('promo');
})->name('promo');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// 5. HALAMAN DETAIL LAYANAN (Public)
Route::get('/service/{id}', function ($id) {
    $service = Service::find($id);
    return view('service', compact('service'));
})->name('service.show');

// 6. ADMIN PANEL (CRUD SERVICES)
// INTEGRASI LANGKAH 2: Menambahkan middleware('auth') di sini
// Agar user yang belum login otomatis ditendang ke halaman login saat akses /admin/services
Route::resource('admin/services', ServiceController::class)->middleware('auth');

// 7. ORDER / PEMESANAN (GUEST CHECKOUT)
Route::get('/order/{service}', [OrderController::class, 'create'])->name('order.create'); // Menampilkan form
Route::post('/order', [OrderController::class, 'store'])->name('order.store');            // Menyimpan data pesanan