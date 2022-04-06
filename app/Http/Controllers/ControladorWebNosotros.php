<?php

namespace App\Http\Controllers;

use App\Entidades\Postulacion;
use Illuminate\Http\Request;


class ControladorWebNosotros extends Controller
{
    public function index()
    {
        return view("web.nosotros");
    }

    public function enviar(Request $request){
 
        $postulacion = new Postulacion();
        $postulacion->cargarDesdeRequest($request);

        if ($_FILES["txtCv"]["error"] === UPLOAD_ERR_OK) {//Se adjunta imagen
            $nombreArchivo = $_FILES["txtCv"]["name"];
            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            if($extension == "docx" || $extension == "doc" || $extension == "pdf"){
                $nombre = date("Ymdhmsi") . ".$extension";
                $archivo = $_FILES["txtCv"]["tmp_name"];
                move_uploaded_file($archivo, env('APP_PATH') . "/public/files/$nombre"); //guardaelarchivo
                $postulacion->cv = $nombre;
                
            } else{
                exit;
            }
        }

        $postulacion->insertar();

        return view("web.postulacion"); //Retorna vista para confirmar el envio
    }
}
