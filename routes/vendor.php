<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Vendor\VendorProfileController;

// Vendor Routes
Route::get('dashboard', [VendorController::class, 'index'])->name('dashboard');

// Profile Routes
Route::post('profile/update-photo/{id}', [VendorProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');
Route::post('profile/update-password/{id}', [VendorProfileController::class, 'updatePassword'])->name('profile.updatePassword');
Route::resource('profile', VendorProfileController::class);