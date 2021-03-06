<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('docentes/horario/horario');
    }

    //Devuelve vista de los horarios de hijos de encargados
    public function indexEN(){
        return view('encargado/horario/horario');
    }

    //Vista del horario de clases del estudiante
    public function indexES(){
        $user_data = Auth::user();
        $data = DB::select("select concat(fecha_inicio, ' a ', fecha_fin) as ciclo, cursos.nombre as curso, SUM(nota) as nota, bimestre from users
            inner join role_user on role_user.user_id = users.id
            inner join estudiantes on estudiantes.usuario_id = role_user.user_id
            inner join detalle_notas on detalle_notas.estudiante_id = estudiantes.id
            inner join bimestres on detalle_notas.bimestre_id = bimestres.id
            inner join ciclos on bimestres.ciclo_id = ciclos.id
            inner join cursos on detalle_notas.curso_id = cursos.id
            where usuario_id = ? group by bimestre;", [$user_data->id]);
        
        return view('estudiante/horario/horario', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
