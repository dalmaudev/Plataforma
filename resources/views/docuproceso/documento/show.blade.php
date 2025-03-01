@extends('adminlte::page')

@section('title', 'Asesoria | Mostrar Proceso')

@section('content_header')
    <h1>Ver Documento <a class="btn btn-success btn-sm float-right" href="{{route('documento.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre de Documento</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td width="10px">{{$documento->id}}</td>
                    <td>{{$documento->nombre}}</td>
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