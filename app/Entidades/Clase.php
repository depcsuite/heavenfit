<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
      protected $table = 'clases';
      public $timestamps = false;

      protected $fillable = [
            'idclase',
            'fk_iddisciplina',
            'fk_idprofesor',
            'fecha_desde',
            'fecha_hasta',
            'fk_idmodalidad',
            'duracion',
            'descripcion'
      ];

      protected $hidden = [];

      public function cargarDesdeRequest($request)
      {
            $this->idclase = $request->input('id') != "0" ? $request->input('id') : $this->idclase;
            $this->fk_iddisciplina = $request->input('lstDisciplina');
            $this->fk_idprofesor = $request->input('lstProfesor');
            $this->fecha_desde = $request->input('txtFecha_desde');
            $this->fecha_hasta = $request->input('txtFecha_hasta');
            $this->fk_idmodalidad = $request->input('lstModalidad');
            $this->duracion = $request->input('txtDuracion');
            $this->descripcion = $request->input('txtDescpricion');
      }

      public function obtenerTodos()
      {
            $sql = "SELECT
                  idclase,
                  fk_iddisciplina,
                  fk_idprofesor,
                  fecha_desde,
                  fecha_hasta,
                  fk_idmodalidad,
                  duracion,
                  descripcion                
                FROM clases  ORDER BY fk_idprofesor";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($idclase)
      {
            $sql = "SELECT
                  idclase,
                  fk_iddisciplina,
                  fk_idprofesor,
                  fecha_desde,
                  fecha_hasta,
                  fk_idmodalidad,
                  duracion,
                  descripcion
                FROM clases WHERE idclase = $idclase";
            $lstRetorno = DB::select($sql);

            if (count($lstRetorno) > 0) {
                  $this->idclase = $lstRetorno[0]->idclase;
                  $this->fk_iddisciplina = $lstRetorno[0]->fk_iddisciplina;
                  $this->fk_idprofesor = $lstRetorno[0]->fk_idprofesor;
                  $this->fecha_desde = $lstRetorno[0]->fecha_desde;
                  $this->fecha_hasta = $lstRetorno[0]->fecha_hasta;
                  $this->fk_idmodalidad = $lstRetorno[0]->fk_idmodalidad;
                  $this->duracion = $lstRetorno[0]->duracion;
                  $this->descripcion = $lstRetorno[0]->descripcion;
                  return $this;
            }
            return null;
      }

      public function guardar()
      {
            $sql = "UPDATE clases SET
            fk_iddisciplina=?,
            fk_idprofesor=?,
            fecha_desde=?,
            fecha_hasta=?,
            fk_idmodalidad=?,
            duracion=?,
            descripcion=?
            WHERE idclase=?";
            $affected = DB::update($sql, [
                  $this->fk_iddisciplina,
                  $this->fk_idprofesor,
                  $this->fecha_desde,
                  $this->fecha_hasta,
                  $this->fk_idmodalidad,
                  $this->duracion,
                  $this->descripcion,
                  $this->idclase
            ]);
      }

      public function eliminar()
      {
            $sql = "DELETE FROM clases WHERE idclase=?";
            $affected = DB::delete($sql, [$this->idclase]);
      }

      public function insertar()
      {
            $sql = "INSERT INTO clases (
                  fk_iddisciplina,
                  fk_idprofesor,
                  fecha_desde,
                  fecha_hasta,
                  fk_idmodalidad,
                  duracion,
                  descripcion
              ) VALUES (?, ?, ?, ?, ?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->fk_iddisciplina,
                  $this->fk_idprofesor,
                  $this->fecha_desde,
                  $this->fecha_hasta,
                  $this->fk_idmodalidad,
                  $this->duracion,
                  $this->descripcion
            ]);
            return $this->idclase = DB::getPdo()->lastInsertId();
      }
}
