<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminPricingController;
use App\Http\Controllers\MitraController;

Route::get('/', [RouteController::class, 'index'])->name('home');
Route::get('/', [RouteController::class, 'index'])->name('route.homepage');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard Routes
Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'user'])->name('dashboard');
  Route::get('/admin', [DashboardController::class, 'admin'])->name('admin')->middleware('admin');
  // User order views
  Route::get('/dashboard/orders', [OrderController::class, 'userOrders'])->name('dashboard.orders');
  Route::get('/dashboard/orders/{order}', [OrderController::class, 'userShow'])->name('dashboard.orders.show');
});

// Mitra (Daftar Mitra/Driver)
Route::get('/mitra/daftar', [PartnerController::class, 'show'])
    ->name('mitra.show');

Route::post('/mitra/daftar', [PartnerController::class, 'submit'])
    ->name('mitra.submit');

// Artikel / Edukasi
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('artikel.show');

// Pricing (Harga Layanan)
Route::get('/pricing', [PricingController::class, 'index'])->name('pricing.index');

// Orders (Create/Store)
Route::get('/order', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

// mitra approval
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/mitra', [MitraController::class, 'index'])
        ->name('mitra.index');

    Route::post('/admin/mitra/{id}/approve', [MitraController::class, 'approve'])
        ->name('mitra.approve');
});


// Tracking
Route::get('/track', [TrackingController::class, 'index'])->name('track.index');
Route::post('/track', [TrackingController::class, 'track'])->name('track.search');

// Admin Orders
Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
  Route::get('/admin/orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');
  Route::post('/admin/orders/{order}/assign', [AdminOrderController::class, 'assignDriver'])->name('admin.orders.assign');
  Route::post('/admin/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.status');
  // Pricing Management
  Route::get('/admin/pricing', [AdminPricingController::class, 'index'])->name('admin.pricing');
  Route::get('/admin/pricing/create', [AdminPricingController::class, 'create'])->name('admin.pricing.create');
  Route::post('/admin/pricing', [AdminPricingController::class, 'store'])->name('admin.pricing.store');
  Route::get('/admin/pricing/{category}/edit', [AdminPricingController::class, 'edit'])->name('admin.pricing.edit');
  Route::put('/admin/pricing/{category}', [AdminPricingController::class, 'update'])->name('admin.pricing.update');
  Route::delete('/admin/pricing/{category}', [AdminPricingController::class, 'destroy'])->name('admin.pricing.destroy');
});

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/syaratdanketentuan', [RouteController::class, 'termsandconditions'])->name('syaratdanketentuan');
