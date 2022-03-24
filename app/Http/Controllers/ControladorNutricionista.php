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
            if (!Patente::autorizarOperacion("MENUCONSULTA")) {
                $codigo = "MENUCONSULTA";
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
            $titulo = "Nuevo nutricionista";
            $pais = new Pais();
            $array_nacionalidad = $pais->obtenerTodos();
            return view("nutricionista.nutricionista-nuevo", compact('titulo', 'array_nacionalidad'));
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
            $row[] = '<a class="btn btn-secondary" href="/admin/cliente/'.$aNutricionista[$i]->idnutricionista .'"><i class="fa-solid fa-pencil"></i></a>';
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

}