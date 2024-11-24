<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">

    <!-- Core Styles and JS -->
    @vite(['resources/css/styles.css', 'resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    
    <!-- Additional Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('rutaRedireccion')}}">OptiVoice</a>
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
                            <a class="nav-link active {{request()->routeIs('rutaInicio') ? 'text-warning' : ''}}" aria-current="page" href="{{route('rutaInicio')}}">{{__('Inicio')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('rutaPanelUsuarios') ? 'text-warning' : ''}}" href="{{route('rutaPanelUsuarios')}}">{{__('Panel de usuarios')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('rutaPanel') ? 'text-warning' : ''}}" href="{{route('rutaPanel')}}">{{__('Panel de control')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('rutaCreacion') ? 'text-warning' : ''}}" href="{{route('rutaCreacion')}}">{{__('Creación de tareas')}}</a>
                        </li>
                        <li class="nav-item">
                            <div class="nav-container">
                                <a class="nav-link {{request()->routeIs('rutaIndex') ? 'text-warning' : ''}}" href="{{route('rutaIndex')}}">{{__('Cerrar sesión')}}</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    @yield('contenido')
</body>
</html>