@extends('adminlte::page')

@section('title', 'Asesoria | Documento')

@section('content_header')
    <h1>Listado de Documento <a class="btn btn-dark btn-sm float-right" href="{{route('documento.create')}}">Crear Documento</a></h1>
    <hr>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
@stop

@section('content')
<table id="proc" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th width="3px">id</th>
            <th>Nombre de Documento</th>
            <th width="3px">Mostrar</th>
            <th width="3px">Editar</th>
            <th width="3px">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($documentos as $documento)
          <tr>
            <td>{{$documento->id}}</td>
            <td>{{$documento->nombre}}</td>
            <td><a class="btn btn-info btn-sm" href="{{ route('documento.show', $documento) }}">Mostrar</a></td>
            <td><a class="btn btn-primary btn-sm" href="{{ route('documento.edit', $documento) }}">Editar</a> </td>
            <td><form action="{{route('documento.destroy', $documento)}}" method="POST"> 
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form></td>
          </tr>  
        @endforeach
    </tbody>
</table>
@stop


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
  $('#proc').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    }
  });
});
    </script>
    <script> console.log('Hi!'); </script>
@stop