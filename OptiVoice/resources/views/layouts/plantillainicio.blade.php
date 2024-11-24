<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet">

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
                            <a class="nav-link {{request()->routeIs('rutaIndex') ? 'text-warning' : ''}}" href="{{route('rutaIndex')}}">{{__('Inicio')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('rutaInicioSesion') ? 'text-warning' : ''}}" href="{{route('rutaInicioSesion')}}">{{__('Inicio de sesión')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('rutaNuevaCuenta') ? 'text-warning' : ''}}" href="{{route('rutaNuevaCuenta')}}">{{__('Crear cuenta')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('contenido')
    </main>
</body>
</html>