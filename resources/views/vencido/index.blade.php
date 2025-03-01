@extends('adminlte::page')

@section('title', 'Asesoria | Cliente')

@section('content_header')
    <h1>Listado Documento Vencido<a class="btn btn-success btn-sm float-right" href="{{route('cliente.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
    <hr>
    @if (session('info'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Enhorabuena!</strong> {{session('info')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
@stop

@section('content')
<table id="proc" class="table table-striped table-bordered display nowrap" style="width:100%">
    <thead>
        <tr>
            <th width="3px" align="center"><small>id</small> </th>
            <th><small>Nombre</small> </th>
            <th><small>Apellidos</small> </th>
            <th><small>DNI/NIE/PASAPORTE</small> </th>
            <th><small>FECHA VENCIDOS</small> </th>
            <th width="70px">Accion</th>
        </tr>
    </thead>
</table>
@stop


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    


    <script>

      $('#proc').DataTable( {
        "ajax": "{{route('docuvencido.vencidos')}}",
        responsive: true,
        "columns":[
            {data: 'id'},
            {data: 'nombre'},
            {data: 'apellido'},
            {data: 'documento'},
            {data: 'caducidaddoc'},
            {data: 'btn'},
        ],
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      } );
    </script>

    <script> console.log('Hi!'); </script>
@stop





