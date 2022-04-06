<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model{
      protected $table = 'estados';
      public $timestamps = false;
  
      protected $fillable = [
        'idestado',
        'descripcion'
      ];
  
      protected $hidden = [
  
      ];

      public function obtenerTodos(){
            $sql = "SELECT 
                  A.idestado,
                  A.descripcion
                FROM estados A
                ORDER BY A.descripcion";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
      }
}