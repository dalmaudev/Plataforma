@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Enviar Correos Electronicos</h1>
@stop

@section('content')
<div class="container">
    <div id="events">
     
  </div>
  
  {!! Form::open(['route' => 'enviosend']) !!}
    <small>{!! Form::label('nombre', 'Seleccione Mensaje') !!}</small>
    {!! Form::select('mensaje', $msj, null,['class' => 'form-control mb-2']) !!}
    <small>{!! Form::label('nombre', 'Seleccion Id Cliente') !!}</small>
    {!! Form::text('caja', null, ['class' => 'form-control mb-2','id' => 'caja_valor', 'readonly']) !!}
    {!! Form::submit('Enviar Mensaje', ['class' => 'btn btn-primary btn-sm float-right mb-3']) !!}
    {!! Form::close() !!}
    
    <table id="example" class="display nowrap" width="100%">
        
      <thead>
        <tr>
          <th>#</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Telefono</th>
          <th>Email</th>
      </thead>


      <tbody>
          @foreach ($clientes as $cliente)
             <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->apellido}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->email}}</td>
            </tr> 
          @endforeach
      </tbody>
    </table>
   
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="https://nightly.datatables.net/select/css/select.dataTables.css?_=766c9ac11eda67c01f759bab53b4774d.css" rel="stylesheet" type="text/css" />
    <link href="https://nightly.datatables.net/buttons/css/buttons.dataTables.css?_=a271844a59b9e8a38259cc2846e81108.css" rel="stylesheet" type="text/css" />
    <style>
        body {
  font: 90%/1.45em "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
  color: #333;
  background-color: #fff;
}


    </style>
@stop

@section('js')
<script>
    $(document).ready( function () {
    var events = $('#events');
        var matriz;
    var table = $('#example').DataTable( {
        dom: 'Bfrtip',
        select: true,
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        buttons: [
            {
                
                text: 'Seleccion Clientes',
                action: function () {
                    var data = table.rows( { selected: true } ).data().pluck(0).toArray();
 
                    // events.prepend( '<div>'+data+'</div>' );
                    document.getElementById("caja_valor").value = data;
                   
                    
                }
            }
        ]
    } );
} );

    </script>

   

<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
<script src="https://nightly.datatables.net/select/js/dataTables.select.js?_=766c9ac11eda67c01f759bab53b4774d"></script>
<script src="https://nightly.datatables.net/buttons/js/dataTables.buttons.js?_=a271844a59b9e8a38259cc2846e81108"></script>
    
@stop