<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use Illuminate\Http\Request;
use Session;
use MercadoPago\Item;
use MercadoPago\MerchantOrder;
use MercadoPago\Payer;
use MercadoPago\Payment;
use MercadoPago\Preference;
use MercadoPago\SDK;


class ControladorWebContratarGrupal extends Controller
{
      public function index($idPlan){
        if (Session::get("usuario_id")) {
          return view("web.opciones-pago", compact('idPlan'));
        }else{
          $mensaje = "Tiene que estar logueado para acceder";
          return view("web.login", compact('mensaje'));
        }
      }

    public function comprar(Request $request)
    {
      $access_token = "";
      SDK::setClientId(config("payment-methods.mercadopago.client"));
      SDK::setClientSecret(config("payment-methods.mercadopago.secret"));
      SDK::setAccessToken($access_token); //Es el token de la cuenta de MP donde se deposita el dinero

    }

}
