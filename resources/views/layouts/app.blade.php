<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <!--  Iconos y Fuentes     -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/material-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css')}}" />

    <!--  CSS Files -->
    <link href="{{asset('css/material-dashboard.min.css?v=2.0.2')}}" rel="stylesheet" />
    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    @yield('css')
    <!-- Titulo -->
    <title>@yield('title', 'INBASA')</title>
</head>
<body>
    {{-- Inicio de Contenido Completo --}}
    <div class="wrapper ">
        {{-- Inicio SideBar --}}
        <div class="sidebar" data-color="purple" data-background-color="black" data-image="{{asset('img/bg_sidebar-1.jpg')}}">
            <div class="logo">
                <a href="#" class="simple-text logo-mini">
                    GT
                </a>
                <a href="#" class="simple-text logo-normal">
                    UMG
                </a>
            </div>
            <div class="sidebar-wrapper">
                {{-- Apartados - Botones de Módulos --}}
                <ul class="nav">
                    {{-- Botones Módulo Home --}}
                    @if(Auth::check() && Auth::user()->can('inicio.index'))
                        <li class="nav-item  ">
                            <a class="nav-link" href="{{ route('inicio') }}">

                                  <i class="material-icons">home</i>
                                <p>Inicio</p>
                            </a>
                        </li>
                    @endif

                    @if(Auth::check() && (Auth::user()->can('usuarios.index'))||(Auth::user()->can('roles.index'))||(Auth::user()->can('personal.index'))||(Auth::user()->can('cargos.index'))||(Auth::user()->can('estudiantes.index'))||(Auth::user()->can('ciclos.index'))||(Auth::user()->can('bloques.index'))||(Auth::user()->can('ciclos.index'))||(Auth::user()->can('grados.index'))||(Auth::user()->can('secciones.index'))||(Auth::user()->can('cursos.index'))||(Auth::user()->can('centros.index'))||(Auth::user()->can('respaldos.index'))||(Auth::user()->can('encargados.index')))
                        {{-- Botones Módulo Administración --}}
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#modAdmin">
                                <i class="material-icons">supervisor_account</i>
                                <p> Administración
                                   <b class="caret"></b>
                                </p>
                            </a>

                            <div class="collapse" id="modAdmin">
                                <ul class="nav">
                                    @if(Auth::check() && Auth::user()->can('usuarios.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('usuarios.index') }}">
                                              <span class="sidebar-mini"> U </span>
                                              <span class="sidebar-normal"> Usuarios </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('roles.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('roles.index') }}">
                                              <span class="sidebar-mini"> RP </span>
                                              <span class="sidebar-normal"> Roles y Permisos </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('role_user.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('role_user.index') }}">
                                              <span class="sidebar-mini"> RU </span>
                                              <span class="sidebar-normal"> Roles y usuarios </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('personal.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('empleados.index') }}">
                                              <span class="sidebar-mini"> EM </span>
                                              <span class="sidebar-normal"> Empleados </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('estudiantes.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('estudiantes.index') }}">
                                              <span class="sidebar-mini"> ES </span>
                                              <span class="sidebar-normal"> Estudiantes </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('encargado.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('encargado.index') }}">
                                            <span class="sidebar-mini"> EN </span>
                                            <span class="sidebar-normal"> Encargados </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && (Auth::user()->can('ciclos.index')||Auth::user()->can('bloques.index')))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('ciclos.index') }}">
                                              <span class="sidebar-mini"> CB </span>
                                              <span class="sidebar-normal"> Ciclos y Bloques </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && (Auth::user()->can('grados.index')||Auth::user()->can('Secciones.index')))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('grados.index') }}">
                                              <span class="sidebar-mini"> GS </span>
                                              <span class="sidebar-normal"> Grados y Secciones </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('cursos.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('cursos.index') }}">
                                              <span class="sidebar-mini"> C </span>
                                              <span class="sidebar-normal"> Cursos </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('centros.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('centros.index') }}">
                                              <span class="sidebar-mini"> CE </span>
                                              <span class="sidebar-normal"> Centro Educativo </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('respaldos.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('respaldos.index') }}">
                                              <span class="sidebar-mini"> BK </span>
                                              <span class="sidebar-normal"> Respaldos </span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        {{-- Fin Botones Administración --}}
                    @endif

                    @if(Auth::check() && (Auth::user()->can('docentes.cursos.index'))||(Auth::user()->can('docentes.horario.index'))||(Auth::user()->can('docentes.notas.index')))
                        {{-- Botones Módulo Docentes --}}
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#modDocente">
                                <i class="material-icons">assignment_ind</i>
                                <p> Docentes
                                   <b class="caret"></b>
                                </p>
                            </a>

                            <div class="collapse" id="modDocente">
                                <ul class="nav">
                                    @if(Auth::check() && Auth::user()->can('docentes.cursos.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('docentes.cursos.index') }}">
                                              <span class="sidebar-mini"> C </span>
                                              <span class="sidebar-normal"> Cursos </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('docentes.horario.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('docentes.horario.index') }}">
                                              <span class="sidebar-mini"> HR </span>
                                              <span class="sidebar-normal"> Horario </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('docentes.notas.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('detalle_nota.index') }}">
                                              <span class="sidebar-mini"> N </span>
                                              <span class="sidebar-normal"> Notas </span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        {{-- Fin Botones Docentes --}}
                    @endif


                    @if(Auth::check() && (Auth::user()->can('encargados.notas.index'))||(Auth::user()->can('encargados.horario.index')))
                        {{-- Botones Módulo Encargados --}}
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#modEncargado">
                                <i class="material-icons">face</i>
                                <p> Encargado
                                   <b class="caret"></b>
                                </p>
                            </a>

                            <div class="collapse" id="modEncargado">
                                <ul class="nav">
                                    @if(Auth::check() && Auth::user()->can('encargados.notas.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('encargados.notas.index') }}">
                                              <span class="sidebar-mini"> NT </span>
                                              <span class="sidebar-normal"> Notas </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('encargados.horario.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('encargados.horario.index') }}">
                                              <span class="sidebar-mini"> HR </span>
                                              <span class="sidebar-normal"> Horario Clases </span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        {{-- Fin Botones Encargados --}}
                    @endif

                    @if(Auth::check() && (Auth::user()->can('estudiantes.cursos.index'))||(Auth::user()->can('estudiantes.horario.index')))
                        {{-- Botones Módulo Estudiantes --}}
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#modEstudiante">
                                <i class="material-icons">school</i>
                                <p> Estudiante
                                   <b class="caret"></b>
                                </p>
                            </a>

                            <div class="collapse" id="modEstudiante">
                                <ul class="nav">
                                    @if(Auth::check() && Auth::user()->can('estudiantes.cursos.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('estudiantes.cursos.index') }}">
                                              <span class="sidebar-mini"> NC </span>
                                              <span class="sidebar-normal"> Notas por ciclo </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('estudiantes.horario.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('estudiantes.horario.index') }}">
                                              <span class="sidebar-mini"> NB </span>
                                              <span class="sidebar-normal"> Notas por bimestre </span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        {{-- Fin Botones Estudiantes --}}
                    @endif

                    @if(Auth::check() && (Auth::user()->can('inscripciones.index'))||(Auth::user()->can('colegiaturas.index'))||(Auth::user()->can('costos.index')))
                        {{-- Botones Módulo Gestión Económica --}}
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="collapse" href="#modEconomico">
                                <i class="material-icons">account_balance_wallet</i>
                                <p> Gestión Económica
                                   <b class="caret"></b>
                                </p>
                            </a>

                            <div class="collapse" id="modEconomico">
                                <ul class="nav">
                                    @if(Auth::check() && Auth::user()->can('asignacion.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('asignacion.index') }}">
                                              <span class="sidebar-mini"> AS </span>
                                              <span class="sidebar-normal"> Asignacion </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('colegiaturas.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('colegiaturas.index') }}">
                                              <span class="sidebar-mini"> CL </span>
                                              <span class="sidebar-normal"> Colegiaturas </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('costos.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('costos.index') }}">
                                              <span class="sidebar-mini"> GC </span>
                                              <span class="sidebar-normal"> Gestión de Costos </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('tipo_pago.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('comprobante.index') }}">
                                              <span class="sidebar-mini"> CO </span>
                                              <span class="sidebar-normal"> Comprobante </span>
                                            </a>
                                        </li>
                                    @endif
                                    
                                    @if(Auth::check() && Auth::user()->can('detalle_comprobante.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('detalle_comprobante.index') }}">
                                              <span class="sidebar-mini"> DC </span>
                                              <span class="sidebar-normal"> Detalle comprobante </span>
                                            </a>
                                        </li>
                                    @endif

                                    @if(Auth::check() && Auth::user()->can('tipo_pago.index'))
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('tipo_pago.index') }}">
                                              <span class="sidebar-mini"> TP </span>
                                              <span class="sidebar-normal"> Tipo de pago </span>
                                            </a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </li>
                        {{-- Fin Botones Gestión Económica --}}
                    @endif

                    {{-- Botón para cerrar sesión --}}
                    <li class="nav-item" style="margin-top:40px;">
                        <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();
                                        document.getElementById('formCerrar').submit();">

                            <i class="material-icons">person</i>
                            <p>Cerrar Sesión</p>
                        </a>
                        <form id="formCerrar" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        {{-- Fin Sidebar --}}

        {{-- Contenedor Principal --}}
        <div class="main-panel">
            {{-- Inicio NavBar --}}
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
                            </button>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navPrin">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="http://example.com" id="dropUserIcon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{auth()->user()->username}}
                                    <i class="material-icons">person</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropUserIcon">
                                    <button class="dropdown-item" style="width:100%;">Ver Perfil</button>
                                    <form method="POST" action="{{route('logout')}}">
                                        @csrf
                                        <button class="dropdown-item" style="width:100%;">Cerrar Sesión</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            {{-- Fin NavBar --}}

            {{-- Contenido de Módulos --}}
            <div class="content">
                <div class="container-fluid">
                    {{-- Contenido de acuerdo al apartado seleccionado --}}
                    @yield('content')
                </div>
            </div>
            {{-- Fin Contentido de Módulos --}}

            {{-- Footer --}}
            <footer class="footer">
                <div class="container-fluid">
                  <nav class="float-left">
                    <ul>
                        <li>
                            <a href="https://www.umg.edu.gt/" target="_blank">
                            UMG
                            </a>
                        </li>
                    </ul>
                  </nav>
                  <div class="copyright float-right">
                    &copy;
                    <script>
                      document.write(new Date().getFullYear())
                    </script>, UMG - Ingeniería.
                  </div>
                </div>
            </footer>
        </div>
        {{-- Fin Contenedor Principal --}}
    </div>
    {{-- Fin Contenido Completo --}}
</body>
    <!--    Scripts JS   -->
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>
    <script src="{{ asset('js/material.min.js') }}"></script>
    <!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
    <script src="{{asset('js/moment.min.js')}}"></script>
    <!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
    <script src="{{asset('js/nouislider.min.js')}}" type="text/javascript"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
	<script src="{{asset('js/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
    <script src="{{asset('js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>
    <!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
	<script src="{{asset('js/jasny-bootstrap.min.js')}}"></script>
    <!--    Chartist JS -->
    <script src="{{asset('js/plugins/chartist.min.js')}}"></script>
    <!--    Plugin Notificaciones -->
    <script src="{{asset('js/plugins/bootstrap-notify.js')}}"></script>
    <!--    Centro de Control para Material Kit: ripples, efectos parallax,  -->
    <script src="{{asset('js/material-dashboard.min.js?v=2.0.2')}}" type="text/javascript"></script>
    <script src="{{asset('js/layout/app-plantilla.js')}}"></script>
    <!--    Script para datatable   -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#datatable_table').DataTable( {
                language: {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            } );
        } );
    </script>
    <script>
        $('#errorAlert').hide(4000).slideUp(400);
    </script>
    @yield('js')
</html>
