<?php

namespace App\Http\Controllers;
use App\Http\Requests\CicloRequest;
use Illuminate\Http\Request;
use App\Ciclo;

class CicloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciclos = Ciclo::all();      
        return view('admin/ciclosbloques/ciclos/ciclos')->with(compact('ciclos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/ciclosbloques/ciclos/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CicloRequest $request)
    {
        $ciclos = Ciclo::create($request->all());
        $request->session()->flash('alert-success', 'Ciclo Creado');
        return redirect()->route('ciclos.index');    
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
        $ciclos = Ciclo::find($id);  
        return view("admin/ciclosbloques/ciclos/edit")->with(compact('ciclos'));
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
        $ciclos = Ciclo::find($id);
        $ciclos->fill($request->all())->save();

        $request->session()->flash('alert-success', 'Ciclo Actualizado');
        return redirect()->route('ciclos.index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $ciclos = Ciclo::find($id);
        $ciclos->delete();  
              
        Ciclo::destroy($id);
        $request->session()->flash('alert-success', 'Ciclo Eliminado');
        return redirect()->back();
    }
}
