@extends('adminlte::page')

@section('title', 'Asesoria | Editar Pais')

@section('content_header')
    <h1>Editar Proceso Cliente : {{ $cliente->nombre }} {{ $cliente->apellido }}<a
            class="btn btn-success btn-sm float-right" href="{{ route('procesocliente.index') }}"><i
                class="far fa-hand-point-left"></i> Volver</a></h1>
    <hr>
@stop

@section('content')
    {!! Form::model($procesocliente, ['route' => ['procesocliente.update', $procesocliente], 'method' => 'PUT']) !!}



    @if ($cliente->numseguridad == '')
        <div class="form-row">
            <div class="form-group col-md-3">
                <small>{!! Form::label('tipoproceso_id', 'Proceso') !!}</small>
                {!! Form::select('tipoproceso_id', $tipoprocesos, null, ['class' => 'form-control mb-2']) !!}
                @error('tipoproceso_id')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <small>{!! Form::label('tipoproceso', 'Tipo de Proceso') !!}</small>
                {!! Form::select('proceso_id', $procesos, null, ['class' => 'form-control mb-2']) !!}
                @error('proceso_id')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <small>{!! Form::label('fecpresentado', 'Fecha Presentacion Proceso') !!} </small>
                {!! Form::date('fecpresentado', null, ['class' => 'form-control mb-2']) !!}
                @error('fecpresentado')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                @enderror
            </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <small>{!! Form::label('desicion_id', 'Tipo de Proceso') !!}</small>
                {!! Form::select('desicion_id', $desicion, null, ['class' => 'form-control mb-2']) !!}
            </div>
            <div class="form-group col-md-3">
                <small>{!! Form::label('fecdesicion', 'Fecha Desicion Proceso') !!}</small>
                {!! Form::date('fecdesicion', null, ['class' => 'form-control mb-2']) !!}
                @error('fecdesicion')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <small>{!! Form::label('user_id', 'Especialista') !!}</small>
                {!! Form::select('user_id', $especialista, null, ['class' => 'form-control mb-2']) !!}
                @error('user_id')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <small>{!! Form::label('pagoconsulta', 'Pago de la Consulta') !!}</small>
                {!! Form::select('pagoconsulta', ['NO' => 'NO', 'SI' => 'SI', 'AB' => 'ABONO'], null, ['class' => 'form-control mb-2']) !!}
                @error('pagoconsulta')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                @enderror
            </div>
            <div class="form-group col-md-1">
                <small>{!! Form::label('precioproceso', 'Valor Proceso') !!}</small>
                {!! Form::text('precioproceso', null, ['class' => 'form-control', 'id' => 'precio']) !!}
                @error('precioproceso')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                @enderror
            </div>
            <div class="form-group col-md-1">
                <small>{!! Form::label('abono', 'Abono') !!}</small>
                {!! Form::text('abono', null, ['class' => 'form-control', 'id' => 'abono', 'onkeyup' => 'sumar()']) !!}
                @error('abono')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                @enderror
            </div>
            <div class="form-group col-md-1">
                <small>{!! Form::label('pendiente', 'Pendiente') !!}</small>
                {!! Form::text('pendiente', null, ['class' => 'form-control', 'id' => 'pendiente', 'readonly']) !!}
                @error('pendiente')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                @enderror
            </div>
            <div class="form-group col-md-9">
                <small>{!! Form::label('observacion', 'Observaciones') !!}</small>
                {!! Form::text('observacion', null, ['class' => 'form-control']) !!}
                @error('observacion')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                @enderror
            </div>
        </div>

    @else
        <div class="form-row">
            <div class="form-group col-md-3">
                <small>{!! Form::label('tipoproceso_id', 'Proceso') !!}</small>
                {!! Form::select('tipoproceso_id', $tipoprocesos, null, ['class' => 'form-control mb-2']) !!}
                @error('tipoproceso_id')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <small>{!! Form::label('tipoproceso', 'Tipo de Proceso') !!}</small>
                {!! Form::select('proceso_id', $procesos, null, ['class' => 'form-control mb-2']) !!}
                @error('proceso_id')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <small>{!! Form::label('fecpresentado', 'Fecha Presentacion Proceso') !!} </small>
                {!! Form::date('fecpresentado', null, ['class' => 'form-control mb-2']) !!}
                @error('fecpresentado')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <small>{!! Form::label('auto', 'Autonomo') !!} </small><br>
                <a class="btn btn-secondary btn-block" data-toggle="collapse" href="#collapse2" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    Autonomo
                </a>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <small>{!! Form::label('desicion_id', 'Tipo de Proceso') !!}</small>
                {!! Form::select('desicion_id', $desicion, null, ['class' => 'form-control mb-2']) !!}
            </div>
            <div class="form-group col-md-3">
                <small>{!! Form::label('fecdesicion', 'Fecha Desicion Proceso') !!}</small>
                {!! Form::date('fecdesicion', null, ['class' => 'form-control mb-2']) !!}
            </div>
            <div class="form-group col-md-3">
                <small>{!! Form::label('user_id', 'Especialista') !!}</small>
                {!! Form::select('user_id', $especialista, null, ['class' => 'form-control mb-2']) !!}
            </div>
            <div class="form-group col-md-3">
                <small>{!! Form::label('pagoconsulta', 'Pago de la Consulta') !!}</small>
                {!! Form::select('pagoconsulta', ['NO' => 'NO', 'SI' => 'SI', 'AB' => 'ABONO'], null, ['class' => 'form-control mb-2']) !!}
            </div>
            <div class="form-group col-md-1">
                <small>{!! Form::label('precioproceso', 'Valor Proceso') !!}</small>
                {!! Form::text('precioproceso', null, ['class' => 'form-control', 'id' => 'precio']) !!}
            </div>
            <div class="form-group col-md-1">
                <small>{!! Form::label('abono', 'Abono') !!}</small>
                {!! Form::text('abono', null, ['class' => 'form-control', 'id' => 'abono', 'onkeyup' => 'sumar()']) !!}
            </div>
            <div class="form-group col-md-1">
                <small>{!! Form::label('pendiente', 'Pendiente') !!}</small>
                {!! Form::text('pendiente', null, ['class' => 'form-control', 'id' => 'pendiente', 'readonly']) !!}
            </div>
            <div class="form-group col-md-9">
                <small>{!! Form::label('observaciones', 'Observaciones') !!}</small>
                {!! Form::text('observacion', null, ['class' => 'form-control']) !!}
            </div>
        </div>

    @endif



    {{-- ----autonomo----- --}}
    <div class="collapse" id="collapse2">
        <div class="card card-body">
            <div class="row">
                <div class="form-group col-md-1">
                    <small>{!! Form::label('certdigital', 'Certificado Digital') !!} </small>
                    {!! Form::text('certdigital', $cliente->certdigital, ['class' => 'form-control mb-2', 'readonly']) !!}
                </div>
                <div class="form-group col-md-3">
                    <small>{!! Form::label('domifiscal', 'Domicilio Fiscal') !!} </small>
                    {!! Form::text('domifiscal', $cliente->domifiscal, ['class' => 'form-control', 'readonly']) !!}
                </div>
                <div class="form-group col-md-2">
                    <small>{!! Form::label('altaautonomo', 'Alta Autonomo') !!} </small>
                    {!! Form::date('altaautonomo', $cliente->altaautonomo, ['class' => 'form-control', 'readonly']) !!}
                </div>
                <div class="form-group col-md-2">
                    <small>{!! Form::label('numseguridad', 'Nº Seguridad Social') !!} </small>
                    {!! Form::text('numseguridad', $cliente->numseguridad, ['class' => 'form-control', 'readonly']) !!}
                </div>
                <div class="form-group col-md-2">
                    <small>{!! Form::label('cuentabanco', 'Cuenta Bancaria') !!} </small>
                    {!! Form::text('cuentabanco', $cliente->cuentabanco, ['class' => 'form-control', 'readonly']) !!}
                </div>
                <div class="form-group col-md-2">
                    <small>{!! Form::label('titularbanco', 'Titular Cuenta Bancaria') !!} </small>
                    {!! Form::text('titularbanco', $cliente->titularbanco, ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>

        </div>
    </div>

    {{-- --------------------------------------------------------------- --}}



    <button type="submit" class="btn btn-primary float-right">Grabar Información</button>
    {!! Form::close() !!}

    {{-- {!! Form::open(['route' => ['procesocliente.destroy',$procesocliente], 'method' => 'DELETE']) !!}
  <button class="btn btn-danger">Eliminar Proceso</button>
{!! Form::close() !!} --}}

    <form action="{{ route('procesocliente.destroy', $procesocliente->id) }}" method="POST" class="formulario-eliminar">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> </button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');

    </script>
    <script>
        function sumar() {
            var a = parseInt(document.getElementById("precio").value) || 0;
            var b = parseInt(document.getElementById("abono").value) || 0;
            total = (parseInt(a) - parseInt(b));
            document.getElementById('pendiente').value = total;
        }

    </script>


    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )

        </script>
    @endif

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Estas segur@!',
                text: "Este Archivo se Eliminara!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Borrar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });

    </script>
@stop
