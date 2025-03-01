

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Correo Electronico Enviado</h1>
@stop

@section('content')
    <div class="card text-center">
        <div class="card-header">
            <h2>Email</h2>
        </div>
        <div class="card-body">
            {{-- <h5 class="card-title">Email enviados</h5> --}}
            <h3 class="card-text mb-4">El Correo electronico ha sido enviado Satisfactoriamente!.</h3>
            <a class="btn btn-success btn-sm float-right" href="{{route('sends-mail.index')}}"><i class="far fa-hand-point-left"></i> Volver</a>
        </div>
        <div class="card-footer text-muted">
           
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop