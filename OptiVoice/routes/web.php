<?php

use App\Http\Controllers\TareasController;
use Illuminate\Support\Facades\Route;

// Rutas para TareasController
Route::get('/', [TareasController::class, 'home'])->name('rutaIndex');
Route::get('/inicio', [TareasController::class, 'inicio'])->name('rutaInicio');
Route::get('/panel', [TareasController::class, 'panel'])->name('rutaPanel');
Route::get('/sesion', [TareasController::class, 'sesion'])->name('rutaSesion');
Route::get('/nueva_cuenta', [TareasController::class, 'nuevaCuenta'])->name('rutaNuevaCuenta');
Route::get('/panel_usuarios', [TareasController::class, 'panelUsuarios'])->name('rutaPanelUsuarios');

// Rutas para las tareas
Route::prefix('tareas')->group(function () {
    Route::get('/', [TareasController::class, 'index'])->name('rutaTareas');
    Route::get('/create', [TareasController::class, 'create'])->name('rutaCreacion');
    Route::post('/', [TareasController::class, 'store'])->name('rutaCrearTarea');
});
