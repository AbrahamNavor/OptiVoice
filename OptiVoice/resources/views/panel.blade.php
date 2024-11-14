@extends('layouts.plantilla')
@section('titulo','Panel | OptiVoice')

@section('contenido')
@vite(['resources/css/styles.css'])
<div class="container2">
    <x-table 
        :headers="['#', __('Nombre'), __('Descripción'), __('Fecha'), __('Hora'), __('Contraseña')]" 
        :rows="[
            [1, 'Mark Otto', '@mdo', '13:00', '******'],
            [2, 'Jacob Thornton', '@fat', '19:00', '******'],
            [3, 'Larry the Bird', '@twitter', '09:00', '******'],
        ]">
    </x-table>
</div>

@endsection