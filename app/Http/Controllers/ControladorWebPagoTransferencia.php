<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\SDK;
use App\Entidades\Venta;
use App\Entidades\Plan;
use Illuminate\Support\Facades\Redis;

use Session;

class ControladorWebPagoTransferencia extends Controller
{
    public function index($idPlan)
    {
      $plan = new Plan();
      $plan->obtenerPorId($idPlan);
      return view("web.pago-transferencia", compact('idPlan', 'plan'));
    }

    public function guardar($idPlan, Request $request){
      $plan = new Plan();
      $plan->obtenerPorId($idPlan);

      $venta = new Venta();
      $venta->fecha = date("Y-m-d");
      $venta->fk_idcliente = Session::get('usuario_id');
      $venta->fk_idplan = $idPlan;
      $venta->precio = $plan->precio;
      $venta->cantidad = 1;
      $venta->fecha_vencimiento = date("Y-m-d", strtotime("+1 month", strtotime(date("Y-m-d"))));
      $venta->fk_idmedio = 1;
      $venta->fk_idestado_pago = 1;

      if ($_FILES["archivo"]["error"] === UPLOAD_ERR_OK) {//Se adjunta imagen
        $nombreArchivo = $_FILES["archivo"]["name"];
      
        $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
     //   print_r($extension);exit;
        if($extension == "png" || $extension == "gif" || $extension == "jpeg" || $extension == "jpg"){
            $nombre = date("Ymdhmsi") . ".$extension";
            $archivo = $_FILES["archivo"]["tmp_name"];
            move_uploaded_file($archivo, env('APP_PATH') . "/public/files/$nombre"); //guardaelarchivo
            $venta->archivo = $nombre;
        } else{
            exit;
        }
      }
      $venta->insertar();
      return redirect ("gracias-compra");
    }

}
