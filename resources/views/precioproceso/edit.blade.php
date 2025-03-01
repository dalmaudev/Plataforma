@extends('adminlte::page')

@section('title', 'Editar Precio Proceso')

@section('content_header')
    
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Mostrar Precio Proceso: <strong>{{$proceso->nombre}}</strong> </h3><a class="btn btn-primary btn-sm float-right" href="{{route('precioproceso.index')}}"><i class="far fa-hand-point-left"></i> Volver</a> 
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        {!! Form::model($proceso, ['route' => ['precioproceso.update', $proceso],'method' => 'PUT']) !!}
        
        <small>{!! Form::label('precio', 'Precio €') !!}</small>
        @error('precio')
        <br>
        <span class="badge badge-danger">{{ $message }}</span>
        @enderror
        {!! Form::text('precio', null, ['class' => 'form-control mb-2','autofocus']) !!}
        <small>{!! Form::label('obs', 'Observacion') !!}</small>
        {!! Form::text('observacion', null, ['class' => 'form-control mb-2','autofocus']) !!}
        {!! Form::submit('Actualizar Precio Proceso', ['class' => 'btn btn-danger float-right']) !!}
        {!! Form::close() !!}


        {{-- <form action="{{route('precioproceso.destroy',$proceso->id)}}" method="POST" class="formulario-eliminar">
            @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> </button>
        </form> --}}
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop