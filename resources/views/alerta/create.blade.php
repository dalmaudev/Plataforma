@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Dashboard</h1> --}}
@stop

@section('content')
{!! Form::open(['route' => 'alerta.store']) !!}
<div class="card">
    <div class="card-body row">
      <div class="col-5 text-center d-flex align-items-center justify-content-center">
        <div class="">
          <h2><strong>Alerta</strong></h2>
          <p class="lead mb-5">{{$nombre->nombre}} {{$nombre->apellido}}<br>
            Teléfono: {{$nombre->telefono}}
          </p>
        </div>
      </div>

      <div class="col-7">
        <div class="form-group">
          <small>{!! Form::label('titulo', 'Titulo de la Alerta') !!} <span class="text-danger"><strong>*</strong></span></small>
          {!! Form::text('titulo', null, ['class' => 'form-control form-control-sm', 'autofocus']) !!}
          @error('titulo')
                <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
            @enderror
        </div>
        {!! Form::hidden('cliente_id', $cliente, ['class' => 'form-control form-control-sm mb-2']) !!}
        <div class="form-group">
            <small>{!! Form::label('cuerpo', 'Mensaje') !!} <span class="text-danger"><strong>*</strong></span></small>
            {!! Form::text('cuerpo', null, ['class' => 'form-control form-control-sm']) !!}
            {{-- {!! Form::textarea('cuerpo', null, ['class' => 'form-control','rows' => 5, 'name' => 'txt','id'  => 'txt','onkeypress' => "return nameFunction(event);"]) !!}--}}
    </div>

        <div class="form-group">
            <small>{!! Form::label('fecha', 'Fecha de Cumplimiento') !!} </small>
            {!! Form::date('fecalert', \Carbon\Carbon::now() , ['class' => 'form-control form-control-sm']) !!}
        </div>
<input type="hidden" value="{{ Auth::user()->id }}" name="deuser_id">
        <div class="form-group">
            <small>{!! Form::label('parauser_id', 'Para Especialista') !!} </small>
            {!! Form::select('parauser_id', $list, null, ['class' => 'form-control form-control-sm']) !!}
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Crear Alerta">
        </div>
      </div>
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
