<?php

namespace App\Http\Controllers;

use App\Entidades\Reserva; //include_once "app/Entidades/Sistema/Menu.php";
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Cliente;
use App\Entidades\Modalidad;
use App\Entidades\Profesor;
use App\Entidades\Disciplina;

use Illuminate\Http\Request;


require app_path() . '/start/constants.php';

class ControladorReserva extends Controller
{
      public function nuevo(){
            $titulo = "Nueva Reserva";
            $cliente = new Cliente();
            $array_cliente = $cliente->obtenerTodos();
            $modalidad = new Modalidad();
            $array_modalidad = $modalidad->obtenerTodos();
            $profesor = new Profesor();
            $array_profesor = $profesor->obtenerTodos();
            $disciplina = new Disciplina();
            $array_disciplina = $disciplina->obtenerTodos();
            return view("reserva.reserva-nuevo", compact('titulo', 'array_cliente', 'array_modalidad', 'array_profesor', 'array_disciplina'));
      }

       public function guardar(Request $request) {
        try {
            //Define la entidad servicio
            $titulo = "Modificar Reserva";
            $entidad = new Reserva();
            $entidad->cargarDesdeRequest($request);

            //validaciones
            if ($entidad->fk_idcliente == "" || $entidad->fk_idmodalidad == "" || $entidad->fk_iddisciplina == "") {
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

        $id = $entidad->idreserva;
        $reserva = new Reserva();
        $reserva->obtenerPorId($id);

        $cliente = new Cliente();
        $array_cliente = $cliente->obtenerTodos();
        $modalidad = new Modalidad();
        $array_modalidad = $modalidad->obtenerTodos();
        $profesor = new Profesor();
        $array_profesor = $profesor->obtenerTodos();
        $disciplina = new Disciplina();
        $array_disciplina = $disciplina->obtenerTodos();

        return view('reserva.reserva-nuevo', compact('msg', 'reserva', 'titulo', 'array_cliente' , 'array_modalidad', 'array_profesor', 'array_disciplina')) . '?id=' . $reserva->idcliente;
    }

}