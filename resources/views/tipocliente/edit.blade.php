@extends('adminlte::page')

@section('title', 'Actualizar Tipo cliente')

@section('content_header')
    <h1>Actualizar Tipo cliente</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Actualizar Tipo cliente</span>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tipoclientes.update', $tipocliente->id) }}"  role="form" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('tipocliente.form')

                        <div class="box-footer mt20">
                            <button type="submit" class="btn btn-primary btn-sm float-right">Actualizar Tipo cliente</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
