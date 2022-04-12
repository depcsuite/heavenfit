<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model{
      protected $table = 'paises';
      public $timestamps = false;
  
      protected $fillable = [
        'idhorario',
        'fecha_desde',
        'fecha_hasta',
        'fk_idprofesor'
      ];
  
      protected $hidden = [
  
      ];

      public function obtenerPorProfesor($idProfesor){
        $sql = "SELECT 
                    A.idhorario,
                    A.fecha_desde,
                    A.fecha_hasta,
                    A.fk_idprofesor
                FROM horarios A WHERE fk_idprofesor = $idProfesor";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
      }
}