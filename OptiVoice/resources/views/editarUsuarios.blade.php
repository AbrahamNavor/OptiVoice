@extends('layouts.plantilla')
@section('titulo','Editar Cuenta | OptiVoice')

@push('styles')
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
        width: 30px; /* Ajusta el tamaño según necesites */
        height: 30px; /* Ajusta el tamaño */
        /* Puedes agregar estilos adicionales para la apariencia del icono */
    }

    .hamburger span {
        display: block;
        background-color: #333;
        height: 4px;
        margin: 6px auto;
        transition: all 0.3s;
    }


    form {
        width: 80%; /* Limita el ancho máximo */
        max-width: 650px; /* Ancho máximo */
        background-color: rgba(0, 0, 0, 0.6); /* Fondo oscuro */
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px); /* Fondo borroso */
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        padding: 60px 50px; /* Espaciado interno ampliado */
        margin-top: 50px; /* Espacio desde la parte superior (navbar) */
        margin-bottom: 30px; /* Espacio adicional en la parte inferior */
        box-sizing: border-box; /* Asegura que el padding no afecte el tamaño total */
    }

    form * {
        font-family: 'Poppins', sans-serif;
        color: #ffffff;
        letter-spacing: 0.5px;
        outline: none;
        border: none;
    }

    form h3 {
        font-size: 36px;
        font-weight: 600;
        line-height: 42px;
        text-align: center;
        color: #ffffff;
        margin-bottom: 10px; /* Espaciado debajo del título */
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


    label {
        display: block;
        margin-top: 20px;
        margin-bottom: 10px; /* Espaciado más pequeño entre la etiqueta y el campo */
        font-size: 16px;
        font-weight: 500;
    }

    ::placeholder {
        color: #e5e5e5;
    }

    .btn2 {
        margin-top: 20px;
        margin-bottom: 0;
        width: 100%;
        background-color: #ffffff;
        color: #080710;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
    }

    .social{
      margin-top: 30px;
      display: flex;
    }

    .social div{
      background: red;
      width: 150px;
      border-radius: 3px;
      padding: 5px 10px 10px 5px;
      background-color: rgba(255,255,255,0.27);
      color: #eaf0fb;
      text-align: center;
    }

    .social div:hover{
      background-color: rgba(255,255,255,0.47);
    }

    .social .fb{
      margin-left: 25px;
    }

    .social i{
      margin-right: 4px;
    }

</style>
@endpush

@section('contenido')


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
                window.location.href = "{{ route('rutaInicioSesion') }}";
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

<form action="{{ route('rutaUsuarioActualizar', $usuario->id) }}" method="POST">
    @csrf
    @method('PUT')  <!-- Para que se utilice el método PUT en el formulario -->
    
    <!-- Otros campos de usuario -->
    <h3>{{ __('Editar Cuenta') }}</h3>
    <label for="username">{{ __('Nombre') }}</label>
    <input type="text" name="txtnombre" value="{{ old('txtnombre', $usuario->nombre) }}">

    <label for="username">{{ __('Apellido') }}</label>
    <input type="text" name="txtapellido" value="{{ old('txtapellido', $usuario->apellido) }}">

    <label for="gmail">{{ __('Gmail') }}</label>
    <input type="email" name="txtgmail" value="{{ old('txtgmail', $usuario->email) }}">

    <!-- Contraseña actual -->
    <label for="password_actual">{{ __('Contraseña Actual') }}</label>
    <input type="password" name="txtpassword_actual">

    <!-- Nueva contraseña -->
    <label for="password">{{ __('Nueva Contraseña') }}</label>
    <input type="password" name="txtpassword">

    <!-- Confirmación de nueva contraseña -->
    <label for="password_confirmation">{{ __('Confirmar Nueva Contraseña') }}</label>
    <input type="password" name="txtconfirmarcontraseña">

    <button type="submit" class="btn2">{{ __('Actualizar Usuario') }}</button>
</form>

@endsection