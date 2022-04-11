<?php

namespace App\Http\Controllers;

use App\Entidades\Profesor;
use App\Entidades\Horario;

class ControladorWebContratarProfesores extends Controller
{

    public function index()
    {
        $profesor = new Profesor();
        $array_profesores = $profesor->obtenerTodos();

        $array_horarios = array();
        foreach($array_profesores as $profe){
            $horario = new Horario();
            $array_horarios[$profe->idprofesor] = $horario->obtenerPorProfesor($profe->idprofesor);
        }

        return view("web.contratar-profesores", compact('array_profesores', 'array_horarios'));
    }

 
}
