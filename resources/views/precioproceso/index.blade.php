@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>index</h1>
@stop

@section('content')
    <table class="table table-striped">
        <thead>
            <th>#</th>
            <th>Nombre Proceso</th>
            <th>Precio Proceso</th>
            <th>Observacion</th>
        </thead>
        @foreach ($procesos as $proceso)
            <tr>
                <td>{{$proceso->id}}</td>
                <td>{{$proceso->nombre}}</td>
                <td>{{$proceso->precio}}</td>
                <td>{{$proceso->observacion}}</td>
                <td>
                    <a href="{{route('precioproceso.show',$proceso->id)}}" class="btn btn-success btn-sm float-right mr-2" title="Mostrar"><i class="far fa-eye"></i></a>
                    <a href="{{route('precioproceso.edit', $proceso->id)}}" class="btn btn-danger btn-sm float-right  mr-2" title="Editar"><i class="fa fa-pen"></i></a>
                </td>
            </tr>  
        @endforeach
        
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop