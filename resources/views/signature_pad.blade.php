<html>

<head>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>Firma Cliente </title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
        rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

    <style>
        .kbw-signature {
            width: 50%;
            height: 140px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }

    </style>

</head>

<body class="bg-dark">
<div class="container ">
    <div>
        <div class="card ">
            <div>
                <div class="card-header">
                    <br>
                    <img src="{{asset('/archivo/logo.jpg')}}" width="64px" alt="" class="float-right"><br>
                    <p class="small"><small>Paseo de las delicias 20, 2ª Madrid
                            28045</small><br><small>912305907/658592584</small> </p>
                    <p class="font-italic font-weight-bold text-right">ASESORIAS & EXTRANJERIA<br>EVATERRUM,
                        S.L<br>CIF: B87762357</p>
                    <br>
                </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success  alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

                        
            @if ($cliente->numseguridad == null)
                <h4>FICHA DEL CLIENTE</h4>
                <table class="table table-bordered table-sm" id="contenidoTabla">
                    <tbody>
                        <tr>
                            <td><small>FECHA</small> </td>
                            <td><small>{!! \Carbon\Carbon::parse($cliente->created_at)->format('d-m-Y') !!}</small></td>
                        </tr>
                        <tr>
                            <td><small>NOMBRE Y APELLIDOS</small> </td>
                            <td><small class="text-uppercase">{{ $cliente->nombre }}
                                    {{ $cliente->apellido }}</small> </td>
                        </tr>
                        <tr>
                            <td><small>DIRECCION</small> </td>
                            <td><small class="text-uppercase">{{ $cliente->direccion }}</small> </td>
                        </tr>
                        <tr>
                            <td><small>CIUDAD/LOCALIDAD Y PROVINCIA</small> </td>
                            <td><small class="text-uppercase">{{ $cliente->cp }},
                                    {{ $cliente->localidad->nombre }} /
                                    {{ $cliente->provincia->nombre }}</small> </td>
                        </tr>
                        <tr>
                            <td><small>{{ $cliente->document->nombre }}</small> </td>
                            <td><small class="text-uppercase">{{ $cliente->documento }}</small> </td>
                        </tr>
                        <tr>
                            <td><small>TELEFONO</small> </td>
                            <td><small>{{ $cliente->telefono }}</small> </td>
                        </tr>
                        <tr>
                            <td><small>CORREO ELECTRONICO</small> </td>
                            <td><small>{{ $cliente->email }}</small> </td>
                        </tr>
                        <tr>
                            <td><small>NACIONALIDAD</small> </td>
                            <td><small class="text-uppercase">{{ $cliente->pais->nombre }}</small> </td>
                        </tr>
                        <tr>
                            <td><small>ESTADO CIVIL</small> </td>
                            <td><small class="text-uppercase">{{ $cliente->estadocivil->nombre }}</small>
                            </td>
                        </tr>
                        <tr>
                            @php
                                $totalhijos = 0;
                            @endphp
                            <td><small>HIJOS</small> </td>
                            @if ($cliente->hijo1 != '')
                              @php($canhijo1 = 1);@endphp 
                            @endif
                            @if ($cliente->hijo2 != '')
                              @php($canhijo2 = 1) ;@endphp 
                            @endif
                                                                                    
                            @if ($cliente->hijo3 != '')
                                @php($canhijo3 = 1);@endphp 
                            @endif
                                                                                        
                            @if ($cliente->hijo4 != '')
                                @php($canhijo4 = 1);@endphp 
                            @endif
                                                                                            
                            @if ($cliente->hijo5 != '')
                                @php($canhijo5 = 1);@endphp 
                            @endif
                                                                                                
                            @if ($cliente->hijo6 != '')
                                @php($canhijo6 = 1);@endphp 
                            @endif
                                                                                                    
                            @if ($cliente->hijo7 != '')
                                @php($canhijo7 = 1);@endphp 
                            @endif
                            @if ($cliente->hijo8 != '')
                                @php($canhijo8 = 1);@endphp 
                            @endif
                            @if ($cliente->hijo9 != '')
                                @php($canhijo9 = 1);@endphp 
                            @endif
                            @if ($cliente->hijo10 != '')
                                @php($canhijo10 = 1);@endphp 
                            @endif
                            @if ($cliente->hijo11 != '')
                                @php($canhijo11 = 1);@endphp 
                            @endif
                            @if ($cliente->hijo12 != '')
                                @php($canhijo12 = 1);@endphp 
                            @endif
                    <td><small>
                        @if ($totalhijos == '' || $totalhijos == 0)
                                SIN HIJOS
                        @else
                            @if ($totalhijos == 1)
                                    {{ $totalhijos }} HIJO, EDAD: {{ $cliente->hijo1 }}
                            @else
                                    {{ $totalhijos }} HIJOS, EDADES:
                                    @for ($i = 1; $i <= $totalhijos; $i++)
                                        {{ $cliente->{'hijo' . $i} }} ,
                                    @endfor
                            @endif
                        @endif
                    </small> </td>
                    </tr>
                    <tr>
                        <td><small>NOMBRE DE LOS PADRES</small> </td>
                        <td><small class="text-uppercase">Padre: {{ $cliente->nombrepadre }}, Madre:
                                {{ $cliente->nombremadre }}</small> </td>
                    </tr>
                    <tr>
                        <td><small>FECHA DE NACIMIENTO</small> </td>
                        <td><small>{!! \Carbon\Carbon::parse($cliente->fecnac)->format('d-m-Y') !!}</small> </td>
                    </tr>
                    <tr>
                        <td><small>PROFESION</small> </td>
                        <td><small class="text-uppercase">{{ $cliente->profesion }}</small> </td>
                    </tr>
                    <tr>
                        <td><small>COMO NOS CONOCIÓ</small> </td>
                        <td><small class="text-uppercase">{{ $cliente->conocio }}</small> </td>
                    </tr>
                    <tr>
                        <td><small>OBSERVACIÓN</small> </td>
                        <td><small class="text-uppercase">{{ $cliente->observaciones }}</small> </td>
                    </tr>
               </tbody>
            </table>


        @else
            <h4>FICHA DEL CLIENTE - AUTÓNOMO/A</h4>
            <table class="table table-bordered table-sm" id="contenidoTabla">
                <tbody>
                    <tr>
                        <td><small>FECHA</small> </td>
                        <td><small>{!! \Carbon\Carbon::parse($cliente->created_at)->format('d-m-Y') !!}</small></td>
                    </tr>
                    <tr>
                        <td><small>NOMBRE Y APELLIDOS</small> </td>
                        <td><small class="text-uppercase">{{ $cliente->nombre }}
                                {{ $cliente->apellido }}</small> </td>
                    </tr>
                    <tr>
                        <td><small>DIRECCION</small> </td>
                        <td><small class="text-uppercase">{{ $cliente->direccion }}</small> </td>
                    </tr>
                    <tr>
                        <td><small>CIUDAD/LOCALIDAD Y PROVINCIA</small> </td>
                        <td><small class="text-uppercase">{{ $cliente->cp }},
                                {{ $cliente->localidad->nombre }} /
                                {{ $cliente->provincia->nombre }}</small> </td>
                    </tr>
                    <tr>
                        <td><small>DOMICILIO FISCAL</small> </td>
                        <td><small class="text-uppercase">{{ $cliente->domifiscal }}</small> </td>
                    </tr>
                    <tr>
                        <td><small>{{ $cliente->document->nombre }}</small> </td>
                        <td><small class="text-uppercase">{{ $cliente->documento }}</small> </td>
                    </tr>
                    <tr>
                        <td><small>TELEFONO</small> </td>
                        <td><small>{{ $cliente->telefono }}</small> </td>
                    </tr>
                    <tr>
                        <td><small>CORREO ELECTRONICO</small> </td>
                        <td><small>{{ $cliente->email }}</small> </td>
                    </tr>
                        <td><small>¿DISPONE DE CERTIFICADO DIGITAL?</small> </td>
                        <td><small class="text-uppercase">{{ $cliente->certdigital }}</small> </td>
        
                        <td><small>HA ESTADO ANTES DADO DE ALTA COMO AUTONOMO</small> </td>
                        @php
                            if ($cliente->numseguridad != '') {
                                $resp = 'SI, FECHA: ' . \Carbon\Carbon::parse($cliente->altaautonomo)->format('d-m-Y');
                            } else {
                                $resp = 'NO';
                            }
                        @endphp
                        <td><small class="text-uppercase">{{ $resp }} </small> </td>
        
                    <tr>
                        <td><small>NUMERO DE SEGURIDAD SOCIAL</small> </td>
                        <td><small class="text-uppercase">{{ $cliente->numseguridad }}</small> </td>
                    </tr>
                    <tr>
                        <td><small>CUENTA BANCARIA</small> </td>
                        <td><small>{{ $cliente->cuentabanco }}</small> </td>
                    </tr>
                    <tr>
                        <td><small>TITULAR DE LA CUENTA BANCARIA</small> </td>
                        <td><small class="text-uppercase">{{ $cliente->titularbanco }}</small> </td>
                    </tr>
                </tbody>
            </table>
        @endif


        <br>
        <div class="row justify-content-center">
          <div class="col-3"></div>
          <div class="col-6"><p class="small font-italic font-weight-bold">Antes de firmar la solicitud, debe leer la
            información básica sobre protección de datos.</p></div>
          <div class="col-3"></div>
        </div>

        <div class="row justify-content-center">
          <div class="col-4"></div>
          <div class="col-4">
            <button type="button" class="btn btn-primary btn-sm mb-5" data-toggle="modal" data-target="#myModal">
              Información básica sobre protección de datos
          </button>
          <center>
              <a href="{{ route('signaturepad.edit', $cliente) }}" type="button" class="btn btn-success">Firma Documento</a>
          </center>
          
          
          </div>
          <div class="col-4"></div>
        </div>
                                                                        
           
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Información básica sobre protección de datos</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div style="page-break-after:always;"></div>

                    <img src="{{ asset('/archivo/logo.jpg') }}" width="64px" alt="" class="float-right"><br>

                    <p class="small"><small>Paseo de las delicias 20, 2ª Madrid 28045</small><br><small>912305907/658592584</small> </p>
                    <br><br>
                    <p class="small3">
                    Les informamos, que tiene derecho a ejercer los derechos de acceso,
                    rectificación, supresión y portabilidad de sus datos, y la limitación u
                    oposición a su tratamiento de sus datos, en cualquier momento, siempre que
                    lo haga mediante notificación fehaciente a la dirección Paseo de las
                    Delicias, 20 planta 2ª. 28045, Madrid ante Evaterrum, S.L, con
                    <strong>B87762357.</strong> <br><br><br>

                    Autoriza a solicitar y descargar el Certificado Electrónico en nuestros
                    soportes informáticos para ser utilizados en procedimientos contratados por
                    el firmante.
                    Sus datos serán archivados y no se cederán datos a terceros, salvo
                    obligación legal.
                    Todos los datos aquí declarados por usted son ciertos y si existiera alguna
                    variación de datos, usted se compromete a declararlos a esta entidad.
                    AUTONOMOS: Se compromete a los pagos que resultan del ejercicio y alta de la
                    actividad como Persona Trabajadora por Cuenta Propia, <strong> NO TENIENDO
                    ESTA EMPRESA OBLIGACIÓN ALGUNA DE COSTEAR NINGÚN TIPO DE GASTO GENERADO
                    DE SU EJERCICIO.</strong><br><br><br>

                    Una vez finalizado, el procedimiento se compromete a recibir todos sus
                    documentos, no dejando aquí ningún original, copia compulsada, copia
                    apostillada y/o similar recibida, todo ello, por motivos de su
                    seguridad.<br><br><br>

                    Por motivos de calidad y seguridad en el servicio, usted se compromete a
                    aportar todos los documentos solicitados para evitar retrasos en el
                    procedimiento.
                    Tratamos la información que nos facilitan las personas interesadas con el
                    fin de gestionar el procedimiento solicitado, así como para realizar
                    asesorías y trámites con usted y en su nombre, para lo que usted ha sido
                    previamente infor
                    Se firma de manera libre y consciente el presente contrato de arrendamiento
                    de servicios, para la asesoría y tramitación solicitada por el firmante,
                    bajo la capacidad legal y en un plazo indeterminado, pudiendo dar por
                    concluida esta relación contractual siempre y cuando lo notifique la otra
                    parte con un mes de antelación, sin llevarse a cabo la devolución de dinero
                    por concepto de consulta o abono a dicho trámite, si es el arrendador quien
                    decide finalizar con los servicios contratados. <br><br><br>

                    Las partes intervinientes, con renuncia expresa de su fuero propio o del que
                    pudiera pertenecerles en cuanto a cuestiones o litigios se suscite con
                    motivo de la interpretación, aplicación, o cumplimiento del presente
                    contrato, se someten para su resolución a los
                    Juzgados y Tribunales de Madrid.<br><br><br>
                    Finalmente, todo lo declarado se insta en cumplimiento del Reglamento
                    General de Protección de Datos<span class="font-italic"> (Reglamento (UE)
                    2016/679 del Parlamento Europeo y del Consejo, de 27 de abril de 2016,
                    sobre la protección de las personas físicas en lo que respecta al
                    tratamiento de datos personales y la libre circulación de esos datos, y
                    por el que se deroga la Directiva 95/46 / CE (Reglamento general de
                    protección de datos) (Texto pertinente a efectos del EEE)</span>
                </p>
            </div>
                                                                                    
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>

        </div>
        </div>
        </div>
                                                                        
        </div>
        </div>




        {{-- <form method="POST" action="{{ route('signaturepad.store') }}">
        @csrf
        <input type="hidden" name="cliente" value="{{ $cliente->id }}">
        <div class="col-md-12">
                                                                       
            <div class="row justify-content-center">
              <div class="col-4"></div>
              <div class="col-4"><label class="mt-2" for=""><small>Firme en el Rectangulo:</small> </label></div>
              <div class="col-4"></div>
            </div>
                                                                        
            <div class="row justify-content-center">
              <div class="col-4"></div>
              <div class="col-4" id="sig"></div>
              <div class="col-4"></div>
            </div>

            <div ></div>
            <br>
            <div class="row justify-content-center">
              <div class="col-5"></div>
              <div class="col-3">
                <button id="clear" class="btn btn-danger btn-sm pull-left">Borrar Firma</button>
                <button class="btn btn-success  btn-sm pull-left">Grabar Firma</button>
              </div>
              <div class="col-4"></div>
            </div>

                                                                        
            <textarea id="signature64" name="signed" style="display: none"></textarea>
        </div>
        <br />

        </form> --}}

        </div>
    </div>
</div>
</div>

    <script type="text/javascript">
       var sig = $('#sig').signature({
        syncField: '#signature64',
        syncFormat: 'PNG'
        });
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });

    </script>
</body>
</html>
