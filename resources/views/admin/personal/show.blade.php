@extends('layouts.app')
@section('title', 'Asignacion')
@section('content')
<div class="row">
  <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
    <nav class="navbar navbar-expand-lg bg-primary">
      <div class="container">
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('empleados.index') }}">Lista de Empleados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('empleados.create') }}">Nuevo Empleado</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>

<div class="row justify-content-center">
  <div class="col-md-8">
		<div class="card">    
			<div class="card-body text-left">        
        <center>      
        <h3>Detalle del Personal</h3>
        </center>
        <div class="form-row"> {{--Primera Fila --}} 

          <div class="col">{{--Primera Columna --}}    
            <label>Primer Nombre:</label>
          </div> {{--Fin Columna--}} 

          <div class="col"> {{--Segunda Columna --}}     
            <p>{{$empleados->p_nombre}}</p>                 
          </div> {{--Fin Columna--}}

        </div>  
            
        <div class="form-row"> {{--Segunda Fila --}} 
          <div class="col">{{--Primera Columna --}}
            <label>Segundo Nombre:</label>
          </div> {{--Fin Columna--}}

          <div class="col"> {{--Segunda Columna --}}                   
            <p>{{$empleados->s_nombre}}</p>        
          </div> {{--Fin Columna--}}
        </div>

        <div class="form-row"> {{--Tercera Fila --}} 
          <div class="col">{{--Primera Columna --}}
            <label>Primer Apellido:</label>
          </div> {{--Fin Columna--}}

          <div class="col"> {{--Segunda Columna --}}
            <p>{{$empleados->p_apellido}}</p>
          </div> {{--Fin Columna--}}
        </div>

        <div class="form-row"> {{--Cuarta Fila --}} 
          <div class="col">{{--Primera Columna --}}
            <label>Segundo Apellido</label>
          </div> {{--Fin Columna--}}
            
          <div class="col"> {{--Segunda Columna --}}
            <p>{{$empleados->s_apellido}}</p>
          </div> {{--Fin Columna--}}
        </div>

        <div class="form-row"> {{--Quinta Fila --}}
          <div class="col">{{--Primera Columna --}}
            <label>Genero:</label>
          </div> {{--Fin Columna--}}

          <div class="col"> {{--Segunda Columna --}}
            <p>{{$empleados->genero}}</p>
          </div> {{--Fin Columna--}}
        </div>

        <div class="form-row"> {{--Sexta Fila --}}
          <div class="col">{{--Primera Columna --}}
            <label>Fecha de Nacimiento:</label>
          </div> {{--Fin Columna--}}
          
          <div class="col"> {{--Segunda Columna --}}            
            <p>{{$empleados->fecha_nac}}</p>
          </div> {{--Fin Columna--}}
        </div>

        <div class="form-row"> {{--Septima Fila --}}
          <div class="col">{{--Primera Columna --}}
            <label>Lugar de Nacimiento:</label>
          </div> {{--Fin Columna--}}

          <div class="col"> {{--Segunda Columna --}}
            <p>{{$empleados->lugar_nac}}</p>
          </div> {{--Fin Columna--}}
        </div>

        <div class="form-row"> {{--Ocatava Fila --}}
          <div class="col">{{--Primera Columna --}}
            <label>Estado Civil</label>
          </div> {{--Fin Columna--}}

          <div class="col"> {{--Segunda Columna --}}
            <p>{{$empleados->estado_civil}}</p>
          </div> {{--Fin Columna--}}            
        </div>

      </div>
    </div>
  </div>  
</div>
@endsection
