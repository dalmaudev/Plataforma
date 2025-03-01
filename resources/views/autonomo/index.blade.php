@extends('adminlte::page')

@section('title', 'Asesoria | Autonomo')

@section('content_header')
    <h1>Listado Autonomo</h1>
@stop

@section('content')
<table id="proc" class="table table-striped table-bordered display nowrap" style="width:100%">
    <thead>
        <tr>
            <th width="3px" align="center"><small>id</small> </th>
            <th><small>Nombre</small> </th>
            <th><small>Apellidos</small> </th>
            <th><small>Documento</small> </th>
            <th><small>Email</small> </th>
            <th><small>Telefono</small> </th>
            <th width="70px">Accion</th>
        </tr>
    </thead>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>



<script>
  $('#proc').DataTable( {
    "ajax": "{{route('docautonomo.autonomo')}}",
    responsive: true,
    "columns":[
        {data: 'id'},
        {data: 'nombre'},
        {data: 'apellido'},
        {data: 'documento'},
        {data: 'email'},
        {data: 'telefono'},
        {data: 'btn'},
    ],
    "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  } );
</script>
<script> console.log('Hi!'); </script>
@stop