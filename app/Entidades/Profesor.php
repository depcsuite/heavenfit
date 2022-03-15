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
            'foto'
      ];
  
      protected $hidden = [
  
      ];

      public function cargarDesdeRequest($request) {
            $this->idprofesor = $request->input('id') != "0" ? $request->input('id') : $this->idprofesor;
            $this->nombre = $request->input('txtNombre');
            $this->nacionalidad = $request->input('txtNacionalidad');
            $this->idioma = $request->input('txtIdioma');
            $this->telefono = $request->input('txtTelefono');
            $this->dni = $request->input('txtDni');
            $this->fk_idmodalidad = $request->input('lstModalidad');
            $this->edad = $request->input('txtEdad');
            $this->descripcion = $request->input('txtDescripcion');
            $this->foto = $request->input('txtFoto');
          }

      public function obtenerTodos()
      {
            $sql = "SELECT 
                  A.idprofesor,
                  A.nombre,
                  A.nacionalidad,
                  A.idioma,
                  A.telefono,
                  A.dni,
                  A.fk_idmodalidad,
                  A.edad,
                  A.descripcion,
                  A.foto
                  FROM profesores A
                  ORDER BY A.nombre";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }
      public function obtenerPorId($idprofesor)
      {
      $sql = "SELECT 
                  
                  FROM profesores 
                  WHERE idcliente=$idprofesor";
      $lstRetorno = DB::select($sql);

      if (count($lstRetorno) > 0) {
            $this->idprofesor = $lstRetorno[0]->idprofesor;
            
            return $this;
      }
      return null;
      }
}

?>