@extends('layouts.plantilla')
@section('titulo','Inicio | OptiVoice')

@section('contenido')
@vite(['resources/css/styles.css'])
<div class="container" style="display: flex; justify-content: center; align-items: center; margin-top: 270px; flex-direction: column; text-align: center;">
    <h1>{{__('Bienvenido a OptiVoice')}}</h1>
    <a href="{{route('rutaCreacion')}}" class="btn btn-highlight btn-success">{{__('Crear tarea')}}</a>
    <a href="{{route('rutaPanel')}}" class="btn btn-highlight btn-secondary">{{__('Revisar tareas')}}</a>
</div>
@endsection