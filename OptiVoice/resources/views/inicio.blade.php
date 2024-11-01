@extends('layouts.plantilla')
@section('titulo','Inicio | OptiVoice')

@section('contenido')
<div class="container">
    <h1>Bienvenido a OptiVoice</h1>
    <a href="{{route('rutaCreacion')}}" class="btn">Crear tarea</a>
    <a href="{{route('rutaPanel')}}" class="btn">Revisar tareas</a>
</div>
@endsection