@extends('layouts.plantilla')
@section('titulo','Panel | OptiVoice')

@section('contenido')
<div class="container2">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Fecha</th>
        <th scope="col">Hora</th>
        <th scope="col">Contraseña</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>13:00</td>
        <td>*******</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td>19:00</td>
        <td>*******</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
        <td>09:00</td>
        <td>*******</td>
        </tr>
    </tbody>
    </table>
</div>


@endsection