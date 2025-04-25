<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventsCategoryController;

Route::get('/', function () {
    return view('welcome');
});


