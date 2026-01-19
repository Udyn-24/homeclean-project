<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;

// 1. HOMEPAGE (LANDING)
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
    
    // Password Reset Routes
    Route::get('password/reset', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [\App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [\App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');
});

// Logout
Auth::routes(['logout' => false]);

Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// 3. DASHBOARD BERDASARKAN ROLE
Route::get('/home', [HomeController::class, 'index'])->name('home');

// 4. PUBLIC PAGES
Route::get('/promo', function () { return view('promo'); })->name('promo');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/contact', function () { return view('contact'); })->name('contact');
Route::get('/service/{id}', function ($id) {
    $service = \App\Models\Service::find($id);
    
    if (!$service) {
        abort(404);
    }
    return view('service', compact('service'));
})->name('service.show');

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('can:admin')->name('dashboard');
    
    // Service Management
    Route::get('/services', [AdminController::class, 'services'])->name('services');
    Route::get('/services/create', [AdminController::class, 'createService'])->name('services.create');
    Route::post('/services', [AdminController::class, 'storeService'])->name('services.store');
    Route::get('/services/{service}/edit', [AdminController::class, 'editService'])->name('services.edit');
    Route::put('/services/{service}', [AdminController::class, 'updateService'])->name('services.update');
    Route::delete('/services/{service}', [AdminController::class, 'destroyService'])->name('services.destroy');
    
    // Order Management
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::put('/orders/{order}/status', [AdminController::class, 'updateOrderStatus'])->name('orders.updateStatus');
});

// 6. CLEANER ROUTES
Route::middleware(['auth', 'role:cleaner'])->prefix('cleaner')->name('cleaner.')->group(function () {
    Route::get('/dashboard', function () {
        $orders = \App\Models\Order::where('worker_id', auth()->id())
            ->orWhere('status', 'pending')
            ->with('service')
            ->get();
        return view('cleaner.dashboard', compact('orders'));
    })->name('dashboard');
});

// 7. CUSTOMER ROUTES
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/history', [\App\Http\Controllers\User\HistoryController::class, 'index'])->name('user.history');
    Route::get('/history/{order}', [\App\Http\Controllers\User\HistoryController::class, 'show'])->name('user.history.show');
    Route::post('/history/{order}/review', [\App\Http\Controllers\User\HistoryController::class, 'review'])->name('user.history.review');
});

// 8. GUEST ORDER (tanpa login)
Route::get('/order/{service}', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

// Tambahkan parameter service_id ke route create
Route::get('/order/create/{service}', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

// Service Routes
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/layanan', [ServiceController::class, 'index'])->name('services.index');

Route::get('/promo', [PageController::class, 'promo'])->name('promo');
Route::get('/tentang', [PageController::class, 'tentang'])->name('tentang');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');