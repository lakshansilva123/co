<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GarmentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GarmentReturnController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\PricingTaxController;

// Guest routes
Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

// Authenticated user routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('customers', CustomerController::class);
    Route::resource('garments', GarmentController::class);
    Route::resource('bookings', BookingController::class);
    Route::resource('bookings.payments', PaymentController::class);
    Route::resource('returns', GarmentReturnController::class)->only([
        'index', 'create', 'store', 'show'
    ]);
    Route::resource('reports', ReportController::class)->only([
        'index'
    ]);
    
    Route::name('settings.')->prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::get('/pricing-tax', [PricingTaxController::class, 'index'])->name('pricing-tax');
    });
});

require __DIR__.'/auth.php';
