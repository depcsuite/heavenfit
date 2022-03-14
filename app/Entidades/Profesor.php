<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model{
      protected $table = 'profesores';
      public $timestamps = false;
  
      protected $fillable = [
            'idprofesor',
            'nombre',
            'nacionalidad',
            'idioma',
            'telefono',
            'dni',
            'fk_idmodalidad',
            'edad',
            'descripcion',
            
      ];
  
      protected $hidden = [
  
      ];
}

?>