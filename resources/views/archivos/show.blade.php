@extends('adminlte::page')

@section('title', 'Asesoria | Mostrar Archivos')

@section('content_header')
    <h1>Archivos Subidos</h1>
@stop

@section('content')
<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre del Archivo</th>
                  <th scope="col">Ver</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($files as $file)
                    <tr>
                      <th scope="row">{{$file->id}}</th>
                      <td>{{$file->name}}</td>
                      <td>
                        <a target="_blank" href="{{route('files.show',$file->id)}}" class="btn btn-sm">Ver</a>
                          {{-- <a target="_blank" href="storage/archivos/{{$file->name}}" class="btn btn-sm btn-outline-secundary">Ver</a> --}}
                      </td>
                      <td>
                          <form action="{{route('files.destroy',$file->id)}}" method="POST">
                            @method('DELETE');
                              @csrf
                              <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                          </form>
                      </td>
                    </tr>
                @endforeach
              </tbody>
        </table>
      </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop