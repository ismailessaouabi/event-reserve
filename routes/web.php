<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use APP\Http\Middleware\RedirectIfNotAuthenticated;

Route::get('/', [CategoryController::class, 'showcategories'])->name('accueill');   
Route::get('/register', [AuthController::class, 'showformregister'])->name('register');
Route::get('/login', [AuthController::class, 'showformlogin'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('/events', [UserController::class, 'index'])->name('events.index');
Route::post('/events', [UserController::class, 'store'])->name('events.store');






Route::get('/events', [EventController::class, 'index'])->name('events.index');





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




   







