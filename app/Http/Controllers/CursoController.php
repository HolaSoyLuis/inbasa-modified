<?php

namespace App\Http\Controllers;
//namespace App\Http\Controllers\DB;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;

use DB;

use App\Curso;
use App\Grado;
use App\Empleado;
use App\Cargo;

use App\Nota;
use App\Ciclo;
use App\Estudiante;
use App\User;
use App\Asignacion;
use App\DetalleNota;
use App\Bimestre;

use Illuminate\Support\Facades\Auth;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Index para modulo admin
    public function index()
    {
        $cursos = Curso::all();
        $empleados = Empleado::all();
        $grados = Grado::all();
        return view('admin/cursos/cursos')->with(compact('cursos', 'empleados', 'grados'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Index para modulo docente
    public function indexD()
    {
        return view('docentes/cursos/cursos');
    }

    //Vista de cursos de un estudiante
    public function indexES(){
        $user = User::all();
        $estudiante = Estudiante::all();
        $ciclo = Ciclo::all();
        $curso = Curso::all();
        $nota = DetalleNota::all();
        $asignacion = Asignacion::all();
        $bimestre = Bimestre::all();
        $user_data = Auth::user();

        /*
        // ciclo->curso
        $notas = 0;
        // n_notas
        foreach ($estudiante as $e) {
          if ($e->usuario_id == $useruser->id) {
            foreach ($nota as $n) {
              $notas += 1;
            }
          }
        }

        $notas_index[$notas];

        $loop_n = 0;
        // index de las notas
        foreach ($estudiante as $e) {
          if ($e->usuario_id == $useruser->id) {
            foreach ($nota as $n) {
              $notas_index[$loop_n] = $n->id;
              $loop_n += 1;
            }
          }
        }

        // sumando las notas por bimestres
        $bimestre1 = 0;
        $bimestre2 = 0;
        $bimestre3 = 0;
        $bimestre4 = 0;

        $promedio = 0;

        foreach ($estudiante as $e) {
          if ($e->usuario_id == $useruser->id) {
            foreach ($nota as $n) {
              foreach ($bimestre as $b) {
                if ($n->bimestre_id == $b->id) {
                  if ($n->estudiante_id == $e->id && $b->bimestre == 'Bimestre I') {
                    $bimestre1 += (int) $n->nota;
                  }
                }
              }
            }
          }
        }

        foreach ($estudiante as $e) {
          if ($e->usuario_id == $useruser->id) {
            foreach ($nota as $n) {
              foreach ($bimestre as $b) {
                if ($n->bimestre_id == $b->id) {
                  if ($n->estudiante_id == $e->id && $b->bimestre == 'Bimestre II') {
                    $bimestre2 += (int) $n->nota;
                  }
                }
              }
            }
          }
        }

        foreach ($estudiante as $e) {
          if ($e->usuario_id == $useruser->id) {
            foreach ($nota as $n) {
              foreach ($bimestre as $b) {
                if ($n->bimestre_id == $b->id) {
                  if ($n->estudiante_id == $e->id && $b->bimestre == 'Bimestre III') {
                    $bimestre3 += (int) $n->nota;
                  }
                }
              }
            }
          }
        }

        foreach ($estudiante as $e) {
          if ($e->usuario_id == $useruser->id) {
            foreach ($nota as $n) {
              foreach ($bimestre as $b) {
                if ($n->bimestre_id == $b->id) {
                  if ($n->estudiante_id == $e->id && $b->bimestre == 'Bimestre IV') {
                    $bimestre4 += (int) $n->nota;
                  }
                }
              }
            }
          }
        }
        */
        /*
        $data = DB::select("select concat(fecha_inicio, '-', fecha_fin) as ciclo, cursos.nombre as curso, nota, bimestre from users inner join role_user on role_user.user_id = users.id inner join estudiantes on estudiantes.usuario_id = role_user.user_id inner join detalle_notas on detalle_notas.estudiante_id = estudiantes.id inner join bimestres on detalle_notas.bimestre_id = bimestres.id inner join ciclos on bimestres.ciclo_id = ciclos.id inner join cursos on detalle_notas.curso_id = cursos.id where usuario_id = ?;", [$user_data->id]);
        */
        
        $data = DB::select("select concat(fecha_inicio, ' a ', fecha_fin) as ciclo, cursos.nombre as curso, truncate(SUM(nota)/4,0) as nota from users
          inner join role_user on role_user.user_id = users.id
          inner join estudiantes on estudiantes.usuario_id = role_user.user_id
          inner join detalle_notas on detalle_notas.estudiante_id = estudiantes.id
          inner join bimestres on detalle_notas.bimestre_id = bimestres.id
          inner join ciclos on bimestres.ciclo_id = ciclos.id inner join cursos on detalle_notas.curso_id = cursos.id
          where usuario_id = 6 group by ciclo;", [$user_data->id]);
        
        return view('estudiante/cursos/cursos', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grados = Grado::all();
        $docentes = Empleado::all();
        $cargos = Cargo::all();
        return view('admin/cursos/create')->with(compact('grados','docentes', 'cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CursoRequest $request)
    {
        $cursos = Curso::create($request->all());
        $request->session()->flash('alert-success', 'Curso Creado');
        return redirect()->route('cursos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso, $id)
    {
        $cursos = Curso::find($id);
        $grados = Grado::all();
        $docentes = Empleado::all();
        $cargos = Cargo::all();
        return view('admin/cursos/show')->with(compact('cursos', 'grados','docentes', 'cargos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursos = Curso::find($id);
        $grados = Grado::all();
        $docentes = Empleado::all();
        $cargos = Cargo::all();
        return view('admin/cursos/edit')->with(compact('cursos', 'grados','docentes', 'cargos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CursoRequest $request, $id)
    {
        $cursos = Curso::find($id);
        $cursos->fill($request->all())->save();
        $request->session()->flash('alert-success', 'Curso Actualizado');
        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $cursos = Curso::find($id);
        $cursos->delete();

        $request->session()->flash('alert-success', 'Curso Eliminado');
        return redirect()->back();
    }
}
