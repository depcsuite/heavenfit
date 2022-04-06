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
use Session;

require app_path() . '/start/constants.php';

class ControladorVenta extends Controller
{

    public function index()
    {
        $titulo = "Listado de ventas";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("VENTACONSULTA")) {
                $codigo = "VENTACONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('venta.venta-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function nuevo()
    {
        $titulo = "Nueva Venta";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("VENTAALTA")) {
                $codigo = "VENTAALTA";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $venta = new Venta();
                $cliente = new Cliente();
                $array_clientes = $cliente->obtenerTodos();
                $plan = new Plan();
                $array_planes = $plan->obtenerTodos();
                $estado_pago = new Estado_pago();
                $array_estado_pago = $estado_pago->obtenerTodos();
                $medio_pago = new Medio_pago();
                $array_medio_pago = $medio_pago->obtenerTodos();
                return view("venta.venta-nuevo", compact('titulo', 'venta', 'array_clientes', 'array_planes', 'array_estado_pago', 'array_medio_pago'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function guardar(Request $request)
    {
        try {
            //Define la entidad servicio
            $titulo = "Modificar venta";
            $entidad = new Venta();
            $entidad->cargarDesdeRequest($request);

            $cliente = new Cliente();
            $cliente->obtenerPorId(Session::get('usuario_id'));

            //validaciones
            if ($entidad->fecha == "") {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = "Complete todos los datos";
            } else {
                if ($entidad->fk_idestado_pago == 1 && $request->input("lstEstado_pago") == 2) {

                    $nombre = "Lourdes yorio";
                    $email = $cliente->correo;
                    $asunto = "Confirmamos su pago";
                    $mensaje = "Te contactaremos por Whatsappp para enviarte el link de la clase";

                    $body = "Nombre: $nombre <br>
                  Email: $email <br>
                  Mensaje: $mensaje";
                    //Instancia y configuraciones de PHPMailer
                    $mail = new PHPMailer(true);
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = env('MAIL_HOST');
                    $mail->SMTPAuth = true;
                    $mail->Username = env('MAIL_USERNAME');
                    $mail->Password = env('MAIL_PASSWORD');
                    $mail->SMTPSecure = env('MAIL_ENCRYPTION');
                    $mail->Port = env('MAIL_PORT');
                    //Destinatarios
                    $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME')); //Dirección desde
                    $mail->addAddress($email); //Dirección para
                    //$mail->addReplyTo($replyTo); //Dirección de reply no-reply

                    //Contenido del mail
                    $mail->isHTML(true);
                    $mail->Subject = $asunto;
                    $mail->Body = $body;
                    //$mail->send();
                    return view('venta.venta-listar', compact('titulo', 'msg')); //Retorna vista para confirmar el envio
                }
                //Si el estado anterior (BBDD) es pendiente y 
                //ahora ($request->input("lstEstado")) cambia a guardado 
                //que dispare el correo con datos de acceso

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
        return view('venta.venta-listar', compact('titulo', 'msg', 'venta', 'array_clientes', 'array_planes', 'array_estado_pago', 'array_medio_pago')) . '?id=' . $venta->idventa;;
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
            $row[] = '<a class="btn btn-secondary" href="/admin/venta/' . $aVentas[$i]->idventa . '"><i class="fa-solid fa-pencil"></i></a>';
            $row[] = date_format(date_create($aVentas[$i]->fecha), "d/m/Y");
            $row[] =  '<a href="/admin/cliente/' . $aVentas[$i]->fk_idcliente . '">' . $aVentas[$i]->cliente . '</a>';
            $row[] = '$' . $aVentas[$i]->precio;
            $row[] = $aVentas[$i]->estado_pago;

            if ($aVentas[$i]->fecha_vencimiento) {
                $row[] = date_format(date_create($aVentas[$i]->fecha_vencimiento), "d/m/Y");
            } else {
                $row[] = "";
            }
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
            if (!Patente::autorizarOperacion("VENTAEDITAR")) {
                $codigo = "VENTAEDITAR";
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
                return view('venta.venta-nuevo', compact('venta', 'titulo', 'array_clientes', 'array_planes', 'array_estado_pago', 'array_medio_pago'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("VENTAELIMINAR")) {
                $entidad = new Venta();
                $entidad->cargarDesdeRequest($request);
                $entidad->eliminar();
                $aResultado["err"] = EXIT_SUCCESS; //eliminado correctamente
            } else {
                $codigo = "VENTAELIMINAR";
                $aResultado["err"] = "No tiene pemisos para la operaci&oacute;n.";
            }
            echo json_encode($aResultado);
        } else {
            return redirect('admin/login');
        }
    }
}
