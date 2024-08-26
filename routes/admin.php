<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/admin', [AdminController::class, 'showLoginForm'])->name('admin-login-form');
Route::post('/admin/login', [AdminController::class, 'adminLogin'])->name('admin-login');
Route::get('admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin-dashboard');
Route::get('admin/dashboard/users', [AdminController::class, 'showDashboardUsers'])->name('admin-dashboard-users');
Route::put('admin/dashboard/resetPassword', [AdminController::class, 'resetPassword'])->name('admin-reset-password');
Route::delete('admin/dashboard/deleteAccount', [AdminController::class, 'deleteAccount'])->name('admin-delete-account');