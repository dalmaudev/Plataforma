@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<section class="content">


    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DOCUMENTACIÓN PROCESO</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              {{ Form::open(array('route' => 'filesproceso.store', 'files' => true)) }}
                {!! Form::text('usuario', $cliente)!!}
                {!! Form::text('proceso', $proceso)!!}
                {!! Form::file('archivo[]', ['multiple' => true]) !!}
                {!! Form::submit('Subir Archivo',['class' => 'btn btn-primary btn-sm', 'float-right']) !!}
              {!! Form::close() !!} 
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                          <th width='1px'>#</th>
                          <th ><small>Nombre del Archivo</small> </th>
                          <th width='1px'><small>Ver</small> </th>
                          <th width='1px'><small>Eliminar</small> </th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- @foreach ($files as $file)
                            <tr>
                              <th >{{$file->id}}</th>
                              <td>{{$file->name}}</td>
                              <td >
                                <a target="_blank" href="{{route('files.show',$file->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </a>
                              </td>
                              <td >
                                  <form action="{{route('files.destroy',$file->id)}}" method="POST" class="formulario-eliminar">
                                    @method('DELETE')
                                      @csrf
                                      <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> </button>
                                  </form>
                              </td>
                            </tr>
                        @endforeach --}}
                      </tbody>
                </table>
              </div>
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
    {{-- domicilio --}}
  </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop