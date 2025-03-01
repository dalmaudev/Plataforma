@extends('adminlte::page')

@section('title', 'Asesoria | Crear Recurso')

@section('content_header')
    <h1>Crear Recurso<a class="btn btn-success btn-sm float-right" href="{{route('recurso.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'recurso.store']) !!}
            {!! Form::label('recurso', 'Nombre Recurso') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control mb-2']) !!}
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            {!! Form::submit('Crear Recurso', ['class' => 'btn btn-primary float-right']) !!}
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