<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente; //include_once "app/Entidades/Sistema/Menu.php";
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Venta;
use App\Entidades\Reserva;
use App\Entidades\Pais;
use App\Entidades\Estado;
use Illuminate\Http\Request;


require app_path() . '/start/constants.php';

class ControladorCliente extends Controller
{
    public function index(){
        $titulo = "Listado de clientes";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CLIENTECONSULTA")) {
                $codigo = "CLIENTECONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('cliente.cliente-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }
    
    public function nuevo(){

        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CLIENTEALTA")) {
                $codigo = "CLIENTEALTA";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $titulo = "Nuevo cliente";
                $cliente = new Cliente();
                $pais = new Pais();
                $array_nacionalidad = $pais->obtenerTodos();
                $estado = new Estado();
                $array_estados = $estado->obtenerTodos();
                return view("cliente.cliente-nuevo", compact('titulo', 'cliente', 'array_nacionalidad','array_estados'));
            }
        } else {
            return redirect('admin/login');
        }
        
    }

    public function guardar(Request $request) {
        try {
            //Define la entidad servicio
            $titulo = "Modificar cliente";
            $entidad = new Cliente();
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
                $_POST["id"] = $entidad->idcliente;
                return view('cliente.cliente-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idcliente;
        $cliente = new Cliente();
        $cliente->obtenerPorId($id);

        $pais = new Pais();
        $array_nacionalidad = $pais->obtenerTodos();    

        $estado = new Estado();
        $array_estados = $estado->obtenerTodos();
        
        return view('cliente.cliente-nuevo', compact('msg', 'cliente', 'titulo', 'array_nacionalidad', 'array_estados')) . '?id=' . $cliente->idcliente;
    }

     public function cargarGrilla()
    {
        $request = $_REQUEST;

        $entidad = new Cliente();
        $aClientes = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aClientes) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = '<a class="btn btn-secondary" href="/admin/cliente/'.$aClientes[$i]->idcliente .'"><i class="fa-solid fa-pencil"></i></a>';
            $row[] = $aClientes[$i]->nombre;
            $row[] = $aClientes[$i]->telefono;
            $row[] = $aClientes[$i]->correo;
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aClientes), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aClientes), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function editar($id)
    {
        $titulo = "Modificar cliente";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CLIENTEEDITAR")) {
                $codigo = "CLIENTEEDITAR";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $cliente = new Cliente();
                $cliente->obtenerPorId($id);

                $pais = new Pais();
                $array_nacionalidad = $pais->obtenerTodos();
                
                $estado = new Estado();
                $array_estados = $estado->obtenerTodos();

                return view('cliente.cliente-nuevo', compact('cliente', 'titulo' ,'array_nacionalidad', 'array_estados'));
            }
        } else {
            return redirect('admin/login');
        }
    }

  public function eliminar(Request $request)
    {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("CLIENTEBAJA")) {

    
                $entidad = new Cliente();
                $entidad->cargarDesdeRequest($request);
                

                $venta = new Venta();
                $array_ventas = $venta->obtenerPorIdCliente($entidad->idcliente);

                $reserva = new Reserva();
                $array_reservas = $reserva->obtenerPorIdCliente($entidad->idcliente);
                
                if(count($array_ventas) == 0 && count($array_reservas) == 0 ){
                $entidad->eliminar();
                $aResultado["codigo"] = EXIT_SUCCESS;
                $aResultado["texto"] = "Eliminado correctamente";

                }
                else {
                    $aResultado["codigo"] = MSG_ERROR;
                    $aResultado["texto"] = "No se puede eliminar un cliente con ventas o reservas previas";
                }

                
            } else {
                $aResultado["codigo"] = MSG_ERROR;
                $aResultado["texto"] = "No tiene pemisos para la operaci&oacute;n.";
            }
            echo json_encode($aResultado);
        } else {
            return redirect('admin/login');
        }
    }
}