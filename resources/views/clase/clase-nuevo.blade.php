@extends("plantilla")
@section('titulo', "$titulo")
@section('scripts')
<script>
      globalId = '<?php echo isset($menu->idclase) && $menu->idclase > 0 ? $menu->idclase : 0; ?>';
      <?php $globalId = isset($menu->idclase) ? $menu->idclase : "0"; ?>
</script>
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin/home">Inicio</a></li>
      <li class="breadcrumb-item"><a href="/admin/clases">clases</a></li>
      @if($globalId > 0)
      <li class="breadcrumb-item active">Modificar</li>
      @else
      <li class="breadcrumb-item active">Nuevo</li>
      @endif
</ol>
<ol class="toolbar">
      <li class="btn-item"><a title="Nuevo" href="/admin/clase/nuevo" class="fa fa-plus-circle" aria-hidden="true"><span>Nuevo</span></a></li>
      <li class="btn-item"><a title="Guardar" href="#" class="fa fa-floppy-o" aria-hidden="true" onclick="javascript: $('#modalGuardar').modal('toggle');"><span>Guardar</span></a>
      </li>
      @if($globalId > 0)
      <li class="btn-item"><a title="Eliminar" href="#" class="fa fa-trash-o" aria-hidden="true" onclick="javascript: $('#mdlEliminar').modal('toggle');"><span>Eliminar</span></a></li>
      @endif
      <li class="btn-item"><a title="Salir" href="#" class="fa fa-arrow-circle-o-left" aria-hidden="true" onclick="javascript: $('#modalSalir').modal('toggle');"><span>Salir</span></a></li>
</ol>
<script>
      function fsalir() {
            location.href = "/admin/clases";
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
      <div id="msg"></div>
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
                        <select name="lstDisciplina" id="lstDisciplina" class="form-control">Disciplina
                              <option selected value=""></option>
                              @for ($i = 0; $i < count($array_disciplina); $i++) @if (isset($clase) and $array_disciplina[$i]->iddisciplina == $clase->fk_iddisciplina)
                                    <option selected value="{{ $array_disciplina[$i]->iddisciplina }}">{{ $array_disciplina[$i]->nombre }}</option>
                                    @else
                                    <option value="{{ $array_disciplina[$i]->iddisciplina }}">{{ $array_disciplina[$i]->nombre }}</option>
                                    @endif
                              @endfor
                        </select>
                  </div>

                  <div class="col-12 col-sm-6">
                        <select name="lstProfesor" id="lstProfesor" class="form-control">Profesor
                              <option selected value=""></option>
                              @for ($i = 0; $i < count($array_profesor); $i++) @if (isset($clase) and $array_profesor[$i]->idprofesor == $clase->fk_idprofesor)
                                    <option selected value="{{ $array_profesor[$i]->idprofesor }}">{{ $array_profesor[$i]->nombre }}</option>
                                    @else
                                    <option value="{{ $array_profesor[$i]->idprofesor }}">{{ $array_profesor[$i]->nombre }}</option>
                                    @endif
                              @endfor
                        </select>
                  </div>

                  <div class="col-12 col-sm-6">
                        <label for="txtPrecio">Precio: *</label>
                        <input type="text" name="txtPrecio" id="txtPrecio" class="form-control">
                  </div>


            </div>
      </form>

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
                        url: "{{ asset('admin/sistema/menu/eliminar') }}",
                        data: {
                              id: globalId
                        },
                        async: true,
                        dataType: "json",
                        success: function(data) {
                              if (data.err = "0") {
                                    msgShow("Registro eliminado exitosamente.", "success");
                                    $("#btnEnviar").hide();
                                    $("#btnEliminar").hide();
                                    $('#mdlEliminar').modal('toggle');
                              } else {
                                    msgShow("Error al eliminar", "success");
                              }
                        }
                  });
            }
      </script>
      @endsection