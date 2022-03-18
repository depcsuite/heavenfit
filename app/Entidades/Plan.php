<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

Class Plan extends Model{
      protected $table = 'planes';
      public $timestamps = false;

      protected $fillable = [
            'idplan',
            'nombre',
            'descripcion',
            'precio'
      ];
  
      protected $hidden = [
  
      ];

      public function cargarDesdeRequest($request) {
            $this->idplan = $request->input('id') != "0" ? $request->input('id') : $this->idprofesor;
            $this->nombre = $request->input('txtNombre');
            $this->descripcion = $request->input('txtDescripcion');
            $this->precio = $request->input('txtPrecio');
          }

      public function obtenerTodos() {
            $sql = "SELECT 
                  A.idplan,
                  A.nombre,
                  A.descripcion,
                  A.precio
                  FROM planes A
                  ORDER BY A.precio";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($idplan) {
            $sql = "SELECT 
                        idplan,
                        nombre,
                        descripcion,
                        precio
                        FROM planes 
                        WHERE idplan=$idplan";
            $lstRetorno = DB::select($sql);
      
            if (count($lstRetorno) > 0) {
                  $this->idplan = $lstRetorno[0]->idplan;
                  $this->nombre = $lstRetorno[0]->nombre;
                  $this->descripcion = $lstRetorno[0]->descripcion;
                  $this->precio = $lstRetorno[0]->precio;
                  return $this;
            }
            return null;
      }

      public function guardar() {
            $sql = "UPDATE planes SET
                        nombre=?,
                        descripcion=?,
                        precio=?
                  WHERE idplan=?";
              $affected = DB::update($sql, [
                $this->nombre,
                $this->descripcion,
                $this->precio,
                $this->idplan
              ]);
      }

      public function eliminar() {
            $sql = "DELETE FROM planes WHERE idplan=?";
            $affected = DB::delete($sql, [$this->idplan]);
      }

      public function insertar() {
            $sql = "INSERT INTO planes (
                        nombre,
                        descripcion,
                        precio
                        ) VALUES (?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->nombre,
                  $this->descripcion,
                  $this->precio
            ]);
            return $this->idplan = DB::getPdo()->lastInsertId();
      }
}



?>