<?php

namespace App\Http\Controllers;

use App\Entidades\Nutricionista; //include_once "app/Entidades/Sistema/Menu.php";
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Pais;
use Illuminate\Http\Request;


require app_path() . '/start/constants.php';

class ControladorNutricionista extends Controller
{
    public function index(){
        $titulo = "Listado de nutricionistas";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("NUTRICIONISTASCONSULTA")) {
                $codigo = "NUTRICIONISTASCONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('nutricionista.nutricionista-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }
      public function nuevo(){
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("NUTRICIONISTASALTA")) {
                $codigo = "NUTRICIONISTASALTA";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $titulo = "Nuevo nutricionista";
                $nutricionista = new Nutricionista();
                $pais = new Pais();
                $array_nacionalidad = $pais->obtenerTodos();
                return view("nutricionista.nutricionista-nuevo", compact('titulo', 'nutricionista' , 'array_nacionalidad'));
    
            }
        } else {
            return redirect('admin/login');
        }
            $titulo = "Nuevo nutricionista";
            $nutricionista = new Nutricionista();
            $pais = new Pais();
            $array_nacionalidad = $pais->obtenerTodos();
            return view("nutricionista.nutricionista-nuevo", compact('titulo', 'nutricionista' , 'array_nacionalidad'));
      }

       public function guardar(Request $request) {
        try {
            //Define la entidad servicio
            $titulo = "Modificar nutricionista";
            $entidad = new Nutricionista();
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
                $_POST["id"] = $entidad->idnutricionista;
                return view('nutricionista.nutricionista-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idnutricionista;
        $nutricionista = new Nutricionista();
        $nutricionista->obtenerPorId($id);
        $pais = new Pais();
        $array_nacionalidad = $pais->obtenerTodos();    

        return view('nutricionista.nutricionista-nuevo', compact('msg', 'nutricionista', 'titulo', 'array_nacionalidad')) . '?id=' . $nutricionista->idnutricionista;
    }

    public function cargarGrilla()
    {
        $request = $_REQUEST;

        $entidad = new Nutricionista();
        $aNutricionista = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aNutricionista) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = '<a class="btn btn-secondary" href="/admin/nutricionista/'.$aNutricionista[$i]->idnutricionista .'"><i class="fa-solid fa-pencil"></i></a>';
            $row[] = $aNutricionista[$i]->nombre;
            $row[] = $aNutricionista[$i]->telefono;
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aNutricionista), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aNutricionista), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function editar($id)
    {
        $titulo = "Modificar nutricionista";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("NUTRICIONISTASEDITAR")) {
                $codigo = "NUTRICIONISTASEDITAR";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $nutricionista = new Nutricionista();
                $nutricionista->obtenerPorId($id);

                $pais = new Pais();
                $array_nacionalidad = $pais->obtenerTodos();

                return view('nutricionista.nutricionista-nuevo', compact('nutricionista', 'titulo' ,'array_nacionalidad'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("NUTRICIONISTASBAJA")) {

    
                $entidad = new Nutricionista();
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