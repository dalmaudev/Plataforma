@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Control de LLamadas</h1> --}}
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Control de Llamadas </h3>
          <a href="{{route('llamada.crear',$llamada->id)}}" class="btn btn-sm btn-success float-right">Crear ficha cliente</a>
        
        </div>
         <div class="card-body ">
          {!! Form::open(['route' => 'llamada.store', 'files' => true, 'name' => 'frm1']) !!}
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="">Nombre / Apellido</span>
            </div>
            <input type="text" name="nombre" readonly class="form-control" value="{{$llamada->nombre}}">
            <input type="text" name="apellido" readonly class="form-control" value="{{$llamada->apellido}}">
           
          </div>
          <br>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">Telefono</span>
            </div>
            <div class="col-md-5">
                <input type="text" name="telefono" readonly class="form-control" id="basic-url" value="{{$llamada->telefono}}">
            </div>
            <br>
   </div>
          
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="">Fecha / Consulta&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>
            <input type="text" name="fecha" readonly class="form-control" value="{{ \Carbon\Carbon::parse($llamada->updated_at)->format('d-m-Y H:i:s')}}">
            <input type="text" name="consulta" readonly class="form-control" value="{{$llamada->consulta}}">
           
          </div>
          
          <br>


       
          <div class="row">
          
            <div class="col-12">
                <a href="{{route('llamada.edit',$llamada->id)}}" class="btn btn-danger"><i class="fas fa-edit"></i></a>
                <a href="{{route('llamada.index')}}" class="btn btn-primary float-right"><i class="fas fa-arrow-circle-left"></i>  Volver</a>
                {{-- <input type="submit" value="Grabar Consulta"  class="btn btn-success float-right"> --}}
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