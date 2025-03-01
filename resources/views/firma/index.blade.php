@extends('adminlte::page')

@section('title', 'Firma')

@section('content_header')
    <h1>Firma Documentos</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
@stop

@section('content')
    <!-- <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($clientes as $cliente)
                   <tr>
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->apellido}}</td>
                    <td>{{$cliente->email}}</td>
                    <td width="10px"><a href="{{route('signaturepad.show', $cliente)}}" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="fas fa-signature"></i></a></td>
                  </tr>   
                  @endforeach
                  
                  
               
                </tbody>
              </table>
        </div>
    </div> -->
    <table id="proc" class="table table-striped table-bordered display nowrap" style="width:100%">
    <thead>
        <tr>
            <th width="3px" align="center"><small>id</small> </th>
            <th><small>Nombre</small> </th>
            <th><small>Apellidos</small> </th>
            <th><small>EMAIL</small> </th>
            <th width="10px"><small></small> </th>
        
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
        "ajax": "{{route('docfirma.firma')}}",
        responsive: true,
        "columns":[
            {data: 'id'},
            {data: 'nombre'},
            {data: 'apellido'},
            {data: 'email'},
            {data: 'btn'},
        ],
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
      } );
    </script>

    <script> console.log('Hi!'); </script>
@stop