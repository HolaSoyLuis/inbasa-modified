@extends('layouts.app')
@section('title', 'Editar Empleado')
@section('content')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">		
		<nav class="navbar navbar-expand-lg bg-primary">
		  <div class="container">		    		    		    
		    <div class="collapse navbar-collapse">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link" href="{{ route('empleados.index') }}">Lista de Usuarios</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="{{ route('empleados.create') }}">Nuevo Usuario</a>
		        </li>
				<li class="nav-item">
		          <a class="nav-link" href="{{ route('empleados.pdf') }}">Exportar PDF</a>
		        </li>
				<li class="nav-item active">
		          <a class="nav-link" href="">Actualizar Usuario</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</div>
</div>

<div class="container">
	<div class="row justify-content-center">	
		<div class="col">			
			<div class="card">
				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div><br/>
    			@endif
				<div class="card-body text-center">								
					<form method="post" action="{{ route('empleados.update', $empleados->id) }}">
						@method('PUT')
						@csrf
						<h3>Actualice los Datos</h3>	
							{{--Formulario--}}	
							{{--Contenedor Primera Fila--}}		
						<div class="form-row">  
							<div class="col">  {{--Primera Columna --}}									
								<div class="form-group label-floating">								
									<label for="p_nombre">Primer Nombre</label>
									<input type="text" class="form-control{{ $errors->has('p_nombre') ? ' is-invalid' : '' }}" value='{{$empleados->p_nombre}}' name="p_nombre" input id="p_nombre">
									@if ($errors->has('p_nombre'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('p_nombre') }}</strong>
										</span>
									@endif					
								</div>								
							</div> {{--Fin Columna--}}

							<div class="col"> {{-- Segunda Columna --}}
								<div class="form-group label-floating">								
									<label for="s_nombre">Segundo Nombre</label>
									<input type="text" class="form-control{{ $errors->has('s_nombre') ? ' is-invalid' : '' }}" value='{{$empleados->s_nombre}}' name="s_nombre" input id="s_nombre">
									@if ($errors->has('s_nombre'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('s_nombre') }}</strong>
										</span>
									@endif	
								</div>
							</div> {{--Fin Columna--}}

							<div class="col"> {{-- Tercera Columna --}}
								<div class="form-group label-floating">								
									<label for="p_apellido">Primer Apellido</label>
									<input type="text" class="form-control{{ $errors->has('p_apellido') ? ' is-invalid' : '' }}" value='{{$empleados->p_apellido}}' name="p_apellido" input id="p_apellido">
									@if ($errors->has('p_apellido'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('p_apellido') }}</strong>
										</span>
									@endif					
								</div>
							</div> {{--Fin Columna--}}

							<div class="col"> {{-- Cuarta Columna --}}
								<div class="form-group label-floating">								
									<label for="s_apellido">Segundo Apellido</label>
									<input type="text" class="form-control{{ $errors->has('s_apellido') ? ' is-invalid' : '' }}" value='{{$empleados->s_nombre}}' name="s_apellido" input id="s_apellido">
									@if ($errors->has('s_apellido'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('s_apellido') }}</strong>
										</span>
									@endif					
								</div>
							</div> {{--Fin Columna--}}
						</div>{{-- Fin Contenedor --}}

						<div class="form-row">  {{--Contenedor Segunda Fila--}}	
							<div class="col">  {{--Primera Columna --}}									
								<div class="form-group label-floating">								
									<label for="cui">DPI</label>
									<input type="text" class="form-control{{ $errors->has('cui') ? ' is-invalid' : '' }}" value='{{$empleados->cui}}' name="cui" input id="cui">
									@if ($errors->has('cui'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('cui') }}</strong>
										</span>
									@endif					
								</div>								
							</div> {{--Fin Columna--}}

							<div class="col"> {{-- Segunda Columna --}}
								<div class="form-group label-floating">								
									<label for="telefono">Telefono</label>
									<input type="text" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" value='{{$empleados->telefono}}' name="telefono" input id="telefono">
									@if ($errors->has('telefono'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('telefono') }}</strong>
										</span>
									@endif	
								</div>
							</div> 
								
							<div class="col">  {{--Tercera Columna --}}									
								<div class="form-group label-floating">								
									<select class="form-control" name="genero" id="genero" >
									<?php
										$array = array("Masculino", "Femenino");
									?>
									@foreach ($array as $v)
										@if($empleados->genero == $v)																	
											<option value="{{ $v }}" selected="true">{{ $v }}</option>											
										@elseif ($empleados->estado != $v)
											<option value="{{ $v }}">{{ $v }}</option>																																				
										@endif
									@endforeach	
									</select>
									@if ($errors->has('genero'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('genero') }}</strong>
										</span>
									@endif										
														
								</div>								
							</div> {{--Fin Columna--}}

							<div class="col">  {{--Cuarta Columna --}}									
								<div class="form-group label-floating">								
									<label for="fecha_nac">Fecha Nacimiento</label>
									<input type="date" class="form-control{{ $errors->has('fecha_nac') ? ' is-invalid' : '' }}" value='{{$empleados->fecha_nac}}' name="fecha_nac" input id="fecha_nac">
									@if ($errors->has('fecha_nac'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('fecha_nac') }}</strong>
										</span>
									@endif					
								</div>								
							</div> {{--Fin Columna--}}
						</div>{{-- Fin Contenedor --}}

						<div class="form-row">  {{--Contenedor Tercera Fila--}} 
							<div class="col"> {{-- Primera  Columna --}}								
								<div class="form-group label-floating">								
									<label for="lugar_nac">Lugar de Nacimiento</label>
									<input type="text" class="form-control{{ $errors->has('lugar_nac') ? ' is-invalid' : '' }}" value='{{$empleados->lugar_nac}}' name="lugar_nac" input id="lugar_nac">
									@if ($errors->has('lugar_nac'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('lugar_nac') }}</strong>
										</span>
									@endif					
								</div>								
							</div> {{--Fin Columna--}}

							<div class="col"> {{-- Segunda Columna --}}								
								<div class="form-group label-floating">								
									<label for="estado_civil">Estado Civil</label>
									<input type="text" class="form-control{{ $errors->has('estado_civil') ? ' is-invalid' : '' }}" value='{{$empleados->estado_civil}}' name="estado_civil" input id="estado_civil">
									@if ($errors->has('estado_civil'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('estado_civil') }}</strong>
										</span>
									@endif					
								</div>							
							</div> {{--Fin Columna--}}

							<div class="col"> {{-- Tercera Columna --}}								
								<div class="form-group label-floating">								
									<label for="direccion">Direccion</label>
									<input type="text" class="form-control" value='{{$empleados->direccion}}' name="direccion" input id="direccion">
									@if ($errors->has('direccion'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('direccion') }}</strong>
										</span>
									@endif					
								</div>								
							</div> {{--Fin Columna--}}

							<div class="col"> {{-- Cuarta Columna --}}								
								<div class="form-group label-floating">								
									<label for="inicio_labores">Inicio de Labores</label>
									<input type="date" class="form-control{{ $errors->has('inicio_labores') ? ' is-invalid' : '' }}" value='{{$empleados->inicio_labores}}' name="inicio_labores" input id="inicio_labores">
									@if ($errors->has('inicio_labores'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('inicio_labores') }}</strong>
										</span>
									@endif					
								</div>								
							</div> {{--Fin Columna--}}

						</div>{{-- Fin Contenedor --}}

						<div class="form-row">  {{--Contenedor Cuarta Fila--}}
							<div class="col"> {{-- Primera Columna --}}								
								<div class="form-group label-floating">								
									<label for="correo">Correo Electronico</label>
									<input type="email" class="form-control" value='{{$empleados->correo}}' name="correo" input id="correo">
									@if ($errors->has('correo'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('correo') }}</strong>
										</span>
									@endif					
								</div>								
							</div> {{--Fin Columna--}}

							<div class="col"> {{-- Segunda Columna --}}								
								<div class="form-group label-floating">								
									<select class="form-control" name="estado" id="estado">
										<?php
											$array = [
												[1, "ACTIVO"],
												[2, "INACTIVO"],
												[3, "RETIRADO"],
												[4, "SUSPENDIDO"]
											];
										?>
										@foreach ($array as list($k, $v))
											@if($empleados->estado == $k)																	
												<option value="{{ $k }}" selected="true">{{ $v }}</option>											
											@elseif ($empleados->estado != $k)
												<option value="{{ $k }}">{{ $v }}</option>																																				
											@endif
										@endforeach											
									</select>									
									@if ($errors->has('estado'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('estado') }}</strong>
										</span>
									@endif					
								</div>								
							</div> {{--Fin Columna--}}
						</div>{{-- Fin Contenedor --}}

						<div class="form-row">  {{--Contenedor Quinta Fila--}}
							<div class="col"> {{-- Primera Columna --}}
								<div class="form-group label-floating">																														
									<select class="form-control" name="usuario_id" id="usuario_id">
									@foreach ($users as $use)
										@if($empleados->usuario_id == $use->id)																	
											<option value="{{ $use['id'] }}" selected="true">{{ $use['username'] }}</option>
										@elseif ($empleados->usuario_id != $use->id)
                      						<option value="{{ $use['id'] }}">{{ $use['username'] }}</option>								
										@endif																		
									@endforeach																			
									</select>
									@if ($errors->has('username'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('username') }}</strong>
										</span>
									@endif					
								</div>
							</div> {{--Fin Columna--}}

							<div class="col"> {{-- Segunda Columna --}}
								<div class="form-group label-floating">																			
									<select class="form-control" name="cargo_id" id="centro_id" >										
									@foreach ($cargos as $car)
										@if($empleados->cargo_id == $car->id)
											<option value="{{ $car['id'] }}" selected="true">{{ $car['cargo'] }}</option>
										@elseif ($empleados->cargo_id != $car->id)
                      						<option value="{{ $car['id'] }}">{{ $car['cargo'] }}</option>								
										@endif
									@endforeach																				
									</select>																							
										@if ($errors->has('cargo_id'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('cargo_id') }}</strong>
											</span>
										@endif					
								</div>				
							</div> {{--Fin Columna--}}

							<div class="col"> {{-- Tercera Columna --}}
								<div class="form-group label-floating">	
									<select class="form-control" name="centro_id" id="centro_id" >										
									@foreach ($centros as $cen)
										@if($empleados->centro_id == $cen->id)
											<option value="{{ $cen['id'] }}" selected="true">{{ $cen['nombre'] }}</option>
										@elseif ($empleados->centro_id != $cen->id)
                      						<option value="{{ $car['id'] }}">{{ $cen['nombre'] }}</option>							
										@endif
									@endforeach
									</select>																						
										@if ($errors->has('centro_id'))
											<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('centro_id') }}</strong>
											</span>
										@endif					
								</div>
							</div> {{--Fin Columna--}}
						</div>{{-- Fin Contenedor --}}
						</div>

						<div class="form-group text-center">
							<button class="btn btn-primary" type="submit">Actualizar</button>
							<a href="{{ route('empleados.index') }}" class="btn btn-default" >Cancelar</a>				
						</div>
					</form>																			
			</div>			
		</div>
	</div>
</div>

@endsection
