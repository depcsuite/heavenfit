<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
      protected $table = 'nutricionistas';
      public $timestamps = false;

      protected $fillable = [
            'idnutricionista',
            'nombre',
            'dni',
            'edad',
            'nacionalidad',
            'telefono',
            'idioma',
            'foto'
      ];

      protected $hidden = [];

      public function cargarDesdeRequest($request)
      {
            $this->idnutricionista = $request->input('id') != "0" ? $request->input('id') : $this->idnutricionista;
            $this->nombre = $request->input('txtNombre');
            $this->dni = $request->input('txtDni');
            $this->edad = $request->input('txtEdad');
            $this->nacionalidad = $request->input('txtNacionalidad');
            $this->telefono = $request->input('txtTelefono');
            $this->idioma = $request->input('txtIdioma');
            $this->foto = $request->input('txtDescpricion');
      }

      public function obtenerTodos()
      {
            $sql = "SELECT
                  idnutricionista,
                  nombre,
                  dni,
                  edad,
                  nacionalidad,
                  telefono,
                  idioma,
                  foto                
                FROM nutricionistas  ORDER BY nombre";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($idnutricionista)
      {
            $sql = "SELECT
                  idnutricionista,
                  nombre,
                  dni,
                  edad,
                  nacionalidad,
                  telefono,
                  idioma,
                  foto
                FROM nutricionistas WHERE idnutricionista = $idnutricionista";
            $lstRetorno = DB::select($sql);

            if (count($lstRetorno) > 0) {
                  $this->idnutricionista = $lstRetorno[0]->idnutricionista;
                  $this->nombre = $lstRetorno[0]->nombre;
                  $this->dni = $lstRetorno[0]->dni;
                  $this->edad = $lstRetorno[0]->edad;
                  $this->nacionalidad = $lstRetorno[0]->nacionalidad;
                  $this->telefono = $lstRetorno[0]->telefono;
                  $this->idioma = $lstRetorno[0]->idioma;
                  $this->foto = $lstRetorno[0]->foto;
                  return $this;
            }
            return null;
      }

      public function guardar()
      {
            $sql = "UPDATE nutricionistas SET
            nombre=?,
            dni=?,
            edad=?,
            nacionalidad=?,
            telefono=?,
            idioma=?,
            foto=?
            WHERE idnutricionista=?";
            $affected = DB::update($sql, [
                  $this->nombre,
                  $this->dni,
                  $this->edad,
                  $this->nacionalidad,
                  $this->telefono,
                  $this->idioma,
                  $this->foto,
                  $this->idnutricionista
            ]);
      }

      public function eliminar()
      {
            $sql = "DELETE FROM nutricionistas WHERE idnutricionista=?";
            $affected = DB::delete($sql, [$this->idnutricionista]);
      }

      public function insertar()
      {
            $sql = "INSERT INTO nutricionistas (
                  nombre,
                  dni,
                  edad,
                  nacionalidad,
                  telefono,
                  idioma,
                  foto
              ) VALUES (?, ?, ?, ?, ?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->nombre,
                  $this->dni,
                  $this->edad,
                  $this->nacionalidad,
                  $this->telefono,
                  $this->idioma,
                  $this->foto
            ]);
            return $this->idnutricionista = DB::getPdo()->lastInsertId();
      }
}
