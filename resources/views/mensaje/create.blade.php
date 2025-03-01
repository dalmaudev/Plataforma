@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Mensajes</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'mensaje.store']) !!}
            <div class="row">
                <div class="form-group col-md-2">
                  <small>{!! Form::label('saludo', 'Saludo Cliente') !!}  </small>
                  {!! Form::select('saludo', ['ES' => 'Estimado/a', 'SE' => 'Señor/a', 'DI' => 'Distinguido/a', 'UN' => 'Un cordial saludo.'], null,['class' => 'form-control mb-2']) !!}
                </div>
            </div>
            <small>{!! Form::label('nombre', 'Nombre del Mensaje') !!}</small>
            {!! Form::text('nombre', null, ['class' => 'form-control mb-2']) !!}
            <hr>
            <small>{!! Form::label('Encabezado', 'Encabezado del Mensaje') !!}</small>
            {!! Form::text('subject', null, ['class' => 'form-control mb-2']) !!}
            <small>{!! Form::label('titulo', 'Titulo del Mensaje') !!}</small>
            {!! Form::text('titulo', null, ['class' => 'form-control mb-2']) !!}
            <small>{!! Form::label('asunto', 'Mensaje') !!}</small>
            {!! Form::textarea('asunto', null, ['class' => 'form-control mb-2','rows' => '10']) !!}
            <div class="row">
                <div class="form-group col-md-2">
                  <small>{!! Form::label('despido', 'Saludo Despedida Cliente') !!}  </small>
                  {!! Form::select('despido', ['SD' => 'Se despide atentamente.', 'AT' => 'Atentamente.', 'CO' => 'Cordialmente.'], null,['class' => 'form-control mb-2']) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                  <small>{!! Form::label('especialista', 'Especialista') !!}  </small>
                  {!! Form::select('especialista', $especialista, null,['class' => 'form-control mb-2']) !!}
                </div>
            </div>
            <br>
            {!! Form::submit('Crear Mensaje', ['class' => 'btn btn-primary float-right']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#asunto' ), {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                    ]
                }
            } )
            .catch( error => {
                console.log( error );
            } );
    </script>
@stop