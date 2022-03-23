<?php

namespace App\Http\Controllers;

use App\Entidades\Reserva; //include_once "app/Entidades/Sistema/Menu.php";
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Cliente;
use App\Entidades\Clase;
use Illuminate\Http\Request;


require app_path() . '/start/constants.php';

class ControladorReserva extends Controller
{
      public function nuevo(){
            $titulo = "Nuevo cliente";
            $Cliente = new Cliente();
            $array_cliente = $Cliente->obtenerTodos();
            $Clase = new Clase();
            $array_clase = $Clase->obtenerTodos();
            return view("reserva.reserva-nuevo", compact('titulo', 'array_cliente', 'array_clase'));
      }

       public function guardar(Request $request) {
        try {
            //Define la entidad servicio
            $titulo = "Modificar Reserva";
            $entidad = new Reserva();
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
                $_POST["id"] = $entidad->idreserva;
                return view('reserva.reserva-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idcliente;
        $cliente = new Cliente();
        $cliente->obtenerPorId($id);

        $Cliente = new Cliente();
        $array_cliente = $Cliente->obtenerTodos();    

        return view('reserva.reserva-nuevo', compact('msg', 'cliente', 'titulo', 'array_cliente' , 'array_clase')) . '?id=' . $cliente->idcliente;
    }

}