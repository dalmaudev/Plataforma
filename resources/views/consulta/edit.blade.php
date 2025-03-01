@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Control de Consultas</h1>
@stop

@section('content')
{!! Form::model($consulta, ['route' => ['consulta.update', $consulta], 'method' => 'PUT']) !!}
{!! Form::open(['route' => 'consulta.store']) !!}
<div class="card">
    <div class="row">
<div class="col-3">
    <div class="form-group ml-4">
      <small>{!! Form::label('fecalert', 'Fecha de la Consulta') !!} </small>
      {!! Form::date('fecalert', \Carbon\Carbon::now() , ['class' => 'form-control']) !!}
      @error('fecalert')
            <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
        @enderror
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <small>{!! Form::label('consulta', 'Detalles de la Consulta') !!} <span class="text-danger"><strong>*</strong></span></small>
        {!! Form::text('consulta', $consulta->consulta, ['class' => 'form-control', 'autofocus']) !!}
        @error('consulta')
              <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
          @enderror
      </div>
</div>
</div>

</div>
{{-- {!! Form::hidden('cliente_id', $ide, ['class' => 'form-control mb-2']) !!} --}}
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Editar Consulta">
  </div>
{!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop