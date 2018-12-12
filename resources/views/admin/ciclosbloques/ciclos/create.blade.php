@extends('layouts.app')
@section('title', 'Crear Ciclo')
@section('content')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
		<nav class="navbar navbar-expand-lg bg-primary">
		  <div class="container">
		    <div class="collapse navbar-collapse">
		      <ul class="navbar-nav">
				<li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Ciclos</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ route('ciclos.index') }}">Lista de Ciclos</a>
						<a class="dropdown-item" href="{{ route('ciclos.create') }}">Nuevo Ciclo</a>
					</div>
					<!--
		        </li>
		        <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bloques</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ route('bloques.index') }}">Listado de Bloques</a>
						<a class="dropdown-item" href="{{ route('bloques.create') }}">Nuevo Bloque</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Ciclos y Bloques</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ route('ciclosbloques.index') }}">Listado</a>
						<a class="dropdown-item" href="{{ route('ciclosbloques.create') }}">Nuevo</a>
					</div>
					-->
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
				<form method="post" action="{{ route('ciclos.store') }}">
					@csrf
					<h3>Ingrese los Datos</h3>

						<div class="form-group">
							<div class="form-group label-floating">
								<label for="fecha_inicio">Fecha Inicio</label>
								<input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio"></input>
								@if ($errors->has('fecha_inicio'))
										<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('fecha_inicio') }}</strong>
										</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="form-group label-floating">
								<label for="fecha_fin">Fecha Fin</label>
								<input type="date" class="form-control" name="fecha_fin" id="fecha_fin"></input>
								@if ($errors->has('fecha_fin'))
										<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('fecha_fin') }}</strong>
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
