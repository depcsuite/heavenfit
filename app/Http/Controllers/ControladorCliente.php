<?php

namespace App\Http\Controllers;

use App\Entidades\Sistema\Cliente; //include_once "app/Entidades/Sistema/Menu.php";
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Pais;
use Illuminate\Http\Request;


require app_path() . '/start/constants.php';

class ControladorCliente extends Controller
{
      public function nuevo(){
            $titulo = "Nuevo cliente";
            $pais = new Pais();
            $array_nacionalidad = $pais->obtenerTodos();
            return view("cliente.cliente-nuevo", compact('titulo', 'array_nacionalidad'));
      }

}