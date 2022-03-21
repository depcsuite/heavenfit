<?php

namespace App\Entidades;

use DB;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    public $timestamps = false;

    protected $fillable = [
      'idcliente',
      'nombre',
      'edad',
      'peso',
      'altura',
      'deportes',
      'lesiones',
      'enfermedades',
      'medicamento',
      'materiales',
      'objetivo',
      'fecha_nac',
      'nutricion',
      'foto',
      'clave'
    ];

    protected $hidden = [

    ];

    public function cargarDesdeRequest($request) {
      $this->idcliente = $request->input('id') != "0" ? $request->input('id') : $this->idcliente;
      $this->nombre = $request->input('txtNombre');
      $this->edad = $request->input('txtEdad');
      $this->peso = $request->input('txtPeso');
      $this->altura = $request->input('txtAltura');
      $this->deportes = $request->input('txtDeportes');
      $this->lesiones = $request->input('txtLesiones');
      $this->enfermedades = $request->input('txtEnfermedades');
      $this->medicamento = $request->input('txtMedicamento');
      $this->materiales = $request->input('txtMateriales');
      $this->objetivo = $request->input('txtObjetivo');
      $this->fecha_nac = $request->input('txtFechaNac');
      $this->nutricion = $request->input('txtNutricion');
      $this->foto = $request->input('txtFoto');
      $this->clave = $request->input('txtClave');
    }

    public function obtenerTodos() {
        $sql = "SELECT 
                  A.idcliente,
                  A.nombre,
                  A.edad,
                  A.peso,
                  A.altura,
                  A.deportes,
                  A.lesiones,
                  A.enfermedades,
                  A.medicamento,
                  A.objetivo,
                  A.fecha_nac,
                  A.nutricion,
                  A.foto,
                  A.clave
                FROM clientes A
                ORDER BY A.nombre";
        $lstRetorno = DB::select($sql);
        return $lstRetorno;
    }

    public function obtenerPorId($idcliente) {
      $sql = "SELECT 
                idcliente,
                nombre,
                edad,
                peso,
                altura,
                deportes,
                lesiones,
                enfermedades,
                medicamento,
                objetivo,
                fecha_nac,
                nutricion,
                foto,
                clave
              FROM clientes 
              WHERE idcliente=$idcliente";
      $lstRetorno = DB::select($sql);

      if (count($lstRetorno) > 0) {
        $this->idcliente = $lstRetorno[0]->idcliente;
        $this->nombre = $lstRetorno[0]->nombre;
        $this->edad = $lstRetorno[0]->edad;
        $this->peso = $lstRetorno[0]->peso;
        $this->altura = $lstRetorno[0]->altura;
        $this->deportes = $lstRetorno[0]->deportes;
        $this->lesiones = $lstRetorno[0]->lesiones;
        $this->enfermedades = $lstRetorno[0]->enfermedades;
        $this->medicamento = $lstRetorno[0]->medicamento;
        $this->objetivo = $lstRetorno[0]->objetivo;
        $this->fecha_nac = $lstRetorno[0]->fecha_nac;
        $this->nutricion = $lstRetorno[0]->nutricion;
        $this->foto = $lstRetorno[0]->foto;
        $this->clave = $lstRetorno[0]->clave;
        return $this;
      }
      return null;
    }

    public function guardar() {
      $sql = "UPDATE clientes SET
            nombre=?,
            edad=?,
            peso=?,
            altura=?,
            deportes=?,
            lesiones=?,
            enfermedades=?,
            medicamento=?,
            objetivo=?,
            fecha_nac=?,
            nutricion=?,
            foto=?,
            clave=?
            WHERE idcliente=?";
        $affected = DB::update($sql, [
          $this->nombre,
          $this->edad,
          $this->peso,
          $this->altura,
          $this->deportes,
          $this->lesiones,
          $this->enfermedades,
          $this->medicamento,
          $this->objetivo,
          $this->fecha_nac,
          $this->nutricion,
          $this->foto,
          $this->clave,
          $this->idcliente
        ]);
    }

    public function eliminar() {
      $sql = "DELETE FROM clientes WHERE idcliente=?";
      $affected = DB::delete($sql, [$this->idcliente]);
    }

    public function insertar() {
      $sql = "INSERT INTO clientes (
              nombre,
              edad,
              peso,
              altura,
              deportes,
              lesiones,
              enfermedades,
              medicamento,
              objetivo,
              fecha_nac,
              nutricion,
              foto,
              clave
              ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
      $result = DB::insert($sql, [
        $this->nombre,
        $this->edad,
        $this->peso,
        $this->altura,
        $this->deportes,
        $this->lesiones,
        $this->enfermedades,
        $this->medicamento,
        $this->objetivo,
        $this->fecha_nac,
        $this->nutricion,
        $this->foto,
        $this->clave
      ]);
      return $this->idcliente = DB::getPdo()->lastInsertId();
    }

}
