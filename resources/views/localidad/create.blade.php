@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Localidad</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'localidad.store']) !!}
            {!! Form::label('localidad', 'Nombre Localidad') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control mb-2']) !!}
            {!! Form::submit('Crear Localidad', ['class' => 'btn btn-primary']) !!}
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