@extends('adminlte::page')

@section('title', 'Asesoria | Crear Especialista1')

@section('content_header')
    <h1>Crear Especialista<a class="btn btn-success btn-sm float-right" href="{{route('users.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'users.store']) !!}
            {!! Form::label('nombre', 'Nombre completo de Especialista') !!}
            {!! Form::text('name', null, ['class' => 'form-control mb-3', 'autofocus']) !!}
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control mb-3']) !!}
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            {!! Form::label('contraseña', 'Contraseña') !!}
            {!! Form::password
            ('password', ['class' => 'form-control mb-2']) !!}
            {!! Form::hidden('estado', 1) !!}
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            {!! Form::submit('Crear Nuevo Especialista', ['class' => 'btn btn-primary float-right']) !!}
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