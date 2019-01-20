<?php

Route::get('/', 'Auth\LoginController@formPrincipal');
Route::get('/login', 'Auth\LoginController@formLogin');
Route::get('/desarrolladores', 'Auth\LoginController@formDesarrolladores');

// Auth::routes();
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('inicio', 'InicioController@index')->name('inicio');

/*  RUTAS PARA EL SISTEMA
 */
//Inicio de sesión
Route::middleware(['auth'])->group(function(){
    /*
        RUTAS PARA MÓDULO DE ADMINISTRACIÓN
    */
    //Usuarios

    Route::get('admin/usuarios', 'UserController@index')->name('usuarios.index')
        ->middleware('permission:usuarios.index');

    Route::get('admin/usuarios/create', 'UserController@create')->name('usuarios.create')
        ->middleware('permission:usuarios.create');

    Route::get('admin/usuarios/pdf', 'UserController@createPDF')->name('usuarios.pdf')
        ->middleware('permission:usuarios.edit');

    Route::post('admin/usuarios/store', 'UserController@store')->name('usuarios.store')
        ->middleware('permission:usuarios.create');
    
    Route::get('admin/usuarios/{id}', 'UserController@show')->name('usuarios.show')
        ->middleware('permission:usuarios.show');

    Route::get('admin/usuarios/{id}/edit', 'UserController@edit')->name('usuarios.edit')
        ->middleware('permission:usuarios.edit');

    Route::put('admin/usuarios/{id}', 'UserController@update')->name('usuarios.update')
        ->middleware('permission:usuarios.edit');

    Route::delete('admin/usuarios/{id}', 'UserController@destroy')->name('usuarios.destroy')
        ->middleware('permission:usuarios.destroy');



    // Roles
    //Creación de roles
    Route::post('admin/roles/store', 'RoleController@store')->name('roles.store')
        ->middleware('permission:roles.create');

    //Navegar en los roles

    Route::get('admin/roles', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');

    //Formulario para crear - verifica el permiso de create = crear
    Route::get('admin/roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');

    //Actualizar - verifica si tiene permiso edit = editar
    Route::put('admin/roles/{id}', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');

    //Ver - verifica con el permiso de show
    Route::get('admin/roles/{id}', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');

    //Eliminar - permiso de destroy
    Route::delete('admin/roles/{id}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    //Formulario para editar
    Route::get('admin/roles/{id}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');

    //Permisos
    //Navegar en los roles
    Route::get('admin/permisos', 'RoleController@index1')->name('permisos.index')
        ->middleware('permission:roles.index');

     //Empleados
    Route::post('admin/empleados/store', 'EmpleadoController@store')->name('empleados.store')
        ->middleware('permission:empleados.create');

    Route::get('admin/empleados', 'EmpleadoController@index')->name('empleados.index')
        ->middleware('permission:empleados.index');

    Route::get('admin/empleados/create', 'EmpleadoController@create')->name('empleados.create')
        ->middleware('permission:empleados.create');

    Route::get('admin/empleados/pdf', 'EmpleadoController@createPDF')->name('empleados.pdf')
        ->middleware('permission:empleados.edit');                

    Route::put('admin/empleados/{id}', 'EmpleadoController@update')->name('empleados.update')
        ->middleware('permission:empleados.edit');

    Route::get('admin/empleados/{id}', 'EmpleadoController@show')->name('empleados.show')
        ->middleware('permission:empleados.show');

    Route::delete('admin/empleados/{id}', 'EmpleadoController@destroy')->name('empleados.destroy')
        ->middleware('permission:empleados.destroy');

    Route::get('admin/empleados/{id}/edit', 'EmpleadoController@edit')->name('empleados.edit')
        ->middleware('permission:empleados.edit');

    //Cargo
    Route::post('admin/cargos/store', 'CargoController@store')->name('cargos.store')
        ->middleware('permission:cargos.create');

    Route::get('admin/cargos', 'CargoController@index')->name('cargos.index')
        ->middleware('permission:cargos.index');

    Route::get('admin/cargos/create', 'CargoController@create')->name('cargos.create')
        ->middleware('permission:cargos.create');

    Route::put('admin/cargos/{id}', 'CargoController@update')->name('cargos.update')
        ->middleware('permission:cargos.edit');

    Route::get('admin/cargos/{id}', 'CargoController@show')->name('cargos.show')
        ->middleware('permission:cargos.show');

    Route::delete('admin/cargos/{id}', 'CargoController@destroy')->name('cargos.destroy')
        ->middleware('permission:cargos.destroy');

    Route::get('admin/cargos/{id}/edit', 'CargoController@edit')->name('cargos.edit')
        ->middleware('permission:cargos.edit');

    //Estudiantes
    Route::post('admin/estudiantes/store', 'EstudianteController@store')->name('estudiantes.store')
        ->middleware('permission:estudiantes.create');

    Route::get('admin/estudiantes', 'EstudianteController@index')->name('estudiantes.index')
        ->middleware('permission:estudiantes.index');

    Route::get('admin/estudiantes/list', 'EstudianteController@index')->name('estudiantes.list')
        ->middleware('permission:estudiantes.list');

    Route::get('admin/estudiantes/create', 'EstudianteController@create')->name('estudiantes.create')
        ->middleware('permission:estudiantes.create');

    Route::get('admin/estudiantes/pdf', 'EstudianteController@createPDF')->name('estudiantes.pdf')
        ->middleware('permission:estudiantes.edit');          

    Route::put('admin/estudiantes/{id}', 'EstudianteController@update')->name('estudiantes.update')
        ->middleware('permission:estudiantes.edit');

    Route::get('admin/estudiantes/{id}', 'EstudianteController@show')->name('estudiantes.show')
        ->middleware('permission:estudiantes.show');

    Route::delete('admin/estudiantes/{id}', 'EstudianteController@destroy')->name('estudiantes.destroy')
        ->middleware('permission:estudiantes.destroy');

    Route::get('admin/estudiantes/{id}/edit', 'EstudianteController@edit')->name('estudiantes.edit')
        ->middleware('permission:estudiantes.edit');

    //Encargados
    Route::post('admin/encargado/store', 'EncargadoController@store')->name('encargado.store')
        ->middleware('permission:encargado.store');

    Route::get('admin/encargado', 'EncargadoController@index')->name('encargado.index')
        ->middleware('permission:encargado.index');

    Route::get('admin/encargado/create', 'EncargadoController@create')->name('encargado.create')
        ->middleware('permission:encargado.create');

    Route::get('admin/encargado/pdf', 'EncargadoController@createPDF')->name('encargado.pdf')
        ->middleware('permission:encargado.edit');        

    Route::put('admin/encargado/{id}', 'EncargadoController@update')->name('encargado.update')
        ->middleware('permission:encargado.edit');

    Route::get('admin/encargado/{id}/show', 'EncargadoController@show')->name('encargado.show')
        ->middleware('permission:encargado.show');

    Route::delete('admin/encargado/{id}', 'EncargadoController@destroy')->name('encargado.destroy')
        ->middleware('permission:encargado.destroy');

    Route::get('admin/encargado/{id}/edit', 'EncargadoController@edit')->name('encargado.edit')
        ->middleware('permission:encargado.edit');

    //Ciclos
    Route::post('admin/ciclos/store', 'CicloController@store')->name('ciclos.store')
        ->middleware('permission:ciclos.create');

    Route::get('admin/ciclos', 'CicloController@index')->name('ciclos.index')
        ->middleware('permission:ciclos.index');

    Route::get('admin/ciclos/create', 'CicloController@create')->name('ciclos.create')
        ->middleware('permission:ciclos.create');

    Route::put('admin/ciclos/{id}', 'CicloController@update')->name('ciclos.update')
        ->middleware('permission:ciclos.edit');

    Route::get('admin/ciclos/{id}', 'CicloController@show')->name('ciclos.show')
        ->middleware('permission:ciclos.show');

    Route::delete('admin/ciclos/{id}', 'CicloController@destroy')->name('ciclos.destroy')
        ->middleware('permission:ciclos.destroy');

    Route::get('admin/ciclos/{id}/edit', 'CicloController@edit')->name('ciclos.edit')
        ->middleware('permission:ciclos.edit');

    //Bloques o Unidades
    Route::post('admin/bloques/store', 'BloqueController@store')->name('bloques.store')
        ->middleware('permission:bloques.create');

    Route::get('admin/bloques', 'BloqueController@index')->name('bloques.index')
        ->middleware('permission:bloques.index');

    Route::get('admin/bloques/create', 'BloqueController@create')->name('bloques.create')
        ->middleware('permission:ciclosbim.create');

    Route::put('admin/bloques/{id}', 'BloqueController@update')->name('bloques.update')
        ->middleware('permission:bloques.edit');

    Route::get('admin/bloques/{id}', 'BloqueController@show')->name('bloques.show')
        ->middleware('permission:bloques.show');

    Route::delete('admin/bloques/{id}', 'BloqueController@destroy')->name('bloques.destroy')
        ->middleware('permission:bloques.destroy');

    Route::get('admin/bloques/{id}/edit', 'BloqueController@edit')->name('bloques.edit')
        ->middleware('permission:bloques.edit');

    // Ciclos y bloques
    Route::post('admin/ciclosbloques/store', 'CicloBloquesController@store')->name('ciclosbloques.store')
        ->middleware('permission:bloques.create');

    Route::get('admin/ciclosbloques', 'CicloBloquesController@index')->name('ciclosbloques.index')
        ->middleware('permission:bloques.index');

    Route::get('admin/ciclosbloques/create', 'CicloBloquesController@create')->name('ciclosbloques.create')
        ->middleware('permission:ciclosbim.create');

    Route::put('admin/ciclosbloques/{id}', 'CicloBloquesController@update')->name('ciclosbloques.update')
        ->middleware('permission:bloques.edit');

    Route::get('admin/ciclosbloques/{id}', 'CicloBloquesController@show')->name('ciclosbloques.show')
        ->middleware('permission:bloques.show');

    Route::delete('admin/ciclosbloques/{id}', 'CicloBloquesController@destroy')->name('ciclosbloques.destroy')
        ->middleware('permission:bloques.destroy');

    Route::get('admin/ciclosbloques/{id}/edit', 'CicloBloquesController@edit')->name('ciclosbloques.edit')
        ->middleware('permission:bloques.edit');

    //Grados
    Route::post('admin/grados/store', 'GradoController@store')->name('grados.store')
        ->middleware('permission:grados.create');

    Route::get('admin/grados', 'GradoController@index')->name('grados.index')
        ->middleware('permission:grados.index');

    Route::get('admin/grados/create', 'GradoController@create')->name('grados.create')
        ->middleware('permission:grados.create');

    Route::put('admin/grados/{id}', 'GradoController@update')->name('grados.update')
        ->middleware('permission:grados.edit');

    Route::get('admin/grados/{id}', 'GradoController@show')->name('grados.show')
        ->middleware('permission:grados.show');

    Route::delete('admin/grados/{id}', 'GradoController@destroy')->name('grados.destroy')
        ->middleware('permission:grados.destroy');

    Route::get('admin/grados/{id}/edit', 'GradoController@edit')->name('grados.edit')
        ->middleware('permission:grados.edit');


    //Secciones
    Route::post('admin/secciones/store', 'SeccionController@store')->name('secciones.store')
        ->middleware('permission:secciones.create');

    Route::get('admin/secciones', 'SeccionController@index')->name('secciones.index')
        ->middleware('permission:secciones.index');

    Route::get('admin/secciones/create', 'SeccionController@create')->name('secciones.create')
        ->middleware('permission:secciones.create');

    Route::put('admin/secciones/{id}', 'SeccionController@update')->name('secciones.update')
        ->middleware('permission:secciones.edit');

    Route::get('admin/secciones/{id}', 'GradoController@show')->name('secciones.show')
        ->middleware('permission:secciones.show');

    Route::delete('admin/secciones/{id}', 'SeccionController@destroy')->name('secciones.destroy')
        ->middleware('permission:secciones.destroy');

    Route::get('admin/secciones/{id}/edit', 'SeccionController@edit')->name('secciones.edit')
        ->middleware('permission:secciones.edit');

    //Cursos
    Route::post('admin/cursos/store', 'CursoController@store')->name('cursos.store')
        ->middleware('permission:cursos.create');

    Route::get('admin/cursos', 'CursoController@index')->name('cursos.index')
        ->middleware('permission:cursos.index');

    Route::get('admin/cursos/create', 'CursoController@create')->name('cursos.create')
        ->middleware('permission:cursos.create');

    Route::put('admin/cursos/{id}', 'CursoController@update')->name('cursos.update')
        ->middleware('permission:cursos.edit');

    Route::get('admin/cursos/{id}', 'CursoController@show')->name('cursos.show')
        ->middleware('permission:cursos.show');

    Route::delete('admin/cursos/{id}', 'CursoController@destroy')->name('cursos.destroy')
        ->middleware('permission:cursos.destroy');

    Route::get('admin/cursos/{id}/edit', 'CursoController@edit')->name('cursos.edit')
        ->middleware('permission:cursos.edit');

    //Centro Educativo
    Route::post('admin/centros/store', 'CentroController@store')->name('centros.store')
        ->middleware('permission:centros.create');

    Route::get('admin/centros', 'CentroController@index')->name('centros.index')
        ->middleware('permission:centros.index');

    Route::get('admin/centros/create', 'CentroController@create')->name('centros.create')
        ->middleware('permission:centros.create');

    Route::put('admin/centros/{id}', 'CentroController@update')->name('centros.update')
        ->middleware('permission:centros.edit');

    Route::get('admin/centros/{id}', 'CentroController@show')->name('centros.show')
        ->middleware('permission:centros.show');

    Route::delete('admin/centros/{id}', 'CentroController@destroy')->name('centros.destroy')
        ->middleware('permission:centros.destroy');

    Route::get('admin/centros/{id}/edit', 'CentroController@edit')->name('centros.edit')
        ->middleware('permission:centros.edit');

    //Respaldos
    Route::post('admin/respaldos/store', 'BackupController@store')->name('respaldos.store')
        ->middleware('permission:respaldos.create');

    Route::get('admin/respaldos', 'BackupController@index')->name('respaldos.index')
        ->middleware('permission:respaldos.index');

    Route::get('admin/respaldos/create', 'BackupController@create')->name('respaldos.create')
        ->middleware('permission:respaldos.create');

    Route::put('admin/respaldos/{id}', 'BackupController@update')->name('respaldos.update')
        ->middleware('permission:respaldos.edit');

    Route::get('admin/respaldos/{id}', 'BackupController@show')->name('respaldos.show')
        ->middleware('permission:respaldos.show');

    Route::delete('admin/respaldos/{id}', 'BackupController@destroy')->name('respaldos.destroy')
        ->middleware('permission:respaldos.destroy');

    Route::get('admin/respaldos/{id}/edit', 'BackupController@edit')->name('respaldos.edit')
        ->middleware('permission:respaldos.edit');
    /*
        FIN RUTAS PARA MODULO DE ADMINISTRACIÓN
    */



    /*
        RUTAS PARA EL MÓDULO DE DOCENTES
    */
    //Rutas de Cursos que imparten los docentes
    Route::get('docente/cursos', 'CursoController@indexD')->name('docentes.cursos.index')
        ->middleware('permission:docentes.cursos.index');

    Route::put('docente/cursos/{id}', 'CursoController@updateD')->name('docentes.cursos.update')
        ->middleware('permission:docentes.cursos.edit');

    Route::get('docente/cursos/{id}', 'CursoController@showD')->name('docentes.cursos.show')
        ->middleware('permission:docentes.cursos.show');

    Route::get('docente/cursos/{id}/edit', 'CursoController@editD')->name('docentes.cursos.edit')
        ->middleware('permission:docentes.cursos.edit');

    //Rutas de Horario de clases que tendrá el docente
    Route::post('docente/horario/store', 'HorarioController@store')->name('docentes.horario.store')
            ->middleware('permission:docentes.horario.create');

    Route::get('docente/horario', 'HorarioController@index')->name('docentes.horario.index')
        ->middleware('permission:docentes.horario.index');

    Route::get('docente/horario/create', 'HorarioController@create')->name('docentes.horario.create')
        ->middleware('permission:docentes.horario.create');

    Route::put('docente/horario/{id}', 'HorarioController@update')->name('docentes.horario.update')
        ->middleware('permission:docentes.horario.edit');

    Route::get('docente/horario/{id}', 'HorarioController@show')->name('docentes.horario.show')
        ->middleware('permission:docentes.horario.show');

    Route::delete('docente/horario/{id}', 'HorarioController@destroy')->name('docentes.horario.destroy')
        ->middleware('permission:docentes.horario.destroy');

    Route::get('docente/horario/{id}/edit', 'HorarioController@edit')->name('docentes.horario.edit')
        ->middleware('permission:docentes.horario.edit');

    //Rutas de Notas para que el docente ingrese, edite, actualice o elimine notas de sus estudiantes
    Route::post('docente/notas/store', 'NotaController@store')->name('docentes.notas.store')
            ->middleware('permission:docentes.notas.create');

    Route::get('docente/notas', 'NotaController@index')->name('docentes.notas.index')
        ->middleware('permission:docentes.notas.index');

    Route::get('docente/notas/create', 'NotaController@create')->name('docentes.notas.create')
        ->middleware('permission:docentes.notas.create');

    Route::put('docente/notas/{id}', 'NotaController@update')->name('docentes.notas.update')
        ->middleware('permission:docentes.notas.edit');

    Route::get('docente/notas/{id}', 'NotaController@show')->name('docentes.notas.show')
        ->middleware('permission:docentes.notas.show');

    Route::delete('docente/notas/{id}', 'NotaController@destroy')->name('docentes.notas.destroy')
        ->middleware('permission:docentes.notas.destroy');

    Route::get('docente/notas/{id}/edit', 'NotaController@edit')->name('docentes.notas.edit')
        ->middleware('permission:docentes.notas.edit');
    /*
        FIN RUTAS PARA MODULO DE DOCENTES
    */



    /*
        RUTAS PARA EL MÓDULO DE ENCARGADOS
    */
    //Ruta para listar las notas de sus hijos
    Route::get('encargado/notas', 'NotaController@indexEN')->name('encargados.notas.index')
        ->middleware('permission:encargados.notas.index');
    //Ruta para listar el horario de clases de su hijo
    Route::get('encargado/horario', 'HorarioController@indexEN')->name('encargados.horario.index')
        ->middleware('permission:encargados.horario.index');
    /*
        FIN RUTAS PARA MODULO DE ENCARGADOS
    */



    /*
        RUTAS PARA EL MÓDULO DE ESTUDIANTES
    */
    //Ruta para listar las los cursos que lleva el estudiante
    Route::get('estudiante/notas', 'CursoController@indexES')->name('estudiantes.cursos.index')
        ->middleware('permission:estudiantes.cursos.index');
    //Ruta para listar el horario de clases del estudiante
    Route::get('estudiante/horario', 'HorarioController@indexES')->name('estudiantes.horario.index')
        ->middleware('permission:estudiantes.horario.index');
    /*
        FIN RUTAS PARA MODULO DE ESTUDIANTES
    */



    /*
        RUTAS PARA EL MÓDULO DE GESTIÓN ECONÓMICA
    */
    //Rutas para las Inscripciones
     Route::post('inscripcion/store', 'InscripcionController@store')->name('inscripciones.store')
            ->middleware('permission:inscripciones.create');

    Route::get('inscripcion', 'InscripcionController@index')->name('inscripciones.index')
        ->middleware('permission:inscripciones.index');

    Route::get('inscripcion/create', 'InscripcionController@create')->name('inscripciones.create')
        ->middleware('permission:inscripciones.create');

    Route::put('inscripcion/{id}', 'InscripcionController@update')->name('inscripciones.update')
        ->middleware('permission:inscripciones.edit');

    Route::get('inscripcion/{id}', 'InscripcionController@show')->name('inscripciones.show')
        ->middleware('permission:inscripciones.show');

    Route::delete('inscripcion/{id}', 'InscripcionController@destroy')->name('inscripciones.destroy')
        ->middleware('permission:inscripciones.destroy');

    Route::get('inscripcion/{id}/edit', 'InscripcionController@edit')->name('inscripciones.edit')
        ->middleware('permission:inscripciones.edit');

    //Rutas para pagos de colegiaturas
     Route::post('colegiatura/store', 'ColegiaturaController@store')->name('colegiaturas.store')
            ->middleware('permission:colegiaturas.create');

    Route::get('colegiatura', 'ColegiaturaController@index')->name('colegiaturas.index')
        ->middleware('permission:colegiaturas.index');

    Route::get('colegiatura/create', 'ColegiaturaController@create')->name('inscripciones.create')
        ->middleware('permission:colegiaturas.create');

    Route::put('colegiatura/{id}', 'ColegiaturaController@update')->name('colegiaturas.update')
        ->middleware('permission:colegiaturas.edit');

    Route::get('colegiatura/{id}', 'ColegiaturaController@show')->name('colegiaturas.show')
        ->middleware('permission:colegiaturas.show');

    Route::delete('colegiatura/{id}', 'ColegiaturaController@destroy')->name('colegiaturas.destroy')
        ->middleware('permission:colegiaturas.destroy');

    Route::get('colegiatura/{id}/edit', 'ColegiaturaController@edit')->name('colegiaturas.edit')
        ->middleware('permission:colegiaturas.edit');

    //Rutas para gestion de costos
     Route::post('costos/store', 'CostoController@store')->name('costos.store')
            ->middleware('permission:costos.create');

    Route::get('costos', 'CostoController@index')->name('costos.index')
        ->middleware('permission:costos.index');

    Route::get('costos/create', 'CostoController@create')->name('costos.create')
        ->middleware('permission:costos.create');

    Route::put('costos/{id}', 'CostoController@update')->name('costos.update')
        ->middleware('permission:costos.edit');

    Route::get('costos/{id}', 'CostoController@show')->name('costos.show')
        ->middleware('permission:costos.show');

    Route::delete('costos/{id}', 'CostoController@destroy')->name('costos.destroy')
        ->middleware('permission:costos.destroy');

    Route::get('costos/{id}/edit', 'CostoController@edit')->name('costos.edit')
        ->middleware('permission:costos.edit');
    /*
        FIN RUTAS PARA MODULO DE GESTIÓN ECONÓMICA
    */


    Route::resource('/asignacion', 'AsignacionController');

    Route::resource('/detalle_comprobante', 'DetalleComprobanteController');
    Route::get('/detalle_comprobante/pdf/{id}', 'DetalleComprobanteController@pdf')->name('detalle_comprobante.pdf');

    Route::resource('/tipo_pago', 'TipoPagoController');

    Route::resource('/comprobante', 'ComprobanteController');
    Route::get('/comprobante/pdf/{id}', 'ComprobanteController@pdf')->name('comprobante.pdf');

    Route::resource('/detalle_nota','DetalleNotaController');
    //Route::resource('/nota','NotaController');

    Route::resource('/role_user', 'role_user_controller');


    // Route::resource('/admin/comprobante', 'ComprobanteController')->middleware('permission::comprobante');
});
