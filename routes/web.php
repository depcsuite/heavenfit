<?php
 //use Carbon\Carbon; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/*Route::get('/time' , function(){$date =new Carbon;echo $date ; } );*/


Route::group(array('domain' => '127.0.0.1'), function () {

    Route::get('/', 'ControladorWebHome@index');
 

    Route::get('/admin', 'ControladorHome@index');
    Route::post('/admin/patente/nuevo', 'ControladorPatente@guardar');

/* --------------------------------------------- */
/* CONTROLADOR LOGIN                           */
/* --------------------------------------------- */
    Route::get('/admin/login', 'ControladorLogin@index');
    Route::get('/admin/logout', 'ControladorLogin@logout');
    Route::post('/admin/logout', 'ControladorLogin@entrar');
    Route::post('/admin/login', 'ControladorLogin@entrar');

/* --------------------------------------------- */
/* CONTROLADOR RECUPERO CLAVE                    */
/* --------------------------------------------- */
    Route::get('/admin/recupero-clave', 'ControladorRecuperoClave@index');
    Route::post('/admin/recupero-clave', 'ControladorRecuperoClave@recuperar');

/* --------------------------------------------- */
/* CONTROLADOR PERMISO                           */
/* --------------------------------------------- */
    Route::get('/admin/usuarios/cargarGrillaFamiliaDisponibles', 'ControladorPermiso@cargarGrillaFamiliaDisponibles')->name('usuarios.cargarGrillaFamiliaDisponibles');
    Route::get('/admin/usuarios/cargarGrillaFamiliasDelUsuario', 'ControladorPermiso@cargarGrillaFamiliasDelUsuario')->name('usuarios.cargarGrillaFamiliasDelUsuario');
    Route::get('/admin/permisos', 'ControladorPermiso@index');
    Route::get('/admin/permisos/cargarGrilla', 'ControladorPermiso@cargarGrilla')->name('permiso.cargarGrilla');
    Route::get('/admin/permiso/nuevo', 'ControladorPermiso@nuevo');
    Route::get('/admin/permiso/cargarGrillaPatentesPorFamilia', 'ControladorPermiso@cargarGrillaPatentesPorFamilia')->name('permiso.cargarGrillaPatentesPorFamilia');
    Route::get('/admin/permiso/cargarGrillaPatentesDisponibles', 'ControladorPermiso@cargarGrillaPatentesDisponibles')->name('permiso.cargarGrillaPatentesDisponibles');
    Route::get('/admin/permiso/{idpermiso}', 'ControladorPermiso@editar');
    Route::post('/admin/permiso/{idpermiso}', 'ControladorPermiso@guardar');

/* --------------------------------------------- */
/* CONTROLADOR GRUPO                             */
/* --------------------------------------------- */
    Route::get('/admin/grupos', 'ControladorGrupo@index');
    Route::get('/admin/usuarios/cargarGrillaGruposDelUsuario', 'ControladorGrupo@cargarGrillaGruposDelUsuario')->name('usuarios.cargarGrillaGruposDelUsuario'); //otra cosa
    Route::get('/admin/usuarios/cargarGrillaGruposDisponibles', 'ControladorGrupo@cargarGrillaGruposDisponibles')->name('usuarios.cargarGrillaGruposDisponibles'); //otra cosa
    Route::get('/admin/grupos/cargarGrilla', 'ControladorGrupo@cargarGrilla')->name('grupo.cargarGrilla');
    Route::get('/admin/grupo/nuevo', 'ControladorGrupo@nuevo');
    Route::get('/admin/grupo/setearGrupo', 'ControladorGrupo@setearGrupo');
    Route::post('/admin/grupo/nuevo', 'ControladorGrupo@guardar');
    Route::get('/admin/grupo/{idgrupo}', 'ControladorGrupo@editar');
    Route::post('/admin/grupo/{idgrupo}', 'ControladorGrupo@guardar');

/* --------------------------------------------- */
/* CONTROLADOR USUARIO                           */
/* --------------------------------------------- */
    Route::get('/admin/usuarios', 'ControladorUsuario@index');
    Route::get('/admin/usuarios/nuevo', 'ControladorUsuario@nuevo');
    Route::post('/admin/usuarios/nuevo', 'ControladorUsuario@guardar');
    Route::post('/admin/usuarios/{usuario}', 'ControladorUsuario@guardar');
    Route::get('/admin/usuarios/cargarGrilla', 'ControladorUsuario@cargarGrilla')->name('usuarios.cargarGrilla');
    Route::get('/admin/usuarios/buscarUsuario', 'ControladorUsuario@buscarUsuario');
    Route::get('/admin/usuarios/{usuario}', 'ControladorUsuario@editar');

/* --------------------------------------------- */
/* CONTROLADOR MENU                             */
/* --------------------------------------------- */
    Route::get('/admin/sistema/menu', 'ControladorMenu@index');
    Route::get('/admin/sistema/menu/nuevo', 'ControladorMenu@nuevo');
    Route::post('/admin/sistema/menu/nuevo', 'ControladorMenu@guardar');
    Route::get('/admin/sistema/menu/cargarGrilla', 'ControladorMenu@cargarGrilla')->name('menu.cargarGrilla');
    Route::get('/admin/sistema/menu/eliminar', 'ControladorMenu@eliminar');
    Route::get('/admin/sistema/menu/{id}', 'ControladorMenu@editar');
    Route::post('/admin/sistema/menu/{id}', 'ControladorMenu@guardar');

    /* --------------------------------------------- */
    /* CONTROLADOR PATENTES                          */
    /* --------------------------------------------- */
    Route::get('/admin/patentes', 'ControladorPatente@index');
    Route::get('/admin/patente/nuevo', 'ControladorPatente@nuevo');
    Route::post('/admin/patente/nuevo', 'ControladorPatente@guardar');
    Route::get('/admin/patente/cargarGrilla', 'ControladorPatente@cargarGrilla')->name('patente.cargarGrilla');
    Route::get('/admin/patente/eliminar', 'ControladorPatente@eliminar');
    Route::get('/admin/patente/nuevo/{id}', 'ControladorPatente@editar');
    Route::post('/admin/patente/nuevo/{id}', 'ControladorPatente@guardar');

    /* --------------------------------------------- */
    /* CONTROLADOR CLIENTES                          */
    /* --------------------------------------------- */
    Route::get('/admin/clientes', 'ControladorCliente@index');
    Route::get('/admin/cliente/nuevo', 'ControladorCliente@nuevo');
    Route::post('/admin/cliente/nuevo', 'ControladorCliente@guardar');
    Route::get('/admin/cliente/cargarGrilla', 'ControladorCliente@cargarGrilla')->name('cliente.cargarGrilla');
    Route::get('/admin/cliente/eliminar', 'ControladorCliente@eliminar');
    Route::get('/admin/cliente/{id}', 'ControladorCliente@editar');
    Route::post('/admin/cliente/{id}', 'ControladorCliente@guardar');

    /* --------------------------------------------- */
    /* CONTROLADOR PROFESOR                          */
    /* --------------------------------------------- */
    Route::get('/admin/profesores', 'ControladorProfesor@index');
    Route::get('/admin/profesor/nuevo', 'ControladorProfesor@nuevo');
    Route::post('/admin/profesor/nuevo', 'ControladorProfesor@guardar');
    Route::get('/admin/profesores/cargarGrilla', 'ControladorProfesor@cargarGrilla')->name('profesor.cargarGrilla');
    Route::get('/admin/profesor/eliminar', 'ControladorProfesor@eliminar');
    Route::get('/admin/profesor/{id}', 'ControladorProfesor@editar');
    Route::post('/admin/profesor/{id}', 'ControladorProfesor@guardar');


    /* ------------------------------------------------ */
    /* CONTROLADOR DISCIPLINAS                          */
    /* ------------------------------------------------ */
    Route::get('/admin/disciplinas', 'ControladorDisciplina@index');
    Route::get('/admin/disciplina/nuevo', 'ControladorDisciplina@nuevo');
    Route::post('/admin/disciplina/nuevo', 'ControladorDisciplina@guardar');
    Route::get('/admin/disciplinas/cargarGrilla', 'ControladorDisciplina@cargarGrilla')->name('disciplinas.cargarGrilla');
    Route::get('/admin/disciplina/eliminar', 'ControladorDisciplina@eliminar');
    Route::get('/admin/disciplina/{id}', 'ControladorDisciplina@editar');
    Route::post('/admin/disciplina/{id}', 'ControladorDisciplina@guardar');

    /* ----------------------------------------- */
    /* CONTROLADOR PLANES                        */
    /* ----------------------------------------- */
    Route::get('/admin/planes', 'ControladorPlan@index');
    Route::get('/admin/planes/nuevo', 'ControladorPlan@nuevo');
    Route::post('/admin/planes/nuevo', 'ControladorPlan@guardar');
    Route::get('/admin/planes/cargarGrilla', 'ControladorPlan@cargarGrilla')->name('planes.cargarGrilla');
    Route::get('/admin/planes/eliminar', 'ControladorPlan@eliminar');
    Route::get('/admin/planes/{id}' , 'ControladorPlan@editar');
    Route::post('/admin/planes/{id}' , 'ControladorPlan@guardar');


    /* ----------------------------------------- */
    /* CONTROLADOR CLASES                        */
    /* ----------------------------------------- */
    Route::get('/admin/clases', 'ControladorClase@index');
    Route::get('/admin/clase/nuevo', 'ControladorClase@nuevo');
    Route::post('/admin/clase/nuevo', 'ControladorClase@guardar');
    Route::get('/admin/clases/cargarGrilla', 'ControladorClase@cargarGrilla')->name('clases.cargarGrilla');
    Route::get('/admin/clase/eliminar', 'ControladorClase@eliminar');
    Route::get('/admin/clase/{id}', 'ControladorClase@editar');
    Route::post('/admin/clase/{id}', 'ControladorClase@guardar');

    /* ----------------------------------------- */
    /* CONTROLADOR RESERVA                        */
    /* ----------------------------------------- */
    Route::get('/admin/reservas', 'ControladorReserva@index');
    Route::get('/admin/reserva/nuevo', 'ControladorReserva@nuevo');
    Route::post('/admin/reserva/nuevo', 'ControladorReserva@guardar');
    Route::get('/admin/reservas/cargarGrilla', 'ControladorReserva@cargarGrilla')->name('reservas.cargarGrilla');
    Route::get('/admin/reserva/eliminar', 'ControladorReserva@eliminar');
    Route::get('/admin/reserva/{id}', 'ControladorReserva@editar');
    Route::post('/admin/reserva/{id}', 'ControladorReserva@guardar');

    /* ----------------------------------------- */
    /* CONTROLADOR VENTA                        */
    /* ----------------------------------------- */
    Route::get('/admin/ventas', 'ControladorVenta@index');
    Route::get('/admin/venta/nuevo', 'ControladorVenta@nuevo');
    Route::post('/admin/venta/nuevo', 'ControladorVenta@guardar');
    Route::get('/admin/ventas/cargarGrilla', 'ControladorVenta@cargarGrilla')->name('ventas.cargarGrilla');
    Route::get('/admin/venta/eliminar', 'ControladorVenta@eliminar');
    Route::get('/admin/venta/{id}', 'ControladorVenta@editar');
    Route::post('/admin/venta/{id}', 'ControladorVenta@guardar');

    /* ----------------------------------------- */
    /* CONTROLADOR POSTULACIONES                 */
    /* ----------------------------------------- */
    Route::get('/admin/postulaciones', 'ControladorPostulacion@index');
    Route::get('/admin/postulacion/nuevo', 'ControladorPostulacion@nuevo');
    Route::post('/admin/postulacion/nuevo', 'ControladorPostulacion@guardar');
    Route::get('/admin/postulaciones/cargarGrilla', 'ControladorPostulacion@cargarGrilla')->name('postulaciones.cargarGrilla');
    Route::get('/admin/postulacion/eliminar', 'ControladorPostulacion@eliminar');
    Route::get('/admin/postulacion/{id}', 'ControladorPostulacion@editar');
    Route::post('/admin/postulacion/{id}', 'ControladorPostulacion@guardar');

    
    /* ----------------------------------------- */
    /* CONTROLADOR NUTRICIONISTA                 */
    /* ----------------------------------------- */
    Route::get('/admin/nutricionistas', 'ControladorNutricionista@index');
    Route::get('/admin/nutricionista/nuevo', 'ControladorNutricionista@nuevo');
    Route::post('/admin/nutricionista/nuevo', 'ControladorNutricionista@guardar');
    Route::get('/admin/nutricionistas/cargarGrilla', 'ControladorNutricionista@cargarGrilla')->name('nutricionista.cargarGrilla');
    Route::get('/admin/nutricionista/eliminar', 'ControladorNutricionista@eliminar');
    Route::get('/admin/nutricionista/{id}', 'ControladorNutricionista@editar');
    Route::post('/admin/nutricionista/{id}', 'ControladorNutricionista@guardar');
    
});


