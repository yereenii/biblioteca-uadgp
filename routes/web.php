<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AutoreController;



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('autores', AutoreController::class);
