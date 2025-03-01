@extends('adminlte::page')

@section('title', 'Asesoria | Procesos Cliente')

@section('content_header')
    <h1>Listado de los Procesos <a class="btn btn-dark btn-sm float-right" href="{{route('procesocliente.create')}}">Crear Proceso Cliente</a></h1>
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
    <style>
        td {
            font-size: 12px;

            }
    </style>
@stop


@section('content')
<table id="proc" class="table table-striped table-bordered table-hover display nowrap" style="width:100%">
    <thead>
        <tr>
            <th width="1px"><small>id</small> </th>
            <th width="10px"><small>Tipo Proceso</small> </th>
            <th width="10px"><small>Proceso</small> </th>
            <th width="10px"><small>Nombre Cliente</small> </th>
            <th width="10px"><small>Apellido Cliente</small> </th>
            <th width="30px"><small>Especialista</small> </th>
            <th width="30px"><small>Telefono</small> </th>
            <th width="30px"><small>FecPrePro</small> </th>
            <th width="30px"><small>Desicion Proceso</small> </th>
            <th width="1px"></th>
        </tr>
    </thead>
</table>
@stop


@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js"></script>
    
    <script>

      $('#proc').DataTable( {
        "ajax": "{{route('docprocesoclientes.procesocliente')}}",
        "columns":[
            {data: 'id'},
            {data: 'tipoproceso'},
            {data: 'proceso'},
            {data: 'ncliente'},
            {data: 'acliente'},
            {data: 'especialista'},
            {data: 'telefono'},
            
            {data: 'fecpresentado'},
            {data: 'desicionPro'},
            {data: 'btn'},
        ],
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        responsive: true,
        dom: 'Bfrtilp',
        buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
      } );
    </script>

    <script> console.log('Hi!'); </script>
@stop