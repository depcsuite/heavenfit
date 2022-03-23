<?php

namespace App\Http\Controllers;

use App\Entidades\Venta;
use App\Entidades\Cliente;
use App\Entidades\Plan;

use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorVenta extends Controller{

      public function nuevo(){
            $titulo = "Nueva Venta";
            $cliente = new Cliente();
            $array_clientes = $cliente->obtenerTodos();
            $plan = new Plan();
            $array_planes = $plan->obtenerTodos();
            return view("venta.venta-nuevo", compact('titulo', 'array_clientes', 'array_planes'));
      }

      public function guardar(Request $request) {
            try {
                //Define la entidad servicio
                $titulo = "Modificar venta";
                $entidad = new Venta();
                $entidad->cargarDesdeRequest($request);
    
                //validaciones
                if ($entidad->fecha == "") {
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
                    
                    $_POST["id"] = $entidad->idventa;
                    return view('venta.venta-listar', compact('titulo', 'msg'));
                }
            } catch (Exception $e) {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = ERRORINSERT;
            }

            $id = $entidad->idventa;
            $venta = new Venta();
            $venta->obtenerPorId($id);
            $cliente = new Cliente();
            $array_clientes = $cliente->obtenerTodos();
            $plan = new Plan();
            $array_planes = $plan->obtenerTodos();
            return view('venta.venta-listar', compact('titulo', 'msg', 'venta', 'array_clientes', 'array_planes')). '?id=' . $venta->idventa;;
      }
}

?>