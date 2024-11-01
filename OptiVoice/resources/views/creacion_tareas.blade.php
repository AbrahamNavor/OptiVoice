@extends('layouts.plantilla')
@section('titulo','Tarea nueva | OptiVoice')

@section('contenido')
    <div class="container2">
        <form action="">
            <h1>Tarea nueva</h1><br>
            <div class="mb-3 row">
                <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputName" placeholder="Ingresa tu nombre">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputDescription" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="inputDescription" rows="3" placeholder="Describe tu tarea aquí"></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputDate" class="col-sm-2 col-form-label">Fecha</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="inputDate">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputTime" class="col-sm-2 col-form-label">Hora</label>
                <div class="col-sm-10">
                    <input type="time" class="form-control" id="inputTime">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Ingresa tu contraseña">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    
@endsection