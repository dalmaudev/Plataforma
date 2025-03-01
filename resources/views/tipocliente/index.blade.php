@extends('adminlte::page')

@section('title', 'Tipo cliente')

@section('content_header')
    <h1>Tipo cliente</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Tipo cliente') }}
                        </span>

                         <div class="float-right">
                            <a href="{{ route('tipoclientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                              {{ __('Crear Nuevo Tipo cliente') }}
                            </a>
                          </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tabla">
                            <thead class="thead">
                                <tr>
                                    <th><small>#</small> </th>

                                    <th><small>Nombre</small> </th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               @php
                               $i=0;
                               @endphp
                                @foreach ($tipoclientes as $tipocliente)
                                    <tr>
                                        <td width="2%"><small>{{ ++$i }}</small> </td>

                                        <td><small>{{ $tipocliente->nombre }}</small> </td>

                                        <td class="float-right">
                                            <form action="{{ route('tipoclientes.destroy',$tipocliente->id) }}" method="POST">
                                                <a class="btn btn-sm btn-success" href="{{ route('tipoclientes.edit',$tipocliente->id) }}"><i class="fa fa-fw fa-edit"></i> </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Estás seguro que deseas eliminar el registro?');" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('js/bs-custom-file-input.min.js') }}"></script>
    <script>
        $('#tabla').DataTable({
            responsive: true,
            autoWidth: false,

            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por paginas",
                "zeroRecords": "Nada encontrado - disculpe",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar",
                "paginate": {
                    'next': 'Siguiente',
                    'previous': 'Anterior'
                }

            }
        });
    </script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
@stop
