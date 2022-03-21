<?php

namespace App\Http\Controllers;

use App\Entidades\Profesor; //include_once "app/Entidades/Sistema/Menu.php";
use App\Entidades\Pais;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorProfesor extends Controller
{
      public function nuevo(){
            $pais = new Pais();
            $array_nacionalidad = $pais->obtenerTodos();
            $titulo = "Nuevo profesor";
            return view("profesor.profesor-nuevo", compact('titulo', 'array_nacionalidad'));
      }

}