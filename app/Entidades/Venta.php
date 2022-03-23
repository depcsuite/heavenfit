<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
      protected $table = 'ventas';
      public $timestamps = false;

      protected $fillable = [
            'idventa',
            'fecha',
            'fk_idcliente',
            'fk_idplan',
            'precio',
            'fk_idmedio',
            'fk_idestados_pagos'
      ];

      protected $hidden = [];

      public function cargarDesdeRequest($request)
      {
            $this->idventa = $request->input('id') != "0" ? $request->input('id') : $this->idventa;
            $this->fecha = $request->input('txtFecha');
            $this->fk_idcliente = $request->input('lstCliente');
            $this->fk_idplan = $request->input('lstPlan');
            $this->precio = $request->input('txtPrecio');
            $this->fk_idmedio = $request->input('lstMedio');
            $this->fk_idestados_pagos = $request->input('lstEstado_pago');
      }

      public function obtenerTodos()
      {
            $sql = "SELECT
                  idventa,
                  fecha,
                  fk_idcliente,
                  fk_idplan,
                  precio,
                  fk_idmedio,
                  fk_idestados_pagos                
                FROM ventas  ORDER BY fecha";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($idventa)
      {
            $sql = "SELECT
                  idventa,
                  fecha,
                  fk_idcliente,
                  fk_idplan,
                  precio,
                  fk_idmedio,
                  fk_idestados_pagos
                FROM ventas WHERE idventa = $idventa";
            $lstRetorno = DB::select($sql);

            if (count($lstRetorno) > 0) {
                  $this->idventa = $lstRetorno[0]->idventa;
                  $this->fecha = $lstRetorno[0]->fecha;
                  $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
                  $this->fk_idplan = $lstRetorno[0]->fk_idplan;
                  $this->precio = $lstRetorno[0]->precio;
                  $this->fk_idmedio = $lstRetorno[0]->fk_idmedio;
                  $this->fk_idestados_pagos = $lstRetorno[0]->fk_idestado_pago;
                  return $this;
            }
            return null;
      }

      public function guardar()
      {
            $sql = "UPDATE ventas SET
            fecha=?,
            fk_idcliente=?,
            fk_idplan=?,
            precio=?,
            fk_idmedio=?,
            fk_idestados_pagos=?
            WHERE idventa=?";
            $affected = DB::update($sql, [
                  $this->fecha,
                  $this->fk_idcliente,
                  $this->fk_idplan,
                  $this->precio,
                  $this->fk_idmedio,
                  $this->fk_idestados_pagos,
                  $this->idventa
            ]);
      }

      public function eliminar()
      {
            $sql = "DELETE FROM ventas WHERE idventa=?";
            $affected = DB::delete($sql, [$this->idventa]);
      }

      public function insertar()
      {
            $sql = "INSERT INTO ventas (
                  fecha,
                  fk_idcliente,
                  fk_idplan,
                  precio,
                  fk_idmedio,
                  fk_idestados_pagos
              ) VALUES (?, ?, ?, ?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->fecha,
                  $this->fk_idcliente,
                  $this->fk_idplan,
                  $this->precio,
                  $this->fk_idmedio,
                  $this->fk_idestados_pagos,
            ]);
            return $this->idventa = DB::getPdo()->lastInsertId();
      }
}
