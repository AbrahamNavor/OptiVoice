@extends('layouts.plantilla')
@section('titulo','Inicio | OptiVoice')

@section('contenido')
<div class="container">
    <h1>Bienvenido a OptiVoice</h1>
    <a href="{{route('rutaCreacion')}}" class="btn btn-highlight btn-success">Crear tarea</a>
    <a href="{{route('rutaPanel')}}" class="btn btn-highlight btn-secondary">Revisar tareas</a>
</div>
@endsection