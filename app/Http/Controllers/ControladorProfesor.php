<?php

namespace App\Http\Controllers;

use App\Entidades\Profesor; //include_once "app/Entidades/Sistema/Menu.php";
use App\Entidades\Pais;
use App\Entidades\Modalidad;
use App\Entidades\Clase;
use App\Entidades\Reserva;
use App\Entidades\Estado;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorProfesor extends Controller
{
    public function index(){
        $titulo = "Listado de Profesores";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PROFESORESCONSULTA")) {
                $codigo = "PROFESORESCONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('profesor.profesor-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function nuevo(){
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PROFESORESALTA")) {
                $codigo = "PROFESORESALTA";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $pais = new Pais();
                $array_nacionalidad = $pais->obtenerTodos();
                $profesor = new Profesor;
                $titulo = "Nuevo profesor";
                $modalidad = new Modalidad();
                $array_modalidad = $modalidad->obtenerTodos();
                $estado = new Estado();
                $array_estados = $estado->obtenerTodos();
                return view("profesor.profesor-nuevo", compact('titulo', 'profesor', 'array_nacionalidad','array_modalidad', 'array_estados'));
            }
        } else {
            return redirect('admin/login');
        }
            
    }

      public function guardar(Request $request) {
            try {
                //Define la entidad servicio
                $titulo = "Modificar profesor";
                $entidad = new Profesor();
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
                    
                    $_POST["id"] = $entidad->idprofesor;
                    return view('profesor.profesor-listar', compact('titulo', 'msg'));
                }
            } catch (Exception $e) {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = ERRORINSERT;
            }
    
            $id = $entidad->idprofesor;
            $profesor = new Profesor();
            $profesor->obtenerPorId($id);
            $pais = new Pais();
            $array_nacionalidad = $pais->obtenerTodos();
            $modalidad = new Modalidad();
            $array_modalidad = $modalidad->obtenerTodos();
            $estado = new Estado();
            $array_estados = $estado->obtenerTodos();
            return view('profesor.profesor-listar', compact('titulo', 'msg', 'profesor', 'array_nacionalidad','array_modalidad', 'array_estados')). '?id=' . $profesor->idprofesor;
      }



      public function cargarGrilla()
    {
        $request = $_REQUEST;

        $entidad = new Profesor();
        $aProfesores = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aProfesores) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = '<a class="btn btn-secondary" href="/admin/profesor/'.$aProfesores[$i]->idprofesor .'"><i class="fa-solid fa-pencil"></i></a>';
            $row[] = $aProfesores[$i]->nombre;
            $row[] = $aProfesores[$i]->correo;
            $row[] = $aProfesores[$i]->telefono;
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aProfesores), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aProfesores), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }


    public function editar($id)
    {
        $titulo = "Modificar profesor";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PROFESORESEDITAR")) {
                $codigo = "PROFESORESEDITAR";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $profesor = new Profesor();
                $profesor->obtenerPorId($id);

                $pais = new Pais();
                $array_nacionalidad = $pais->obtenerTodos();

                $modalidad = new Modalidad();
                $array_modalidad = $modalidad->obtenerTodos();

                $estado = new Estado();
                $array_estados = $estado->obtenerTodos();

                return view('profesor.profesor-nuevo', compact('profesor', 'titulo' ,'array_nacionalidad', 'array_modalidad', 'array_estados'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("PROFESORESEBAJA")) {

    
                $entidad = new Profesor();
                $entidad->cargarDesdeRequest($request);

                $reserva = new Reserva();
                $array_reserva = $reserva->obtenerPorIdProfesor($entidad->idprofesor);

                $clase = new Clase();
                $array_clases = $clase->obtenerPorIdProfesor($entidad->idprofesor);

                if(count($array_clases) == 0 && count($array_reserva) == 0){
                
                $entidad->eliminar();
                $aResultado["codigo"] = EXIT_SUCCESS;
                $aResultado["texto"] = "Eliminado correctamente";
                }
                else {
                    $aResultado["codigo"] = MSG_ERROR;
                    $aResultado["texto"] = "No se puede eliminar un profesor con clases o reservas previas";
                }
                
            } else {
                $aResultado["codigo"] = MSG_ERROR;
                $aResultado["err"] = "No tiene pemisos para la operaci&oacute;n.";
            }
            echo json_encode($aResultado);
        } else {
            return redirect('admin/login');
        }
    }

}