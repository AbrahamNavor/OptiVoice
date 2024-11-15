<?php

use App\Http\Controllers\controladorVista;
use Illuminate\Support\Facades\Route;

/* Route::view('/','inicio')->name('rutaInicio');
Route::view('/panel','panel')->name('rutaPanel');
Route::view('/creacion_tareas','creacion_tareas')->name('rutaCreacion'); */

Route::get('/inicio', [controladorVista::class,'inicio'])->name('rutaInicio');
Route::get('/panel', [controladorVista::class,'panel'])->name('rutaPanel'); 
Route::get('/creacion_tareas', [controladorVista::class,'creacion_tareas'])->name('rutaCreacion');
Route::get('/', [controladorVista::class,'index'])->name('rutaIndex');
Route::get('/sesion', [controladorVista::class,'sesion'])->name('rutaSesion');
Route::get('/nueva_cuenta', [controladorVista::class,'nueva_cuenta'])->name('rutaNuevaCuenta');

Route::post('/procesarTarea', [controladorVista::class,'procesarTarea'])->name('rutaProcesarTarea');



Route::post('creacion_tareas', [controladorVista::class,'procesarTarea'])->name('rutaCrearTarea');