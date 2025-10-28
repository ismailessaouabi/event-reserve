<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Organizer\EventOrganiserController;

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'showformlogin'])->name('login.form');
    Route::get('register', [AuthController::class, 'showformregister'])->name('register.form');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('organizer')->middlewire('auth')->group(function () {
    Route::get('les_events', [EventOrganiserController::class, 'list_events'])
        ->name('les_events_organizer');
});
 















   








