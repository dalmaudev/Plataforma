@extends('adminlte::page')

@section('title', 'Nuevo Cliente')

@section('content_header')
    <h1>Nuevo Cliente</h1>
@stop

@section('content')

    {!! Form::open(['route' => 'cliente.store', 'files' => true, 'name' => 'frm1']) !!}
    {!!Form::hidden('user_id', auth()->id())!!}
    <div class="form-row">
        <div class="form-group col-md-6">
            <small>{!! Form::label('nombre', 'Nombre Completo') !!} <span class="text-danger"><strong>*</strong></span></small>
            {!! Form::text('nombre', null, ['class' => 'form-control', 'autofocus']) !!}
            @error('nombre')
                <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <small>{!! Form::label('apellido', 'Apellido Completo') !!} <span class="text-danger"><strong>*</strong></span></small>
            {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
            @error('apellido')
                <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('direccion', 'Dirección') !!}
        {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
    </div>


    <div class="form-row">
        <div class="form-group col-md-2">
            <small>{!! Form::label('provicia_id', 'Provincia') !!} <span class="text-danger"><strong>*</strong></span></small>
            {!! Form::select('provincia_id', $provincia, null, ['id' => 'state', 'class' => 'form-control mb-2']) !!}
            @error('provincia_id')
                <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
            @enderror
        </div>
        <div class="form-group col-md-2">
          <small>{!! Form::label('localidad', 'Localidad') !!} <span class="text-danger"><strong>*</strong></span></small>
            {!! Form::select('localidad_id', ['placeholder' => 'Selecciona Localidad'], null, ['id' => 'town', 'class' => 'form-control mb-2']) !!}
            @error('localidad_id')
                <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
            @enderror
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('cp', 'C.P.') !!}
            {!! Form::text('cp', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('documento', 'Tipo Documento') !!} </small>
            {!! Form::select('documento_id', $documentos, null, ['class' => 'form-control mb-2']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('documento', 'Nº Documento') !!} <span class="text-danger"><strong>*</strong></span></small>
              {!! Form::text('documento', null, ['class' => 'form-control']) !!}
              @error('documento')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
              @enderror
          </div>
          <div class="form-group col-md-2">
            <small>{!! Form::label('caducidaddoc', 'Fecha Caducidad Documento') !!} </small>
            {!! Form::date('caducidaddoc', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-row">

        
        
        <div class="form-group col-md-2">
            <small>{!! Form::label('fecingresoespaña', 'Fecha Ingreso España') !!} </small>
            {!! Form::date('fecingresoespaña', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('sexo', 'Sexo') !!} </small><br>
            {!! Form::select('sexo_id', $sexo, null, ['class' => 'form-control mb-2']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('pais_id', 'Nacionalidad') !!} </small>
            {!! Form::select('pais_id', $paises, null, ['class' => 'form-control mb-2']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('telefono', 'Telefono') !!} </small>
            {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('movil', 'Movil') !!} </small>
            {!! Form::text('movil', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('estadocivil_id', 'Estado Civil') !!} </small>
            {!! Form::select('estadocivil_id', $estadocivil, null, ['class' => 'form-control mb-2']) !!}
        </div>
        
    </div>
    <div class="form-row">
    <div class="form-group col-md-2">
            <small>{!! Form::label('profesion', 'Profesión') !!} </small>
            {!! Form::text('profesion', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('email', 'Correo Electronico') !!} </small>
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('nombrepadre', 'Nombre del Padre') !!} </small>
            {!! Form::text('nombrepadre', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('nombremadre', 'Nombre de la Madre') !!} </small>
            {!! Form::text('nombremadre', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('nacimiento', 'Fecha de Nacimiento') !!} </small>
            {!! Form::date('fecnac', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('conocio', '¿Cómo nos has conocido?') !!} </small>
            {!! Form::text('conocio', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-1">
            <small>{!! Form::label('hijo', 'Hijos') !!} </small><br>
            <a class="btn btn-secondary btn-block" data-toggle="collapse" href="#collapse1" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                Edad
            </a>
        </div>
        <div class="form-group col-md-1">
            <small>{!! Form::label('auto', 'Autonomo') !!} </small><br>
            <a class="btn btn-secondary btn-block" data-toggle="collapse" href="#collapse2" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                Auto
            </a>
        </div>
        <div class="form-group col-md-1">
            <small>{!! Form::label('firma', 'Firma Doc.') !!} </small>
            {!! Form::select('firma', ['NO' => 'NO', 'SI' => 'SI'], null, ['class' => 'form-control mb-2']) !!}
        </div>
        
        <div class="form-group col-md-9">
            <small>{!! Form::label('observaciones', 'Observaciones') !!}</small>
            {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
        </div>
        
    </div>


    {{-- --------------------------------------------------------------- --}}

    <div class="collapse" id="collapse1">
        <div class="card card-body">
            <div class="row">
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 1') !!} </small>
                    {!! Form::number('hijo1', null, ['class' => 'form-control','min' => 0,'max' => 99]) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 2') !!} </small>
                    {!! Form::number('hijo2', null, ['class' => 'form-control','min' => 0,'max' => 99]) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 3') !!} </small>
                    {!! Form::number('hijo3', null, ['class' => 'form-control','min' => 0,'max' => 99]) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 4') !!} </small>
                    {!! Form::number('hijo4', null, ['class' => 'form-control','min' => 0,'max' => 99]) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 5') !!} </small>
                    {!! Form::number('hijo5', null, ['class' => 'form-control','min' => 0,'max' => 99]) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 6') !!} </small>
                    {!! Form::number('hijo6', null, ['class' => 'form-control','min' => 0,'max' => 99]) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 7') !!} </small>
                    {!! Form::number('hijo7', null, ['class' => 'form-control','min' => 0,'max' => 99]) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 8') !!} </small>
                    {!! Form::number('hijo8', null, ['class' => 'form-control','min' => 0,'max' => 99]) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 9') !!} </small>
                    {!! Form::number('hijo9', null, ['class' => 'form-control','min' => 0,'max' => 99]) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 10') !!} </small>
                    {!! Form::number('hijo10', null, ['class' => 'form-control','min' => 0,'max' => 99]) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 11') !!} </small>
                    {!! Form::number('hijo11', null, ['class' => 'form-control','min' => 0,'max' => 99]) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 12') !!} </small>
                    {!! Form::number('hijo12', null, ['class' => 'form-control','min' => 0,'max' => 99]) !!}
                </div>
            </div>

        </div>
    </div>
    {{-- ----autonomo----- --}}
    <div class="collapse" id="collapse2">
        <div class="card card-body">
            <div class="row">
                <div class="form-group col-md-1">
                    <small>{!! Form::label('certdigital', 'Certificado Digital') !!} </small>
                    {!! Form::select('certdigital', ['NO' => 'NO', 'SI' => 'SI'], null, ['class' => 'form-control mb-2']) !!}
                </div>
                <div class="form-group col-md-3">
                    <small>{!! Form::label('domifiscal', 'Domicilio Fiscal') !!} </small>
                    {!! Form::text('domifiscal', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-2">
                    <small>{!! Form::label('altaautonomo', 'Alta Autonomo') !!} </small>
                    {!! Form::date('altaautonomo', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-2">
                    <small>{!! Form::label('numseguridad', 'Nº Seguridad Social') !!} </small>
                    {!! Form::text('numseguridad', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-2">
                    <small>{!! Form::label('cuentabanco', 'Cuenta Bancaria') !!} </small>
                    {!! Form::text('cuentabanco', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-2">
                    <small>{!! Form::label('titularbanco', 'Titular Cuenta Bancaria') !!} </small>
                    {!! Form::text('titularbanco', null, ['class' => 'form-control']) !!}
                </div>
                
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <small>{!! Form::label('autoactivo', 'Autonomo Activo') !!} </small>
                    {!! Form::select('autoactivo', ['NO' => 'NO', 'SI' => 'SI'], null, ['class' => 'form-control mb-2']) !!}
                </div>
                <div class="form-group col-md-2">
                    <small>{!! Form::label('estadoauto', 'Autonomo Estado') !!} </small>
                    {!! Form::select('estadoauto', ['BAJA' => 'BAJA', 'ALTA' => 'ALTA'], null, ['class' => 'form-control mb-2']) !!}
                </div>
    
                
            </div>

        </div>
    </div>


    

    <button type="submit" class="btn btn-primary float-right">Grabar Información</button>
    {!! Form::close() !!}
    <br><br>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');

    </script>
    <script>
        $("#state").change(event => {
            $.get(`../towns/${event.target.value}`, function(res, sta) {
                $("#town").empty();
                res.forEach(element => {
                    $("#town").append(`<option value=${element.id}> ${element.nombre} </option>`);
                });
            });
        });

        function sumar() {
            var a = parseInt(document.getElementById("precio").value) || 0;
            var b = parseInt(document.getElementById("abono").value) || 0;
            total = (parseInt(a) - parseInt(b));
            document.getElementById('pendiente').value = total;
        }

    </script>
@stop
