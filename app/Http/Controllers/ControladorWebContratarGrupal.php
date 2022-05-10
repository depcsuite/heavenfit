<?php

namespace App\Http\Controllers;

use App\Entidades\Cliente;
use Illuminate\Http\Request;
use Session;
class ControladorWebContratarGrupal extends Controller
{
      public function index($idPlan){
        if (Session::get("usuario_id")) {
          return view("web.reserva-grupal", compact('idPlan'));
        }else{
          $mensaje = "Tiene que estar logueado para acceder";
          return redirect("/login");
        }
      }

}
