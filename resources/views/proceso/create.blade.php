@extends('adminlte::page')

@section('title', 'Asesoria | Crear Proceso')

@section('content_header')
    <h1>Crear Proceso</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'proceso.store']) !!}
            {!! Form::label('proceso', 'Nombre del Proceso') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control mb-2']) !!}
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            {!! Form::submit('Crear Proceso', ['class' => 'btn btn-primary float-right']) !!}
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