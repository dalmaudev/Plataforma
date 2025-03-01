@extends('adminlte::page')

@section('title', 'Mostrar Cliente')

@section('content_header')
    <h1>Mostrar Cliente<a class="btn btn-success btn-sm float-right" href="{{route('cliente.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
{!! Form::model($cliente, ['route' => ['cliente.update', $cliente],'method' => 'PUT']) !!}

    <div class="form-row">
      <div class="form-group col-md-6">
        <small>{!! Form::label('nombre', 'Nombre Completo') !!}</small>
        {!! Form::text('nombre', null, ['class' => 'form-control', 'readonly' ]) !!}
      </div>
      <div class="form-group col-md-6">
        <small>{!! Form::label('apellido', 'Apellido Completo') !!}  </small>
        {!! Form::text('apellido', null, ['class' => 'form-control','readonly' ]) !!}
      </div>
    </div>
    <div class="form-group">
      <small>{!! Form::label('direccion', 'Dirección') !!}</small> 
        {!! Form::text('direccion', null, ['class' => 'form-control' ,'readonly' ]) !!}
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <small>{!! Form::label('provicia_id', 'Provicia') !!}  </small>
        {!! Form::select('provincia_id', $provincia, null,['class' => 'form-control mb-2' ,'readonly']) !!}
      </div>
      <div class="form-group col-md-4">
        <small>{!! Form::label('localidad', 'Localidad') !!}  </small>
        {!! Form::select('localidad_id', $localidades, null,['class' => 'form-control mb-2' ,'readonly']) !!}
      </div>
      <div class="form-group col-md-2">
        <small>{!! Form::label('cp', 'C.P.') !!}</small> 
        {!! Form::text('cp', null, ['class' => 'form-control' ,'readonly' ]) !!}
      </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
          <small>{!! Form::label('documento', 'Tipo Documento') !!}  </small>
          {!! Form::select('documento_id', $documentos, null,['class' => 'form-control mb-2' ,'readonly']) !!}
        </div>
        <div class="form-group col-md-3">
          <small>{!! Form::label('documento', 'Nº Documento') !!}  </small>
          {!! Form::text('documento', null, ['class' => 'form-control' ,'readonly']) !!}
        </div>
        <div class="form-group col-md-3">
          <small>{!! Form::label('caducidaddoc', 'Fecha Caducidad Documento') !!} </small>
          {!! Form::date('caducidaddoc', null, ['class' => 'form-control' ,'readonly']) !!}
        </div>
        <div class="form-group col-md-3">
           <small>{!! Form::label('imagen', 'Imagen Documento') !!} </small><br>
            
            <a target="_blank" href="/archivo/{{$cliente->foto}}" class="btn btn-success btn-sm">Ver Documento</a>
          </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3">
          <small>{!! Form::label('pais_id', 'Nacionalidad') !!}  </small>
          {!! Form::select('pais_id', $paises, null,['class' => 'form-control mb-2','readonly']) !!}
        </div>
        <div class="form-group col-md-3">
          <small>{!! Form::label('telefono', 'Telefono') !!}  </small>
          {!! Form::text('telefono', null, ['class' => 'form-control' ,'readonly']) !!}
        </div>
        <div class="form-group col-md-3">
          <small>{!! Form::label('email', 'Correo Electronico') !!} </small>
          {!! Form::text('email', null, ['class' => 'form-control' ,'readonly']) !!}
        </div>
        <div class="form-group col-md-3">
           <small>{!! Form::label('estadocivil_id', 'Estado Civil') !!} </small>
           {!! Form::select('estadocivil_id', $estadocivil, null,['class' => 'form-control mb-2','readonly']) !!}
          </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-3">
          <small>{!! Form::label('hijo', 'Hijos') !!}  </small>
          {!! Form::selectRange('hijo', 0, 20, null,['class' => 'form-control mb-2','readonly'])!!}
        </div>
        <div class="form-group col-md-3">
          <small>{!! Form::label('nombrepadre', 'Nombre del Padre') !!}  </small>
          {!! Form::text('nombrepadre', null, ['class' => 'form-control' ,'readonly']) !!}
        </div>
        <div class="form-group col-md-3">
          <small>{!! Form::label('nombremadre', 'Nombre de la Madre') !!} </small>
          {!! Form::text('nombremadre', null, ['class' => 'form-control' ,'readonly']) !!}
        </div>
        <div class="form-group col-md-3">
            <small>{!! Form::label('fecnac', 'Fecha de Nacimiento') !!} </small>
            {!! Form::date('fecnac', null, ['class' => 'form-control' ,'readonly']) !!}
        </div>
        <div class="form-group col-md-12">
          <small>{!! Form::label('observaciones', 'Observacion') !!}  </small>
          {!! Form::text('observaciones', null, ['class' => 'form-control' ,'readonly']) !!}
        </div>
      </div>

      
{!! Form::close() !!}
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop