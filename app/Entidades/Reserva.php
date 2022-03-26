<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

Class Reserva extends Model{
      protected $table = 'reservas';
      public $timestamps = false;

      protected $fillable = [
            'idreserva',
            'fk_idcliente',
            'fk_idprofesor',
            'fk_idmodalidad',
            'fk_iddisciplina',
            'fecha_desde',
            'fecha_hasta'
      ];
  
      protected $hidden = [
  
      ];

      public function cargarDesdeRequest($request) {
            $this->idreserva = $request->input('id') != "0" ? $request->input('id') : $this->idreserva;
            $this->fk_idcliente = $request->input('lstCliente');
            $this->fk_idprofesor = $request->input('lstProfesor');
            $this->fk_idmodalidad = $request->input('lstModalidad');
            $this->fk_iddisciplina = $request->input('lstDisciplina');
            $this->fecha_desde = $request->input('txtFecha_desde');
            $this->fecha_hasta = $request->input('txtFecha_hasta');
          }

      public function obtenerTodos() {
            $sql = "SELECT 
                  A.idreserva,
                  A.fk_idcliente,
                  A.fk_idprofesor,
                  A.fk_idmodalidad,
                  A.fk_iddisciplina,
                  A.fecha_desde,
                  A.fecha_hasta
                  FROM reservas A
                  ORDER BY A.idreserva";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($idrserva) {
            $sql = "SELECT 
                        idreserva,
                        fk_idcliente,
                        fk_idprofesor,
                        fk_idmodalidad,
                        fk_iddisciplina,
                        fecha_desde,
                        fecha_hasta
                        FROM reservas
                        WHERE idreserva=$idrserva";
            $lstRetorno = DB::select($sql);
      
            if (count($lstRetorno) > 0) {
                  $this->idreserva = $lstRetorno[0]->idreserva;
                  $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
                  $this->fk_idprofesor = $lstRetorno[0]->fk_idprofesor;
                  $this->fk_idmodalidad = $lstRetorno[0]->fk_idmodalidad;
                  $this->fk_iddisciplina = $lstRetorno[0]->fk_iddisciplina;
                  $this->fecha_desde = $lstRetorno[0]->fecha_desde;
                  $this->fecha_hasta = $lstRetorno[0]->fecha_hasta;
                  return $this;
            }
            return null;
      }

      public function obtenerPorIdCliente($idcliente) {
            $sql = "SELECT 
                        idreserva,
                        fk_idcliente,
                        fk_idprofesor,
                        fk_idmodalidad,
                        fk_iddisciplina,
                        fecha_desde,
                        fecha_hasta
                        FROM reservas
                        WHERE fk_idcliente = $idcliente";
            $lstRetorno = DB::select($sql);     
          
            return $lstRetorno;
      }

      public function guardar() {
            $sql = "UPDATE reservas SET
                        fk_idcliente=?,
                        fk_idprofesor=?,
                        fk_idmodalidad=?,
                        fk_iddisciplina=?,
                        fecha_desde,
                        fecha_hsata
                  WHERE idreserva=?";
              $affected = DB::update($sql, [
                $this->fk_idcliente,
                $this->fk_idprofesor,
                $this->fk_idmodalidad,
                $this->fk_iddisciplina,
                $this->fecha_desde,
                $this->fecha_hasta,
                $this->idreserva
              ]);
      }

      public function eliminar() {
            $sql = "DELETE FROM reservas WHERE idplan=?";
            $affected = DB::delete($sql, [$this->idplan]);
      }

      public function insertar() {
            $sql = "INSERT INTO reservas (
                        fk_idcliente,
                        fk_idprofesor,
                        fk_idmodalidad,
                        fk_iddisciplina,
                        fecha_desde,
                        fecha_hasta
                        ) VALUES (?, ?, ?, ?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->fk_idcliente,
                  $this->fk_idprofesor,
                  $this->fk_idmodalidad,
                  $this->fk_iddisciplina,
                  $this->fecha_desde,
                  $this->fecha_hasta

            ]);
            return $this->idreserva = DB::getPdo()->lastInsertId();
      }

      

      public function obtenerFiltrado()
      {
            $request = $_REQUEST;
            $columns = array(
                  0 => 'A.idreserva',
                  1 => 'C.nombre',
                  2 => 'B.nombre',
                  3 => 'A.fecha_desde',
            );
            $sql = "SELECT DISTINCT
                  
                  A.idreserva,
                  A.fk_idcliente,
                  C.nombre AS cliente,
                  A.fk_idprofesor,
                  B.nombre AS profesor,
                  A.fecha_desde
                  FROM reservas A 
                  INNER JOIN profesores B  ON A.fk_idprofesor = B.idprofesor
                  LEFT JOIN clientes C  ON A.fk_idcliente = C.idcliente
   
                WHERE 1=1
                ";

            //Realiza el filtrado
            if (!empty($request['search']['value'])) {
                  $sql .= " AND ( C.nombre LIKE '%" . $request['search']['value'] . "%' ";
                  $sql .= " OR B.nombre LIKE '%" . $request['search']['value'] . "%' ";
                  $sql .= " OR A.fecha_desde LIKE '%" . $request['search']['value'] . "%' )";
            }
            $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

            $lstRetorno = DB::select($sql);

            return $lstRetorno;
      }
}



?>