@extends('adminlte::page')

@section('title', 'Mostrar Precio Proceso')

@section('content_header')
    <h1>Mostrar Precio Proceso</h1>
@stop

@section('content')

    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Mostrar Precio Proceso</h3><a class="btn btn-primary btn-sm float-right" href="{{route('precioproceso.index')}}"><i class="far fa-hand-point-left"></i> Volver</a> 
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
         
          <tbody>
            <tr>
              <td WIDTH="10%" >Id</td>
              <td>{{$proceso->id}}</td>
            </tr>
            <tr>
              <td>Nombre Proceso</td>
              <td>{{$proceso->nombre}}</td>
            </tr>
            <tr>
              <td>Precio Proceso</td>
              <td>{{$proceso->precio}} €</td>
            </tr>
            <tr>
              <td>Observacion</td>
              <td>{{$proceso->observacion}} </td>
            </tr>
          </tbody>
        </table>
        
      </div>
     
        
     
      

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop