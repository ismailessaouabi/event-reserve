<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\PayementController;
use App\Http\Controllers\SocialmediaController;
 




// Routes d'authentification
Route::get('/', [CategoryController::class, 'showcategories'])->name('accueill');   
Route::get('/register', [AuthController::class, 'showformregister'])->name('register');
Route::get('/login', [AuthController::class, 'showformlogin'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// Routes pour payements dans page d'accueil
Route::get('/payement/{id}', [PayementController::class, 'createTransaction'])->name('payement.checkout');
Route::post('/payement/{id}/process', [PayementController::class, 'processTransaction'])->name('payement.process');
Route::get('/payement/{id}/success', [PayementController::class, 'successTransaction'])->name('payement.success');
Route::get('/payement/cancel', [PayementController::class, 'cancelTransaction'])->name('payement.cancel'); // Ajoutez cette route
Route::get('/tecket/index/{id}', [PayementController::class, 'index'])->name('tecket.index');
Route::get('/tickets/{ticket}/download', [PayementController::class, 'generateTicket'])
    ->name('tickets.download');
// Route pour lister events par  accuiel
Route::get('/event/{id}', [EventController::class, 'show_event_accueil'])->name('accueil.event.show');
Route::get('/', [EventController::class, 'list_8events_accueil'])->name('events.home');
Route::get('/list_events', [EventController::class, 'list_events_accueil'])->name('tout.events');
Route::get('/eventsparcategorie/{id}', [CategoryController::class, 'events_par_categorie_accueil'])->name('eventsparcategory');   
Route::get('/eventsrecherche', [EventController::class, 'events_rechercher_accueil'])->name('events.rechercher');
Route::get('/eventsfiltrer', [EventController::class, 'filtrer_events_accueil'])->name('events.filtrer');








//Routes pour authentification admin
Route::get('/login-admin', [AuthController::class, 'showformlogin_admin'])->name('login.admin');
Route::post('/login-admin', [AuthController::class, 'login_admin'])->name('login.admin.post');
// Routes des catégories dans dashboard admin 
Route::get('/categories', [CategoryController::class, 'index_category_admin'])->name('admin.categories.index');
Route::post('/categories', [CategoryController::class, 'store_category_admin'])->name('admin.categories.store');
Route::get('/categories/edit/{id}', [CategoryController::class, 'edit_category_admin'])->name('admin.categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update_category_admin'])->name('admin.categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy_category_admin'])->name('admin.categories.destroy');
// Routes des utilisateurs dans dashboard admin 
Route::get('/users', [UserController::class, 'index_users_admin'])->name('admin.users.index');
Route::post('/users', [UserController::class, 'store_user_admin'])->name('admin.users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit_user_admin'])->name('admin.users.edit');
Route::put('/users/{id}', [UserController::class, 'update_user_admin'])->name('admin.users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy_user_admin'])->name('admin.users.destroy');
// Routes des evenements dans dashboard admin 
Route::post('/admin/events', [EventController::class, 'store_event_admin'])->name('admin.events.store');
Route::get('/admin/events', [EventController::class, 'list_events_admin'])->name('admin.events.index');
Route::get('/admin/events/edit/{id}', [EventController::class, 'edit_event_admin'])->name('admin.events.edit');
Route::put('/admin/events/{id}', [EventController::class, 'update_event_admin'])->name('admin.events.update');
Route::delete('/admin/events/{id}', [EventController::class, 'destroy_event_admin'])->name('admin.events.destroy');
// Routes des lieux dans dashboard admin 
Route::get('/places', [PlaceController::class, 'index_place_admin'])->name('admin.places.index');
Route::post('/places', [PlaceController::class, 'store_place_admin'])->name('admin.places.store');
Route::get('/places/edit/{id}', [PlaceController::class, 'edit_place_admin'])->name('admin.places.edit');
Route::put('/places/{id}', [PlaceController::class, 'update_place_admin'])->name('admin.places.update');
Route::delete('/places/{id}', [PlaceController::class, 'destroy_place_admin'])->name('admin.places.destroy');





// Routes des informations de l'organisateur dans dashboard organisateur
Route::get('/organizerinfo', [UserController::class, 'mesinformation'])->name('organizer.information');
Route::put('/organizerinfo/{id}', [UserController::class, 'updateinfo'])->name('organizer.update');
Route::get('/organizer', [EventController::class, 'countevents_organizer'])->name('organizer');
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
Route::get('/organizer/participants', [UserController::class, 'display_participants'])->name('organizer.participants');







   








