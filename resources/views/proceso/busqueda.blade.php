@extends('adminlte::page')

@section('title', 'Busqueda Proceso')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
    @stop

@section('content_header')
    <h1>Procesos Cliente</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-striped" id="usuarios">
        <thead>
            <tr>
                <th><small>#</small> </th>
                <th><small>Proceso</small> </th>
                <th><small>Nombre&nbsp;Cliente</small> </th>
                <th><small>Apellido&nbsp;Cliente</small> </th>
                <th><small>Especialista</small> </th>
                <th><small>Telefono</small> </th>
                <th><small>FecPrePro</small> </th>
                <th><small>Desicion</small> </th>
            </tr>
        </thead>
        <tbody>
            @php
                $x1=1;
            @endphp
            @foreach ($users as $procesocliente)
               <tr>
                    <td title="{{$procesocliente->id}}"><small><a href="">{{$x1}}</small></a> </td>
                    <td><small><a href="{{route('procesocliente.edit', $procesocliente->id)}}">{{$procesocliente->proceso}}</small></a> </td>
                    <td><small><a href="{{route('procesocliente.edit', $procesocliente->id)}}">{{$procesocliente->ncliente}}</small></a> </td>
                    <td><small><a href="{{route('procesocliente.edit', $procesocliente->id)}}">{{$procesocliente->acliente}}</small></a> </td>
                    <td><small><a href="{{route('procesocliente.edit', $procesocliente->id)}}">{{$procesocliente->especialista}}</small></a> </td>
                    <td><small><a href="{{route('procesocliente.edit', $procesocliente->id)}}">{{$procesocliente->telefono}}</small></a> </td>
                    <td><small><a href="{{route('procesocliente.edit', $procesocliente->id)}}">{{\Carbon\Carbon::parse($procesocliente->fecpresentado)->format('d-m-Y')}}</small></a> </td>
                    <td><small><a href="{{route('procesocliente.edit', $procesocliente->id)}}">{{$procesocliente->desicionPro}}</small></a> </td>
                </tr>
                @php
                $x1++;
            @endphp
            @endforeach
        </tbody>
    </table>
    </div>
</div>

@stop



@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    


    <script>
        $('#usuarios').DataTable({
            responsive: true,
            autoWidth:false,
            dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
            "language": {
            // "lengthMenu": "Mostrar _MENU_ registros por página",
            "lengthMenu": "Mostrar "+ 
            '<select class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option><option value="-1">All</option></select>' 
            +" registros por página",
            "zeroRecords": "Nada encontrado - disculpe",
            "info": "Mostrando la página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        
        
        });
    </script>
@stop