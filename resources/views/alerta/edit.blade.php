@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Dashboard</h1> --}}
@stop

@section('content')
    {!! Form::model($alerta, ['route' => ['alerta.update', $alerta], 'method' => 'PUT']) !!}
    <div class="card">
        <div class="card-body row">
            <div class="col-5 text-center d-flex align-items-center justify-content-center">
                <div class="">
                    <h2><strong>Alerta</strong></h2>
                    <p class="lead mb-5">{{ $nombre->nombre }} {{ $nombre->apellido }}<br>
                        Teléfono: {{ $nombre->telefono }}
                    </p>
                </div>
            </div>

            <div class="col-7">
                <div class="form-group">
                    <small>{!! Form::label('titulo', 'Titulo de la Alerta') !!} <span class="text-danger"><strong>*</strong></span></small>
                    @if ($alerta->deuser_id == Auth::user()->id)
                        {!! Form::text('titulo', $alerta->titulo, ['class' => 'form-control', 'autofocus']) !!}
                    @else
                        {!! Form::text('titulo', $alerta->titulo, ['class' => 'form-control', 'readonly']) !!}
                    @endif

                    @error('titulo')
                        <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
                    @enderror
                </div>
                {!! Form::hidden('cliente_id', $alerta->cliente_id, ['class' => 'form-control mb-2']) !!}
                <div class="form-group">
                    <small>{!! Form::label('cuerpo', 'Mensaje') !!} <span class="text-danger"><strong>*</strong></span></small>
                    @if ($alerta->deuser_id == Auth::user()->id)
                        {!! Form::text('cuerpo', $alerta->cuerpo, ['class' => 'form-control']) !!}
                    @else
                        {!! Form::text('cuerpo', $alerta->cuerpo, ['class' => 'form-control', 'readonly']) !!}
                    @endif

                    <div class="form-group">
                        <small>{!! Form::label('fecalert', 'Fecha de Cumplimiento') !!} </small>

                        @if ($alerta->deuser_id == Auth::user()->id)
                            {!! Form::date('fecalert', $alerta->fecalert, ['class' => 'form-control']) !!}
                        @else
                            {!! Form::date('fecalert', $alerta->fecalert, ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                    <input type="hidden" value="{{ Auth::user()->id }}" name="deuser_id">
                    <div class="form-group">
                        <small>{!! Form::label('parauser_id', 'Para Especialista') !!} </small>
                        @if ($alerta->deuser_id == Auth::user()->id)
                            {!! Form::select('parauser_id', $list, $alerta->parauser_id, ['class' => 'form-control form-control-sm']) !!}
                        @else
                            {!! Form::select('parauser_id', $list, $alerta->parauser_id, [
                                'class' => 'form-control form-control-sm',
                                'readonly',
                                'disabled',
                            ]) !!}
                        @endif

                    </div>
                    {{-- <div class="form-group">
          <small>{!! Form::label('estado', 'Estado') !!} </small>
          {!! Form::select('estado', ['NO' => 'Inactiva', 'SI' => 'Activa'], null, ['class' => 'form-control mb-2']) !!}
        </div> --}}

                    <div class="form-group">
                        @if ($alerta->deuser_id == Auth::user()->id)
                            <input type="submit" class="btn btn-primary" value="Actualizar Alerta">
                        @else
                            <input type="submit" class="btn btn-primary" value="Actualizar Alerta" disabled>
                        @endif

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
        <script>
            console.log('Hi!');
        </script>
    @stop
