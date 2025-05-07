<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () { return view('pages.accuiell');});   
Route::resource('admin/users', UserController::class);
Route::resource('admin/events', EventController::class);
Route::resource('admin/categories', CategoryController::class);
Route::get('/', function () { return view('pages.accuiell');});
Route::get('/register', [AuthController::class, 'showformregister'])->name('register');
Route::get('/login', [AuthController::class, 'showformlogin'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {  return view('dashboard.customer');})->name('dashboard');
   







