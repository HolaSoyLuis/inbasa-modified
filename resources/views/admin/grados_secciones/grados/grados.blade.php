@extends('layouts.app')
@section('title', 'Grados')
@section('content')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
		<nav class="navbar navbar-expand-lg bg-primary">
		  <div class="container">
		    <div class="collapse navbar-collapse">
		      <ul class="navbar-nav">
		        <li class="nav-item active">
		          <a class="nav-link" href="{{ route('grados.index') }}">Lista de Grados</a>
		        </li>
		        <!-- <li class="nav-item">
		          <a class="nav-link" href="{{ route('grados.create') }}">Nuevo Grado</a>
		        </li> -->
		        <li class="nav-item">
		          <a class="nav-link" href="{{ route('secciones.index') }}">Lista de Secciones</a>
		        </li>
		       	<li class="nav-item">
		          <a class="nav-link" href="{{ route('secciones.create') }}">Nuevo Sección</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>No</th>											
							<th>Grado</th>
							<th>Jornada</th>
							<th>Creado</th>
							<th>Actualizado</th>
							<th>Opciones</th>
						</thead>		
						@foreach($grados as $grado)		
						<tr>
							<td>{{$grado->id}}</td>					
							<td>{{$grado->grado}}</td>
							<td>Vespertina</td>
							<td>{{$grado->created_at}}</td>
							<td>{{$grado->updated_at}}</td>					
							<td>
								<a href="#">
									<button class="btn btn-info btn-sm" title="Ver">
										<i class="material-icons">visibility</i>
										Ver
									</button>
								</a>
								<a href="#">
									<button class="btn btn-primary btn-sm" title="Editar">
										<i class="material-icons">edit</i>
										Editar
									</button>
								</a>
								<a href="" data-target="#" data-toggle="modal">
									<button class="btn btn-danger btn-sm" title="Eliminar">
										<i class="material-icons">delete</i>
										Eliminar
									</button>
								</a>
							</td>
						</tr>	
						@endforeach						
					</table>
				</div>
			</div>		
		</div>
	</div>
</div>
@endsection
