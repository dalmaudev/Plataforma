@extends('adminlte::page')

@section('title', 'Consulta LLamada')

@section('content_header')
    {{-- <h1>Datos de la Consulta de LLamadas</h1> --}}
@stop

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Datos Consulta de LLamadas</h3>
      <div class="card-tools">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->
        <span class="badge badge-success">Cliente id: {{$cliente->id}}</span>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-sm table-bordered">
            <tbody>
              <tr class="table-warning" >
                <th width="10%">Nombre Cliente</th>
                <td>{{ucfirst(trans($cliente->nombre))}} {{ucfirst(trans($cliente->apellido))}}</td>
              </tr>
              <tr>
                <th class="table-success">Telefono</th>
                <td class="table-success">{{$cliente->telefono}}</td>
              </tr>
              <tr>
                <th class="table-primary">Fecha Llamada</th>
                <td class="table-primary">{{$llamada->fecllam}}</td>
              </tr>
              <tr>
                <th  class="table-success">Consulta</th>
                <td  class="table-success">{{ucfirst(trans($llamada->consulta))}}</td>
                
              </tr>
            </tbody>
          </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <a href="{{route('llamada.show', $cliente->id)}}" class="btn btn-primary btn-sm float-right"><i class="fas fa-arrow-circle-left"></i>  Volver</a>
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->



  <div>
    
  </div>

  
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop