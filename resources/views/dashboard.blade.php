@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Dashboard</h1> --}}
@stop
@section('css')


    <link rel="stylesheet" href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}">

    <style>
        .filtro {
            background-color: #F0F0F1;
        }

        .filtro .nav-item>a {
            background-color: white;
            margin-right: 10px;
            color: #636bf;
        }

        .filtro i {
            margin-right: 5px;
        }
    </style>

@stop
@section('content')
    <!-- Main content -->


    <section class="content">
        {{-- row --}}
        <div class="row">
            <div class="col-8">
                <h6>Buscador</h6>
                <form action=""></form>
                {{-- <form id="form" action="{{route('cliente.show', 3)}}"> --}}
                <div class="input-group">
                    <input type="text" class="form-control" id="search">
                    <div class="input-group-append">
                        <button type="button" onclick="submitform()" class="btn btn-success"><i
                                class="fas fa-search"></i></button>
                        {{-- <a href="{{route('cliente.show', 3)}}">Buscar</a> --}}
                        {{-- <a onclick="Javascript:variable=preguntaNombre();" href=#> Inventario</a> --}}
                    </div>
                </div>
                </form>
                <br><br>
            </div>

            <div class="col-4">
                <h6>Alertas</h6>
                <div class="col-12" id="accordion">


                    @foreach ($alertas as $alerta)
                        @php

                            $ver = 5;

                           $a = $alerta->fecalert;
                          $b = date('Y-m-d');

                            $date1 = new DateTime($a);
                            $date2 = new DateTime($b);
                            $diff = $date1->diff($date2);
                             $dias = $diff->days;

                            if ($a > $b) {
                                
                                switch ($dias) {
                                    case 1:
                                        $ver = 1;
                                        $color = 'card-warning';
                                        $estado = 1;
                                        break;
                                    case 2:
                                        $ver = 1;
                                        $color = 'card-warning';
                                        $estado = 1;
                                        break;
                                    case 3:
                                        $ver = 1;
                                        $color = 'card-warning';
                                        $estado = 1;
                                        break;
                                    case 4:
                                        $ver = 1;
                                        $color = 'card-warning';
                                        $estado = 1;
                                        break;
                                    case 5:
                                        $ver = 1;
                                        $color = 'card-warning';
                                        $estado = 1;
                                        break;
                                    case 6:
                                        $ver = 1;
                                        $color = 'card-success';
                                        $estado = 1;
                                        break;
                                    case 7:
                                        $ver = 1;
                                        $color = 'card-success';
                                        $estado = 1;
                                        break;
                                    case 8:
                                        $ver = 1;
                                        $color = 'card-success';
                                        $estado = 1;
                                        break;
                                    case 9:
                                        $ver = 1;
                                        $color = 'card-success';
                                        $estado = 1;
                                        break;
                                    case 10:
                                        $ver = 1;
                                        $color = 'card-success';
                                        $estado = 1;
                                        break;
                                }
                            } elseif ($a == $b) {
                                $ver = 1;
                                $color = 'card-success';
                            } else {
                                switch ($dias) {
                                    case 1:
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                    case 2:
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                    case 3:
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                    case 4:
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                    case 5:
                                   
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                    case 6:
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                    case 7:
                                        $ver = 1;
                                        $color = 'card-danger';
                                        $estado = 1;
                                        break;
                                }
                            }

                        @endphp

                        @if ($ver == 1)
                            <div class="card {{ $color }} card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapse{{ $alerta->id }}">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            {{ $alerta->titulo }}
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapse{{ $alerta->id }}" class="collapse" data-parent="#accordion">
                                    <a href="{{ route('cliente.show', $alerta->cliente_id) }}">
                                        <div class="card-body">
                                            {!! \Carbon\Carbon::parse($alerta->fecalert)->format('d-m-Y') !!} - {{ $alerta->cuerpo }}
                                        </div>
                                    </a>
                                </div>

                                <div>
                                    @if ($alerta->deuser != null)
                                        <div class="d-flex justify-content-between container">
                                            <div>
                                                <small><small>De: {{ $alerta->deuser->name }}</small></small>
                                            </div>

                                            <div>
                                                <small><small>Cread@: {!! \Carbon\Carbon::parse($alerta->created_at)->format('d-m-Y') !!} </small></small>
                                            </div>

                                        </div>
                                    @else
                                        <small></small>
                                    @endif

                                </div>
                                <div>
                                    @if ($alerta->parauser != null)
                                    <div class="d-flex justify-content-between container">
                                        <div>
                                            <small><small>Para: <strong>{{ $alerta->parauser->name }}</strong> </small></small>
                                        </div>
                                        <div>

                                        </div>
                                    </div>

                                    @else
                                        <small></small>
                                    @endif

                                </div>

                            </div>
                        @endif
                    @endforeach




                </div>
            </div>



        </div>
        {{-- fin row --}}
    @stop



    @section('js')


        <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>


        <script>
            $('#search').autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('search.cursos') }}",
                        dataType: 'json',
                        data: {
                            term: request.term
                        },
                        success: function(data) {
                            response(data)

                        }
                    });
                }
            });



            function submitform() {
                var operation = document.getElementById("search").value
                var id = operation.split(" ");
                var id = id[0];
                let url = "{{ route('cliente.show', ':id') }}";
                url = url.replace(':id', id);
                document.location.href = url;
            }
        </script>


    @stop
