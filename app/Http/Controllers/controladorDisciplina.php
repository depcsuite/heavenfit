<?php

namespace App\Http\Controllers;


use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;


require app_path() . '/start/constants.php';

class ControladorDisciplina extends Controller
{
      public function nuevo(){
            $titulo = "Nueva disciplina";
            
            return view("disciplina.disciplina-nuevo", compact('titulo'));
      }

}