<?php

namespace App\Http\Controllers;

use App\Entidades\Plan;
use App\Entidades\Venta;
use App\Entidades\Tipo_plan;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;



require app_path() . '/start/constants.php';

class ControladorPlan extends Controller
{

    public function index()
    {
        $titulo = "Listado de planes";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PLANESCONSULTA")) {
                $codigo = "PLANESCONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('plan.plan-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }


    public function nuevo()
    {
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PLANESALTA")) {
                $codigo = "PLANESALTA";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $titulo = "Nueva Plan";
                $plan = new Plan();
                $tipoPlan = new Tipo_plan();
                $arrayTipoPlan = $tipoPlan->obtenerTodos();
                return view("Plan.Plan-nuevo", compact('titulo', 'plan', 'arrayTipoPlan'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function guardar(Request $request)
    {
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

    public function cargarGrilla()
    {
        $request = $_REQUEST;

        $entidad = new Plan();
        $aPlanes = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aPlanes) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = '<a class="btn btn-secondary" href="/admin/planes/' . $aPlanes[$i]->idplan . '"><i class="fa-solid fa-pencil"></i></a>';
            $row[] = $aPlanes[$i]->nombre;
            $row[] = number_format($aPlanes[$i]->precio, 2, "." , ",") ;
            $row[] = number_format($aPlanes[$i]->precioDolar, 2, "." , ",") ;
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aPlanes), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aPlanes), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function editar($id)
    {
        $titulo = "Modificar plan";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("PLANESEDITAR")) {
                $codigo = "PLANESEDITAR";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $plan = new Plan();
                $plan->obtenerPorId($id);
                $tipoPlan = new Tipo_plan();
                $arrayTipoPlan = $tipoPlan->obtenerTodos();
                return view('plan.plan-nuevo', compact('plan', 'titulo', 'arrayTipoPlan'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("PLANESBAJA")) {


                $entidad = new Plan();
                $entidad->cargarDesdeRequest($request);

                $venta = new Venta();
                $array_venta = $venta->obtenerPorIdPlan($entidad->idplan);

                if (count($array_venta) == 0) {
                    $entidad->eliminar();
                    $aResultado["codigo"] = EXIT_SUCCESS;
                    $aResultado["texto"] = "Eliminado correctamente";
                } else {
                    $aResultado["codigo"] = MSG_ERROR;
                    $aResultado["texto"] = "No se puede eliminar un plan con ventas previas";
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
