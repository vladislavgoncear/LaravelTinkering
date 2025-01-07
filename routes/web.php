<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CarController;

// Rutas para cars
Route::resource('cars', CarController::class);

Route::post('/films', [FilmController::class, 'store'])->name('films.store');

// Rutas para films
Route::resource('films', FilmController::class);

Route::get('/', function () {
    return view('welcome');
});

// Ruta para el dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




