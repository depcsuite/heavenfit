<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Tipo_plan extends Model
{
      protected $table = 'Tipo_plan';
      public $timestamps = false;

      protected $fillable = [
            'idtipo_plan',
            'nombre'
      ];

      protected $hidden = [];

      public function obtenerTodos()
      {
            $sql = "SELECT 
                  A.idtipo_plan,
                  A.nombre
                  FROM tipo_plan A
                  ORDER BY A.nombre";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }
}
