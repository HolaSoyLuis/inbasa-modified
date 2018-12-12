@extends('layouts.app')
@section('title', 'Ciclos y Bloques')
@section('content')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
		<nav class="navbar navbar-expand-lg bg-primary">
		  <div class="container">
		    <div class="collapse navbar-collapse">
		      <ul class="navbar-nav">
		        <li class="nav-item dropdown">
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
		        <li class="nav-item dropdown active">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Ciclos y Bloques</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="">Listado</a>
						<a class="dropdown-item" href="">Nuevo</a>
					</div>
					-->
				</li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</div>
</div>
@include('message._message')
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="datatable_table" class="table table-condensed table-hover">
						<thead>
							<td></td>
							<td>Fecha Inicio</td>
							<td>Fecha Fin</td>
							<td>Bloque</td>
							<td>Creado</td>
							<td>Actualizado</td>
							<td>Opciones</td>
						</thead>
						@foreach($bloques as $bloque)
						@foreach($ciclos as $ciclo)
						<tr>
							<td>{{$bloque->id}}</td>
							<td>{{$ciclo->fecha_inicio}}</td>
							<td>{{$ciclo->fecha_fin}}</td>
							<td>{{$bloque->bloque}}</td>
							<td>{{$ciclo->created_at}}</td>
							<td>{{$ciclo->updated_at}}</td>
							<td class="td-actions text-center">
								<form method="post" action="{{ route('ciclos.destroy', $ciclo->id) }}">
									<a href="{{ route('ciclos.edit', $ciclo->id) }}" class="btn btn-primary btn-sm" title="Editar">
										<i class="material-icons">edit</i>Editar
									</a>
									@csrf
                  					@method('DELETE')
									<button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
										<i class="material-icons">delete</i>Eliminar
									</button>
								</form>
							</td>
						</tr>
						@endforeach
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
