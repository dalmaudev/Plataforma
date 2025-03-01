<!DOCTYPE html>
<html>
<head>
    <title> Firma documento</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
  
    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
  
    <style>
        .kbw-signature { width: 100%; height: 300px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>
  
</head>
<body class="bg-dark">
<div class="container">
   <div class="row">
       <div class="col-md-12 mt-5">
           <div class="card">
               <div class="card-header">
                   <h5>Firma Documento : {{ $cliente->nombre }} {{ $cliente->apellido }}</h5>
               </div>
               <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>  
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('signaturepad.store') }}">
                        @csrf
                        <input type="hidden" name="cliente" value="{{ $cliente->id }}">
                        <div class="col-md-12">
                            <label class="" for="">Por favor firme en el rectangulo:</label>
                            <br/>
                            <div id="sig" ></div>
                            <br/>
                            <div class="col-8 mb-2">
                            <button id="clear" class="btn btn-danger ">Borrar Firma</button>
                            <button class="btn btn-success pull-right ">Grabar Firma</button>
                            </div>
                            <textarea id="signature64" name="signed" style="display: none"></textarea>
                            <small>
                                <p class="small font-italic font-weight-bold">Mediante la firma acepta la conformidad de lo
                                    aquí citado.</p>
                            </small>
                        </div>
                        <br/>
                        
                    </form>
                    
               </div>
           </div>
       </div>
   </div>
</div>
<script>
    function ponleFocus(){
    document.getElementById("signature64").focus();
}
</script>

<script type="text/javascript">
$("#sig").focus();
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>

</body>
</html>