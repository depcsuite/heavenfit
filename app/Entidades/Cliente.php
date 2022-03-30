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
      'correo',
      'telefono',
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
      'fk_idpais',
      'foto',
      'clave'
    ];

    protected $hidden = [

    ];

    public function cargarDesdeRequest($request) {
      $this->idcliente = $request->input('id') != "0" ? $request->input('id') : $this->idcliente;
      $this->nombre = $request->input('txtNombre');
      $this->edad = $request->input('txtEdad');
      $this->correo = $request->input('txtCorreo');
      $this->telefono = $request->input('txtTelefono');      
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
      $this->fk_idpais = $request->input('lstNacionalidad');
      $this->foto = $request->input('txtFoto');
      $this->clave = $request->input('txtClave');
    }

    public function obtenerTodos() {
        $sql = "SELECT 
                  A.idcliente,
                  A.nombre,
                  A.edad,
                  A.correo,
                  A.telefono,
                  A.peso,
                  A.altura,
                  A.deportes,
                  A.lesiones,
                  A.enfermedades,
                  A.medicamento,
                  A.materiales,
                  A.objetivo,
                  A.fecha_nac,
                  A.nutricion,
                  A.fk_idpais,
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
                correo,
                telefono,
                peso,
                altura,
                deportes,
                lesiones,
                enfermedades,
                medicamento,
                materiales,
                objetivo,
                fecha_nac,
                nutricion,
                fk_idpais,
                foto,
                clave
              FROM clientes 
              WHERE idcliente=$idcliente";
      $lstRetorno = DB::select($sql);

      if (count($lstRetorno) > 0) {
        $this->idcliente = $lstRetorno[0]->idcliente;
        $this->nombre = $lstRetorno[0]->nombre;
        $this->edad = $lstRetorno[0]->edad;
        $this->correo = $lstRetorno[0]->correo;
        $this->telefono = $lstRetorno[0]->telefono;
        $this->peso = $lstRetorno[0]->peso;
        $this->altura = $lstRetorno[0]->altura;
        $this->deportes = $lstRetorno[0]->deportes;
        $this->lesiones = $lstRetorno[0]->lesiones;
        $this->enfermedades = $lstRetorno[0]->enfermedades;
        $this->medicamento = $lstRetorno[0]->medicamento;
        $this->materiales = $lstRetorno[0]->materiales;
        $this->objetivo = $lstRetorno[0]->objetivo;
        $this->fecha_nac = $lstRetorno[0]->fecha_nac;
        $this->nutricion = $lstRetorno[0]->nutricion;
        $this->fk_idpais = $lstRetorno[0]->fk_idpais;
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
            correo=?,
            telefono=?,
            peso=?,
            altura=?,
            deportes=?,
            lesiones=?,
            enfermedades=?,
            medicamento=?,
            materiales=?,
            objetivo=?,
            fecha_nac=?,
            nutricion=?,
            fk_idpais=?,
            foto=?,
            clave=?
            WHERE idcliente=?";
        $affected = DB::update($sql, [
          $this->nombre,
          $this->edad,
          $this->correo,
          $this->telefono,
          $this->peso,
          $this->altura,
          $this->deportes,
          $this->lesiones,
          $this->enfermedades,
          $this->medicamento,
          $this->materiales,
          $this->objetivo,
          $this->fecha_nac,
          $this->nutricion,
          $this->fk_idpais,
          $this->foto,
          password_hash($this->clave, PASSWORD_DEFAULT),
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
              correo,
              telefono,
              peso,
              altura,
              deportes,
              lesiones,
              enfermedades,
              medicamento,
              materiales,
              objetivo,
              fecha_nac,
              nutricion,
              fk_idpais,
              foto,
              clave
              ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
      $result = DB::insert($sql, [
        $this->nombre,
        $this->edad,
        $this->correo,
        $this->telefono,
        $this->peso,
        $this->altura,
        $this->deportes,
        $this->lesiones,
        $this->enfermedades,
        $this->medicamento,
        $this->materiales,
        $this->objetivo,
        $this->fecha_nac,
        $this->nutricion,
        $this->fk_idpais,
        $this->foto,
        password_hash($this->clave, PASSWORD_DEFAULT)
      ]);
      return $this->idcliente = DB::getPdo()->lastInsertId();
    }

    public function obtenerFiltrado()
    {
        $request = $_REQUEST;
        $columns = array(
            0 => 'A.idcliente',
            1 => 'A.nombre',
            2 => 'A.correo',
            3 => 'A.telefono',
        );
        $sql = "SELECT DISTINCT
                    A.idcliente,
                    A.nombre,
                    A.correo,
                    A.telefono
                    FROM clientes A
                WHERE 1=1
                ";

        //Realiza el filtrado
        if (!empty($request['search']['value'])) {
            $sql .= " AND ( A.nombre LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.correo LIKE '%" . $request['search']['value'] . "%' ";
            $sql .= " OR A.telefono LIKE '%" . $request['search']['value'] . "%' )";
        }
        $sql .= " ORDER BY " . $columns[$request['order'][0]['column']] . "   " . $request['order'][0]['dir'];

        $lstRetorno = DB::select($sql);

        return $lstRetorno;
    }
}
