<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;

Route::get('/', [EventController::class, 'home'])->name('home'); 
    

Route::get('/register', [AuthController::class, 'showformregister'])->name('register');
Route::get('/login', [AuthController::class, 'showformlogin'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('dashboard.customer');
})->name('dashboard');
Route::resource('events', EventController::class);
Route::resource('categories', CategoryController::class);

Route::get('/admin',function () {
    return view('admin.layouts');
})->name('admin');
Route::get('/admin/users', [AdminController::class, 'allusers'])->name('admin.users');
Route::get('/admin/events', [AdminController::class, 'allevents'])->name('admin.events');
Route::get('/admin/categories', [AdminController::class, 'allcategories'])->name('admin.categories');
Route::get('/admin/users/{id}', [AdminController::class, 'showuser'])->name('admin.users.show');
Route::get('/admin/events/{id}', [AdminController::class, 'showevent'])->name('admin.events.show');
Route::get('/admin/categories/{id}', [AdminController::class, 'showcategory'])->name('admin.categories.show');
Route::get('/admin/users/{id}/edit', [AdminController::class, 'edituser'])->name('admin.users.edit');
Route::get('/admin/events/{id}/edit', [AdminController::class, 'editevent'])->name('admin.events.edit');
Route::get('/admin/categories/{id}/edit', [AdminController::class, 'editcategory'])->name('admin.categories.edit');
Route::put('/admin/users/{id}', [AdminController::class, 'updateuser'])->name('admin.users.update');
Route::put('/admin/events/{id}', [AdminController::class, 'updateevent'])->name('admin.events.update');
Route::put('/admin/categories/{id}', [AdminController::class, 'updatecategory'])->name('admin.categories.update');
Route::delete('/admin/users/{id}', [AdminController::class, 'destroyuser'])->name('admin.users.destroy');
Route::delete('/admin/events/{id}', [AdminController::class, 'destroyevent'])->name('admin.events.destroy');
Route::delete('/admin/categories/{id}', [AdminController::class, 'destroycategory'])->name('admin.categories.destroy');
Route::get('/admin/users/create', [AdminController::class, 'createuser'])->name('users.create');
Route::get('/admin/events/create', [AdminController::class, 'createevent'])->name('admin.events.create');
Route::get('/admin/categories/create', [AdminController::class, 'createcategory'])->name('categories.create');
Route::post('/admin/users', [AdminController::class, 'storeuser'])->name('admin.users.store');
Route::post('/admin/events', [AdminController::class, 'storeevent'])->name('admin.events.store');
Route::post('/admin/categories', [AdminController::class, 'storecategory'])->name('admin.categories.store');



