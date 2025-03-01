
  <!DOCTYPE html>
  <html>
  <head>
      <title> Firma cliente</title>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
      <meta name="description" content="Signature Pad - HTML5 canvas based smooth signature drawing using variable width spline interpolation.">

      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    
      <meta name="apple-mobile-web-app-capable" content="yes">
      <meta name="apple-mobile-web-app-status-bar-style" content="black">
    
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
      <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    
      <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
    
      <style>
          .kbw-signature { width: 100%; height: 200px;}
          #sig canvas{
              width: 100% !important;
              height: auto;
          }
      </style>
    
  </head>
  <body class="bg-dark">
  <div class="container">
     <div class="row">
         <div class="col-md-6 offset-md-3 mt-5">
             <div class="card">
                 <div class="card-header">
                     <h5>Firma cliente </h5>
                 </div>
                 <div class="card-body">
                      @if ($message = Session::get('success'))
                          <div class="alert alert-success  alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert">×</button>  
                              <strong>{{ $message }}</strong>
                          </div>
                      @endif
                      <form method="POST" action="{{ route('signature') }}">
                          @csrf
                          <div class="col-md-12">
                              <label class="" for="">Signature:</label>
                              <br/>
                              <div id="sig" ></div>
                              <br/>
                              <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                              <textarea id="signature64" name="signed" style="display: none"></textarea>
                          </div>
                          <br/>
                          <button class="btn btn-success">Save</button>
                      </form>
                 </div>
             </div>
         </div>
     </div>
  </div>
  
  <script type="text/javascript">
      var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
      $('#clear').click(function(e) {
          e.preventDefault();
          sig.signature('clear');
          $("#signature64").val('');
      });
  </script>
  
  </body>
  </html>


 
</head>
<body>
  <div id="signature-pad" class="signature-pad">
    <div class="signature-pad--body">
      <canvas width="100%"></canvas>
    </div>
    <div class="signature-pad--footer">
      <div class="description">Sign above</div>

    </div>
  </div>
  <script>
    var wrapper = document.getElementById("signature-pad");

  var canvas = wrapper.querySelector("canvas");
  var signaturePad = new SignaturePad(canvas, {
    backgroundColor: 'rgb(255, 255, 255)'
  });

  // Adjust canvas coordinate space taking into account pixel ratio,
  // to make it look crisp on mobile devices.
  // This also causes canvas to be cleared.
  function resizeCanvas() {
    // When zoomed out to less than 100%, for some very strange reason,
    // some browsers report devicePixelRatio as less than 1
    // and only part of the canvas is cleared then.
    var ratio =  Math.max(window.devicePixelRatio || 1, 1);

    // This part causes the canvas to be cleared
    canvas.width = $('#signature-pad').width();
    canvas.height = '250';
    canvas.getContext("2d").scale(ratio, ratio);

    signaturePad.clear();
  }

  window.onresize = resizeCanvas;
  resizeCanvas();
  </script>
  
</body>
</html>