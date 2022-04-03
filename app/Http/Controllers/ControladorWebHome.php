<?php

namespace App\Http\Controllers;

use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Plan;
use Session;

class ControladorWebHome extends Controller
{
    public function index()
    {
        $plan = new Plan();
        $array_planes = $plan->obtenerSeleccionados();
        return view("web.index", compact('array_planes'));
    }
}
