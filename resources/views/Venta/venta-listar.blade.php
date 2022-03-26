@extends('plantilla')

@section('titulo', $titulo)

@section('scripts')
<link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/datatables.min.js') }}"></script>
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
    <li class="breadcrumb-item active">Venta</li>
</ol>
<ol class="toolbar">
    <li class="btn-item"><a title="Nuevo" href="/admin/venta/nuevo" class="fa fa-plus-circle" aria-hidden="true"><span>Nuevo</span></a></li>
    <li class="btn-item"><a title="Recargar" href="#" class="fa fa-refresh" aria-hidden="true" onclick='window.location.replace("/admin/ventas");'><span>Recargar</span></a></li>
</ol>
@endsection
@section('contenido')
<?php
if (isset($msg)) {
    echo '<div id = "msg"></div>';
    echo '<script>msgShow("' . $msg["MSG"] . '", "' . $msg["ESTADO"] . '")</script>';
}
?>
<table id="grilla" class="display">
    <thead>
        <tr>
            <th></th>
            <th>fecha</th>
            <th>cliente</th>
            <th>precio</th>
            <th>medio de pago</th>
            <th>vencimiento</th>
        </tr>
    </thead>
</table> 
<script>
	var dataTable = $('#grilla').DataTable({
            "processing": true,
            "serverSide": true,
            "bFilter": true,
            "bInfo": true,
            "bSearchable": true,
            "pageLength": 25,
            "order": [[ 1, "asc" ]],
            "ajax": "{{ route('ventas.cargarGrilla') }}"
	});
</script>
@endsection