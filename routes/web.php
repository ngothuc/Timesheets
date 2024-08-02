<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login-form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/profile', [LoginController::class, 'showProfile'])->name('profile');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register-form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/change-password', [PasswordController::class, 'showChangePasswordForm'])->name('change-password-form');
Route::put('/change-password', [PasswordController::class, 'changePassword'])->name('change-password');
