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

}