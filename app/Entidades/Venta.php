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
            'cantidad',
            'fecha_vencimiento',
            'fk_idmedio',
            'fk_idestado_pago',
            'archivo'
      ];

      protected $hidden = [];

      public function cargarDesdeRequest($request)
      {
            $this->idventa = $request->input('id') != "0" ? $request->input('id') : $this->idventa;
            $this->fecha = $request->input('txtFecha');
            $this->fk_idcliente = $request->input('lstCliente');
            $this->fk_idplan = $request->input('lstPlan');
            $this->precio = $request->input('txtPrecio');
            $this->cantidad = $request->input('txtCantidad');
            $this->fecha_vencimiento = $request->input('txtFechaVencimiento');
            $this->fk_idmedio = $request->input('lstMedio');
            $this->fk_idestado_pago = $request->input('lstEstado_pago');
            $this->archivo = $request->input('archivo');
      }

      public function obtenerTodos()
      {
            $sql = "SELECT
                  idventa,
                  fecha,
                  fk_idcliente,
                  fk_idplan,
                  precio,
                  cantidad,
                  fecha_vencimiento,
                  fk_idmedio,
                  fk_idestado_pago,
                  archivo              
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
                  cantidad,
                  fecha_vencimiento,
                  fk_idmedio,
                  fk_idestado_pago,
                  archivo
                FROM ventas WHERE idventa = $idventa";
            $lstRetorno = DB::select($sql);

            if (count($lstRetorno) > 0) {
                  $this->idventa = $lstRetorno[0]->idventa;
                  $this->fecha = $lstRetorno[0]->fecha;
                  $this->fk_idcliente = $lstRetorno[0]->fk_idcliente;
                  $this->fk_idplan = $lstRetorno[0]->fk_idplan;
                  $this->precio = $lstRetorno[0]->precio;
                  $this->cantidad = $lstRetorno[0]->cantidad;
                  $this->fecha_vencimiento = $lstRetorno[0]->fecha_vencimiento;
                  $this->fk_idmedio = $lstRetorno[0]->fk_idmedio;
                  $this->fk_idestado_pago = $lstRetorno[0]->fk_idestado_pago;
                  $this->archivo = $lstRetorno[0]->archivo;
                  return $this;
            }
            return null;
      }

      public function obtenerPorIdCliente($idcliente)
      {
            $sql = "SELECT
                  idventa,
                  fecha,
                  fk_idcliente,
                  fk_idplan,
                  precio,
                  cantidad,
                  fecha_vencimiento,
                  fk_idmedio,
                  fk_idestado_pago,
                  archivo
                FROM ventas WHERE fk_idcliente = $idcliente";
            $lstRetorno = DB::select($sql);

            
            return $lstRetorno;
      }
      public function obtenerPorIdPlan($idplan)
      {
            $sql = "SELECT
                  idventa,
                  fecha,
                  fk_idcliente,
                  fk_idplan,
                  precio,
                  cantidad,
                  fecha_vencimiento,
                  fk_idmedio,
                  fk_idestado_pago,
                  archivo
                FROM ventas WHERE fk_idplan = $idplan";
            $lstRetorno = DB::select($sql);

            
            return $lstRetorno;
      }
      public function obtenerPorIdMedio($idmedio)
      {
            $sql = "SELECT
                  idventa,
                  fecha,
                  fk_idcliente,
                  fk_idplan,
                  precio,
                  cantidad,
                  fecha_vencimiento,
                  fk_idmedio,
                  fk_idestado_pago,
                  archivo
                FROM ventas WHERE fk_idmedio = $idmedio";
            $lstRetorno = DB::select($sql);

            
            return $lstRetorno;
      }
      public function obtenerPorIdEstadoPago($idestados_pagos)
      {
            $sql = "SELECT
                  idventa,
                  fecha,
                  fk_idcliente,
                  fk_idplan,
                  precio,
                  cantidad,
                  fecha_vencimiento,
                  fk_idmedio,
                  fk_idestado_pago,
                  archivo
                FROM ventas WHERE fk_idestado_pago = $idestados_pagos";
            $lstRetorno = DB::select($sql);

            
            return $lstRetorno;
      }


      public function guardar()
      {
            $sql = "UPDATE ventas SET
            fecha=?,
            fk_idcliente=?,
            fk_idplan=?,
            precio=?,
            cantidad=?,
            fecha_vencimiento=?,
            fk_idmedio=?,
            fk_idestado_pago=?,
            archivo=?
            WHERE idventa=?";
            $affected = DB::update($sql, [
                  $this->fecha,
                  $this->fk_idcliente,
                  $this->fk_idplan,
                  $this->precio,
                  $this->cantidad,
                  $this->fecha_vencimiento,
                  $this->fk_idmedio,
                  $this->fk_idestado_pago,
                  $this->archivo,
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
                  cantidad,
                  fecha_vencimiento,
                  fk_idmedio,
                  fk_idestado_pago,
                  archivo
              ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->fecha,
                  $this->fk_idcliente,
                  $this->fk_idplan,
                  $this->precio,
                  $this->cantidad,
                  $this->fecha_vencimiento,
                  $this->fk_idmedio,
                  $this->fk_idestado_pago,
                  $this->archivo,
            ]);
            return $this->idventa = DB::getPdo()->lastInsertId();
      }

      

      public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.idventa',
            1 => 'A.fecha',
            2 => 'B.nombre',
            3 => 'A.precio',
            4 => 'C.nombre',
            5 => 'A.fecha_vencimiento',
        );
        $sql = "SELECT DISTINCT
                A.idventa,
                A.fecha,
                A.fk_idcliente,
                B.nombre AS cliente,
                A.precio,
                A.fk_idestado_pago,
                C.nombre AS estado_pago,
                A.fecha_vencimiento
                FROM ventas A
                LEFT JOIN clientes B ON A.fk_idcliente = B.idcliente
                LEFT JOIN estados_pagos C ON A.fk_idestado_pago = C.idestado
   
                WHERE 1=1
                ";

            //Realiza el filtrado
            if (!empty($request['search']['value'])) {
                  $sql .= " AND ( A.fecha LIKE '%" . $request['search']['value'] . "%' ";
                  $sql .= " OR B.nombre LIKE '%" . $request['search']['value'] . "%' ";
                  $sql .= " OR A.precio LIKE '%" . $request['search']['value'] . "%' ";
                  $sql .= " OR C.nombre LIKE '%" . $request['search']['value'] . "%' ";
                  $sql .= " OR A.fecha_vencimiento LIKE '%" . $request['search']['value'] . "%' )";
            }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }
}
