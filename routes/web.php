<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\CheckupController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Owner routes
Route::resource('owners', OwnerController::class);

// Pet routes
Route::resource('pets', PetController::class);

// Treatment routes
Route::resource('treatments', TreatmentController::class);

// Checkup routes
Route::resource('checkups', CheckupController::class);
