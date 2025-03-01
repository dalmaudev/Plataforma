@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Dashboard</h1> --}}
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Control de Llamadas</h3>
          <form action="{{route('llamada.destroy',$llamada->id)}}" method="POST" class="formulario-eliminar float-right">
            @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> </button>
        </form>
        
        </div>
         <div class="card-body ">
          {!! Form::model($llamada, ['route' => ['llamada.update', $llamada],'method' => 'PUT']) !!}
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="">Nombre / Apellido</span>
            </div>
            <input type="text" name="nombre"  class="form-control" value="{{$llamada->nombre}}">
            <input type="text" name="apellido"  class="form-control" value="{{$llamada->apellido}}">
           
          </div>
          <br>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">Telefono</span>
            </div>
            <div class="col-md-5">
                <input type="text" name="telefono"  class="form-control" id="basic-url" value="{{$llamada->telefono}}">
            </div>
            <br>
   </div>
   
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="">Fecha / Consulta&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>
            <input type="text" name="fecha" readonly  class="form-control" value="{{ \Carbon\Carbon::parse($llamada->fecllam)->format('d-m-Y H:i:s')}}">
            <input type="text" name="consulta"  class="form-control" value="{{$llamada->consulta}}">
           
          </div>
          
          <br>


       
          <div class="row">
          
            <div class="col-12">
                <a href="{{route('llamada.index')}}" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i>  Volver</a>
                
             <input type="submit" value="Actualizar Informacion"  class="btn btn-success float-right">
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
    $('.formulario-eliminar').submit(function(e){
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