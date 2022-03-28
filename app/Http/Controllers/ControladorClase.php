<?php

namespace App\Http\Controllers;

use App\Entidades\Clase;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Disciplina;
use App\Entidades\Profesor;
use App\Entidades\Modalidad;
use Illuminate\Http\Request;


require app_path() . '/start/constants.php';

class ControladorClase extends Controller
{

    public function index()
    {
        $titulo = "Listado de clases";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CLASESCONSULTA")) {
                $codigo = "CLASESCONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('clase.clase-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function nuevo()
    {

        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CLASESALTA")) {
                $codigo = "CLASESALTA";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $titulo = "Nueva clase";
                $clase = new Clase();
                $disciplina = new Disciplina();
                $array_disciplina = $disciplina->obtenerTodos();
                $profesor = new Profesor();
                $array_profesor = $profesor->obtenerTodos();
                $modalidad = new Modalidad();
                $array_modalidad = $modalidad->obtenerTodos();


                return view("clase.clase-nuevo", compact('titulo', 'clase', 'array_disciplina', 'array_profesor', 'array_modalidad'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function guardar(Request $request)
    {
        try {
            //Define la entidad servicio
            $titulo = "Modificar Clase";
            $entidad = new Clase();
            $entidad->cargarDesdeRequest($request);

            //validaciones
            if ($entidad->fk_iddisciplina == "" || $entidad->fk_idprofesor == "" || $entidad->fk_idmodalidad == "") {
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
                $_POST["id"] = $entidad->idclase;
                return view('clase.clase-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idclase;
        $clase = new Clase();
        $clase->obtenerPorId($id);

        $disciplina = new Disciplina();
        $array_disciplina = $disciplina->obtenerTodos();
        $profesor = new Profesor();
        $array_profesor = $profesor->obtenerTodos();
        $modalidad = new Modalidad();
        $array_modalidad = $modalidad->obtenerTodos();

        return view('clase.clase-nuevo', compact('msg', 'clase', 'titulo', 'array_disciplina', 'array_profesor', 'array_modalidad')) . '?id=' . $clase->idclase;
    }


    public function cargarGrilla()
    {
        $request = $_REQUEST;

        $entidad = new Clase();
        $aClases = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aClases) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = '<a class="btn btn-secondary" href="/admin/clase/' . $aClases[$i]->idclase . '"><i class="fa-solid fa-pencil"></i></a>';
            $row[] = $aClases[$i]->profesor;
            $row[] = $aClases[$i]->disciplina;
            $row[] = $aClases[$i]->modalidad;
            $row[] = date_format(date_create($aClases[$i]->fecha_desde), "d/m/Y h:i");
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aClases), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aClases), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function editar($id)
    {
        $titulo = "Modificar clase";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("CLASESEDITAR")) {
                $codigo = "CLASESEDITAR";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $clase = new Clase();
                $clase->obtenerPorId($id);

                $disciplina = new Disciplina();
                $array_disciplina = $disciplina->obtenerTodos();
                $profesor = new Profesor();
                $array_profesor = $profesor->obtenerTodos();
                $modalidad = new Modalidad();
                $array_modalidad = $modalidad->obtenerTodos();

                return view('clase.clase-nuevo', compact('clase', 'titulo', 'array_disciplina', 'array_profesor', 'array_modalidad'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("CLASESBAJA")) {


                $entidad = new Clase();
                $entidad->cargarDesdeRequest($request);
                $entidad->eliminar();

                $aResultado["err"] = EXIT_SUCCESS; //eliminado correctamente
            } else {
                $codigo = "ELIMINARPROFESIONAL";
                $aResultado["err"] = "No tiene pemisos para la operaci&oacute;n.";
            }
            echo json_encode($aResultado);
        } else {
            return redirect('admin/login');
        }
    }
}
