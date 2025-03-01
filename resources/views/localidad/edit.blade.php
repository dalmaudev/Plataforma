@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Localidad<a class="btn btn-success btn-sm float-right" href="{{route('localidad.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($localidad, ['route' => ['localidad.update', $localidad],'method' => 'PUT']) !!}
            {!! Form::label('localidad', 'Nombre de la Localidad') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control mb-4']) !!}
            {!! Form::label('provincia', 'Nombre de la Provincia') !!}
            {!! Form::select('provincia_id', $provincia, $localidad->provincia_id,['class' => 'form-control mb-2']) !!}
            {!! Form::submit('Actualizar Localidad', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}

            {{-- {!! Form::open(['route' => ['localidad.destroy',$localidad], 'method' => 'DELETE']) !!}
                <button class="btn btn-danger">Eliminar Localidad</button>
            {!! Form::close() !!} --}}

            <form action="{{route('localidad.destroy',$localidad->id)}}" method="POST" class="formulario-eliminar">
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