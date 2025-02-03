<?php

use App\Http\Controllers\Frontend\InstructorDashboardController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



/***
 * ------------------------------
 * Student Routes
 * ------------------------------
 */

Route::middleware(['auth:web', 'verified', 'check_role:student'])
    ->prefix('student')
    ->as('student.')
    ->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    });


/**
 * ------------------------------
 * Instructor Routes
 * ------------------------------
 */

Route::middleware(['auth:web', 'verified', 'check_role:instructor'])
    ->prefix('instructor')
    ->as('instructor.')
    ->group(function () {
        Route::get('/dashboard', [InstructorDashboardController::class, 'index'])->name('dashboard');
    });




Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');

})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');
require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';

