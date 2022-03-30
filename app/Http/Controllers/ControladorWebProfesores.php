<?php

namespace App\Http\Controllers;

class ControladorWebProfesores extends Controller
{
    public function index()
    {
        return view("web.profesores");
    }
}
