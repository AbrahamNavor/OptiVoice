@extends('layouts.plantilla')
@section('titulo', 'Inicio Usuario | OptiVoice')

@section('contenido')
<div class="container text-center" style="margin-top: 270px;">
    <h1>{{__('Bienvenido a OptiVoice')}}</h1>
    <div class="mt-4">
        @if(Auth::check() && Auth::user()->esAdministrador())
            <!-- Mostrar solo para administradores -->
            <a href="{{ route('rutaPanelUsuarios') }}" class="btn btn-primary btn-lg mx-2">
                <i class="fas fa-users"></i> {{ __('Revisar usuarios') }}
            </a>
        @else
            <!-- Mostrar para usuarios no administradores -->
            <a href="{{ route('rutaCreacion') }}" class="btn btn-success btn-lg mx-2">
                <i class="fas fa-plus"></i> {{ __('Crear tarea') }}
            </a>
            <a href="{{ route('rutaPanel') }}" class="btn btn-secondary btn-lg mx-2">
                <i class="fas fa-tasks"></i> {{ __('Revisar tareas') }}
            </a>
        @endif
    </div>
</div>
@endsection