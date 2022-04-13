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

    public function index()
    {
        $titulo = "Listado de reservas";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("RESERVASCONSULTA")) {
                $codigo = "RESERVASCONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('reserva.reserva-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function nuevo()
    {
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("RESERVASALTA")) {
                $codigo = "RESERVASALTA";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $titulo = "Nueva Reserva";
                $reserva = new Reserva();
                $cliente = new Cliente();
                $array_cliente = $cliente->obtenerTodos();
                $modalidad = new Modalidad();
                $array_modalidad = $modalidad->obtenerTodos();
                $profesor = new Profesor();
                $array_profesor = $profesor->obtenerTodos();
                $disciplina = new Disciplina();
                $array_disciplina = $disciplina->obtenerTodos();
                return view("reserva.reserva-nuevo", compact('titulo', 'reserva', 'array_cliente', 'array_modalidad', 'array_profesor', 'array_disciplina'));
            }
        } else {
            return redirect('admin/login');
        }
        $titulo = "Nueva Reserva";
        $reserva = new Reserva();
        $cliente = new Cliente();
        $array_cliente = $cliente->obtenerTodos();
        $modalidad = new Modalidad();
        $array_modalidad = $modalidad->obtenerTodos();
        $profesor = new Profesor();
        $array_profesor = $profesor->obtenerTodos();
        $disciplina = new Disciplina();
        $array_disciplina = $disciplina->obtenerTodos();
        return view("reserva.reserva-nuevo", compact('titulo', 'reserva', 'array_cliente', 'array_modalidad', 'array_profesor', 'array_disciplina'));
    }

    public function guardar(Request $request)
    {
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

        return view('reserva.reserva-nuevo', compact('msg', 'reserva', 'titulo', 'array_cliente', 'array_modalidad', 'array_profesor', 'array_disciplina')) . '?id=' . $reserva->idcliente;
    }

    public function cargarGrilla()
    {
        $request = $_REQUEST;

        $entidad = new Reserva();
        $aReservas = $entidad->obtenerFiltrado();
        //print_r($aReservas); exit;
        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];

       
        for ($i = $inicio; $i < count($aReservas) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = '<a class="btn btn-secondary" href="/admin/reserva/' . $aReservas[$i]->idreserva . '"><i class="fa-solid fa-pencil"></i></a>';
            $row[] = $aReservas[$i]->Nombre_Cliente;
            $row[] = $aReservas[$i]->Nombre_Profesor;
            $row[] = $aReservas[$i]->Nombre_Plan;
            $row[] = $aReservas[$i]->fecha_desde;
            $row[] = $aReservas[$i]->fecha_hasta;
            //$row[] = date_format(date_create($aReservas[$i]->fecha_desde), "d/m/Y h:i");
            $cont++;
            $data[] = $row;
        }


        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aReservas), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aReservas), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }
    public function editar($id)
    {
        $titulo = "Modificar reserva";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("RESERVASEDITAR")) {
                $codigo = "RESERVASEDITAR";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
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

                return view('reserva.reserva-nuevo', compact('reserva', 'titulo', 'array_cliente', 'array_modalidad', 'array_profesor', 'array_disciplina'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("RESERVASBAJA")) {


                $entidad = new Reserva();
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
