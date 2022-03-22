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
            'fk_idpais',
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
            $this->fk_idpais = $request->input('txtfk_idpais');
            $this->idioma = $request->input('txtIdioma');
            $this->telefono = $request->input('txtTelefono');
            $this->dni = $request->input('txtDni');
            $this->fk_idmodalidad = $request->input('lstModalidad');
            $this->edad = $request->input('txtEdad');
            $this->descripcion = $request->input('txtDescripcion');
            $this->foto = $request->input('txtFoto');
          }

      public function obtenerTodos() {
            $sql = "SELECT 
                  A.idprofesor,
                  A.nombre,
                  A.fk_idpais,
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

      public function obtenerPorId($idprofesor) {
            $sql = "SELECT 
                        idprofesor,
                        nombre,
                        fk_idpais,
                        idioma,
                        telefono,
                        dni,
                        fk_idmodalidad,
                        edad,
                        descripcion,
                        foto
                        FROM profesores 
                        WHERE idprofesor=$idprofesor";
            $lstRetorno = DB::select($sql);

            if (count($lstRetorno) > 0) {
                  $this->idprofesor = $lstRetorno[0]->idprofesor;
                  $this->nombre = $lstRetorno[0]->nombre;
                  $this->fk_idpais = $lstRetorno[0]->fk_idpais;
                  $this->idioma = $lstRetorno[0]->idioma;
                  $this->telefono = $lstRetorno[0]->telefono;
                  $this->dni = $lstRetorno[0]->dni;
                  $this->fk_idmodalidad = $lstRetorno[0]->fk_modalidad;
                  $this->edad = $lstRetorno[0]->edad;
                  $this->descripcion = $lstRetorno[0]->descripcion;
                  $this->foto = $lstRetorno[0]->foto;
                  return $this;
            }
            return null;
      }

      public function guardar() {
            $sql = "UPDATE profesores SET
                        nombre=?,
                        fk_idpais=?,
                        idioma=?,
                        telefono=?,
                        dni=?,
                        fk_idmodalidad=?,
                        edad=?,
                        descripcion=?,
                        foto=?
                  WHERE idprofesor=?";
              $affected = DB::update($sql, [
                $this->nombre,
                $this->fk_idpais,
                $this->idioma,
                $this->telefono,
                $this->dni,
                $this->fk_idmodalidad,
                $this->edad,
                $this->descripcion,
                $this->foto,
                $this->idprofesor
              ]);
      }
      
      public function eliminar() {
            $sql = "DELETE FROM profesores WHERE idprofesor=?";
            $affected = DB::delete($sql, [$this->idprofesor]);
      }
      
      public function insertar() {
            $sql = "INSERT INTO profesores (
                        nombre,
                        fk_idpais,
                        idioma,
                        telefono,
                        dni,
                        fk_idmodalidad,
                        edad,
                        descripcion,
                        foto
                        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->nombre,
                  $this->fk_idpais,
                  $this->idioma,
                  $this->telefono,
                  $this->dni,
                  $this->fk_idmodalidad,
                  $this->edad,
                  $this->descripcion,
                  $this->foto
            ]);
            return $this->idprofesor = DB::getPdo()->lastInsertId();
      }
}

?>