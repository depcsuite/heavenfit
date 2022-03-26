<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Medio_pago extends Model{
      protected $table = 'medios_de_pagos';
      public $timestamps = false;
  
      protected $fillable = [
        'idmedio',
        'nombre'
      ];
  
      protected $hidden = [
  
      ];

      public function obtenerTodos(){
            $sql = "SELECT 
                  A.idmedio,
                  A.nombre
                FROM medios_de_pagos A
                ORDER BY A.nombre";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
      }

      
}