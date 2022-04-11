<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Entidades\Cliente;
use App\Entidades\Pais;

class ControladorWebPerfilUsuario extends Controller
{
    public function index()
    {
        $pais = new Pais();
        $array_nacionalidad = $pais->obtenerTodos();
        return view("web.perfil-usuario", compact('array_nacionalidad'));
    }

    public function guardar(Request $request){
        $cliente = new Cliente();
        $pais = new Pais();
        $array_nacionalidad = $pais->obtenerTodos();

        $cliente->edad = $request->input("txtEdad");
        $cliente->peso = $request->input("txtPeso");
        $cliente->altura = $request->input("txtAltura");        
        $cliente->deportes = $request->input("txtDeportes");
        $cliente->lesiones = $request->input("txtLesiones");
        $cliente->enfermedades = $request->input("txtEnfermedades");
        $cliente->medicamento = $request->input("txtMedicamento");
        $cliente->materiales = $request->input("txtMateriales");
        $cliente->objetivo = $request->input("txtObjetivo");
        $cliente->fecha_nac = $request->input("txtFechaNac");
        $cliente->nutricion = $request->input("txtNutricion");
        $cliente->pais = $request->input("lstNacionalidad");
        $cliente->insertar();
        $mensaje = "Registro completado";
        return view("web.perfil-usuario", compact('mensaje','array_nacionalidad'));
    }
}
