@extends('adminlte::page')

@section('title', 'Asesoria | Crear Sexo')

@section('content_header')
    <h1>Crear Sexo<a class="btn btn-success btn-sm float-right" href="{{route('sexo.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'sexo.store']) !!}
            {!! Form::label('sexo', 'Nombre Sexo') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control mb-2']) !!}
            @error('nombre')
                <span class="text-danger font-weight-bold text-sm">{{ $message }}</span>
            @enderror
            {!! Form::submit('Actualizar Sexo', ['class' => 'btn btn-primary float-right']) !!}
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