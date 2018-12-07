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
                @foreach($estudiante as $e)
                    @if($e->usuario_id == auth()->user()->id)
                        @foreach($nota as $n)
                            @if($n->estudiante_id == $e->id)
                                {{ $n->nota }}
                            @endif
                        @endforeach
                    @endif
                @endforeach
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