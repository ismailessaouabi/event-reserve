<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlaceController;

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
Route::get('events', [CategoryController::class, 'categoryonevents'])->name('categories.events');




Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::post('/admin/events', [EventController::class, 'store'])->name('events.store');
Route::get('/admin/events', [EventController::class, 'index'])->name('events.index');
Route::get('/', [EventController::class, 'home'])->name('events.home');
Route::get('/admin/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
Route::put('/admin/events/{id}', [EventController::class, 'update'])->name('events.update');
Route::delete('/admin/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

Route::get('/places', [PlaceController::class, 'index'])->name('places.index');
Route::post('/places', [PlaceController::class, 'store'])->name('places.store');
Route::get('/places/edit/{id}', [PlaceController::class, 'edit'])->name('places.edit');
Route::put('/places/{id}', [PlaceController::class, 'update'])->name('places.update');
Route::delete('/places/{id}', [PlaceController::class, 'destroy'])->name('places.destroy');





Route::get('/admin', function () {
    return view('dashboard.admin.layouts');
})->name('admin')->middleware('auth');
Route::get('/payement', function () {
    return view('pages.payement');
})->name('payement');

Route::get('/organizerinfo', function () {
    return view('dashboard.organizer.organizer');
})->name('organizer.information');
Route::get('/organizer', [EventController::class, 'countevents'])->name('organizer');
Route::get('/organizerevent', [EventController::class, 'organiserevents'])->name('organizer.mesevents');
Route::get('/billes', function () {return view('dashboard.organizer.billets-vendus');})->name('organizer.billets');
Route::get('/statistiques', function () {return view('dashboard.organizer.statistiques');})->name('organizer.statistiques');
Route::get('/payements', function () {return view('dashboard.organizer.payements');})->name('organizer.payements');
Route::get('/participants', [UserController::class, 'mesinformation'])->name('organizer.participants');
Route::put('/organizer/{id}', [UserController::class, 'updateinfo'])->name('organizer.update');
Route::get('/socialmedia', [SocialmediaController::class, 'index'])->name('organizer.socialmedia');
Route::post('/socialmedia', [SocialmediaController::class, 'store'])->name('socialmedia.store');









   







