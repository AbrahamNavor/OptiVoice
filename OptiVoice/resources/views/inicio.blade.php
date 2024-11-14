@extends('layouts.plantilla')
@section('titulo','Inicio | OptiVoice')

@section('contenido')
@vite(['resources/css/styles.css'])
<div class="container">
    <h1>{{__('Bienvenido a OptiVoice')}}</h1>
    <a href="{{route('rutaCreacion')}}" class="btn btn-highlight btn-success">{{__('Crear tarea')}}</a>
    <a href="{{route('rutaPanel')}}" class="btn btn-highlight btn-secondary">{{__('Revisar tareas')}}</a>
</div>
@endsection