<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () { return view('pages.accuiell');})->name('accueill');   
Route::get('/register', [AuthController::class, 'showformregister'])->name('register');
Route::get('/login', [AuthController::class, 'showformlogin'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', function () { return view('dashboard.admin.layouts');})->name('admin');
Route::get('/organizer', function () { return view('dashboard.organizer.layouts');})->name('organizer');
Route::get('/user', function () { return view('dashboard.customer.layouts');})->name('customer');


   







