@extends('layouts.plantilla')
@section('titulo','Tarea nueva | OptiVoice')

@section('contenido')
    <div class="container2">
        <form method="POST" action="/procesarTarea">
        @csrf
            <h1>Tarea nueva</h1><br>
            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="txtnombre" placeholder="Ingresa tu nombre" value="{{old('txtnombre')}}">
                </div>
                <small class="text-danger fst-italic">{{ $errors->first('txtnombre') }}</small>
            </div>
            <div class="mb-3 row">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="txtdescripcion" rows="3" placeholder="Describe tu tarea aquí" value="{{old('txtdescripcion')}}"></textarea>
                </div>
                <small class="text-danger fst-italic">{{ $errors->first('txtdescripcion') }}</small>
            </div>
            <div class="mb-3 row">
                <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="txtfecha" value="{{old('txtfecha')}}">
                </div>
                <small class="text-danger fst-italic">{{ $errors->first('txtfecha') }}</small>
            </div>
            <div class="mb-3 row">
                <label for="hora" class="col-sm-2 col-form-label">Hora</label>
                <div class="col-sm-10">
                    <input type="time" class="form-control" name="txthora" value="{{old('txthora')}}">
                </div>
                <small class="text-danger fst-italic">{{ $errors->first('txthora') }}</small>
            </div>
            <div class="mb-3 row">
                <label for="contrasena" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="txtcontrasena" placeholder="Ingresa tu contraseña" value="{{old('txtcontrasena')}}">
                </div>
                <small class="text-danger fst-italic">{{ $errors->first('txtcontrasena') }}</small>

            </div>
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-highlight btn-success">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    
@endsection    
