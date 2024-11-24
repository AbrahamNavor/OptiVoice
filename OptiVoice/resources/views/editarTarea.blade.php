@extends('layouts.plantilla')
@section('titulo', ' Editar Tarea | OptiVoice')

@section('contenido')

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
        height: 600px; /* Altura ajustada */
        width: 650px; /* Ancho ajustado */
        background-color: rgba(0, 0, 0, 0.6); /* Fondo oscuro */
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        padding: 60px 50px; /* Espaciado interno ampliado */
    }

    form * {
        font-family: 'Poppins', sans-serif;
        color: #ffffff;
        letter-spacing: 0.5px;
        outline: none;
        border: none;
    }

    form h3 {
        font-size: 36px; /* Título más grande */
        font-weight: 600;
        line-height: 42px;
        text-align: center;
        color: #ffffff; /* Color blanco para el título */
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
        margin-bottom: 30px; /* Espaciado entre la etiqueta y el campo */
        font-size: 16px;
        font-weight: 500;
    }

    textarea {
        resize: none;
        height: 100px; /* Altura ajustada para mayor comodidad */
        margin-top: 10px; /* Aumenté el margen superior para más separación */
        margin-bottom: 30px; /* Espaciado inferior para evitar que se encime con otros elementos */
        background-color: rgba(255, 255, 255, 0.07);
        border-radius: 3px;
        padding: 10px; /* Espaciado interno */
        font-size: 14px;
        font-weight: 300;
        color: #ffffff;
    }

    textarea.form-control {
        resize: none;
        height: 80px; /* Ajusta la altura si es necesario */
        margin-top: 0; /* Elimina cualquier margen adicional */
    }

    ::placeholder {
        color: #e5e5e5;
    }

    .btn2 {
        margin-top: 30px; /* Espaciado ajustado */
        margin-bottom: 0; /* Eliminar espacio adicional debajo del botón */
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


    @if(session('exito'))
        <script>
            Swal.fire({
                title: "¡Éxito!",
                text: "{{ session('exito') }}",
                icon: "success",
                confirmButtonText: "Aceptar",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirigir al formulario deseado
                    window.location.href = "{{ route('rutaPanel') }}";
                }
            });
        </script>
    @endif

<!-- Formulario de creación de tarea -->

    <form method="POST" action="{{ route('rutaActualizarTarea', ['id' => $tarea->id]) }}">
        @csrf
        @method('PUT')
        <h3>{{__('Editar Tarea')}}</h3><br>
        <div class="mb-3 row">
            <label for="nombre" class="col-sm-2 col-form-label">{{__('Nombre')}}</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="txtnombre" placeholder="Ingresa tu nombre" value="{{old('txtnombre ', $tarea->nombre)}}">
            </div>
            <small class="text-danger fst-italic">{{ $errors->first('txtnombre') }}</small>
        </div>
        <div class="mb-3 row">
            <label for="descripcion" class="col-sm-2 col-form-label">{{__('Descripción')}}</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="txtdescripcion" rows="2" placeholder="Describe tu tarea aquí">{{ old('txtdescripcion', $tarea->descripcion) }}</textarea>
            </div>
            <small class="text-danger fst-italic">{{ $errors->first('txtdescripcion') }}</small>
        </div>
        <div class="mb-3 row">
            <label for="fecha" class="col-sm-2 col-form-label">{{__('Fecha')}}</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="txtfecha" value="{{old('txtfecha', $tarea->fecha)}}">
            </div>
            <small class="text-danger fst-italic">{{ $errors->first('txtfecha') }}</small>
        </div>
        <div class="mb-3 row">
            <label for="hora" class="col-sm-2 col-form-label">{{__('Hora')}}</label>
            <div class="col-sm-10">
                <input type="time" class="form-control" name="txthora" value="{{old('txthora', $tarea->hora)}}">
            </div>
            <small class="text-danger fst-italic">{{ $errors->first('txthora') }}</small>
        </div>

        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn2">{{__('Actualizar Tarea')}}</button>
            </div>
        </div>
    </form>
@endsection

