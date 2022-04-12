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
        $disciplina = new Disciplina();
        $array_disciplinas = $disciplina->obtenerTodos();
        return view("web.contratar-disciplinas", compact('array_disciplinas'));
    }

    public function siguiente($idPlan, Request $request){
          $idDisciplina = $request->input("lstDisciplina");
          return redirect("/contratar-invididual-profesores/$idPlan/$idDisciplina");

    }

}
