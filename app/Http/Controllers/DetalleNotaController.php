<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetalleNota;
use App\TipoEvaluacion;
use App\Estudiante;
use App\Curso;
use App\Nota;
use App\Aspecto;
use App\Bloque;
use App\Bimestre;
use App\Ciclo;

class DetalleNotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notas_detalle = DetalleNota::all();
        $tipo_evaluaciones = TipoEvaluacion::all();
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        $notas = Nota::all();
        $aspectos = Aspecto::all();
        $bloques = Bloque::all();
        $bimestres = Bimestre::all();
        $ciclos = Ciclo::all();

        return view('docentes/notas/detalle_nota', compact('notas_detalle','estudiantes','cursos','tipo_evaluaciones','notas','aspectos','bloques', 'bimestres', 'ciclos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_evaluaciones = TipoEvaluacion::all();
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        $notas = Nota::all();
        $aspectos = Aspecto::all();
        $bloques = Bloque::all();
        $bimestres = Bimestre::all();
        $ciclos = Ciclo::all();

        return view("docentes/notas/detalle_nota_create")->with(compact('estudiantes','cursos','tipo_evaluaciones','notas','aspectos','bloques', 'bimestres', 'ciclos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          $request->validate([
            'nota'=> 'required',
            'aspecto_id'=> 'required',
            'bimestre_id'=> 'required',
            'tipo_evaluacion_id'=> 'required',
            'estudiante_id'=> 'required',
            'ciclo_id'=> 'required',
            'curso_id'=> 'required',
          ]);

        $detallenotas = new DetalleNota();
        $detallenotas->nota = $request->input('nota');
        $detallenotas->aspecto_id  = $request->input('aspecto_id');
        $detallenotas->bimestre_id  = $request->input('bimestre_id');
        $detallenotas->tipo_evaluacion_id = $request->input('tipo_evaluacion_id');
        $detallenotas->estudiante_id = $request->input('estudiante_id');
        $detallenotas->ciclo_id = $request->input('ciclo_id');
        $detallenotas->curso_id = $request->input('curso_id');


         $detallenotas->save();
         return redirect('/detalle_nota')->with('success', 'detalle de nota almacenada :D');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notas_detalle = DetalleNota::find($id);
        $tipo_evaluaciones = TipoEvaluacion::all();
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        $notas = Nota::all();
        $aspectos = Aspecto::all();
        $bloques = Bloque::all();
        $ciclos = Ciclo::all();

        return view('docentes/notas/detalle_nota_show', compact('notas_detalle','estudiantes','cursos','tipo_evaluaciones','notas','aspectos','bloques', 'ciclos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notas_detalle = DetalleNota::find($id);
        $tipo_evaluaciones = TipoEvaluacion::all();
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        $notas = Nota::all();
        $aspectos = Aspecto::all();
        $bloques = Bloque::all();
        $ciclos = Ciclo::all();

        return view('docentes/notas/detalle_nota_edit', compact('notas_detalle','estudiantes','cursos','tipo_evaluaciones','notas','aspectos','bloques', 'ciclos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $notas_detalle = DetalleNota::find($id);
        $notas_detalle->fill($request->all())->save();

        $request->session()->flash('alert-success', 'Nota Actualizada');
        return redirect()->route('detalle_nota.index.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
