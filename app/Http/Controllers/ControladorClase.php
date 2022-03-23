<?php

namespace App\Http\Controllers;

use App\Entidades\Clase;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Disciplina;
use App\Entidades\Profesor;
use App\Entidades\Modalidad;
use Illuminate\Http\Request;


require app_path() . '/start/constants.php';

class ControladorClase extends Controller
{
      public function nuevo(){
            $titulo = "Nueva Clase";
            $disciplina = new Disciplina();
            $array_disciplina = $disciplina->obtenerTodos();
            $profesor = new Profesor();
            $array_profesor = $profesor->obtenerTodos();
            $modalidad = new Modalidad();
            $array_modalidad = $modalidad->obtenerTodos();

            
            return view("Clase.Clase-nuevo", compact('titulo', 'array_disciplina', 'array_profesor', 'array_modalidad'));
      }

      public function guardar(Request $request) {
            try {
                //Define la entidad servicio
                $titulo = "Modificar Clase";
                $entidad = new Clase();
                $entidad->cargarDesdeRequest($request);
    
                //validaciones
                if ($entidad->fk_iddisciplina == "" || $entidad->fk_idprofesor == "" || $entidad->fk_idmodalidad == "") {
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
                    $_POST["id"] = $entidad->idclase;
                    return view('Clase.Clase-listar', compact('titulo', 'msg'));
                }
            } catch (Exception $e) {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = ERRORINSERT;
            }
    
            $id = $entidad->idclase;
            $clase = new Clase();
            $clase->obtenerPorId($id);    
    
            return view('Clase.Clase-nuevo', compact('msg', 'clase', 'titulo', 'array_disciplina', 'array_profesor', 'array_modalidad')) . '?id=' . $Clase->idclase;
        }
}