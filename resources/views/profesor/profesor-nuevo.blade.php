@extends("plantilla")
@section('titulo', "$titulo")
@section('scripts')
<script>
    globalId = '<?php echo isset($profesor->idprofesor) && $profesor->idprofesor > 0 ? $profesor->idprofesor : 0; ?>';
    <?php $globalId = isset($profesor->idprofesor) ? $profesor->idprofesor : "0";?>
</script>
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin/home">Inicio</a></li>
    <li class="breadcrumb-item"><a href="/admin/profesores">Profesores</a></li>
    @if($globalId > 0)
        <li class="breadcrumb-item active">Modificar</li>
      @else
        <li class="breadcrumb-item active">Nuevo</li>
    @endif
</ol>
<ol class="toolbar">
    <li class="btn-item"><a title="Nuevo" href="/admin/profesor/nuevo" class="fa fa-plus-circle" aria-hidden="true"><span>Nuevo</span></a></li>
    <li class="btn-item"><a title="Guardar" href="#" class="fa fa-floppy-o" aria-hidden="true" onclick="javascript: $('#modalGuardar').modal('toggle');"><span>Guardar</span></a>
    </li>
    @if($globalId > 0)
    <li class="btn-item"><a title="Eliminar" href="#" class="fa fa-trash-o" aria-hidden="true" onclick="javascript: $('#mdlEliminar').modal('toggle');"><span>Eliminar</span></a></li>
    @endif
    <li class="btn-item"><a title="Salir" href="#" class="fa fa-arrow-circle-o-left" aria-hidden="true" onclick="javascript: $('#modalSalir').modal('toggle');"><span>Salir</span></a></li>
</ol>
<script>
function fsalir(){
    location.href ="/admin/profesores";
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
                  <input type="text" name="txtNombre" id="txtNombre" class="form-control" required value="{{ $profesor->nombre }}">
            </div>
            <div class="col-12 col-sm-6">
                  <label for="txtDni">Documento: *</label>
                  <input type="text" name="txtDni" id="txtDni" class="form-control" value="{{ $profesor->documento }}"required>
            </div>
            <div class="col-12 col-sm-6">
                  <label for="">Nacionalidad: *</label>
                  <select name="lstNacionalidad" id="lstNacionalidad" class="form-control"> 
                  <option selected value=""></option>
                        @for ($i = 0; $i < count($array_nacionalidad); $i++)
                            @if (isset($profesor) and $array_nacionalidad[$i]->idpais == $profesor->fk_idpais)
                                <option selected value="{{ $array_nacionalidad[$i]->idpais }}">{{ $array_nacionalidad[$i]->nombre }}</option>
                            @else
                                <option value="{{ $array_nacionalidad[$i]->idpais }}">{{ $array_nacionalidad[$i]->nombre }}</option>
                            @endif
                        @endfor
                  </select>
            </div>
            <div class="col-12 col-sm-6">
                  <label for="txtIdioma">Idioma: *</label>
                  <input type="text" name="txtIdioma" id="txtIdioma" class="form-control" value="{{ $profesor->idioma }}" required>
            </div>
            <div class="col-12 col-sm-6">
                  <label for="txtTelefono">Telefono: *</label>
                  <input type="text" name="txtTelefono" id="txtTelefono" class="form-control" value="{{ $profesor->telefono }}" required>
            </div>
            <div class="col-12 col-sm-6">
                  <label for="txtEdad">Edad: *</label>
                  <input type="number" name="txtEdad" id="txtEdad" class="form-control"value="{{ $profesor->edad }}" required>
            </div>
            <div class="col-12 col-sm-6">
                  <label for="txtDescripcion">Descripcion: </label>
                  <input type="text" name="txtDescripcion" id="txtDescripcion" class="form-control" value="{{ $profesor->descripcion }}">
            </div>
            <div class="col-12 col-sm-6">
                        <label for="lstModalidad">Modalidad: </label>
                        <select name="lstModalidad" id="lstModalidad" class="form-control">Modalidad
                              <option selected value=""></option>
                              @for ($i = 0; $i < count($array_modalidad); $i++)
                                    @if (isset($profesor) and $array_modalidad[$i]->idmodalidad == $profesor->fk_idmodalidad)
                                    <option selected value="{{ $array_modalidad[$i]->idmodalidad }}">{{ $array_modalidad[$i]->nombre }}</option>
                                    @else
                                    <option value="{{ $array_modalidad[$i]->idmodalidad }}">{{ $array_modalidad[$i]->nombre }}</option>
                                    @endif
                              @endfor
                        </select>
                  </div>
            <div class="col-12 col-sm-6">
                  <label for="txtTelefono">Correo: *</label>
                  <input type="text" name="txtCorreo" id="txtCorreo" class="form-control" value="{{ $profesor->correo }}" required>
            </div>
            <div class="col-12 col-sm-6">
                <label for="lstEstado">Estado: </label>
                    <select name="lstEstado" id="lstEstado" class="form-control">Estado
                    <option selected disabled value="">Seleccionar estado del Profesor..</option>
                        @for ($i = 0; $i < count($array_estados); $i++)
                            @if (isset($profesor) and $array_estados[$i]->idestado == $profesor->fk_idestado)
                                <option selected value="{{ $array_estados[$i]->idestado }}">{{ $array_estados[$i]->descripcion }}</option>
                            @else
                                <option value="{{ $array_estados[$i]->idestado }}">{{ $array_estados[$i]->descripcion }}</option>
                            @endif
                        @endfor
                    </select>
            </div>
            <div class="col-12 col-sm-6">
                  <label for="txtFoto">Foto: </label>
                  <input type="file" name="txtFoto" id="txtFoto" class="form-control" value="{{ $profesor->foto }}">
            </div>
        </div>
    </form>
    <div class="modal fade" id="mdlEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar registro?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">??</span>
            </button>
          </div>
          <div class="modal-body">??Deseas eliminar el registro actual?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary" onclick="eliminar();">S??</button>
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
            url: "{{ asset('admin/profesor/eliminar') }}",
            data: { id:globalId },
            async: true,
            dataType: "json",
            success: function (data) {
                if (data.codigo == "0") {
                    msgShow(data.texto, "success");
                    $("#btnEliminar").hide();
                    $('#mdlEliminar').modal('toggle');
                } else {
                    msgShow(data.texto, "danger");
                    $('#mdlEliminar').modal('toggle');
                }
            
            }
        });
    }

</script>
@endsection