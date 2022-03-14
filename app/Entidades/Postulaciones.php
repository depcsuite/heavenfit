<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
      protected $table = 'postulaciones';
      public $timestamps = false;

      protected $fillable = [
            'idpostulacion',
            'nombre',
            'edad',
            'sexo',
            'disponibilidad',
            'cv'
      ];

      protected $hidden = [];

      public function cargarDesdeRequest($request)
      {
            $this->idpostulacion = $request->input('id') != "0" ? $request->input('id') : $this->idpostulacion;
            $this->nombre = $request->input('txtnombre');
            $this->edad = $request->input('txtEdad');
            $this->sexo = $request->input('txtSexo');
            $this->disponibilidad = $request->input('txtdisponibilidad');
            $this->cv = $request->input('txtCv');
      }

      public function obtenerTodos()
      {
            $sql = "SELECT
                  idpostulacion,
                  nombre,
                  edad,
                  sexo,
                  disponibilidad,
                  cv                                
                FROM postulaciones  ORDER BY nombre";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($idpostulacion)
      {
            $sql = "SELECT
                  idpostulacion,
                  nombre,
                  edad,
                  sexo,
                  disponibilidad,
                  cv
                  
                FROM postulaciones WHERE idpostulacion = $idpostulacion";
            $lstRetorno = DB::select($sql);

            if (count($lstRetorno) > 0) {
                  $this->idpostulacion = $lstRetorno[0]->idpostulacion;
                  $this->nombre = $lstRetorno[0]->nombre;
                  $this->edad = $lstRetorno[0]->edad;
                  $this->sexo = $lstRetorno[0]->sexo;
                  $this->disponibilidad = $lstRetorno[0]->disponibilidad;
                  $this->cv = $lstRetorno[0]->cv;                  
                  return $this;
            }
            return null;
      }

      public function guardar()
      {
            $sql = "UPDATE postulaciones SET
            nombre=?,
            edad=?,
            sexo=?,
            disponibilidad=?,
            cv=?            
            WHERE idpostulacion=?";
            $affected = DB::update($sql, [
                  $this->nombre,
                  $this->edad,
                  $this->sexo,
                  $this->disponibilidad,
                  $this->cv,
                  $this->fk_idestado_pago,
                  $this->idpostulacion
            ]);
      }

      public function eliminar()
      {
            $sql = "DELETE FROM postulaciones WHERE idpostulacion=?";
            $affected = DB::delete($sql, [$this->idpostulacion]);
      }

      public function insertar()
      {
            $sql = "INSERT INTO venta (
                  nombre,
                  edad,
                  sexo,
                  disponibilidad,
                  cv
              ) VALUES (?, ?, ?, ?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->nombre,
                  $this->edad,
                  $this->sexo,
                  $this->disponibilidad,
                  $this->cv                  
            ]);
            return $this->idpostulacion = DB::getPdo()->lastInsertId();
      }
}