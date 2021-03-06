<?php

namespace App\Http\Controllers;

use App\Entidades\Disciplina;
use App\Entidades\Sistema\Patente;
use App\Entidades\Sistema\Usuario;
use App\Entidades\Clase;
use Illuminate\Http\Request;


require app_path() . '/start/constants.php';

class ControladorDisciplina extends Controller
{

    public function index()
    {
        $titulo = "Listado de Disicplinas";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("DISCIPLINASCONSULTA")) {
                $codigo = "DISCIPLINASCONSULTA";
                $mensaje = "No tiene permisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                return view('disciplina.disciplina-listar', compact('titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function nuevo()
    {
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("DISCIPLINASALTA")) {
                $codigo = "DISCIPLINASALTA";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $titulo = "Nueva disciplina";
                $disciplina = new Disciplina(); 
        
                return view("disciplina.disciplina-nuevo", compact('titulo' , 'disciplina'));
        
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function guardar(Request $request)
    {
        try {
            //Define la entidad servicio
            $titulo = "Modificar Disciplina";
            $entidad = new Disciplina();
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
                $_POST["id"] = $entidad->idDisciplina;
                return view('Disciplina.Disciplina-listar', compact('titulo', 'msg'));
            }
        } catch (Exception $e) {
            $msg["ESTADO"] = MSG_ERROR;
            $msg["MSG"] = ERRORINSERT;
        }

        $id = $entidad->idDisciplina;
        $Disciplina = new Disciplina();
        $Disciplina->obtenerPorId($id);

        return view('Disciplina.Disciplina-nuevo', compact('msg', 'Disciplina', 'titulo',)) . '?id=' . $Disciplina->idDisciplina;
    }

    public function cargarGrilla()
    {
        $request = $_REQUEST;

        $entidad = new Disciplina();
        $aDisciplinas = $entidad->obtenerFiltrado();

        $data = array();
        $cont = 0;

        $inicio = $request['start'];
        $registros_por_pagina = $request['length'];


        for ($i = $inicio; $i < count($aDisciplinas) && $cont < $registros_por_pagina; $i++) {
            $row = array();
            $row[] = '<a class="btn btn-secondary" href="/admin/disciplina/' . $aDisciplinas[$i]->iddisciplina . '"><i class="fa-solid fa-pencil"></i></a>';
            $row[] = $aDisciplinas[$i]->nombre;
            $row[] = $aDisciplinas[$i]->descripcion;
            $cont++;
            $data[] = $row;
        }

        $json_data = array(
            "draw" => intval($request['draw']),
            "recordsTotal" => count($aDisciplinas), //cantidad total de registros sin paginar
            "recordsFiltered" => count($aDisciplinas), //cantidad total de registros en la paginacion
            "data" => $data,
        );
        return json_encode($json_data);
    }

    public function editar($id)
    {
        $titulo = "Modificar disciplina";
        if (Usuario::autenticado() == true) {
            if (!Patente::autorizarOperacion("DISCIPLINASEDITAR")) {
                $codigo = "DISCIPLINASEDITAR";
                $mensaje = "No tiene pemisos para la operaci&oacute;n.";
                return view('sistema.pagina-error', compact('titulo', 'codigo', 'mensaje'));
            } else {
                $disciplina = new Disciplina();
                $disciplina->obtenerPorId($id);


                return view('disciplina.disciplina-nuevo', compact('disciplina', 'titulo'));
            }
        } else {
            return redirect('admin/login');
        }
    }

    public function eliminar(Request $request)
    {
        $id = $request->input('id');

        if (Usuario::autenticado() == true) {
            if (Patente::autorizarOperacion("DISCIPLINASBAJA")) {

    
                $entidad = new Disciplina();
                $entidad->cargarDesdeRequest($request);
                
                $clase = new Clase();
                $array_clases = $clase->obtenerPorIdDisciplina($entidad->iddisciplina);

                if(count($array_clases) == 0 ){
                $entidad->eliminar();
                $aResultado["codigo"] = EXIT_SUCCESS;
                $aResultado["texto"] = "Eliminado correctamente"; //eliminado correctamente
                }
                else {
                    $aResultado["codigo"] = MSG_ERROR;
                    $aResultado["texto"] = "No se puede eliminar una disciplina asociada a clase previas";
                }

                
            } else {
                $aResultado["codigo"] = MSG_ERROR;
                $aResultado["texto"] = "No tiene pemisos para la operaci&oacute;n.";
            }
            echo json_encode($aResultado);
        } else {
            return redirect('admin/login');
        }
    }
}
