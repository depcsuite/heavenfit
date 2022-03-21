<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model{
      protected $table = 'paises';
      public $timestamps = false;
  
      protected $fillable = [
        'idpais',
        'nombre',
        'ncpais',
        'nacionalidad'
      ];
  
      protected $hidden = [
  
      ];

      public function obtenerTodos(){
            $sql = "SELECT 
                  A.idpais,
                  A.nombre,
                  A.ncpais,
                  A.nacionalidad
                FROM paises A
                ORDER BY A.nombre";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
      }
}