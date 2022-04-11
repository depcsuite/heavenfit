<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\Item;
use MercadoPago\MerchantOrder;
use MercadoPago\Payer;
use MercadoPago\Payment;
use MercadoPago\Preference;
use MercadoPago\SDK;
use App\Entidades\Plan;
use App\Entidades\Cliente;
use App\Entidades\Venta;

use Session;

class ControladorWebMercadoPago extends Controller
{
    public function index($idPlan)
    {
        if (Session::get("usuario_id")) {
            $access_token = "";
            SDK::setClientId(config("payment-methods.mercadopago.client"));
            SDK::setClientSecret(config("payment-methods.mercadopago.secret"));
            SDK::setAccessToken($access_token); //Es el token de la cuenta de MP donde se deposita el dinero

            //Armado del producto ‘item’
            $plan = new Plan();
            $plan->obtenerPorId($idPlan);

            if($plan){
                //Inserta la venta
                $venta = new Venta();
                $venta->fecha = date("Y-m-d H:i:s");
                $venta->fk_idcliente = Session::get("usuario_id");
                $venta->fk_idplan = $idPlan;
                $venta->precio = $plan->precio;
                $venta->cantidad = 1;
                $venta->fecha_vencimiento = date("Y-m-d", strtotime("+1 month", strtotime(date("Y-m-d"))));
                $venta->fk_idmedio = 2;
                $venta->fk_idestado_pago = 1;
                $idVenta = $venta->insertar();

                $item = new Item();
                $item->id = $plan->idplan;
                $item->title = $plan->nombre;
                $item->category_id = "products";
                $item->quantity = 1;
                $item->unit_price = $plan->precio * 1.1;
                $item->currency_id = "ARS";

                $preference = new Preference();
                $preference->items = array($item);

                //Datos del comprador
                $cliente = new Cliente();
                $cliente->obtenerPorId(Session::get('usuario_id'));

                $payer = new Payer();
                $payer->name = $cliente->nombre;
                $payer->surname = "";
                $payer->email = $cliente->correo;
                $payer->date_created = date('Y-m-d H:m:s');
                $payer->identification = array(
                    "type" => "CUIT",
                    "number" => $cliente->documento,
                );
                $preference->payer = $payer;

                //URL de configuración para indicarle a MP
                $preference->back_urls = [
                    "success" => env("APP_URL") . "/mercado-pago/aprobado/" . $idVenta,
                    "pending" =>  env("APP_URL") . "/mercado-pago/pendiente/" . $idVenta,
                    "failure" =>  env("APP_URL") . "/mercado-pago/error/" . $idVenta,
                ];

                $preference->payment_methods = array("installments" => 6);
                $preference->auto_return = "all";
                $preference->notification_url = '';
                $preference->save(); //Ejecuta la transacción
            }
        } else {
            $mensaje = "Tiene que estar logueado para acceder";
            return redirect("/login");
        }
    }

    public function aprobado($idVenta){
        $venta = new Venta();
        $venta->obtenerPorId($idVenta);
        $venta->fk_idestado_pago = 2;
        $venta->guardar();

        //Agregar logica de envio de correo


        return redirect("/gracias-compra");
    }

    public function pendiente($idVenta){
        $venta = new Venta();
        $venta->obtenerPorId($idVenta);
        $venta->fk_idestado_pago = 1;
        $venta->guardar();
        return redirect("/gracias-compra-pendiente");
    }

    public function error($idVenta){
        $venta = new Venta();
        $venta->obtenerPorId($idVenta);
        $venta->fk_idestado_pago = 3;
        $venta->guardar();
        return redirect("/gracias-compra-error");
    }

}
