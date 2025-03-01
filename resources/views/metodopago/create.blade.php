@extends('adminlte::page')

@section('title', 'Asesoria | Crear Pais')

@section('content_header')
    <h1>Crear Metodo de pago</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'metodopago.store']) !!}
            {!! Form::label('metodopago', 'Metodo de pago') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control mb-2', 'autofocus']) !!}
            @error('nombre')
                <small><span class="text-danger">{{ $message }}</span></small>
                <br>
            @enderror
            {!! Form::label('observacion', 'Observacion') !!}
            {!! Form::text('observacion', null, ['class' => 'form-control mb-2']) !!}
            {!! Form::submit('Crear Metodo de pago', ['class' => 'btn btn-primary float-right']) !!}
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