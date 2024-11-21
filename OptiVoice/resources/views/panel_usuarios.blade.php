@extends('layouts.plantilla')
@section('titulo','Panel Usuarios | OptiVoice')

@section('contenido')
@vite(['resources/css/styles.css'])

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card">
        <div class="card-header">
            <h3>{{ __('Usuarios') }}</h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Hora</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Navorsintilin</td>
                        <td>@navor</td>
                        <td>13:00</td>
                        <td>navorsin@example.com</td>
                        <td>
                            <a href="#" type="submit" class="btn btn-warning btn-sm">{{ __('Actualizar') }}</a>
                            <a href="#" type="submit" class="btn btn-danger btn-sm">{{ __('Eliminar') }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection