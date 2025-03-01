@extends('adminlte::page')

@section('title', 'Filtro')

@section('content_header')
    <h1>
        Filtro</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
@stop

@section('content')
    <div class="bg-gray-400">


        <table id="example" class="table table-striped table-bordered " style="width:80%">
            <thead>
                <tr>
                    <th class="text-xs">Nombre</th>
                    <th class="text-xs">Apellido</th>
                    <th class="text-xs">Fec-Nac</th>
                    <th class="text-xs">Pais</th>
                    <th class="text-xs">Nie</th>
                    <th class="text-xs">ID/No. Expte</th>
                    <th class="text-xs">Delegac. Gobierno</th>
                    <th class="text-xs">Abogada</th>
                    <th class="text-xs">Tramite Presentado</th>
                    <th class="text-xs">Fecha Present</th>
                    <th class="text-xs">Term</th>
                    <th class="text-xs">Decisión</th>
                    <th class="text-xs">Fecha Resolucion</th>
                    <th class="text-xs">Observaciones</th>
                    <th class="text-xs">Silencio positivo</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($procesos as $proceso)
                    @php
                    if ($proceso->cliente->fecnac) {
                        $fecha = Carbon::parse($proceso->cliente->fecnac);
                        $afecha = $fecha->year;
                    }
                        
                    @endphp
                    <tr>
                        <td class="text-xs"><small>{{ $proceso->cliente->nombre }}</small></td>
                        <td class="text-xs"><small>{{ $proceso->cliente->apellido }}</small> </td>
                        <td class="text-xs"><small>{{ $afecha }}</small> </td>
                        <td class="text-xs"><small>{{ $proceso->cliente->pais->nombre }}</small></td>
                        <td class="text-xs"><small>{{ $proceso->cliente->documento }}</small></td>
                        <td class="text-xs"><small>{{ $proceso->numexpediente }}</small></td>
                        <td class="text-xs">
                            @if ($proceso->delegacion != '')
                                <small>{{ $proceso->delegacion->nombre }}</small>
                            @endif
                        </td>
                        <td class="text-xs"><small>{{ $proceso->user->name }}</small></td>
                        @php
                            $fechapre = Carbon::parse($proceso->fecpresentado);
                            $fechapre = $fechapre->year;
                        @endphp
                        <td class="text-xs">
                            @if ($proceso->proceso != '')
                                <small>{{ $proceso->proceso->nombre }}</small>
                            @endif
                        </td>
                        <td class="text-xs">
                            @if ($proceso->fecpresentado != '')
                                <small>{!! \Carbon\Carbon::parse($proceso->fecpresentado)->format('d-m-Y') !!}</small>
                            @endif
                        </td>
                        <td class="text-xs">
                            @if ($proceso->fecdesicion == '')
                                @php
                                    $date = $proceso->fecpresentado;
                                    $datework = Carbon::createFromDate($date);
                                    $now = Carbon::now();
                                    $testdate = $datework->diffInDays($now);
                                @endphp
                            @else
                                @php
                                    $date = $proceso->fecpresentado;
                                    $datework = Carbon::createFromDate($date);
                                    $now = $proceso->fecdesicion;
                                    $testdate = $datework->diffInDays($now);
                                @endphp
                            @endif
                            <small>{{ $testdate }}</small>
                        </td>
                        <td class="text-xs"><small>{{ $proceso->desicion->nombre }}</small></td>
                        <td class="text-xs">
                            @if ($proceso->fecdesicion != '')
                                <small>{!! \Carbon\Carbon::parse($proceso->fecdesicion)->format('d-m-Y') !!}</small>
                            @endif
                        </td>
                        <td class="text-xs"><small>{{ $proceso->observacion }}</small></td>
                        <td class="text-xs text-red-600">
                            @if ($proceso->proceso->alerta < $testdate)
                                {{ $proceso->proceso->comentario }}
                            @endif
                            <a href="{{ route('procesocliente.edit', $proceso) }}"><i
                                    class="fas fa-binoculars float-right"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
    </div>
@stop



@section('js')
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable(

                orderCellsTop: true,
                fixedHeader: true
            );
        });
    </script>

    <script>
        let temp = $("#btn1").clone();
        $("#btn1").click(function() {
            $("#btn1").after(temp);
        });

        $(document).ready(function() {
            var table = $('#example').DataTable({

                orderCellsTop: true,
                fixedHeader: true
            });

            //Creamos una fila en el head de la tabla y lo clonamos para cada columna
            $('#example thead tr').clone(true).appendTo('#example thead');

            $('#example thead tr:eq(1) th').each(function(i) {
                var title = $(this).text(); //es el nombre de la columna
                $(this).html('<input type="text" placeholder="Search...' + title + '" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
@stop
