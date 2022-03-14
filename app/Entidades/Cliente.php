<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    public $timestamps = false;

    protected $fillable = [
      'idcliente',
      'nombre',
      'edad',
      'peso',
      'altura',
      'deportes',
      'lesiones',
      'enfermedades',
      'medicamento',
      'materiales',
      'objetivo',
      'fecha_nac',
      'nutricion',
      'foto',
      'clave'
    ];

    protected $hidden = [

    ];

    public function cargarDesdeRequest($request) {

    }

    public function obtenerTodos()
    {

    }

    public function obtenerPorId($idmenu)
    {

    }

    public function guardar() {
    }

    public function eliminar()
    {
    }

    public function insertar()
    {
    }

}
