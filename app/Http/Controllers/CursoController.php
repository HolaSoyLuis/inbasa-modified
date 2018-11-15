<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;
use App\Curso;
use App\Grado;
use App\Empleado;
use App\Cargo;

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
        return view('estudiante/cursos/cursos');
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
