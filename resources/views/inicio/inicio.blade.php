@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-trans">
                <div class="card-header card-header-primary">
                    <h3 class="card-title">
                        Inicio
                    </h3>
                    <p class="card-category">
                        Datos Generales
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    @if(Auth::check() && ((Auth::user()->can('usuarios.index'))||(Auth::user()->can('roles.index'))||(Auth::user()->can('personal.index'))||(Auth::user()->can('cargos.index'))||(Auth::user()->can('estudiantes.index'))||(Auth::user()->can('ciclos.index'))||(Auth::user()->can('bloques.index'))||(Auth::user()->can('ciclos.index'))||(Auth::user()->can('grados.index'))||(Auth::user()->can('secciones.index'))||(Auth::user()->can('cursos.index'))||(Auth::user()->can('centros.index'))||(Auth::user()->can('respaldos.index'))))
        {{-- Botones de Administradores --}}
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <p class="card-category">Personal</p>
                        <h3 class="card-title">{{$empleados}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="{{ route('empleados.index') }}" class="btn btn-sm">Ver</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment_ind</i>
                        </div>
                        <p class="card-category">Docentes</p>
                        <h3 class="card-title">{{$docentes}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="{{ route('empleados.index') }}" class="btn btn-sm">Ver</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">school</i>
                    </div>
                    <p class="card-category">Estudiantes</p>
                    <h3 class="card-title">{{$estudiantes}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a href="{{ route('estudiantes.index') }}" class="btn btn-sm">Ver</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
        {{-- Fin de Botones de Administradores --}}
    @else
        {{-- Contenido para los que no tienen ningún permiso de administración --}}
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <p class="card-category">Otros Usuarios</p>
                        <h3 class="card-title">3</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <a href="#" class="btn btn-sm">Ver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif
    
    <style>
        .card-footer{
            justify-content: center !important;
        }
        .card-trans{
            background: rgba(0%, 0%, 0%, 0%);
            box-shadow: none;
        }
    </style>
@endsection
