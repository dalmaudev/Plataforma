@extends('adminlte::page')

@section('title', 'Nuevo Cliente')

@section('content_header')
    <h1>Nuevo Cliente</h1>
@stop

@section('content')
{!! Form::open(['route' => 'cliente.store', 'files' => true]) !!}
    <div class="form-row">
      <div class="form-group col-md-6">
        {!! Form::label('nombre', 'Nombre Completo') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'autofocus' ]) !!}
      </div>
      <div class="form-group col-md-6">
        {!! Form::label('apellido', 'Apellido Completo') !!}  
        {!! Form::text('apellido', null, ['class' => 'form-control' ]) !!}
      </div>
    </div>
    <div class="form-group">
        {!! Form::label('direccion', 'Dirección') !!}  
        {!! Form::text('direccion', null, ['class' => 'form-control' ]) !!}
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        {!! Form::label('provicia_id', 'Provicia') !!}  
        {!! Form::select('provincia_id', $provincia, null,['class' => 'form-control mb-2']) !!}
      </div>
      <div class="form-group col-md-4">
        {!! Form::label('localidad', 'Localidad') !!}  
        {!! Form::select('localidad_id', $localidades, null,['class' => 'form-control mb-2']) !!}
      </div>
      <div class="form-group col-md-2">
        {!! Form::label('cp', 'C.P.') !!} 
        {!! Form::text('cp', null, ['class' => 'form-control' ]) !!}
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
          <small>{!! Form::label('documento', 'Tipo Documento') !!}  </small>
          {!! Form::select('documento_id', $documentos, null,['class' => 'form-control mb-2']) !!}
        </div>
        <div class="form-group col-md-3">
          <small>{!! Form::label('documento', 'Nº Documento') !!}  </small>
          {!! Form::text('documento', null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group col-md-3">
          <small>{!! Form::label('caducidaddoc', 'Fecha Caducidad Documento') !!} </small>
          {!! Form::date('caducidaddoc', null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group col-md-3">
           <small>{!! Form::label('nacimiento', 'Imagen Documento') !!} </small><br>
            {!! Form::file('foto') !!}
          </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3">
          <small>{!! Form::label('pais_id', 'Nacionalidad') !!}  </small>
          {!! Form::select('pais_id', $paises, null,['class' => 'form-control mb-2']) !!}
        </div>
        <div class="form-group col-md-3">
          <small>{!! Form::label('telefono', 'Telefono') !!}  </small>
          {!! Form::text('telefono', null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group col-md-3">
          <small>{!! Form::label('email', 'Correo Electronico') !!} </small>
          {!! Form::text('email', null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group col-md-3">
           <small>{!! Form::label('estadocivil_id', 'Estado Civil') !!} </small>
           {!! Form::select('estadocivil_id', $estadocivil, null,['class' => 'form-control mb-2']) !!}
          </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3">
          <small>{!! Form::label('hijo', 'Hijos') !!}  </small>
          {!! Form::selectRange('hijo', 0, 20, null,['class' => 'form-control mb-2'])!!}
        </div>
        <div class="form-group col-md-3">
          <small>{!! Form::label('nombrepadre', 'Nombre del Padre') !!}  </small>
          {!! Form::text('nombrepadre', null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group col-md-3">
          <small>{!! Form::label('nombremadre', 'Nombre de la Madre') !!} </small>
          {!! Form::text('nombremadre', null, ['class' => 'form-control' ]) !!}
        </div>
        <div class="form-group col-md-3">
            <small>{!! Form::label('nacimiento', 'Fecha de Nacimiento') !!} </small>
            {!! Form::date('nacimiento', null, ['class' => 'form-control' ]) !!}
          </div>
      </div>
      



    {{-- --------------------------------------------------------------- --}}

    <div class="form-row">
      <div class="form-group col-md-3">
        <small>{!! Form::label('tipoproceso_id', 'Tipo Proceso') !!}</small> 
        {!! Form::select('tipoproceso_id', $tipoprocesos, null,['class' => 'form-control mb-2']) !!}
      </div>
      <div class="form-group col-md-3">
        <small>{!! Form::label('tipoproceso', 'Tipo de Proceso') !!}</small> 
        {!! Form::select('proceso_id', $procesos, null,['class' => 'form-control mb-2']) !!}
      </div>
      <div class="form-group col-md-3">
        <small>{!! Form::label('fecpresentado', 'Fecha Presentacion Proceso') !!} </small>
        {!! Form::date('fecpresentado', null, ['class' => 'form-control mb-2']) !!}
    </div>
    <div class="form-group col-md-3">
      <small>{!! Form::label('desicion_id', 'Tipo de Proceso') !!}</small> 
      {!! Form::select('desicion_id', $desicion, null,['class' => 'form-control mb-2']) !!}
  </div>
  </div>

  
<div class="form-row">
  <div class="form-group col-md-4">
    <small>{!! Form::label('fecdesicion', 'Fecha Desicion Proceso') !!}</small> 
    {!! Form::date('fecdesicion', null, ['class' => 'form-control mb-2']) !!}
  </div>
  <div class="form-group col-md-4">
    <small>{!! Form::label('user_id', 'Especialista') !!}</small> 
    {!! Form::select('user_id', $especialista, null,['class' => 'form-control mb-2']) !!}
  </div>
  <div class="form-group col-md-4">
    <small>{!! Form::label('pagoconsulta', 'Pago de la Consulta') !!}</small> 
    {!! Form::select('pagoconsulta', ['NO' => 'NO', 'SI' => 'SI'], null,['class' => 'form-control mb-2']) !!}
  </div>
    <div class="form-group col-md-12">
      {!! Form::label('observaciones', 'Observacion') !!}  
      {!! Form::text('observaciones', null, ['class' => 'form-control' ]) !!}
    </div>
</div>

    <button type="submit" class="btn btn-primary float-right">Grabar Información</button>
{!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@stop