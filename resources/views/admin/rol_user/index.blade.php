@extends('layouts.app')
@section('title', 'Listado de Roles y Permisos')
@section('content')
<div class="row">
	<div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">		
		<nav class="navbar navbar-expand-lg bg-primary">
		  <div class="container">		    		    		    
		    <div class="collapse navbar-collapse">
		      <ul class="navbar-nav">
		      </ul>
		    </div>
		  </div>
		</nav>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="card-body text-center">
				<div class="table-responsive">
					<table id="datatable_table" class="table table-condensed table-hover">
						<thead>
							<td></td>
							<td>Id</td>
              				<td>User id</td>
							<td>Role id</td>
						</thead>
						@foreach($data as $d)
						<tr>
						<td class="td-actions text-left">{{$d->id}}</td>
              			<td class="td-actions text-left">{{$d->user_id}}</td>
              			<td class="td-actions text-left">{{$d->role_id}}</td>
						</tr>	
						@endforeach						
					</table>
				</div>
			</div>
		</div>
	</div>	
</div>
@endsection
