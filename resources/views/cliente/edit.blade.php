@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content_header')
    <h1>Editar Cliente
        @if ($cliente->numseguridad != '')
            (AUTONOMO) <a class="btn btn-warning btn-sm" href="{{ route('files.index', $cliente->id) }}"><i
                    class="fas fa-upload"></i> Subir Archivos</a>
        @else
            <a class="btn btn-warning btn-sm" href="{{ route('files.edit', $cliente->id) }}"><i class="fas fa-upload"></i>
                Subir Archivos</a>
        @endif

        @if ($cliente->afiliado)
        <i class="fas fa-user-check"></i> Afiliado desde ({{ \Carbon\Carbon::parse($cliente->fecafiliado)->format('d-m-Y') }})
        <a class="btn btn-danger btn-sm" href="{{ route('llamada.bajaafiliado', $cliente->id) }}"><i class="fas fa-thumbs-down"></i>
            Dar baja afiliado</a>
        <a target="_blank" class="btn btn-success btn-sm" href="{{ route('clientepdfafi', $cliente->id) }}"><i class="far fa-file-pdf"></i>
                VER DOC AFI</a>
        @else
        <a class="btn btn-success btn-sm" href="{{ route('llamada.crearafiliado', $cliente->id) }}"><i class="fas fa-thumbs-up"></i>
            Dar Alta afiliado</a>
        @endif



        <a class="btn btn-success btn-sm float-right" href="{{ route('cliente.show', $cliente->id) }}"><i
                class="far fa-hand-point-left"></i> Volver</a>
    </h1>
@stop


@section('content')

    {!! Form::model($cliente, ['route' => ['cliente.update', $cliente], 'method' => 'PUT', 'files' => true, 'name' => 'frm1']) !!}

    {!!Form::hidden('user_id', auth()->id())!!}
    <div class="form-row">
        <div class="form-group col-md-6">
            <small>{!! Form::label('nombre', 'Nombre Completo') !!} <span class="text-danger"><strong>*</strong></span></small>
            {!! Form::text('nombre', null, ['class' => 'form-control', 'autofocus']) !!}
            @error('nombre')
                <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <small>{!! Form::label('apellido', 'Apellido Completo') !!} <span class="text-danger"><strong>*</strong></span></small>
            {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
            @error('apellido')
                <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
            @enderror
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('direccion', 'Dirección') !!}
        {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
    </div>


    <div class="form-row">
        <div class="form-group col-md-2">
            <small>{!! Form::label('provicia_id', 'Provincia') !!} <span class="text-danger"><strong>*</strong></span></small>
            {!! Form::select('provincia_id', $provincia, null, ['id' => 'state', 'class' => 'form-control mb-2']) !!}
            @error('provincia_id')
                <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
            @enderror
        </div>
        <div class="form-group col-md-2">
          <small>{!! Form::label('localidad', 'Localidad') !!} <span class="text-danger"><strong>*</strong></span></small>
            {!! Form::select('localidad_id', $localidades, null, ['id' => 'town1', 'class' => 'form-control mb-2']) !!}
            @error('localidad_id')
                <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
            @enderror
        </div>
        <div class="form-group col-md-2">
            {!! Form::label('cp', 'C.P.') !!}
            {!! Form::text('cp', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('documento', 'Tipo Documento') !!} </small>
            {!! Form::select('documento_id', $documentos, null, ['class' => 'form-control mb-2']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('documento', 'Nº Documento') !!} <span class="text-danger"><strong>*</strong></span></small>
              {!! Form::text('documento', null, ['class' => 'form-control']) !!}
              @error('documento')
                  <span class="text-danger"><strong><small>{{ $message }}</small></strong></span>
              @enderror
          </div>
          <div class="form-group col-md-2">
            <small>{!! Form::label('caducidaddoc', 'Caducidad Doc.') !!} </small>
            {!! Form::date('caducidaddoc', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-row">



        <div class="form-group col-md-2">
            <small>{!! Form::label('fecingresoespaña', 'Fecha Ingreso España') !!} </small>
            {!! Form::date('fecingresoespaña', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('sexo', 'Sexo') !!} </small><br>
            {!! Form::select('sexo_id', $sexo, null, ['class' => 'form-control mb-2']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('pais_id', 'Nacionalidad') !!} </small>

            {!! Form::select('pais_id', $paises, null, ['class' => 'form-control mb-2']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('telefono', 'Telefono') !!} </small>
            {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('estadocivil_id', 'Estado Civil') !!} </small>
            {!! Form::select('estadocivil_id', $estadocivil, null, ['class' => 'form-control mb-2']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('profesion', 'Profesión') !!} </small>
            {!! Form::text('profesion', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-row">

        <div class="form-group col-md-4">
            <small>{!! Form::label('email', 'Correo Electronico') !!} </small>
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('nombrepadre', 'Nombre del Padre') !!} </small>
            {!! Form::text('nombrepadre', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('nombremadre', 'Nombre de la Madre') !!} </small>
            {!! Form::text('nombremadre', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('nacimiento', 'Fecha de Nacimiento') !!} </small>
            {!! Form::date('fecnac', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-2">
            <small>{!! Form::label('conocio', '¿Cómo nos has conocido?') !!} </small>
            {!! Form::text('conocio', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-1">
            <small>{!! Form::label('hijo', 'Hijos') !!} </small><br>
            <a class="btn btn-secondary btn-block" data-toggle="collapse" href="#collapse1" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                Edad
            </a>
        </div>
        <div class="form-group col-md-1">
            <small>{!! Form::label('auto', 'Autonomo') !!} </small><br>
            <a class="btn btn-secondary btn-block" data-toggle="collapse" href="#collapse2" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                Auto
            </a>
        </div>
        <div class="form-group col-md-1">
            <small>{!! Form::label('firma', 'Firma') !!} </small>
            {!! Form::select('firma', ['NO' => 'NO', 'SI' => 'SI'], null, ['class' => 'form-control mb-2']) !!}
        </div>
        <div class="form-group col-md-9">
            <small>{!! Form::label('observaciones', 'Observaciones') !!}</small>
            {!! Form::text('observaciones', null, ['class' => 'form-control']) !!}
        </div>

    </div>


    {{-- --------------------------------------------------------------- --}}

    <div class="collapse" id="collapse1">
        <div class="card card-body">
            <div class="row">
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 1') !!} </small>
                    {!! Form::number('hijo1', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 2') !!} </small>
                    {!! Form::number('hijo2', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 3') !!} </small>
                    {!! Form::number('hijo3', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 4') !!} </small>
                    {!! Form::number('hijo4', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 5') !!} </small>
                    {!! Form::number('hijo5', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 6') !!} </small>
                    {!! Form::number('hijo6', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 7') !!} </small>
                    {!! Form::number('hijo7', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 8') !!} </small>
                    {!! Form::number('hijo8', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 9') !!} </small>
                    {!! Form::number('hijo9', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 10') !!} </small>
                    {!! Form::number('hijo10', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 11') !!} </small>
                    {!! Form::number('hijo11', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-1">
                    <small>{!! Form::label('nombrepadre', 'Edad hijo 12') !!} </small>
                    {!! Form::number('hijo12', null, ['class' => 'form-control']) !!}
                </div>
            </div>

        </div>
    </div>
    {{-- ----autonomo----- --}}
    <div class="collapse" id="collapse2">
        <div class="card card-body">
            <div class="row">
                <div class="form-group col-md-1">
                    <small>{!! Form::label('certdigital', 'Certificado Digital') !!} </small>
                    {!! Form::select('certdigital', ['NO' => 'NO', 'SI' => 'SI'], null, ['class' => 'form-control mb-2']) !!}
                </div>
                <div class="form-group col-md-3">
                    <small>{!! Form::label('domifiscal', 'Domicilio Fiscal') !!} </small>
                    {!! Form::text('domifiscal', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-2">
                    <small>{!! Form::label('altaautonomo', 'Alta Autonomo') !!} </small>
                    {!! Form::date('altaautonomo', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-2">
                    <small>{!! Form::label('numseguridad', 'Nº Seguridad Social') !!} </small>
                    {!! Form::text('numseguridad', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-2">
                    <small>{!! Form::label('cuentabanco', 'Cuenta Bancaria') !!} </small>
                    {!! Form::text('cuentabanco', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group col-md-2">
                    <small>{!! Form::label('titularbanco', 'Titular Cuenta Bancaria') !!} </small>
                    {!! Form::text('titularbanco', null, ['class' => 'form-control']) !!}
                </div>

            </div>

        </div>
    </div>

    <button type="submit" class="btn btn-primary float-right">Actualizar Información</button>
    {!! Form::close() !!}

    {{-- {!! Form::open(['route' => ['cliente.destroy',$cliente->id], 'method' => 'DELETE']) !!}
                <button class="btn btn-danger btn-sm">Eliminar Cliente</button>
        {!! Form::close() !!} --}}


    <form action="{{ route('cliente.destroy', $cliente->id) }}" method="POST" class="formulario-eliminar">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> </button>
    </form>
    </div>
<br><br><br>
<h3>Documentación Personal</h3>
    <div class="card">
        <div class="card-body">
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
                        @foreach ($files as $file)
                            <tr>
                              <th >{{$file->id}}</th>
                              <td><a target="_blank" href="{{route('files.show',$file->id)}}">{{substr($file->name,11,200)}}</a></td>
                              <td >
                                <a  href="{{route('files.show',$file->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </a>
                              </td>
                              <td >
                                  <form action="{{route('files.destroy',$file->id)}}" method="POST" class="formulario-eliminar">
                                    @method('DELETE')
                                      @csrf
                                      <button type="submit" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> </button>
                                  </form>
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                </table>
              </div>
        </div>
    </div>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


<script>
    $("#state").change(event => {

        $.get(`../towns1/${event.target.value}`, function(res, sta) {
            $("#town1").empty();
            res.forEach(element => {
                $("#town1").append(`<option value=${element.id}> ${element.nombre} </option>`);
                alert('hola')
            });
        });
    });

    function sumar() {
        var a = parseInt(document.getElementById("precio").value) || 0;
        var b = parseInt(document.getElementById("abono").value) || 0;
        total = (parseInt(a) - parseInt(b));
        document.getElementById('pendiente').value = total;
    }

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
