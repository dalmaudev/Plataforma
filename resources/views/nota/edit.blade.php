@extends('adminlte::page')

@section('title', 'Asesoria | Editar Nota')

@section('content_header')
    <h1>Editar Nota<a class="btn btn-success btn-sm float-right" href="{{route('notas.index')}}"><i class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
           
            {!! Form::model($nota, ['route' => ['notas.update', $nota],'method' => 'PUT']) !!}
            <small>{!! Form::label('nota', 'Titulo de nota') !!}</small>
            @if ($nota->deuser_id == auth()->user()->id)
            {!! Form::text('titulo', null, ['class' => 'form-control form-control-sm mb-3']) !!}
            @else
            {!! Form::text('titulo', null, ['class' => 'form-control form-control-sm mb-3', 'readonly']) !!}
            @endif
            
            @error('titulo')
                <span class="text-danger font-weight-bold text-sm">{{ $message }}</span>
            @enderror
            <small>{!! Form::label('nota', 'Descripción de la nota') !!}</small>
            @if ($nota->deuser_id == auth()->user()->id)
            {!! Form::text('cuerpo', null, ['class' => 'form-control form-control-sm mb-3']) !!}
            @else
            {!! Form::text('cuerpo', null, ['class' => 'form-control form-control-sm mb-3',  'readonly']) !!} 
            @endif
            

            <small>{!! Form::label('nota', 'Tipo de Nota') !!}</small>
            @if ($nota->deuser_id == auth()->user()->id)
            {!! Form::select('alert', ['danger' => 'Urgente', 'info' => 'Información', 'warning' => 'Precaución', 'success' => 'Informativa'],null,['class' => 'form-control form-control-sm mb-3'])!!}
            @else
            {!! Form::select('alert', ['danger' => 'Urgente', 'info' => 'Información', 'warning' => 'Precaución', 'success' => 'Informativa'],null,['class' => 'form-control form-control-sm mb-3', 'disabled'])!!}
            @endif

            <small>{!! Form::label('parauser_id', 'Para Especialista') !!}</small>
            @if ($nota->deuser_id == auth()->user()->id)
            {!! Form::select('parauser_id', $users, null, ['class' => 'form-control form-control-sm mb-3']) !!} 
            @else
            {!! Form::select('parauser_id', $users, null, ['class' => 'form-control form-control-sm mb-3', 'disabled']) !!}
            @endif
            
            

            <small>{!! Form::label('activo', 'Activo') !!}</small>
            {!! Form::checkbox('activo', 1, $nota->activo, ['class' => 'mr-1'  ]) !!}
            
            {!! Form::hidden('user_id', auth()->user()->id , ['class' => 'form-control form-control-sm mb-3']) !!}
         
            @if ($nota->deuser_id == auth()->user()->id)
            {!! Form::submit('Actualizar Nota', ['class' => 'btn btn-primary float-right']) !!}
             @endif
            
            
            {!! Form::close() !!}

            {{-- {!! Form::open(['route' => ['notas.destroy',$nota], 'method' => 'DELETE']) !!}
                <button class="btn btn-danger">Eliminar Nota</button>
            {!! Form::close() !!} --}}
            @if ($nota->deuser_id == auth()->user()->id)
            <form action="{{route('notas.destroy',$nota->id)}}" method="POST" class="formulario-eliminar">
                @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> </button>
            </form>
            @endif
            
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