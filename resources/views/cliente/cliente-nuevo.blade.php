@extends("plantilla")
@section('titulo', "$titulo")
@section('scripts')
<script>
    globalId = '<?php echo isset($cliente->idcliente) && $cliente->idcliente > 0 ? $cliente->idcliente : 0; ?>';
    <?php $globalId = isset($cliente->idcliente) ? $cliente->idcliente : "0";?>
</script>
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/home">Inicio</a></li>
    <li class="breadcrumb-item"><a href="/admin/clientes">Clientes</a></li>
    @if($globalId > 0)
        <li class="breadcrumb-item active">Modificar</li>
      @else
        <li class="breadcrumb-item active">Nuevo</li>
    @endif
</ol>
<ol class="toolbar">
    <li class="btn-item"><a title="Nuevo" href="/admin/cliente/nuevo" class="fa fa-plus-circle" aria-hidden="true"><span>Nuevo</span></a></li>
    <li class="btn-item"><a title="Guardar" href="#" class="fa fa-floppy-o" aria-hidden="true" onclick="javascript: $('#modalGuardar').modal('toggle');"><span>Guardar</span></a>
    </li>
    @if($globalId > 0)
    <li class="btn-item"><a title="Eliminar" href="#" class="fa fa-trash-o" aria-hidden="true" onclick="javascript: $('#mdlEliminar').modal('toggle');"><span>Eliminar</span></a></li>
    @endif
    <li class="btn-item"><a title="Salir" href="#" class="fa fa-arrow-circle-o-left" aria-hidden="true" onclick="javascript: $('#modalSalir').modal('toggle');"><span>Salir</span></a></li>
</ol>
<script>
function fsalir(){
    location.href ="/admin/clientes";
}
</script>
@endsection
@section('contenido')
<?php
if (isset($msg)) {
    echo '<div id = "msg"></div>';
    echo '<script>msgShow("' . $msg["MSG"] . '", "' . $msg["ESTADO"] . '")</script>';
}
?>
<div class="panel-body">
        <div id = "msg"></div>
        <?php
if (isset($msg)) {
    echo '<script>msgShow("' . $msg["MSG"] . '", "' . $msg["ESTADO"] . '")</script>';
}


?>
    <form id="form1" method="POST">
        <div class="row">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
            <input type="hidden" id="id" name="id" class="form-control" value="{{$globalId}}" required>

        <div class="col-12 col-sm-6">
            <label for="txtNombre">Nombre: *</label>
            <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Nombre y Apellido" required value="{{ $cliente->nombre }}">
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtEdad">Edad: *</label>
            <input type="text" name="txtEdad" id="txtEdad" class="form-control" required value="{{ $cliente->edad }}">
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtCorreo">Correo: *</label>
            <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" required value="{{ $cliente->correo }}">
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtTelefono">Telefono: *</label>
            <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" required value="{{ $cliente->telefono }}">
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtPeso">Peso (kg): *</label>
            <input type="text" name="txtPeso" id="txtPeso" class="form-control" required value="{{ $cliente->peso }}">
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtAltura">Altura(cm): *</label>
            <input type="text" name="txtAltura" id="txtAltura" class="form-control" required value="{{ $cliente->altura }}">
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtDeportes">Deportes: *</label>
            <input type="text" name="txtDeportes" id="txtDeportes" class="form-control" placeholder="Indicar deportes que haya realizado" value="{{ $cliente->deportes }}">
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtLesiones">Lesiones: *</label>
            <input type="text" name="txtLesiones" id="txtLesiones" class="form-control" placeholder="Indicar lesiones que haya tenido" required value="{{ $cliente->lesiones }}">
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtEnfermedades">Enfermedades: *</label>
            <input type="text" name="txtEnfermedades" id="txtEnfermedades" class="form-control" placeholder="Indicar enfermedades que le puedan dificultar el entrenamiento" required value="{{ $cliente->enfermedades }}"> 
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtMedicamento">Medicamento: </label>
            <input type="text" name="txtMedicamento" id="txtMedicamento" class="form-control" placeholder="indicar medicamentos que este tomando" value="{{ $cliente->medicamentos }}">
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtMateriales">Materiales: *</label>
            <input type="text" name="txtMateriales" id="txtMateriales" class="form-control" placeholder="Mancuernas, cuerda, colchoneta. etc" required value="{{ $cliente->materiales }}">
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtObjetivo">Objetivo: </label>
            <input type="text" name="txtObjetivo" id="txtObjetivo" class="form-control" value="{{ $cliente->objetivos }}" >
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtFechaNac">Fecha nacimiento: *</label>
            <input type="date" name="txtFechaNac" id="txtFechaNac" class="form-control" required value="{{ $cliente->fecha_nac }}">
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtNutricion">Nutrición: </label>
            <input type="text" name="txtNutricion" id="txtNutricion" class="form-control" placeholder="tiene un plan nutricional? le interesa tener uno?" value="{{ $cliente->nutricion }}">
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtFoto">Foto: </label>
            <input type="file" name="txtFoto" id="txtFoto" class="form-control" >
        </div>
        <div class="col-12 col-sm-6">
            <label for="lstNacionalidad">Nacionalidad: </label>
            <select name="lstNacionalidad" id="lstNacionalidad" class="form-control">Nacionalidad
            <option selected value=""></option>
                @for ($i = 0; $i < count($array_nacionalidad); $i++)
                    @if (isset($cliente) and $array_nacionalidad[$i]->idpais == $cliente->fk_idpais)
                        <option selected value="{{ $array_nacionalidad[$i]->idpais }}">{{ $array_nacionalidad[$i]->nombre }}</option>
                    @else
                        <option value="{{ $array_nacionalidad[$i]->idpais }}">{{ $array_nacionalidad[$i]->nombre }}</option>
                    @endif
                @endfor
            </select>
            
        </div>
        <div class="col-12 col-sm-6">
            <label for="txtClave">Clave: *</label>
            <input type="password" name="txtClave" id="txtClave" class="form-control" required>
        </div>
        </div>
        
    </form>
    <div class="modal fade" id="mdlEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar registro?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">¿Deseas eliminar el registro actual?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary" onclick="eliminar();">Sí</button>
          </div>
        </div>
      </div>
    </div>
    <script>

    $("#form1").validate();

    function guardar() {
        if ($("#form1").valid()) {
            modificado = false;
            form1.submit();
        } else {
            $("#modalGuardar").modal('toggle');
            msgShow("Corrija los errores e intente nuevamente.", "danger");
            return false;
        }
    }

    function eliminar() {
        $.ajax({
            type: "GET",
            url: "{{ asset('admin/cliente/eliminar') }}",
            data: { id:globalId },
            async: true,
            dataType: "json",
            success: function (respuesta) {
                if (respuesta.codigo == "0") {
                    msgShow(respuesta.texto, "success");
                    $("#btnEliminar").hide();
                    $('#mdlEliminar').modal('toggle');
                } else {
                    msgShow(respuesta.texto, "danger");
                    $('#mdlEliminar').modal('toggle');
                }
            
            }
        });
    }

</script>
@endsection