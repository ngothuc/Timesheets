<?php

use App\Models\Timesheet;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TimesheetController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login-form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/profile', [LoginController::class, 'showProfile'])->name('profile');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register-form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/change-password', [PasswordController::class, 'showChangePasswordForm'])->name('change-password-form');
Route::put('/change-password', [PasswordController::class, 'changePassword'])->name('change-password');
Route::put('/profile', [UserController::class, 'updateProfile'])->name('update-profile');


Route::get('/timesheets', [TimesheetController::class, 'showListTimesheets'])->name('timesheets-list');
Route::put('/timesheets/{timesheet}/update', [TimesheetController::class, 'update'])->name('timesheet-update');
Route::delete('/timesheets/{timesheet}/delete', [TimesheetController::class, 'delete'])->name('timesheet-delete');
Route::get('/timesheets/create', [TimesheetController::class, 'create'])->name('timesheets-create');
Route::post('/timesheets', [TimesheetController::class, 'store'])->name('timesheets-store');


Route::get('/timesheets/{timesheet}/tasks', [TaskController::class, 'showTasks'])->name('tasks-list');
Route::get('/tasks/{task}/view', [TaskController::class, 'taskView'])->name('task-view');
Route::put('/tasks/{task}/update', [TaskController::class, 'update'])->name('task-update');
Route::delete('/tasks/{task}/delete', [TaskController::class, 'delete'])->name('task-delete');
Route::get('/timesheets/{timesheet}/tasks/create', [TaskController::class, 'create'])->name('task-create');
Route::post('/timesheets/{timesheet}/tasks/store', [TaskController::class, 'store'])->name('task-store');