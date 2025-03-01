@extends('adminlte::page')

@section('title', 'Asesoria | Crear Presento')

@section('content_header')
    <h1>Crear Presento<a class="btn btn-success btn-sm float-right" href="{{route('presento.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'presento.store']) !!}
            {!! Form::label('presento', 'Nombre Presento') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control mb-2']) !!}
            @error('nombre')
                <span class="text-danger font-weight-bold text-sm">{{ $message }}</span>
            @enderror
            {!! Form::submit('Actualizar Presento', ['class' => 'btn btn-primary float-right']) !!}
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