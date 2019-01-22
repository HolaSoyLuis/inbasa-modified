@extends('layouts.app')
@section('title', 'Detalle comprobante')
@section('content')
<div class="row">
  <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
    <nav class="navbar navbar-expand-lg bg-primary">
      <div class="container">
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ route('role_user.index') }}">Lista de usuarios y roles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('role_user.create') }}">Crear nuevo registro rol-usuario</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
    <div class="container">
      <div class="row justify-content-center">
      <div class="card-body text-center">
      <form method="post" action="{{ route('role_user.store') }}">
        {{ csrf_field() }}
        <h3>Ingrese los datos</h3>
        <div class="form-row">
          <div class="col">
          <div class="form-group label-floating">                    
            <select class="form-control" name="usuario_id" id="usuario_id">
                <option value="" disabled selected hidden>---Seleccione un usuario---</option>
                @foreach ($user_list as $u)
                @if ($u->user_id == null)
                  <option value="{{ $u->id }}">{{ $u->username }}</option>
                @endif
                @endforeach
            </select>
          </div>
          </div>

          <div class="col">
          <div class="form-group label-floating">                    
            <select class="form-control" name="rol_id" id="rol_id">
                <option value="" disabled selected hidden>---Seleccione un rol---</option>
                @foreach ($role_list as $r)
                <option value="{{ $r->id }}">{{ $r->name }}</option>
                @endforeach
            </select>
          </div>
          </div>
        </div>
        <br>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

@endsection
