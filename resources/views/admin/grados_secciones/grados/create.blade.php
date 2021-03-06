@extends('layouts.app')
@section('title', 'Crear Grado')
@section('content')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">		
		<nav class="navbar navbar-expand-lg bg-primary">
		  <div class="container">		    		    		    
		    <div class="collapse navbar-collapse">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link" href="{{ route('grados.index') }}">Lista de Grados</a>
		        </li>
		        <li class="nav-item active">
		          <a class="nav-link" href="{{ route('grados.create') }}">Nuevo Grado</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="{{ route('secciones.index') }}">Lista de Secciones</a>
		        </li>
		       	<li class="nav-item">
		          <a class="nav-link" href="{{ route('secciones.create') }}">Nuevo Seccion</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</div>
</div>

<div class="container">
	<div class="row justify-content-center">	
		<div class="col-md-4">
			<div class="card">
				<div class="card-body text-center">								
				<form method="post" action="{{ route('grados.store') }}">
					@csrf
					<h3>Ingrese los Datos</h3>		
						<div class="form-group">
							<div class="form-group label-floating">								
								<label for="grado">Grado</label>
								<input type="text" class="form-control" name="grado" input id="grado">
								@if ($errors->has('grado'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('grado') }}</strong>
									</span>
								@endif					
							</div>
						</div>
						<div class="form-group">
							<div class="form-group label-floating">								
								<label for="jornada_id"></label>
									<select class="form-control" name="jornada_id" id="jornada_id">
											<option value="" disabled selected hidden>---Seleccione una Jornada---</option>																											
											@foreach ($jornadas as $j)
												<option value="{{ $j['id'] }}">{{ $j['jornada'] }}</option>										
											@endforeach	
										</select>
								@if ($errors->has('jornada_id'))
										<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('jordana_id') }}</strong>
										</span>
								@endif					
							</div>
						</div>																									
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Guardar</button>				
						</div>
					</form>											
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
