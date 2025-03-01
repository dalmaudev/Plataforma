@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>index llamada</h1> --}}
@stop

@section('content')





<section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title">Control de Llamadas: {{ucfirst(trans($querys->nombre))}} {{ucfirst(trans($querys->apellido))}}</h3>

        
        </div>
         <div class="card-body ">
          {!! Form::open(['route' => 'llamada.store',$querys->id]) !!}
    
          @php
          date_default_timezone_set('Europe/Madrid');
          @endphp
          <input type="hidden" name="fecllam" value="{{date('Y-m-d')}}">
          <input type="hidden" name="control" class="form-control" value="{{$querys->id}}">

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">Consulta</span>
            </div>
            <input type="text" name="consulta" class="form-control" id="basic-url" aria-describedby="basic-addon3">
          </div>

          <input type="hidden" name="tipo" value="1">
       
          <div class="row">
          
            <div class="col-12">
              <a href="{{route('llamada.index')}}" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i>  Volver</a>
                
                <button type="submit" class="btn btn-success float-right">Grabar Información</button>
                {{-- <input type="submit" value="Grabar Consulta"  class="btn btn-success float-right"> --}}
              </div>

              
          </div>
          {!! Form::close() !!}
        </div>
        
      </div>
  
   

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">

    <style>
      .filtro{
        background-color: #F0F0F1;
      }
      .filtro .nav-item > a{
        background-color: white;
        margin-right: 10px;
        color: #636bf;
      }
      .filtro i{
        margin-right: 5px;
      }
    </style>

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>


    <script>
      $('#search').autocomplete({
        source: function(request, response){
          $.ajax({
            url: "{{route('llamada.cursos')}}",
            dataType: 'json', 
            data: {
              term: request.term
            },
            success: function(data){
              response(data)
              
            }
          });
        }
      });

        
   
      function submitform(){
        var operation = document.getElementById("search").value
        var id = operation.split(" ");
        var id = id[0];
        let url = "{{ route('llamada.show', ':id') }}";
        url = url.replace(':id', id);
        document.location.href=url;
      }

     </script>

    {{-- <script>
    var cursos = ['html','css','php'];
    
      $('#search').autocomplete({
        source: cursos
      });
      
    </script> --}}
@stop