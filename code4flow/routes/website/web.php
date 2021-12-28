<?php

use App\Http\Controllers\website\Auth\ConfirmPasswordController;
use App\Http\Controllers\website\Auth\ForgotPasswordController;
use App\Http\Controllers\website\Auth\ResetPasswordController;
use App\Http\Controllers\website\Auth\LoginController;
use App\Http\Controllers\website\Auth\RegisterController;
use App\Http\Controllers\website\Auth\VerificationController;
use App\Http\Controllers\website\HomeController;
use App\Http\Controllers\website\PoemController;
use App\Http\Controllers\website\ProfileController;
use App\Http\Controllers\website\ReportController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('landing');

Route::get('/notifications', [HomeController::class, 'showNotifications'])->name('notifications');
Route::get('/notifications/delete', [HomeController::class, 'deleteNotifications'])->name('notifications.delete');

Route::get('/poems', [HomeController::class, 'poems'])->name('poems');
Route::resource('user-poems', PoemController::class);
Route::resource('reports', ReportController::class);
Route::resource('profile', ProfileController::class);

// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register/submit', [RegisterController::class, 'register'])->name('register.submit');

// Password Reset Routes...
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Confirm Password
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm'])->name('password.confirm.post');

// Email Verification Routes...
Route::get('email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
