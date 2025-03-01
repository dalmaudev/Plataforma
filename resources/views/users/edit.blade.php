@extends('adminlte::page')

@section('title', 'Asesoria | Editar Especialista')

@section('content_header')
    <h1>Editar Especialista<a class="btn btn-success btn-sm float-right" href="{{ route('users.index') }}"><i
                class="far fa-hand-point-left"></i> Volver</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT']) !!}
            {!! Form::label('nombre', 'Nombre completo de Especialista') !!}
            {!! Form::text('name', null, ['class' => 'form-control mb-3', 'autofocus']) !!}
            @error('nombre')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control mb-3']) !!}
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            {!! Form::label('contraseña', 'Contraseña') !!}
            {!! Form::password('password', ['class' => 'form-control mb-2']) !!}
            {!! Form::hidden('estado', 1) !!}
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <hr>
            <small>{!! Form::label('contraseña', 'Listado de Roles') !!}</small>
            @foreach ($roles as $role)
                <div>
                    <label>
                        {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach
            <hr>
            {!! Form::submit('Actualizar Especialista', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}

            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="formulario-eliminar">
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
    <script>
        console.log('Hi!');

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
