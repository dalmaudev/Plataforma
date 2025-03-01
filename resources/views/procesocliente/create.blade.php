@extends('adminlte::page')

@section('title', 'Asesoria | Crear Proceso Cliente')

@section('content_header')
    <h1>Crear Proceso Cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            {!! Form::open(['route' => 'procesocliente.store']) !!}
            <div class="form-row">
                <div class="form-group col-md-4">
                  <small>{!! Form::label('tipoproceso_id', 'Tipo Proceso') !!}</small> 
                  {!! Form::select('tipoproceso_id', $tipoprocesos, null,['class' => 'form-control mb-2']) !!}
                </div>
               
                  {!! Form::hidden('cliente_id', $cliente, ['class' => 'form-control mb-2']) !!}
              
                <div class="form-group col-md-4">
                  <small>{!! Form::label('tipoproceso', 'Tipo de Proceso') !!}</small> 
                  {!! Form::select('proceso_id', $procesos, null,['class' => 'form-control mb-2']) !!}
                </div>
                <div class="form-group col-md-4">
                  <small>{!! Form::label('fecpresentado', 'Fecha Presentacion Proceso') !!} </small>
                  {!! Form::date('fecpresentado', null, ['class' => 'form-control mb-2']) !!}
              </div>
            </div>

            <div class="form-row">
              
              <div class="form-group col-md-4">
                  <small>{!! Form::label('desicion_id', 'Tipo de Proceso') !!}</small> 
                  {!! Form::select('desicion_id', $desicion, null,['class' => 'form-control mb-2']) !!}
              </div>
              <div class="form-group col-md-4">
                  <small>{!! Form::label('fecdesicion', 'Fecha Desicion Proceso') !!}</small> 
                  {!! Form::date('fecdesicion', null, ['class' => 'form-control mb-2']) !!}
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <small>{!! Form::label('user_id', 'Especialista') !!}</small> 
                {!! Form::select('user_id', $especialista, null,['class' => 'form-control mb-2']) !!}
              </div>
              <div class="form-group col-md-4">
                <small>{!! Form::label('pagoconsulta', 'Pago de la Consulta') !!}</small> 
                {!! Form::select('pagoconsulta', ['NO' => 'NO', 'SI' => 'SI'], null,['class' => 'form-control mb-2']) !!}
              </div>
              <div class="form-group col-md-4">
                <small>{!! Form::label('pagoconsulta', 'Pago de la Consulta') !!}</small> 
                {!! Form::select('pagoconsulta', ['NO' => 'NO', 'SI' => 'SI'], null,['class' => 'form-control mb-2']) !!}
              </div>
              
              <div class="form-group col-md-4">
                <small>{!! Form::label('precioproceso', 'Precio Proceso') !!}</small> 
                {!! Form::text('precioproceso', null, ['class' => 'form-control mb-2']) !!}
              </div>
              <div class="form-group col-md-4">
                <small>{!! Form::label('abono', 'Abono') !!}</small> 
                {!! Form::text('abono', null, ['class' => 'form-control mb-2']) !!}
              </div>
              <div class="form-group col-md-4">
                <small>{!! Form::label('pendiente', 'pendiente') !!}</small> 
                {!! Form::text('pendiente', null, ['class' => 'form-control mb-2']) !!}
              </div>
              <div class="form-group col-md-12">
                <small>{!! Form::label('observacion', 'Observacion') !!}</small> 
                {!! Form::text('observacion', null, ['class' => 'form-control mb-2']) !!}
              </div>
            </div>



            

            {!! Form::submit('Crear Proceso Cliente', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>

    <script>
      function sumar() {
          var a = parseInt(document.getElementById("precio").value) || 0;
          var b = parseInt(document.getElementById("abono").value) || 0;
          total = (parseInt(a) - parseInt(b));
          document.getElementById('pendiente').value = total;
      }

  </script>