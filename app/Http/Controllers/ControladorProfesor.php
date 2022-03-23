<?php

namespace App\Http\Controllers;

use App\Entidades\Profesor; //include_once "app/Entidades/Sistema/Menu.php";
use App\Entidades\Pais;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorProfesor extends Controller
{
      public function nuevo(){
            $pais = new Pais();
            $array_nacionalidad = $pais->obtenerTodos();
            $titulo = "Nuevo profesor";
            return view("profesor.profesor-nuevo", compact('titulo', 'array_nacionalidad'));
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
                    
                    $_POST["id"] = $entidad->idmenu;
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
            return view('profesor.profesor-listar', compact('titulo', 'msg', 'profesor', 'array_nacionalidad'));
            
    
      }
}