<?php

use App\Http\Controllers\TareasController;
use App\Http\Controllers\controladorVista;
use App\Http\Controllers\usuariosController;
use Illuminate\Support\Facades\Route;

// Rutas de paginas principales
Route::get('/', [controladorVista::class, 'home'])->name('rutaIndex');
Route::get('/inicio', [controladorVista::class, 'inicio'])->name('rutaInicio');
Route::get('/redireccion', [controladorVista::class, 'redireccion'])->name('rutaRedireccion');

// Rutas para usuarios
Route::get('/inicioSesion', [usuariosController::class, 'inicioSesion'])->name('rutaInicioSesion');
Route::get('/nueva_cuenta', [usuariosController::class, 'nuevaCuenta'])->name('rutaNuevaCuenta');
Route::get('/panel_usuarios', [usuariosController::class, 'panelUsuarios'])->name('rutaPanelUsuarios');
Route::post('/procesarCuenta', [usuariosController::class, 'storeUsuarios']);
Route::post('/procesarInicioSesion', [usuariosController::class, 'procesoInicioSesion']);
Route::get('/olvidarContraseña', [usuariosController::class, 'olvideContraseña'])->name('rutaOlvideContraseña');
Route::post('/procesarOlvideContraseña', [usuariosController::class, 'procesoOlvideContraseña']);
Route::get('/usuarios/{id}/editar', [usuariosController::class, 'edit'])->name('rutaUsuarioEditar');
Route::put('/usuarios/{id}', [usuariosController::class, 'update'])->name('rutaUsuarioActualizar');
Route::delete('/usuarios/{id}', [usuariosController::class, 'destroy'])->name('rutaUsuarioEliminar');

// Rutas para las tareas
Route::get('/tarea/crear', [TareasController::class, 'create'])->name('rutaCreacion');
Route::get('/panel', [TareasController::class, 'panel'])->name('rutaPanel');
Route::post('/tarea/store', [TareasController::class, 'storeTareas'])->name('rutaStoreTarea');
Route::get('/tarea/editar/{id}', [TareasController::class, 'edit'])->name('rutaEditarTarea');
Route::put('/tarea/actualizar/{id}', [TareasController::class, 'update'])->name('rutaActualizarTarea');
Route::delete('/tarea/eliminar/{id}', [TareasController::class, 'destroy'])->name('rutaEliminarTarea');