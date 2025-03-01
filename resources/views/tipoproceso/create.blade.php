@extends('adminlte::page')

@section('title', 'Asesoria | Crear Tipo de Proceso')

@section('content_header')
    <h1>Crear Tipo de Recurso<a class="btn btn-success btn-sm float-right" href="{{route('tipoproceso.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'tipoproceso.store']) !!}
            {!! Form::label('tipoproceso', 'Nombre Tipo de Recurso') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control mb-2']) !!}
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            {!! Form::submit('Crear Tipo de Proceso', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop