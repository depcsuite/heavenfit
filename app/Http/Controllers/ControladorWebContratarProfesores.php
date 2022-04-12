<?php

namespace App\Http\Controllers;

use App\Entidades\Profesor;
use App\Entidades\Reserva;
use App\Entidades\Horario;

class ControladorWebContratarProfesores extends Controller
{

    public function index($idPlan, $idDisciplina)
    {
        $profesor = new Profesor();
        $array_profesores = $profesor->obtenerTodosPorDisciplina($idDisciplina);

        $array_horarios = array();
        foreach($array_profesores as $profe){
            $horario = new Horario();
            $array_horarios[$profe->idprofesor] = $horario->obtenerPorProfesor($profe->idprofesor);
        }

        return view("web.contratar-profesores", compact('array_profesores', 'array_horarios'));
    }

    public function reservar($idPlan,$idDisciplina, Request $request){
        $reserva = new Reserva();
        $reserva->fk_idcliente = Session::get("usuario_id");
        $reserva->fk_idhorario = $request->input("lstHorario");
        $reserva->fk_idplan=$idPlan;
        $reserva->fk_iddisciplina=$idDisciplina;
        $reserva->insertar();
        return redirect("web.gracias-reserva");
    }

 
}
