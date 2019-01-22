<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
// use Illuminate\Support\Facades\DB;

class role_user_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::select("select roles.name as rol, users.username as usuario, concat(estudiantes.p_nombre, ' ', estudiantes.p_apellido) as estudiante, concat(empleados.p_nombre, ' ', empleados.p_apellido) as empleado from role_user
            left join roles on role_user.role_id = roles.id
            left join users on role_user.user_id = users.id
            left join estudiantes on users.id = estudiantes.usuario_id
            left join empleados on users.id = empleados.usuario_id;");
        # $data = DB::table('role_user')->get();

        return view('admin.rol_user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user_list = DB::select("select role_user.user_id, users.id, users.username from users left join role_user on users.id = role_user.user_id;");
        $role_list = DB::select("select r.id, name from role_user ru inner join roles r where ru.user_id = r.id;");
        return view('admin.rol_user.create', compact('user_list', 'role_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        DB::table('role_user')->insert(
            [
                // 'id' => 'null',
                'role_id' => $request->get('usuario_id'),
                'user_id' => $request->get('rol_id'),
                // 'created_at' => 'null',
                // 'updated_at' => 'null',
            ]
        );
        */
        DB::table('role_user')->insert(['role_id' => $request->get('rol_id'), 'user_id' => $request->get('usuario_id')]);
        /*
        DB::insert("insert into role_user values(null, ?, ?, curdate(), null)", [$request->get('usuario_id'), $request->get('rol_id')]);
        */
        return redirect('admin.rol_user.index')->with('success', 'registro guardado :D');
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
