@extends('layouts.app')
@section('title', 'Detalle Notas')
@section('content')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">		
		<nav class="navbar navbar-expand-lg bg-primary">
		  <div class="container">		    		    		    
		    <div class="collapse navbar-collapse">
		      <ul class="navbar-nav">
		        <li class="nav-item">
		          <a class="nav-link" href="{{ route('detalle_nota.index') }}">Detalle Notas</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="{{ route('detalle_nota.create') }}">Registrar Detalle Notas</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="datatable_table" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>No</th>
					<th>Curso</th>
					<th>Nota</th>
					<th>Aspecto</th>
					<th>Tipo</th>
					<th>Bimestre</th>
				</thead>		
				@foreach($notas_detalle as $n)		
				<tr>
				<td>{{$n->id}}</td>

				<td>
               		@foreach($cursos as $curso)
              			@if($curso->id == $n->curso_id)
                			{{ $curso['nombre'] }}
              			@endif
            		@endforeach
            	</td>

            	<td>
            		{{ $n->nota }}
            	</td>

            	<td>
            		@foreach($aspectos as $a)
            			@if($n->aspecto_id == $a->id)
            				{{ $a->aspecto }}
            			@endif
            		@endforeach
            	</td>

				<td>
                	@foreach($tipo_evaluaciones as $tipo)
              			@if($tipo->id == $n->tipo_evaluacion_id)
                			{{ $tipo['tipo'] }}
              			@endif
            		@endforeach
            	</td>

            	<td>
            		@foreach($bimestres as $b)
            			@if($n->bimestre_id == $b->id)
            				{{ $b->bimestre }}
            			@endif
            		@endforeach
            	</td>
<!--
    	        <td>
                 	@foreach ($estudiantes as $estudiante)
              			@if ($estudiante->id == $n->estudiante_id)
                			{{ $estudiante['p_nombre'] }} {{ $estudiante['s_nombre'] }} {{ $estudiante['p_apellido'] }} {{ $estudiante['s_apellido'] }}
              			@endif
            		@endforeach
        		</td>
-->
				</tr>
				@endforeach
			</table>
		</div>		
	</div>
</div>
@endsection