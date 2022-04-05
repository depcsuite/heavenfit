<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Entidades\Cliente;
use Illuminate\Auth\Events\Login;

class ControladorWebRegistrarse extends Controller
{
    public function index()
    {
        return view("web.registrarse");
    }

    public function guardar(Request $request){
        $cliente = new Cliente();
        $cliente->nombre = $request->input("txtNombre");
        $cliente->correo = $request->input("txtCorreo");
        $cliente->telefono = $request->input("txtTelefono");        
        $cliente->clave = $request->input("txtClave");
        $cliente->insertar();
        $mensaje = "Registro completado";
        return view("web.login", compact('mensaje'));
    }
}