@extends('layouts.app')
@section('title', 'Crear Curso')
@section('content')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">		
		<nav class="navbar navbar-expand-lg bg-primary">
		  <div class="container">		    		    		    
		    <div class="collapse navbar-collapse">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link" href="{{ route('cursos.index') }}">Lista de Cursos</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="{{ route('cursos.create') }}">Nuevo Curso</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</div>
</div>

<div class="container">
	<div class="row justify-content-center">	
		<div class="col-md-6">
			<div class="card">
				<div class="card-body text-center">								
					<form method="post" action="{{ route('cursos.store') }}">
						@csrf
						<h3>Ingrese los Datos</h3>		
						<div class="form-row">  
							<div class="col">  {{--Primera Columna --}}						
								<div class="form-group label-floating">								
									<label for="codigo">Codigo</label>
									<input type="text" class="form-control" name="codigo" input id="codigo">
									@if ($errors->has('codigo'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('codigo') }}</strong>
										</span>
									@endif					
								</div>
							</div>						
							<div class="col">
								<div class="form-group label-floating">								
									<label for="nombre">Nombre</label>
									<input type="text" class="form-control" name="nombre" input id="nombre">
									@if ($errors->has('nombre'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('nombre') }}</strong>
										</span>
									@endif					
								</div>
							</div>
						</div>{{-- Fin Contenedor --}}
							
						<div class="form-row">  
							<div class="col">  {{--Primera Columna --}}	
								<div class="form-group label-floating">								
									<label for="descripcion">Descripción</label>
									<input type="text" class="form-control" name="descripcion" input id="descripcion">
									@if ($errors->has('descripcion'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('descripcion') }}</strong>
										</span>
									@endif					
								</div>
							</div>
							
							<div class="col">
								<div class="form-group label-floating">																									
									<select class="form-control" name="estado" id="estado">
										<option value="" disabled selected hidden>---Seleccione un Estado---</option>																											
										<option value="1">ACTIVO</option>	
										<option value="2">INACTIVO</option>
									</select>	
									@if ($errors->has('estado'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('estado') }}</strong>
										</span>
									@endif					
								</div>
							</div>
						</div>{{-- Fin Contenedor --}}

						<div class="form-row">  
							<div class="col">  {{--Primera Columna --}}								
								<div class="form-group label-floating">																																	
									<select class="form-control{{ $errors->has('grado_id') ? ' is-invalid' : '' }}" name="grado_id" id="grado_id">
										<option value="" disabled selected hidden>---Seleccione una Grado---</option>
										@foreach ($grados as $u)
											<option value="{{ $u['id'] }}">{{ $u['grado'] }}</option>										
										@endforeach																										
									</select>																							
									@if ($errors->has('grado_id'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('garado_id') }}</strong>
										</span>
									@endif					
								</div>
							</div>

							<div class="col">  {{--Primera Columna --}}
								<div class="form-group label-floating">								
									<label for="docente_id"></label>																
									<select class="form-control{{ $errors->has('docente_id') ? ' is-invalid' : '' }}" name="docente_id" id="docente_id">
									<option value="" disabled selected hidden>---Seleccione un Docente---</option>
										@foreach ($docentes as $do)
											@foreach ($cargos as $ca)
												@if($do->cargo_id == 2 and $ca->id == 2 )
													<option value="{{ $do['id'] }}">{{ $do['p_nombre'] }}</option>
												@endif
											@endforeach										
										@endforeach
									</select>																							
									@if ($errors->has('docente_id'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('docente_id') }}</strong>
										</span>
									@endif					
								</div>
							</div>
						</div>{{-- Fin Contenedor --}}

						<div class="form-group">
							<button class="btn btn-primary" type="submit">Guardar</button>
							<a href="{{ route('cursos.index') }}" class="btn btn-default" >Cancelar</a>				
						</div>
					</form>											
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
