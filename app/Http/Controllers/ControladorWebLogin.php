<?php

namespace App\Http\Controllers;
use App\Entidades\Cliente;
use Illuminate\Http\Request;
use Session;


class ControladorWebLogin extends Controller
{
    public function index()
    {
        return view("web.login");
    }

    public function ingresar(Request $request){
        $usuario = $request->input("txtCorreo");
        $clave = $request->input("txtClave");
        if($usuario != "" && $clave != ""){
            $cliente = new Cliente();
            if($cliente->login($usuario, $clave)){
                Session::put("usuario_id", $cliente->idcliente);
                Session::put("usuario_nombre", $cliente->nombre);
                return redirect("/planes");
            } else {
                $mensaje = "Usuario o clave incorrecto";
                return view("web.login", compact("mensaje"));
            }
        } else {
            $mensaje = "Ingrese un usuario y clave";
            return view("web.login", compact("mensaje"));

        }
       
    }

    public function logout(){
        Session::flush();
        return redirect("/");
    }
}