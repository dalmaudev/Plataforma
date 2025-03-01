@extends('adminlte::page')

@section('title', 'Asesoria | Mostrar Tipo de Proceso')

@section('content_header')
    <h1>Ver Recurso <a class="btn btn-success btn-sm float-right" href="{{route('tipoproceso.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre Tipo de Proceso</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="10px">{{$tipoproceso->id}}</td>
                    <td>{{$tipoproceso->nombre}}</td>
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