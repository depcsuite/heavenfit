<?php

namespace App\Http\Controllers;

use App\Entidades\Sistema\Profesor; //include_once "app/Entidades/Sistema/Menu.php";
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorProfesor extends Controller
{
      public function nuevo(){
            $titulo = "Nuevo profesor";
            return view("profesor.profesor-nuevo", compact('titulo'));
      }

}