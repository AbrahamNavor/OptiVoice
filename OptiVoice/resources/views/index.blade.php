@extends('layouts.plantillainicio')
@section('titulo', 'Inicio | OptiVoice')

@push('styles')
    @vite(['resources/css/styleindex.css'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet" />
    <style>
        .timeline-image {
            background-color: green !important; /* Cambia el color del círculo a verde y lo fuerza */
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            color: white;
        }
        .timeline-image:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 5px solid #ffffff; /* Bordes blancos para mejor visibilidad */
            top: -5px;
            left: -5px;
        }

        /* Estilo para texto principal en color negro */
        .masthead .masthead-subheading,
        .masthead .masthead-heading {
            color: black !important; /* Aseguramos que el color sea negro */
        }

        /* Estilo para agrandar el botón */
        .btn.btn-highlight {
            padding: 20px 40px; /* Ajusta el espacio interno del botón */
            font-size: 1.5rem; /* Incrementa el tamaño del texto */
            border-radius: 10px; /* Redondeo opcional */
        }
    </style>
@endpush

@section('contenido')
    <!-- Masthead-->
    <header class="masthead" style="background-image: url('https://i.pinimg.com/736x/ce/ad/89/cead89201a70ac3af815c7d3663e0306.jpg'); background-size: cover; background-position: center;">
        <div class="overlay"></div> <!-- Capa de oscurecimiento -->
        <div class="container">
            <div class="masthead-subheading">Bienvenido a</div>
            <div class="masthead-heading text-uppercase">OptiVoice</div>
            <a class="btn btn-highlight btn-success btn-xl text-uppercase" href="#services">Más</a>
        </div>
    </header>

    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nuestro objetivo</h2>
                <h3 class="section-subheading text-muted">OptiVoice es un asistente de voz funcional, accesible y multilingüe, que permita gestionar tareas diarias con comandos de voz e integrarse con dispositivos móviles.</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-success"></i> <!-- Cambiado a verde -->
                        <i class="fas fa-microphone-alt fa-stack-1x fa-inverse"></i> <!-- Icono de micrófono para representar la voz -->
                    </span>
                    <h4 class="my-3">Reconocimiento de voz</h4>
                    <p class="text-muted">Crear un sistema preciso para comandos en español e inglés.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-success"></i> <!-- Cambiado a verde -->
                        <i class="fas fa-language fa-stack-1x fa-inverse"></i> <!-- Icono de idiomas para representar español/inglés -->
                    </span>
                    <h4 class="my-3">Procesamiento de lenguaje natural</h4>
                    <p class="text-muted">Permitir que el asistente comprenda y ejecute tareas.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-success"></i> <!-- Cambiado a verde -->
                        <i class="fas fa-universal-access fa-stack-1x fa-inverse"></i> <!-- Icono de accesibilidad para representar una interfaz accesible -->
                    </span>
                    <h4 class="my-3">Interfaz accesible</h4>
                    <p class="text-muted">Diseñar una experiencia intuitiva y accesible.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Beneficios </h2>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">Autonomía para Personas con Discapacidades Visuales</h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">OptiVoice está diseñado para ofrecer independencia a personas con discapacidades visuales, permitiéndoles gestionar tareas y recordatorios de manera autónoma y sencilla a través de comandos de voz.</p></div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">Gestión de Tareas Eficiente y Organizada</h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">Permite a los usuarios crear, modificar, eliminar y organizar tareas y eventos mediante comandos de voz, simplificando la administración de actividades diarias.</p></div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">Interacción Rápida y en Tiempo Real</h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">OptiVoice responde a comandos en un tiempo máximo de 2 segundos, proporcionando una experiencia de uso fluida y en tiempo real.</p></div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4 class="subheading">Fomenta la Inclusión Tecnológica</h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">Al ofrecer una herramienta diseñada específicamente para personas con necesidades de accesibilidad, OptiVoice contribuye a la inclusión tecnológica y ayuda a reducir la brecha digital en el ámbito de la gestión de tareas y recordatorios.</p></div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; OptiVoice</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>
@endsection