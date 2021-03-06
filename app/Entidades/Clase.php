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

      public function obtenerPorIdProfesor($idprofesor) {
            $sql = "SELECT 
                        idclase,
                        fk_iddisciplina,
                        fk_idprofesor,
                        fecha_desde,
                        fecha_hasta,
                        fk_idmodalidad,
                        duracion,
                        descripcion
                        FROM clases
                        WHERE fk_idprofesor = $idprofesor";
            $lstRetorno = DB::select($sql);     
          
            return $lstRetorno;
      }
      public function obtenerPorIdModalidad($idmodalidad) {
            $sql = "SELECT 
                        idclase,
                        fk_iddisciplina,
                        fk_idprofesor,
                        fecha_desde,
                        fecha_hasta,
                        fk_idmodalidad,
                        duracion,
                        descripcion
                        FROM clases
                        WHERE fk_idmodalidad = $idmodalidad";
            $lstRetorno = DB::select($sql);     
          
            return $lstRetorno;
      }
      public function obtenerPorIdDisciplina($iddisciplina) {
            $sql = "SELECT 
                        idclase,
                        fk_iddisciplina,
                        fk_idprofesor,
                        fecha_desde,
                        fecha_hasta,
                        fk_idmodalidad,
                        duracion,
                        descripcion
                        FROM clases
                        WHERE fk_iddisciplina = $iddisciplina";
            $lstRetorno = DB::select($sql);     
          
            return $lstRetorno;
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

      public function obtenerFiltrado()
      {
            $request = $_REQUEST;
            $columns = array(
                  0 => 'A.idclase',
                  1 => 'B.nombre',
                  2 => 'C.nombre',
                  3 => 'D.nombre',
                  4 => 'A.fecha_desde',
            );
            $sql = "SELECT DISTINCT
                  
                  A.idclase,
                  A.fk_idprofesor,
                  B.nombre AS profesor,
                  A.fk_iddisciplina,
                  C.nombre AS disciplina,
                  A.fk_idmodalidad,
                  D.nombre AS modalidad,
                  A.fecha_desde
                  FROM clases A 
                  INNER JOIN profesores B  ON A.fk_idprofesor = B.idprofesor
                  LEFT JOIN disciplinas C  ON A.fk_iddisciplina = C.iddisciplina
                  INNER JOIN modalidades D ON A.fk_idmodalidad = D.idmodalidad
   
                WHERE 1=1
                ";

            //Realiza el filtrado
            if (!empty($request['search']['value'])) {
                  $sql .= " AND ( B.nombre LIKE '%" . $request['search']['value'] . "%' ";
                  $sql .= " OR C.nombre LIKE '%" . $request['search']['value'] . "%' ";
                  $sql .= " OR D.nombre LIKE '%" . $request['search']['value'] . "%' ";
                  $sql .= " OR A.fecha_desde LIKE '%" . $request['search']['value'] . "%' )";
            }
            $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

            $lstRetorno = DB::select($sql);

            return $lstRetorno;
      }

      
}
