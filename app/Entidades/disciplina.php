<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

Class Disciplina extends Model{
      protected $table = 'disciplinas';
      public $timestamps = false;

      protected $fillable = [
            'iddisciplina',
            'nombre',
            'descripcion',
            'foto'
      ];
  
      protected $hidden = [
  
      ];

      public function cargarDesdeRequest($request) {
            $this->iddisciplina = $request->input('id') != "0" ? $request->input('id') : $this->iddisciplina;
            $this->nombre = $request->input('txtNombre');
            $this->descripcion = $request->input('txtDescripcion');
            $this->foto = $request->input('txtFoto');
          }

      public function obtenerTodos() {
            $sql = "SELECT 
                  A.iddisciplina,
                  A.nombre,
                  A.descripcion,
                  A.foto
                  FROM disciplinas A
                  ORDER BY A.nombre";
            $lstRetorno = DB::select($sql);
            return $lstRetorno;
      }

      public function obtenerPorId($iddisciplina) {
            $sql = "SELECT 
                        iddisciplina,
                        nombre,
                        descripcion,
                        foto
                        FROM disciplinas
                        WHERE iddisciplina=$iddisciplina";
            $lstRetorno = DB::select($sql);
      
            if (count($lstRetorno) > 0) {
                  $this->iddisciplina = $lstRetorno[0]->iddisciplina;
                  $this->nombre = $lstRetorno[0]->nombre;
                  $this->descripcion = $lstRetorno[0]->descripcion;
                  $this->foto = $lstRetorno[0]->foto;
                  return $this;
            }
            return null;
      }

      public function guardar() {
            $sql = "UPDATE disciplinas SET
                        nombre=?,
                        descripcion=?,
                        foto=?
                  WHERE iddisciplina=?";
              $affected = DB::update($sql, [
                $this->nombre,
                $this->descripcion,
                $this->foto,
                $this->iddisciplina
              ]);
      }

      public function eliminar() {
            $sql = "DELETE FROM disciplinas WHERE iddisciplina=?";
            $affected = DB::delete($sql, [$this->iddisciplina]);
      }

      public function insertar() {
            $sql = "INSERT INTO disciplinas (
                        nombre,
                        descripcion,
                        foto
                        ) VALUES (?, ?, ?);";
            $result = DB::insert($sql, [
                  $this->nombre,
                  $this->descripcion,
                  $this->foto
            ]);
            return $this->iddisciplina = DB::getPdo()->lastInsertId();
      }

      public function obtenerFiltrado()
      {
          $request = $_REQUEST;
          $columns = array(
              0 => 'A.iddisciplina',
              1 => 'A.nombre',
              2 => 'A.descripcion',
          );
          $sql = "SELECT DISTINCT
                      A.iddisciplina,
                      A.nombre,
                      A.descripcion
                      FROM disciplinas A
                  WHERE 1=1
                  ";
  
          //Realiza el filtrado
          if (!empty($request['search']['value'])) {
              $sql .= " AND ( A.nombre LIKE '%" . $request['search']['value'] . "%' )";
          }
          $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];
  
          $lstRetorno = DB::select($sql);
  
          return $lstRetorno;
      }

}



?>