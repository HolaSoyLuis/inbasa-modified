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
                <td>Bimestre I</td>
                <td>Bimestre II</td>
                <td>Bimestre III</td>
                <td>Bimestre IV</td>
                <td>Nota Final</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
									{{-- ciclo --}}
                </td>
								<td>
									{{-- curso --}}
								</td>
								<td>
									{{ $bimestre1 }}
								</td>
								<td>
									{{ $bimestre2 }}
								</td>
								<td>
									{{ $bimestre3 }}
								</td>
								<td>
									{{ $bimestre4 }}
								</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
