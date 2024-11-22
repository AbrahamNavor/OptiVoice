<?php

use App\Http\Controllers\TareasController;
use App\Http\Controllers\controladorVista;
use App\Http\Controllers\usuariosController;
use Illuminate\Support\Facades\Route;

// Rutas de paginas principales
Route::get('/', [controladorVista::class, 'home'])->name('rutaIndex');
Route::get('/inicio', [controladorVista::class, 'inicio'])->name('rutaInicio');
Route::get('/panel', [controladorVista::class, 'panel'])->name('rutaPanel');

// Rutas para usuarios
Route::get('/inicioSesion', [usuariosController::class, 'inicioSesion'])->name('rutaInicioSesion');
Route::get('/nueva_cuenta', [usuariosController::class, 'nuevaCuenta'])->name('rutaNuevaCuenta');
Route::get('/panel_usuarios', [usuariosController::class, 'panelUsuarios'])->name('rutaPanelUsuarios');
Route::post('/procesarCuenta', [usuariosController::class, 'storeUsuarios']);
Route::post('/procesarInicioSesion', [usuariosController::class, 'procesoInicioSesion']);
Route::get('/usuarios/{id}/editar', [usuariosController::class, 'edit'])->name('rutaUsuarioEditar');
Route::put('/usuarios/{id}', [usuariosController::class, 'update']);
Route::delete('/usuarios/{id}', [usuariosController::class, 'destroy'])->name('rutaUsuarioEliminar');

// Rutas para las tareas
Route::get('/tareas', [TareasController::class, 'index'])->name('rutaTareas');
Route::get('/create', [TareasController::class, 'create'])->name('rutaCreacion');
Route::post('/tareas', [TareasController::class, 'store'])->name('rutaCrearTarea');
