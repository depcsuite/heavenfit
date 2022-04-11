<?php

namespace App\Http\Controllers;

use App\Entidades\Profesores;

class ControladorWebContratarProfesores extends Controller
{

    public function index()
    {

        $profesor = new Profesores();
        $array_profesores = $profesor->obtenerTodos();

        return view("web.contratar-profesores", compact('array_profesores'));
    }
}
