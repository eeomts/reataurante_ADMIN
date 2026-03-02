<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
        return redirect()->route('dashboard');
    });
// Auth
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/admin/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/admin/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/register', [UsersController::class, 'register'])->name('users.register');

    Route::resource('users', UsersController::class)->except(['create', 'store', 'show']);
});
