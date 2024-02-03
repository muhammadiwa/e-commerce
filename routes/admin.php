<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Admin\SliderController;

// Admin Routes
Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::post('logout', [AdminController::class, 'logout'])->name('logout');
// Profile Routes
Route::post('profile/update-photo/{id}', [ProfileController::class, 'updatePhoto'])->name('profile.updatePhoto');
Route::post('profile/update-password/{id}', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
Route::resource('profile', ProfileController::class);

// Sliders Routes
Route::resource('sliders', SliderController::class);