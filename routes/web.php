<?php

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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('customers', CustomerController::class);
    Route::resource('garments', GarmentController::class);
    Route::patch('/garments/{garment}/status', [GarmentController::class, 'updateStatus'])->name('garments.updateStatus');
    Route::resource('bookings', BookingController::class);
    Route::resource('bookings.payments', PaymentController::class)->shallow();
    Route::resource('bookings.returns', GarmentReturnController::class)->shallow();
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/settings/pricing-tax', [PricingTaxController::class, 'index'])->name('settings.pricing-tax.index');
});

require __DIR__.'/auth.php';
