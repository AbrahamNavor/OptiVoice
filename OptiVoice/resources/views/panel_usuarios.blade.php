@extends('layouts.plantilla')
@section('titulo','Panel Usuarios | OptiVoice')

@section('contenido')
@vite(['resources/css/styles.css'])

<div class="container2">
    <x-table 
        :headers="['#', __('Nombre'), __('Apellido'), __('Email'), __('Contraseña'), __('Creado a las'), __('Actualizado a las'), __('Acciones')]" 
        :rows="$usuarios->map(function ($usuario) {
            return [
                $usuario->id,
                $usuario->nombre,
                $usuario->apellido,
                $usuario->email,
                $usuario->password,
                $usuario->created_at->format('H:i'),
                $usuario->updated_at->format('H:i'),
                // Concatenamos ambos botones con un espacio
                '<a href="' . route('rutaUsuarioEditar', $usuario->id) . '" class="btn btn-warning btn-sm">' . __('Actualizar') . '</a>' .
                ' ' .
                '<a href="' . route('rutaUsuarioEliminar', $usuario->id) . '" class="btn btn-danger btn-sm">' . __('Eliminar') . '</a>',
            ];
        })->toArray()"
    />
</div>
@endsection