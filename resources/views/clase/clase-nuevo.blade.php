@extends("plantilla")
@section('titulo', "$titulo")
@section('scripts')
<script>
      globalId = '<?php echo isset($clase->idclase) && $clase->idclase > 0 ? $clase->idclase : 0; ?>';
      <?php $globalId = isset($clase->idclase) ? $clase->idclase : "0"; ?>
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
      print_r($cliente);
      exit;
      ?>

      <form id="form1" method="POST">
            <div class="row">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                  <input type="hidden" id="id" name="id" class="form-control" value="{{$globalId}}" required>

                  <div class="col-12 col-sm-6">
                        <label for="lstDisciplina">Disciplina: </label>
                        <select name="lstDisciplina" id="lstDisciplina" class="form-control">Disciplina
                              <option selected value=""></option>
                              @for ($i = 0; $i < count($array_disciplina); $i++) 
                              @if (isset($clase) and $array_disciplina[$i]->iddisciplina == $clase->fk_iddisciplina)
                                    <option selected value="{{ $array_disciplina[$i]->iddisciplina }}">{{ $array_disciplina[$i]->nombre }}</option>
                                    @else
                                    <option value="{{ $array_disciplina[$i]->iddisciplina }}">{{ $array_disciplina[$i]->nombre }}</option>
                                    @endif
                              @endfor
                        </select>
                  </div>

                  <div class="col-12 col-sm-6">
                        <label for="lstProfesor">Profesor: </label>
                        <select name="lstProfesor" id="lstProfesor" class="form-control">Profesor
                              <option selected value=""></option>
                              @for ($i = 0; $i < count($array_profesor); $i++) 
                              @if (isset($clase) and $array_profesor[$i]->idprofesor == $clase->fk_idprofesor)
                                    <option selected value="{{ $array_profesor[$i]->idprofesor }}">{{ $array_profesor[$i]->nombre }}</option>
                                    @else
                                    <option value="{{ $array_profesor[$i]->idprofesor }}">{{ $array_profesor[$i]->nombre }}</option>
                                    @endif
                              @endfor
                        </select>
                  </div>

                  <div class="col-12 col-sm-6">
                        <label for="txtFecha_desde">Fecha desde: *</label>
                        <input type="datetime-local" name="txtFecha_desde" id="txtFecha_desde" class="form-control" value='{{$clase->fecha_desde}}'>
                  </div>
                  
                  <div class="col-12 col-sm-6">
                        <label for="txtFecha_hasta">Fecha hasta: *</label>
                        <input type="datetime-local" name="txtFecha_hasta" id="txtFecha_hasta" class="form-control" value="{{$clase->fecha_hasta}}">
                  </div>

                  <div class="col-12 col-sm-6">
                        <label for="lstModalidad">Modalidad: </label>
                        <select name="lstModalidad" id="lstModalidad" class="form-control">Modalidad
                              <option selected value=""></option>
                              @for ($i = 0; $i < count($array_modalidad); $i++) 
                              @if (isset($clase) and $array_modalidad[$i]->idmodalidad == $clase->fk_idmodalidad)
                                    <option selected value="{{ $array_modalidad[$i]->idmodalidad }}">{{ $array_modalidad[$i]->nombre }}</option>
                                    @else
                                    <option value="{{ $array_modalidad[$i]->idmodalidad }}">{{ $array_modalidad[$i]->nombre }}</option>
                                    @endif
                              @endfor
                        </select>
                  </div>

                  <div class="col-12 col-sm-6">
                        <label for="txtDuracion">Duracion: *</label>
                        <input type="text" name="txtduracion" id="txtduracion" class="form-control" value="{{$clase->duracion}}">
                  </div>

                  <div class="col-12 col-sm-6">
                        <label for="txtDescripcion">Descripción *</label>
                        <textarea name="txtDescripcion" id="txtDescripcion" class="form-control txtarea"> {{$clase->descripcion}} </textarea>
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
                        url: "{{ asset('admin/clase/eliminar') }}",
                        data: {
                              id: globalId
                        },
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
                  });
            }
      </script>
      @endsection