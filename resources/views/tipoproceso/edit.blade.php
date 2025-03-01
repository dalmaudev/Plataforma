@extends('adminlte::page')

@section('title', 'Asesoria | Editar Tipo de Proceso')

@section('content_header')
    <h1>Editar Recurso<a class="btn btn-success btn-sm float-right" href="{{route('tipoproceso.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($tipoproceso, ['route' => ['tipoproceso.update', $tipoproceso],'method' => 'PUT']) !!}
            {!! Form::label('tipoproceso', 'Nombre Tipo de Proceso') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control mb-2']) !!}
            {!! Form::submit('Actualizar Tipo de Proceso', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}

            {{-- {!! Form::open(['route' => ['tipoproceso.destroy',$tipoproceso], 'method' => 'DELETE']) !!}
                <button class="btn btn-danger">Eliminar Tipo de Proceso</button>
            {!! Form::close() !!} --}}

            <form action="{{route('tipoproceso.destroy',$tipoproceso->id)}}" method="POST" class="formulario-eliminar">
                @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> </button>
            </form>
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