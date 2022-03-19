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
            'fk_idclase'
      ];
  
      protected $hidden = [
  
      ];

      public function cargarDesdeRequest($request) {
            $this->idreserva = $request->input('id') != "0" ? $request->input('id') : $this->idreserva;
            $this->fk_idcliente = $request->input('lstCliente');
            $this->fk_idclase = $request->input('lstClase');
          }

      public function obtenerTodos() {
            $sql = "SELECT 
                  A.idreserva,
                  A.fk_idcliente,
                  A.fk_idclase
                  FROM reservas A
                  ORDER BY A.idreserva";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($idrserva) {
            $sql = "SELECT 
                        idreserva,
                        fk_idcliente,
                        fk_idclase
                        FROM reservas
                        WHERE idreserva=$idrserva";
            $lstRetorno = DB::select($sql);
      
            if (count($lstRetorno) > 0) {
                  $this->idreserva = $lstRetorno[0]->idreserva;
                  $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
                  $this->fk_idclase = $lstRetorno[0]->fk_idclase;
                  return $this;
            }
            return null;
      }

      public function guardar() {
            $sql = "UPDATE reservas SET
                        fk_idcliente=?,
                        fk_idclase=?
                  WHERE idreserva=?";
              $affected = DB::update($sql, [
                $this->fk_idcliente,
                $this->fk_idclase,
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
                        fk_idclase
                        ) VALUES (?, ?);";
            $result = DB::insert($sql, [
                  $this->fk_idcliente,
                  $this->fk_idclase
            ]);
            return $this->idreserva = DB::getPdo()->lastInsertId();
      }
}



?>