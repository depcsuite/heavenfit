<?php

namespace App\Http\Controllers;

use App\Entidades\Disciplina;
use App\Entidades\Reserva;
use Illuminate\Http\Request;
use Session;

class ControladorWebContratarDisciplina extends Controller
{

    public function index()
    {
        if (Session::get("usuario_id")) {
            return view("web.reserva-individual");
        } else {
            $mensaje = "Tiene que estar logueado para acceder";
            return redirect("/login");
        }
        
    }

    /*
    public function index()
    {
        if (Session::get("usuario_id")) {
            $disciplina = new Disciplina();
            $array_disciplinas = $disciplina->obtenerTodos();
            return view("web.contratar-disciplinas", compact('array_disciplinas'));
        } else {
            $mensaje = "Tiene que estar logueado para acceder";
            return view("web.login", compact('mensaje'));
        }
        
    }
    public function siguiente($idPlan, Request $request)
    {
        $idDisciplina = $request->input("lstDisciplina");
        return redirect("/contratar-invididual-profesores/$idPlan/$idDisciplina");
    }
    */
}
