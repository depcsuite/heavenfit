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
            'precio',
            'precioDolar',
            'fk_idtipo_plan'
      ];
  
      protected $hidden = [
  
      ];

      public function cargarDesdeRequest($request) {
            $this->idplan = $request->input('id') != "0" ? $request->input('id') : $this->idplan;
            $this->nombre = $request->input('txtNombre');
            $this->descripcion = $request->input('txtDescripcion');
            $this->precio = $request->input('txtPrecio');
            $this->precioDolar = $request->input('txtPrecioDolar');
            $this->fk_idtipo_plan = $request->input('lstTipoPlan');
          }

      public function obtenerTodos() {
            $sql = "SELECT 
                  A.idplan,
                  A.nombre,
                  A.descripcion,
                  A.precio,
                  A.precioDolar,
                  A.fk_idtipo_plan
                  FROM planes A
                  ORDER BY A.precio";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerSeleccionados() {
            $sql = "SELECT 
                        idplan,
                        nombre,
                        descripcion,
                        precio,
                        precioDolar
                        FROM planes 
                        WHERE idplan=3 OR idplan=2 OR idplan=9
                        ORDER BY precio";
                        
            $lstRetorno = DB::select($sql);
      
            
            return $lstRetorno;
      }

      public function obtenerPorId($idplan) {
            $sql = "SELECT 
                        idplan,
                        nombre,
                        descripcion,
                        precio,
                        precioDolar,
                        fk_idtipo_plan
                        FROM planes 
                        WHERE idplan=$idplan";
            $lstRetorno = DB::select($sql);
      
            if (count($lstRetorno) > 0) {
                  $this->idplan = $lstRetorno[0]->idplan;
                  $this->nombre = $lstRetorno[0]->nombre;
                  $this->descripcion = $lstRetorno[0]->descripcion;
                  $this->precio = $lstRetorno[0]->precio;
                  $this->precioDolar = $lstRetorno[0]->precioDolar;
                  $this->fk_idtipo_plan = $lstRetorno[0]->fk_idtipo_plan;
                  return $this;
            }
            return null;
      }

      public function guardar() {
            $sql = "UPDATE planes SET
                        nombre=?,
                        descripcion=?,
                        precio=?,
                        precioDolar=?,
                        fk_idtipo_plan
                  WHERE idplan=?";
              $affected = DB::update($sql, [
                $this->nombre,
                $this->descripcion,
                $this->precio,
                $this->precioDolar,
                $this->fk_idtipo_plan,
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
                        precio,
                        precioDolar,
                        fk_idtipo_plan
                        ) VALUES (?, ?, ?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->nombre,
                  $this->descripcion,
                  $this->precio,
                  $this->precioDolar
            ]);
            return $this->idplan = DB::getPdo()->lastInsertId();
      }

      public function obtenerFiltrado()
      {
          $request = $_REQUEST;
          $columns = array(
              0 => 'A.idplan',
              1 => 'A.nombre',
              2 => 'A.precio',
              2 => 'A.precioDolar',
          );
          $sql = "SELECT DISTINCT
                      A.idplan,
                      A.nombre,
                      A.precio,
                      A.precioDolar
                      FROM planes A
                  WHERE 1=1
                  ";
  
          //Realiza el filtrado
          if (!empty($request['search']['value'])) {
              $sql .= " AND ( A.nombre LIKE '%" . $request['search']['value'] . "%' ";
              $sql .= " OR A.precio LIKE '%" . $request['search']['value'] . "%' ";
              $sql .= " OR A.precioDolar LIKE '%" . $request['search']['value'] . "%' )";
          }
          $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];
  
          $lstRetorno = DB::select($sql);
  
          return $lstRetorno;
      }
}
?>