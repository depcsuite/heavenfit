<?php

namespace App\Http\Controllers;

use App\Entidades\Disciplina;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;


require app_path() . '/start/constants.php';

class ControladorDisciplina extends Controller
{
      public function nuevo(){
            $titulo = "Nueva disciplina";
            
            return view("disciplina.disciplina-nuevo", compact('titulo'));
      }

      public function guardar(Request $request) {
            try {
                //Define la entidad servicio
                $titulo = "Modificar Disciplina";
                $entidad = new Disciplina();
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
                    $_POST["id"] = $entidad->idDisciplina;
                    return view('Disciplina.Disciplina-listar', compact('titulo', 'msg'));
                }
            } catch (Exception $e) {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = ERRORINSERT;
            }
    
            $id = $entidad->idDisciplina;
            $Disciplina = new Disciplina();
            $Disciplina->obtenerPorId($id);    
    
            return view('Disciplina.Disciplina-nuevo', compact('msg', 'Disciplina', 'titulo',)) . '?id=' . $Disciplina->idDisciplina;
        }
}