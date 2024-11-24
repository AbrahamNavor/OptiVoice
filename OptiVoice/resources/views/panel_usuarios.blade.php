@extends('layouts.plantilla')
@section('titulo', $title ?? 'Panel | OptiVoice')

@push('styles')
<style media="screen">
    *,
    *:before,
    *:after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    html, body {
        height: 100%;
        margin: 0;
        display: flex;
        justify-content: center; /* Centra horizontalmente */
        align-items: center; /* Centra verticalmente */
        background-color: #f4f4f4; /* Color de fondo */
    }

    h1.text-center {
        font-size: 36px;
        font-weight: 600;
        color: #ffffff; /* Color blanco para el título */
        margin-bottom: 20px;
    }

    .container {
        max-width: 1200px; /* Ajusta el ancho al 80% de la ventana */
        max-width: 1200px; /* Limita el ancho máximo */
        background-color: rgba(0, 0, 0, 0.6); /* Fondo oscuro */
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        padding: 30px 20px; /* Espaciado interno */
        min-height: 200px; /* Altura mínima */
    }

    h1.panel-title {
    color: #ffffff;
    }
    
</style>
@endpush

@section('contenido')

    @if(session('exito'))
        <script>
            Swal.fire({
                title: "¡Éxito!",
                text: "{{ session('exito') }}",
                icon: "success",
                confirmButtonText: "Aceptar",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('rutaPanelUsuarios') }}";
                }
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                title: "¡Error!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonText: "Aceptar",
            });
        </script>
    @endif

    <div class="container">
        <h1 class="panel-title text-center">{{ $title ?? __('Panel') }}</h1>
        <div class="mt-4">
            {{-- Usamos el componente de tabla --}}
            <x-table 
                :headers="$headers" 
                :rows="$rows" />
        </div>
    </div>

@endsection