@extends('adminlte::page')

@section('title', 'Asesoria | Crear Desición')

@section('content_header')
    <h1>Crear Desición</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'desicion.store']) !!}
            {!! Form::label('desicion', 'Nombre de la Desición') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control mb-2']) !!}
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            {!! Form::submit('Crear Desición', ['class' => 'btn btn-primary float-right']) !!}
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