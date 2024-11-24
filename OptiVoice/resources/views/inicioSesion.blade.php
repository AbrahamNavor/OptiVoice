@extends('layouts.plantillainicio')
@section('titulo','Inicio de Sesion | OptiVoice')

@section('contenido')

@vite(['resources/css/styles.css'])

<!-- Stylesheet -->
<style media="screen">
    *,
    *:before,
    *:after{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .hamburger-container {
        display: flex;
        justify-content: flex-end;
    }

    .hamburger {
        width: 30px;
        height: 30px;
    }

    .hamburger span {
        display: block;
        background-color: #333;
        height: 4px;
        margin: 6px auto;
        transition: all 0.3s;
    }

    form {
        width: 400px;
        background-color: rgba(0, 0, 0, 0.6); /* Fondo oscuro */
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        padding: 50px 35px;
    }

    form * {
        font-family: 'Poppins', sans-serif;
        color: #ffffff;
        letter-spacing: 0.5px;
        outline: none;
        border: none;
    }

    form h3 {
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
        color: white; /* Título en blanco */
    }

    label {
        display: block;
        margin-top: 30px;
        font-size: 16px;
        font-weight: 500;
    }

    input {
        display: block;
        height: 50px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
    }

    ::placeholder {
        color: #e5e5e5;
    }

    .btn2 {
        margin-top: 20px;
        width: 100%;
        background-color: #ffffff;
        color: #080710;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
    }

    .social {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }

    .social div {
        width: 48%;
        border-radius: 3px;
        padding: 10px 0;
        background-color: rgba(255, 255, 255, 0.27);
        color: #eaf0fb;
        text-align: center;
        font-size: 16px;
        cursor: pointer;
    }

    .social div:hover {
        background-color: rgba(255, 255, 255, 0.47);
    }

    .social a {
        text-decoration: none;
        color: inherit;
    }

</style>

{{-- Mensaje de exito y error --}}
@if(session('exito'))
    <script>
        Swal.fire({
            title: "¡Éxito!",
            text: "{{ session('exito') }}",
            icon: "success",
            confirmButtonText: "Aceptar",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('rutaInicio') }}";
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

<form action="/procesarInicioSesion" method="POST">
    @csrf
    <h3>{{__('Inicio de sesión') }}</h3>

    <label for="username">{{ __('Usuario') }}</label>
    <input type="text" id="username" name="username" value="{{ old('username') }}">
    <small class="text-danger fst-italic">{{ $errors->first('username') }}</small>

    <label for="password">{{ __('Contraseña') }}</label>
    <input type="password" id="password" name="password">
    <small class="text-danger fst-italic">{{ $errors->first('password') }}</small>
    <a href="{{route('rutaOlvideContraseña')}}">{{ __('¿Has olvidado tu contraseña?') }}</a>

    <button type="submit" class="btn2">{{ __('Entrar') }}</button>
    <div class="social">
        <div class="go"><a href="{{ route('rutaInicio') }}">{{ __('Inicio') }}</a></div>
        <div class="fb"><a href="{{ route('rutaNuevaCuenta') }}">{{ __('Crear cuenta') }}</a></div>
    </div>
</form>

@endsection