<?php

namespace App\Http\Controllers;

use App\Entidades\Profesor; //include_once "app/Entidades/Sistema/Menu.php";
use App\Entidades\Pais;
use App\Entidades\Modalidad;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use Illuminate\Http\Request;

require app_path() . '/start/constants.php';

class ControladorProfesor extends Controller
{
      public function nuevo(){
            $pais = new Pais();
            $array_nacionalidad = $pais->obtenerTodos();
            $titulo = "Nuevo profesor";
            $modalidad = new Modalidad();
            $array_modalidad = $modalidad->obtenerTodos();
            return view("profesor.profesor-nuevo", compact('titulo', 'array_nacionalidad','array_modalidad'));
        }

      public function guardar(Request $request) {
            try {
                //Define la entidad servicio
                $titulo = "Modificar profesor";
                $entidad = new Profesor();
                $entidad->cargarDesdeRequest($request);
    
                //validaciones
                if ($entidad->nombre == "") {
                    $msg["ESTADO"] = MSG_ERROR;
                    $msg["MSG"] = "Complete todos los datos";
                } else {
                    if ($_POST["id"] > 0) {
                        //Es actualizacion
                        $entidad->guardar();
    
                        $msg["ESTADO"] = MSG_SUCCESS;
                        $msg["MSG"] = OKINSERT;
                    } else {
                        //Es nuevo
                        $entidad->insertar();
    
                        $msg["ESTADO"] = MSG_SUCCESS;
                        $msg["MSG"] = OKINSERT;
                    }
                    
                    $_POST["id"] = $entidad->idprofesor;
                    return view('profesor.profesor-listar', compact('titulo', 'msg'));
                }
            } catch (Exception $e) {
                $msg["ESTADO"] = MSG_ERROR;
                $msg["MSG"] = ERRORINSERT;
            }
    
            $id = $entidad->idprofesor;
            $profesor = new Profesor();
            $profesor->obtenerPorId($id);
            $pais = new Pais();
            $array_nacionalidad = $pais->obtenerTodos();
            return view('profesor.profesor-listar', compact('titulo', 'msg', 'profesor', 'array_nacionalidad','array_modalidad')). '?id=' . $profesor->idprofesor;
      }



      public function cargarGrilla()
    {
        $request = $_REQUEST;

        $entidad = new Profesor();
        $aProfesores = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aProfesores) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = '<a class="btn btn-secondary" href="/admin/profesor/'.$aProfesores[$i]->idProfesor .'"><i class="fa-solid fa-pencil"></i></a>';
            $row[] = $aProfesores[$i]->nombre;
            $row[] = $aProfesores[$i]->telefono;
            $row[] = $aProfesores[$i]->correo;
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aProfesores), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aProfesores), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }


}