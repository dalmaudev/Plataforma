@extends('adminlte::page')

@section('title', 'Asesoria | Metodo de pago')

@section('content_header')
    <h1>Listado Metodos de Pago 
      @if(Auth::user()->hasRole('Admin'))
        <a class="btn btn-dark btn-sm float-right" href="{{route('metodopago.create')}}">Crear Metodo de Pago</a></h1>
      @endif
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
@stop

@section('content')
<table id="proc" class="table table-striped table-bordered display nowrap" style="width:100%">
    <thead>
        <tr>
            <th width="3px">id</th>
            <th>Nombre Metodo de Pago</th>
            <th width="70px"></th>
        </tr>
    </thead>
</table>
@stop


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script>

      $('#proc').DataTable( {
        "ajax": "{{route('presentor.data')}}",
        "columns":[
            {data: 'id'},
            {data: 'nombre'},
            {data: 'btn'},
        ],
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      } );
    </script>

    <script> console.log('Hi!'); </script>
@stop