<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AutoreController;
use App\Http\Controllers\TiposDocumentoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\PalabrasClaveController;
use App\Http\Controllers\PalabrasClaveDocumentoController;



Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('autores', AutoreController::class);
    Route::resource('tipos-documentos', TiposDocumentoController::class);
    Route::resource('documentos', DocumentoController::class);
    Route::resource('palabras-claves', PalabrasClaveController::class);
    Route::resource('palabras-clave-documentos', PalabrasClaveDocumentoController::class);
    Route::resource('bitacora-consultas', BitacoraConsultaController::class);
    Route::resource('niveles-academicos', NivelesAcademicoController::class);
    Route::resource('materias', MateriaController::class);
    Route::resource('alumnos', AlumnoController::class);
    Route::resource('docentes', DocenteController::class);
    Route::resource('investigadores', InvestigadoreController::class);

});
Route::redirect('/', '/home');