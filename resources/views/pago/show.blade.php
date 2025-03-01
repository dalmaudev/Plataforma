@extends('adminlte::page')

@section('title', 'Asesoria | Mostrar Proceso')

@section('content_header')
    <h1>Ver Metodo de Pago <a class="btn btn-success btn-sm float-right" href="{{route('pago.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre del Metodo de Pago</th>
                    <th scope="col">Observacion</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="10px">{{$pago->id}}</td>
                    <td>{{$pago->nombre}}</td>
                    <td>{{$pago->observacion}}</td>
                  </tr>
                  
                 
                </tbody>
              </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    
@stop