<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\PasswordCreateController;


Route::get('verification', [VerificationController::class, 'verify'])->name('account.verification');
Route::get('verification/email', [VerificationController::class, 'resendForm'])->name('verification.form');
//Route::post('verification/email', [VerificationController::class, 'send'])->name('verification.send');

Route::get('account/password-create/{user}', [PasswordCreateController::class, 'create'])
    ->name('account.password.create');
Route::post('account/password-submit/{user}', [PasswordCreateController::class, 'store'])
    ->name('account.password.store');
