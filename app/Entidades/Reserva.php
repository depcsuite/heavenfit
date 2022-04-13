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
            'fk_idhorario',
            'fk_idplan',
            'fk_iddisciplina'
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
                  A.fk_idhorario,
                  A.fk_idplan,
                  A.fk_iddisciplina,

                  FROM reservas A
                  ORDER BY A.idreserva";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($idrserva) {
            $sql = "SELECT 
                        idreserva,
                        fk_idcliente,
                        fk_idhorario,
                        fk_idplan,
                        fk_iddisciplina

                        FROM reservas
                        WHERE idreserva=$idrserva";
            $lstRetorno = DB::select($sql);
      
            if (count($lstRetorno) > 0) {
                  $this->idreserva = $lstRetorno[0]->idreserva;
                  $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
                  $this->fk_idhorario = $lstRetorno[0]->fk_idhorario;
                  $this->fk_idplan = $lstRetorno[0]->fk_idplan;
                  $this->fk_iddisciplina = $lstRetorno[0]->fk_iddisciplina;
                  return $this;
            }
            return null;
      }

      public function obtenerPorIdCliente($idcliente) {
            $sql = "SELECT 
                         idreserva,
                        fk_idcliente,
                        fk_idhorario,
                        fk_idplan,
                        fk_iddisciplina
                        FROM reservas
                        WHERE fk_idcliente = $idcliente";
            $lstRetorno = DB::select($sql);     
          
            return $lstRetorno;
      }
      public function obtenerPorIdProfesor($idprofesor) {
            $sql = "SELECT 
                         idreserva,
                        fk_idcliente,
                        fk_idhorario,
                        fk_idplan,
                        fk_iddisciplina
                        FROM reservas
                        WHERE fk_idprofesor = $idprofesor";
            $lstRetorno = DB::select($sql);     
          
            return $lstRetorno;
      }
      public function obtenerPorIdModalidad($idmodalidad) {
          /*  $sql = "SELECT 
                         idreserva,
                        fk_idcliente,
                        fk_idhorario,
                        fk_idplan,
                        fk_iddisciplina
                        FROM reservas
                        WHERE fk_idmodalidad = $idmodalidad";
            $lstRetorno = DB::select($sql);     
          
            return $lstRetorno;*/
      }
      public function obtenerPorIdDisciplina($iddisciplina) {
            $sql = "SELECT 
                         idreserva,
                        fk_idcliente,
                        fk_idhorario,
                        fk_idplan,
                        fk_iddisciplina
                        FROM reservas
                        WHERE fk_iddisciplina = $iddisciplina";
            $lstRetorno = DB::select($sql);     
          
            return $lstRetorno;
      }

      public function guardar() {
            $sql = "UPDATE reservas SET
                        fk_idcliente=?,
                        fk_idhorario=?,
                        fk_idplan=?,
                        fk_iddisciplina=?
                  WHERE idreserva=?";
              $affected = DB::update($sql, [
                $this->fk_idcliente,
                $this->fk_idhorario,
                $this->fk_idplan,
                $this->fk_iddisciplina,
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
                        fk_idhorario,
                        fk_idplan,
                        fk_iddisciplina
                        ) VALUES (?, ?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->fk_idcliente,
                  $this->fk_idhorario,
                  $this->fk_idplan,
                  $this->fk_iddisciplina

            ]);
            return $this->idreserva = DB::getPdo()->lastInsertId();
      }

      

      public function obtenerFiltrado()
      {
            $request = $_REQUEST;
            $columns = array(
                  0 => 'A.idreserva',
                  1 => 'D.nombre',
                  2 => 'C.nombre',
                  3 => 'E.nombre',
                  4 => 'B.fecha_desde',
                  5 => 'B.fecha_hasta',
            );
            $sql = "SELECT DISTINCT
                  A.idreserva,
                  A.fk_idcliente,
                  A.fk_idhorario,
                  A.fk_idplan,
                  B.fecha_desde,
                  B.fecha_hasta,
                  C.nombre AS Nombre_Profesor,
                  D.nombre AS Nombre_Cliente,
                  E.nombre AS Nombre_Plan
                  FROM reservas A 
                  INNER JOIN horarios B ON B.idhorario = A.fk_idhorario
                  INNER JOIN profesores C ON C.idprofesor = B.fk_idprofesor
                  INNER JOIN clientes D ON D.idcliente = A.fk_idcliente
                  INNER JOIN planes E ON E.idplan = A.fk_idplan
                  WHERE 1=1
                ";

            //Realiza el filtrado
            if (!empty($request['search']['value'])) {
                  $sql .= " AND ( D.nombre LIKE '%" . $request['search']['value'] . "%' ";
                  $sql .= " OR B.fecha_desde LIKE '%" . $request['search']['value'] . "%' ";
                  $sql .= " OR B.fecha_hasta LIKE '%" . $request['search']['value'] . "%' )";
            }
            $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

            $lstRetorno = DB::select($sql);

            return $lstRetorno;
      }
}



?>