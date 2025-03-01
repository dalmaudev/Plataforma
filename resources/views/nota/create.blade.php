@extends('adminlte::page')

@section('title', 'Asesoria | Crear Nueva Nota')

@section('content_header')
    <h1>Crear Nueva Nota<a class="btn btn-success btn-sm float-right" href="{{route('notas.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'notas.store']) !!}
            <small> {!! Form::label('nota', 'Titulo de nota') !!}</small>
            {!! Form::text('titulo', null, ['class' => 'form-control form-control-sm  mb-3']) !!}
            @error('titulo')
                <span class="text-danger font-weight-bold text-sm">{{ $message }}</span>
            @enderror
            <small>{!! Form::label('nota', 'Descripción de la nota') !!}</small>
            {!! Form::text('cuerpo', null, ['class' => 'form-control form-control-sm mb-3']) !!}

            <small>{!! Form::label('nota', 'Tipo de Nota') !!}</small>
            {!! Form::select('alert', ['danger' => 'Urgente', 'info' => 'Información', 'warning' => 'Precaución', 'success' => 'Informativa'],null,['class' => 'form-control form-control-sm mb-3'])!!}
            
            <small>{!! Form::label('parauser_id', 'Para Especialista') !!}</small>
            {!! Form::select('parauser_id', $users, null, ['class' => 'form-control form-control-sm mb-3']) !!}

            <small>{!! Form::label('activo', 'Activo') !!}</small>
            {!! Form::checkbox('activo', 1, null, ['class' => 'mr-1'  ]) !!}
            {{-- {!! Form::select('activo', $users, null, ['class' => 'form-control form-control-sm mb-3']) !!} --}}

            {!! Form::hidden('deuser_id', auth()->user()->id , ['class' => 'form-control form-control-sm mb-3']) !!}
            {!! Form::submit('Crear Nueva Nota', ['class' => 'btn btn-primary float-right']) !!}
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