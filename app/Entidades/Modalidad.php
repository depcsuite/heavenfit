<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model{
      protected $table = 'modalidades';
      public $timestamps = false;
  
      protected $fillable = [
        'idmodalidad',
        'nombre'
      ];
  
      protected $hidden = [
  
      ];

      public function obtenerTodos(){
            $sql = "SELECT 
                  A.idpais,
                  A.nombre,
                FROM modalidades A
                ORDER BY A.nombre";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
      }
}