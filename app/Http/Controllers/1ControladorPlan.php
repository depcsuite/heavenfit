<?php

namespace App\Http\Controllers;

use App\Entidades\Plan;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;


require app_path() . '/start/constants.php';

class ControladorPlan extends Controller
{
      public function nuevo(){
            $titulo = "Nueva Plan";
            
            return view("Plan.Plan-nuevo", compact('titulo'));
      }

      public function guardar(Request $request) {
            try {
                //Define la entidad servicio
                $titulo = "Modificar Plan";
                $entidad = new Plan();
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
                    $_POST["id"] = $entidad->idPlan;
                    return view('Plan.Plan-listar', compact('titulo', 'msg'));
                }
            } catch (Exception $e) {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = ERRORINSERT;
            }
    
            $id = $entidad->idPlan;
            $Plan = new Plan();
            $Plan->obtenerPorId($id);    
    
            return view('Plan.Plan-nuevo', compact('msg', 'Plan', 'titulo')) . '?id=' . $Plan->idPlan;
        }
}