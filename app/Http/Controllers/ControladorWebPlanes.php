<?php

namespace App\Http\Controllers;
use App\Entidades\Plan;

class ControladorWebPlanes extends Controller
{
    public function index()
    {
        $plan = new Plan();
        $array_planes = $plan->obtenerTodos();

        return view("web.planes", compact('array_planes'));
    }
}
