<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    @vite(['resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="d-flex flex-column min-vh-100">
    {{-- inicia navbar --}}
    <nav class="navbar bg-body-tertiary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('rutaIndex')}}">OptiVoice</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">{{__('Más')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
                <a class="nav-link active {{request()->routeIs('rutaIndex')?'text-warning':''}}" aria-current="page" href="{{route('rutaIndex')}}">{{__('Inicio')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->routeIs('rutaPanel')?'text-warning':''}}" href="{{route('rutaPanel')}}">{{__('Panel de control')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{request()->routeIs('rutaCreacion')?'text-warning':''}}" href="{{route('rutaCreacion')}}">{{__('Creación de tareas')}}</a>
            </li>
            <li class="nav-item">
            <div class="nav-container">
                <a class="nav-link {{request()->routeIs('rutaIndex')?'text-warning':''}}" href="{{route('rutaIndex')}}">{{__('Cerrar sesión')}}</a>
            </div>
            </li>
            </ul>
        </div>
        </div>
    </div>
    </nav>
    {{-- Finaliza navbar --}}

    <!-- Especificamos donde ira el contenido -->
     
        @yield('contenido')

</body>
</html>