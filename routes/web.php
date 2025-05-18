<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\SocialmediaController;




// Routes d'authentification
Route::get('/', [CategoryController::class, 'showcategories'])->name('accueill');   
Route::get('/register', [AuthController::class, 'showformregister'])->name('register');
Route::get('/login', [AuthController::class, 'showformlogin'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Routes des catégories dans dashboard admin 
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::get('events', [CategoryController::class, 'categoryonevents'])->name('categories.events');


// Routes des utilisateurs dans dashboard admin 
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


// Routes des evenements dans dashboard admin 
Route::post('/admin/events', [EventController::class, 'store'])->name('events.store');
Route::get('/admin/events', [EventController::class, 'index'])->name('events.index');
Route::get('/', [EventController::class, 'home'])->name('events.home');
Route::get('/admin/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
Route::put('/admin/events/{id}', [EventController::class, 'update'])->name('events.update');
Route::delete('/admin/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');


// Routes des lieux dans dashboard admin 
Route::get('/places', [PlaceController::class, 'index'])->name('places.index');
Route::post('/places', [PlaceController::class, 'store'])->name('places.store');
Route::get('/places/edit/{id}', [PlaceController::class, 'edit'])->name('places.edit');
Route::put('/places/{id}', [PlaceController::class, 'update'])->name('places.update');
Route::delete('/places/{id}', [PlaceController::class, 'destroy'])->name('places.destroy');

// Routes des informations de l'organisateur dans dashboard organisateur
Route::get('/organizerinfo', [UserController::class, 'mesinformation'])->name('organizer.information');
Route::put('/organizerinfo/{id}', [UserController::class, 'updateinfo'])->name('organizer.update');



Route::get('/organizer', [EventController::class, 'countevents'])->name('organizer');
Route::get('/billes', function () {return view('dashboard.organizer.billets-vendus');})->name('organizer.billets');
Route::get('/statistiques', function () {return view('dashboard.organizer.statistiques');})->name('organizer.statistiques');
Route::get('/payements', function () {return view('dashboard.organizer.payements');})->name('organizer.payements');

//Routes pour evenements dans dashboard organisateur
Route::get('/organizer/events', [EventController::class, 'list_events_organizer'])->name('organizer.events.index');
Route::get('/organizer/events/create', [EventController::class, 'create_event_organizer'])->name('organizer.events.create');
Route::post('/organizer/events', [EventController::class, 'store_event_organizer'])->name('organizer.events.store');
Route::get('/organizer/events/{id}', [EventController::class, 'show_event_organizer'])->name('organizer.events.show');
Route::get('/organizer/events/edit/{id}', [EventController::class, 'edit_event_organizer'])->name('organizer.events.edit');
Route::put('/organizer/events/{id}', [EventController::class, 'update_event_organizer'])->name('organizer.events.update');
Route::delete('/organizer/events/{id}', [EventController::class, 'destroy_event_organizer'])->name('organizer.events.destroy');







   







