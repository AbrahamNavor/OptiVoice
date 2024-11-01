<?php

use Illuminate\Support\Facades\Route;

Route::view('/','inicio')->name('rutaInicio');
Route::view('/panel','panel')->name('rutaPanel');
Route::view('/creacion_tareas','creacion_tareas')->name('rutaCreacion');