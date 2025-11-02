<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Organizer\EventOrganiserController;
use App\Http\Controllers\Organizer\OrganiserInfoController;
use App\Http\Controllers\Pages\GetEventController;

Route::get('/', [GetEventController::class, 'list_events'])->name('home');

Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'showformlogin'])->name('login.form');
    Route::get('register', [AuthController::class, 'showformregister'])->name('register.form');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::delete('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('organizer')->group(function () {

    Route::get('les_events', [EventOrganiserController::class, 'list_events'])
        ->name('les_events_organizer');
    Route::get('ajouter_event', [EventOrganiserController::class, 'create_event'])
        ->name('ajouter_event_organizer');
    Route::post('store_event', [EventOrganiserController::class, 'store_event'])
        ->name('store_event');
    Route::delete('destroy_event/{id}', [EventOrganiserController::class, 'destroy_event'])
        ->name('destroy_event_organizer');
    Route::get('show_event/{id}', [EventOrganiserController::class, 'show_event'])
        ->name('show_event_organizer');
    Route::get('edit_event/{id}', [EventOrganiserController::class, 'edit_event'])
        ->name('edit_event_organizer');
    Route::put('update_event/{id}', [EventOrganiserController::class, 'update_event'])
        ->name('update_event_organizer');

    Route::get('info_organiser', function () { return view('dashboard.organizer.organizer_info');})
        ->name('info_organiser');
    Route::put('update_organiser_info', [OrganiserInfoController::class, 'update_organiser_info'])
        ->name('update_organiser_info');
    Route::get('statistiques', function () { return view('dashboard.organizer.statistiques');})
        ->name('statistiques_organizer');
});


    
       
















   








