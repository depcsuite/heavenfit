<?php

namespace App\Http\Controllers;

use App\Entidades\Venta;
use App\Entidades\Cliente;
use App\Entidades\Plan;
use App\Entidades\Estado_pago;
use App\Entidades\Medio_pago;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorVenta extends Controller{

    public function index(){
        $titulo = "Listado de ventas";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("MENUCONSULTA")) {
                $codigo = "MENUCONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('venta.venta-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }
    
      public function nuevo(){
            $titulo = "Nueva Venta";
            $venta = new Venta();
            $cliente = new Cliente();
            $array_clientes = $cliente->obtenerTodos();
            $plan = new Plan();
            $array_planes = $plan->obtenerTodos();
            $estado_pago = new Estado_pago();
            $array_estado_pago = $estado_pago->obtenerTodos();
            $medio_pago = new Medio_pago();
            $array_medio_pago = $medio_pago->obtenerTodos();
            return view("venta.venta-nuevo", compact('titulo', 'venta', 'array_clientes', 'array_planes', 'array_estado_pago' , 'array_medio_pago'));
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
            $estado_pago = new Estado_pago();
            $array_estado_pago = $estado_pago->obtenerTodos();
            $medio_pago = new Medio_pago();
            $array_medio_pago = $medio_pago->obtenerTodos();
            return view('venta.venta-listar', compact('titulo', 'msg', 'venta', 'array_clientes', 'array_planes', 'array_estado_pago' , 'array_medio_pago')). '?id=' . $venta->idventa;;
      }

      public function cargarGrilla()
      {
          $request = $_REQUEST;
  
          $entidad = new Venta();
          $aVentas = $entidad->obtenerFiltrado();
  
          $data = array();
          $cont = 0;
  
          $inicio = $request['start'];
          $registros_por_pagina = $request['length'];
  
  
          for ($i = $inicio; $i < count($aVentas) && $cont < $registros_por_pagina; $i++) {
              $row = array();
              $row[] = '<a class="btn btn-secondary" href="/admin/venta/'.$aVentas[$i]->idventa .'"><i class="fa-solid fa-pencil"></i></a>';
              $row[] = date_format(date_create($aVentas[$i]->fecha), "d/m/Y h:i" ) ;
              $row[] = $aVentas[$i]->cliente;
              $row[] = $aVentas[$i]->precio;
              $row[] = $aVentas[$i]->medio_pago;
              $row[] = date_format(date_create($aVentas[$i]->fecha_vencimiento),"d/m/Y h:i"  );
              $cont++;
              $data[] = $row;
          }
  
          $json_data = array(
              "draw" => intval($request['draw']),
              "recordsTotal" => count($aVentas), //cantidad total de registros sin paginar
              "recordsFiltered" => count($aVentas), //cantidad total de registros en la paginacion
              "data" => $data,
          );
          return json_encode($json_data);
      }

      public function editar($id)
    {
        $titulo = "Modificar venta";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("MENUMODIFICACION")) {
                $codigo = "MENUMODIFICACION";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $venta = new Venta();
                $venta->obtenerPorId($id);

                $cliente = new Cliente();
                $array_clientes = $cliente->obtenerTodos();
                $plan = new Plan();
                $array_planes = $plan->obtenerTodos();
                $estado_pago = new Estado_pago();
                $array_estado_pago = $estado_pago->obtenerTodos();
                $medio_pago = new Medio_pago();
                $array_medio_pago = $medio_pago->obtenerTodos();
                

                return view('venta.venta-nuevo', compact('venta', 'titulo', 'array_clientes', 'array_planes', 'array_estado_pago' , 'array_medio_pago'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("MENUELIMINAR")) {

    
                $entidad = new Venta();
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
?>