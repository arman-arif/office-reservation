<?php

use App\Http\Controllers\OfficeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Offices...
Route::get('/offices', [OfficeController::class, 'index']);
