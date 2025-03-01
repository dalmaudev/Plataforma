@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Dashboard</h1> --}}
@stop

@section('content')
{!! Form::open(['route' => 'consulta.store']) !!}
<div class="card">
    <div class="row">
<div class="col-3">
    <div class="form-group ml-4">
      <small>{!! Form::label('fecalert', 'Fecha de la Consulta') !!} </small>
      {!! Form::date('fecalert', \Carbon\Carbon::now() , ['class' => 'form-control']) !!}
      @error('fecalert')
            <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
        @enderror
    </div>
</div>
<div class="col-8">
    <div class="form-group">
        <small>{!! Form::label('consulta', 'Detalles de la Consulta') !!} <span class="text-danger"><strong>*</strong></span></small>
        {!! Form::text('consulta', null, ['class' => 'form-control', 'autofocus']) !!}
        @error('consulta')
              <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
          @enderror
      </div>
</div>
</div>

</div>
{!! Form::hidden('cliente_id', $ide, ['class' => 'form-control mb-2']) !!}
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Crear Consulta">
  </div>
{!! Form::close() !!}

<div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="8%">Consulta</th>
                                <th width="90%"></th>
                                <th width="1px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($numconsul as $file)
                                <tr>
                                    
                                    <td>
        
                                        <a  href="{{ route('consulta.edit', $file->id) }}"
                                            class="btn btn-sm">{{ $file->fecalert }}</a>
                                    </td>
                                    <td>
        
                                        <a  href="{{ route('consulta.edit', $file->id) }}"
                                            class="btn btn-sm">{{ $file->consulta }}</a>
                                    </td>
                                    <td>
                                        <a  href="{{ route('consulta.edit', $file->id) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a>
        
                                    </td>
                                    <td>
                                        <form action="{{ route('consulta.destroy', $file->id) }}" method="POST"
                                            class="formulario-eliminar">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i>
                                            </button>
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