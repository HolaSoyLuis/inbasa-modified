@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
			<div class="card-body">
        <div class="table-responsive">
          <table id="datatable_table" class="table table-condensed table-hover">
            <thead>
              <tr>
                <td>Ciclo</td>
                <td>Curso</td>
                <td>Bimestre</td>
                <td>Nota</td>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $d)
              <tr>
                <td>
					{{ $d->ciclo }}
                </td>
				<td>
					{{ $d->curso }}
				</td>
				<td>
					{{ $d->bimestre }}
				</td>
				<td>
                  {{ $d->nota }}
				</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
