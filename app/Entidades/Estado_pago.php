<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Estado_pago extends Model{
      protected $table = 'estados_pagos';
      public $timestamps = false;
  
      protected $fillable = [
        'idestado',
        'nombre'
      ];
  
      protected $hidden = [
  
      ];

      public function obtenerTodos(){
            $sql = "SELECT 
                  A.idestado,
                  A.nombre
                FROM estados_pagos A
                ORDER BY A.nombre";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
      }

      
}