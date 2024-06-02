<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AutoreController;
use App\Http\Controllers\TiposDocumentoController;



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('autores', AutoreController::class);
    Route::resource('tipos-documentos', TiposDocumentoController::class);
});
Route::redirect('/', '/home');