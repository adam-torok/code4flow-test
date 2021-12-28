<?php

use App\Http\Controllers\admin\Auth\ConfirmPasswordController;
use App\Http\Controllers\admin\Auth\ForgotPasswordController;
use App\Http\Controllers\admin\Auth\LoginController;
use App\Http\Controllers\admin\Auth\VerificationController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ManagePoemsController;
use App\Http\Controllers\admin\ManageReportsController;
use App\Http\Controllers\admin\ManageUsersController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('users', ManageUsersController::class);
    Route::resource('poems', ManagePoemsController::class);
    Route::get('/user/{id}/disable', [ManageUsersController::class, 'toggleUser'])->name('toggle-user');
    Route::resource('reports', ManageReportsController::class);
});


// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

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
