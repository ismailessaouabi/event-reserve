<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'showformlogin'])->name('login.form');
    Route::get('register', [AuthController::class, 'showformregister'])->name('register.form');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
 















   








