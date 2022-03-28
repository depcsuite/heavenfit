<?php

namespace App\Http\Controllers;

use App\Entidades\Postulacion; //include_once "app/Entidades/Sistema/Menu.php";
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorPostulacion extends Controller
{

    public function index()
    {
        $titulo = "Listado de postulacion";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("POSTULACIONESCONSULTA")) {
                $codigo = "POSTULACIONESCONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('postulacion.postulacion-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function nuevo()
    {
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("POSTULACIONESALTA")) {
                $codigo = "POSTULACIONESALTA";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $titulo = "Nueva postulacion";
                $postulacion = new Postulacion();
                return view("postulacion.postulacion-nuevo", compact('titulo', 'postulacion'));
            }
        } else {
            return redirect('admin/login');
        }
        $titulo = "Nueva postulacion";
        $postulacion = new Postulacion();
        return view("postulacion.postulacion-nuevo", compact('titulo', 'postulacion'));
    }

    public function guardar(Request $request)
    {
        try {
            //Define la entidad servicio
            $titulo = "Modificar postulacion";
            $entidad = new Postulacion();
            $entidad->cargarDesdeRequest($request);

            //validaciones
            if ($entidad->nombre == "") {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = "Complete todos los datos";
            } else {
                if ($_POST["id"] > 0) {
                    //Es actualizacion
                    $entidad->guardar();

                    $msg["ESTADO"] = MSG_SUCCESS;
                    $msg["MSG"] = OKINSERT;
                } else {
                    //Es nuevo
                    $entidad->insertar();

                    $msg["ESTADO"] = MSG_SUCCESS;
                    $msg["MSG"] = OKINSERT;
                }

                $_POST["id"] = $entidad->idpostulacion;
                return view('postulacion.postulacion-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idpostulacion;
        $postulacion = new Postulacion();
        $postulacion->obtenerPorId($id);
        return view('postulacion.postulacion-listar', compact('titulo', 'msg', 'postulacion')) . '?id=' . $postulacion->idpostulacion;
    }

    public function cargarGrilla()
    {
        $request = $_REQUEST;

        $entidad = new Postulacion();
        $aPostulacion = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aPostulacion) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = '<a class="btn btn-secondary" href="/admin/postulacion/' . $aPostulacion[$i]->idpostulacion . '"><i class="fa-solid fa-pencil"></i></a>';
            $row[] = $aPostulacion[$i]->nombre;
            $row[] = $aPostulacion[$i]->telefono;
            $row[] = $aPostulacion[$i]->correo;
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aPostulacion), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aPostulacion), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function editar($id)
    {
        $titulo = "Modificar postulacion";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("POSTULACIONESEDITAR")) {
                $codigo = "POSTULACIONESEDITAR";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $postulacion = new Postulacion();
                $postulacion->obtenerPorId($id);


                return view('postulacion.postulacion-nuevo', compact('postulacion', 'titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("POSTULACIONESBAJA")) {


                $entidad = new Postulacion();
                $entidad->cargarDesdeRequest($request);
                $entidad->eliminar();

                $aResultado["err"] = EXIT_SUCCESS; //eliminado correctamente
            } else {
                $codigo = "ELIMINARPROFESIONAL";
                $aResultado["err"] = "No tiene pemisos para la operaci&oacute;n.";
            }
            echo json_encode($aResultado);
        } else {
            return redirect('admin/login');
        }
    }
}
