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
                    <h3 class="card-title">Control de Llamadas (Historial) <strong>{{ ucfirst(trans($llamada->nombre)) }}
                            {{ ucfirst(trans($llamada->apellido)) }} / {{ $llamada->telefono }}</strong>
                          
                            @if ($llamada->afiliado)
                            <i class="fas fa-user-check"></i> Afiliado desde ({{ \Carbon\Carbon::parse($llamada->fecafiliado)->format('d-m-Y') }})
                            @endif
                          
                          
                          </h3>
                    <a href="{{ route('llamada.crearllamada', $llamada->id) }}"
                        class="btn btn-sm btn-info float-right ml-2">Crear Nueva Consulta</a>
                    @if ($llamada->cliente == 1)
                        <a href="{{ route('cliente.edit', $llamada->id) }}" class="btn btn-sm btn-success float-right"><i
                                class="fas fa-check"></i> Ver ficha cliente</a>
                    @else
                        <a href="{{ route('llamada.crear', $llamada->id) }}" class="btn btn-sm btn-warning float-right">Crear
                            ficha cliente</a>
                    @endif

                    @if ($llamada->afiliado == 1)
                        <a href="{{ route('llamada.crearafiliado', $llamada->id) }}"
                            class="btn btn-sm btn-success float-right mr-2"><i
                            class="fas fa-check"></i> Ver ficha Afiliado ({{ \Carbon\Carbon::parse($llamada->fecafiliado)->format('d-m-Y') }})</a>
                    @else
                        <a href="{{ route('llamada.crearafiliado', $llamada->id) }}"
                            class="btn btn-sm btn-warning float-right mr-2">Crear ficha Afiliado</a>
                    @endif


                </div>
                <div class="card-body ">
                    <table class="table table-striped table-sm">
                        <thead>
                            <th>#</th>
                            <th>Consulta</th>
                            <td></td>
                        </thead>
                        <tbody>
                            @foreach ($llam as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    @error('consulta')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <td>{{ $item->consulta }}</td>

                                    {{-- <td>{{$item->fecllam}}</td> --}}
                                    @error('fecllam')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <td>{{ \Carbon\Carbon::parse($item->fecllam)->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('llamada.ver', $item->id) }}"
                                            class="btn btn-success btn-sm float-right mr-2" title="Mostrar"><i
                                                class="far fa-eye"></i></a>
                                        <a href="{{ route('llamada.edit', $item->id) }}"
                                            class="btn btn-danger btn-sm float-right  mr-2" title="Editar"><i
                                                class="fa fa-pen"></i></a>
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
            <script>
                console.log('Hi!');
            </script>
        @stop
