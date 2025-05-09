<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use APP\Http\Middleware\RedirectIfNotAuthenticated;

Route::get('/', function () { return view('pages.accuiell');})->name('accueill');   
Route::get('/register', [AuthController::class, 'showformregister'])->name('register');
Route::get('/login', [AuthController::class, 'showformlogin'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/admin', function () {
    return view('dashboard.admin.layouts');
})->name('admin');
Route::get('/payement', function () {
    return view('pages.payement');
})->name('payement');
Route::get('/organizer', function () {
    return view('dashboard.organizer.layouts');
})->name('organizer');
Route::get('/organizerinfo', function () {
    return view('dashboard.organizer.organizer');
})->name('organizer.information');
Route::get('/events',function () {
    return view('dashboard.admin.events');
})->name('events.index');




   







