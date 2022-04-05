<?php

namespace App\Http\Controllers;

use App\Entidades\Postulacion;
use Illuminate\Http\Request;


class ControladorWebNosotros extends Controller
{
    public function index()
    {
        return view("web.nosotros");
    }

    public function enviar(Request $request){
 
        $postulacion = new Postulacion();
        $postulacion->cargarDesdeRequest($request);
        $postulacion->insertar();

        return view("web.nosotros"); //Retorna vista para confirmar el envio
    }
}
