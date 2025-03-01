<!DOCTYPE html>
<html>
<head>
    <title>FICHA CLIENTE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        p.small {
          line-height: 0.8;
        }
        p.small2 {
          line-height: 1.5;
          font-size: 12px;
        }
        p.small3 {
          line-height: 1.5;
          font-size: 12px;
        }


        p.big {
          line-height: 1.8;
        }
        #contenidoTabla {
            font-size: 15px;
        }

        td {
            font-size: 12px;

            }

        th {
        font-size: 25px;
            color:green;
            }

        img.derecha {
            float: right;
        }
        </style>
</head>
<body>

<img src="{{ public_path('/archivo/logo.jpg') }}" width="64px" alt="" class="float-right" ><br>
<p></p>
    <p class="small"><small>Paseo de las delicias 20, 2ª Madrid 28045</small><br><small>912305907/658592584</small> </p>
    <p class="font-italic font-weight-bold text-right float-right"><small>SSS ASESORIAS & EXTRANJERIA, S.L <br>CIF: B72682768</small></p>


    <br>
        @if ($cliente->numseguridad == null)
          <h4>FICHA DEL CLIENTE</h4>
          <table class="table table-bordered table-sm" id="contenidoTabla">
            <tbody>
              <tr>
                <td>FECHA </td>
                <td><strong>{!! \Carbon\Carbon::parse($cliente->created_at)->format('d-m-Y') !!}</strong> </td>
              </tr>
              <tr>
                <td>NOMBRE Y APELLIDOS  </td>
                <td class="text-uppercase"><strong>{{$cliente->nombre}} {{$cliente->apellido}}</strong>  </td>
              </tr>
              <tr>
                <td>DIRECCION</td>
                <td class="text-uppercase"><strong>{{$cliente->direccion}} </strong> </td>
              </tr>
              <tr>
                  <td>CIUDAD/LOCALIDAD Y PROVINCIA  </td>
                  <td class="text-uppercase"><strong> {{$cliente->cp}}, {{$cliente->localidad->nombre}} / {{$cliente->provincia->nombre}}</strong></td>
              </tr>
              <tr>
                  <td>{{$cliente->document->nombre}}  </td>
                  <td class="text-uppercase"><strong>{{$cliente->documento}}</strong>  </td>
              </tr>
              <tr>
                  <td>TELEFONO  </td>
                  <td><strong>{{$cliente->telefono}} </strong> </td>
              </tr>
              <tr>
                  <td>CORREO ELECTRONICO  </td>
                  <td><strong>{{$cliente->email}} </strong></td>
              </tr>
              <tr>
                  <td>NACIONALIDAD  </td>
                  <td class="text-uppercase"><strong>{{$cliente->pais->nombre}} </strong></td>
              </tr>
              <tr>
                  <td>ESTADO CIVIL </td>
                  <td class="text-uppercase"><strong>{{$cliente->estadocivil->nombre}} </strong></td>
              </tr>
              <tr>
                @php
                    $totalhijos = 0;
                @endphp
                  <td>HIJOS </td>
                  @if ($cliente->hijo1 != '')
                    @php
                    ($canhijo1 = 1);
                    $totalhijos = $totalhijos + $canhijo1;
                    @endphp
                  @endif
                  @if ($cliente->hijo2 != '')
                    @php
                    ($canhijo2 = 1) ;
                    $totalhijos = $totalhijos + $canhijo2;
                    @endphp
                  @endif
                  @if ($cliente->hijo3 != '')
                    @php
                    ($canhijo3 = 1);
                    $totalhijos = $totalhijos + $canhijo3;
                    @endphp
                  @endif
                  @if ($cliente->hijo4 != '')
                    @php
                    ($canhijo4 = 1);
                    $totalhijos = $totalhijos + $canhijo4;
                    @endphp
                  @endif
                  @if ($cliente->hijo5 != '')
                    @php
                    ($canhijo5 = 1);
                    $totalhijos = $totalhijos + $canhijo5;
                    @endphp
                  @endif
                  @if ($cliente->hijo6 != '')
                    @php
                    ($canhijo6 = 1);
                    $totalhijos = $totalhijos + $canhijo6;
                    @endphp
                  @endif
                  @if ($cliente->hijo7 != '')
                    @php
                    ($canhijo7 = 1);
                    $totalhijos = $totalhijos + $canhijo7;
                    @endphp
                  @endif
                  @if ($cliente->hijo8 != '')
                    @php
                    ($canhijo8 = 1);
                    $totalhijos = $totalhijos + $canhijo8;
                    @endphp
                  @endif
                  @if ($cliente->hijo9 != '')
                    @php
                    ($canhijo9 = 1);
                    $totalhijos = $totalhijos + $canhijo9;
                    @endphp
                  @endif
                  @if ($cliente->hijo10 != '')
                    @php
                    ($canhijo10 = 1);
                    $totalhijos = $totalhijos + $canhijo10;
                    @endphp
                  @endif
                  @if ($cliente->hijo11 != '')
                    @php
                    ($canhijo11 = 1);
                    $totalhijos = $totalhijos + $canhijo11;
                    @endphp
                  @endif
                  @if ($cliente->hijo12 != '')
                    @php
                    ($canhijo12 = 1);
                    $totalhijos = $totalhijos + $canhijo12;
                    @endphp
                  @endif
                  <td>
                    @if ($totalhijos == '' || $totalhijos == 0)
                  <strong>SIN HIJOS</strong>
                    @else
                      @if ($totalhijos == 1)
                      {{$totalhijos}}  HIJO, EDAD:  {{$cliente->hijo1}}
                      @else
                        {{$totalhijos}}  HIJOS, EDADES:
                        @for ($i = 1; $i <= $totalhijos; $i++)
                      <strong>{{ $cliente->{'hijo'.$i} }}</strong> ,
                        @endfor
                      @endif
                    @endif
                     </td>
              </tr>
              <tr>
                  <td>NOMBRE DE LO PADRES</td>
                  <td class="text-uppercase"><strong>Padre: {{$cliente->nombrepadre}}, Madre: {{$cliente->nombremadre}}</strong> </td>
              </tr>
              <tr>
                  <td>FECHA DE NACIMIENTO </td>
                  <td><strong>{!! \Carbon\Carbon::parse($cliente->fecnac)->format('d-m-Y') !!}</strong> </td>
              </tr>
              <tr>
                <td>PROFESION  </td>
                <td class="text-uppercase"><strong>{{$cliente->profesion}} </strong></td>
            </tr>
            <tr>
              <td>COMO NOS CONOCIÓ  </td>
              <td class="text-uppercase"><strong>{{$cliente->conocio}} </strong></td>
          </tr>
          <tr>
            <td>OBSERVACIÓN  </td>
            <td class="text-uppercase"><strong>{{$cliente->observaciones}} </strong></td>
        </tr>
            </tbody>
          </table>
          <br><br>

        @if ($cliente->firmado != '')
        <div>
          <center>
          <img src="{{ public_path('/upload/'.$cliente->firmado) }}" width="250px"  ><br>
          </center>

        </div>


        @else
          <p class="small font-italic font-weight-bold">Antes de firmar la solicitud, debe leer la información básica sobre protección de datos que se presenta. en el reverso de esta página.</p>
        <br><br>
        <p class="small2">Mediante la firma acepta la conformidad de lo aquí citado.</p>
        @endif

        <br> <p class="small3"> Esta información varía desde el día de consulta según normativa
        <br>  Vigente española, por tanto no tendrá validez de forma indefinida </p>
{{-- 
        <div style="page-break-after:always;"></div>

        <img src="{{ public_path('/archivo/logo.jpg') }}" width="64px" alt="" class="float-right" ><br>
    <p class="small"><small>Paseo de las delicias 20, 2ª Madrid 28045</small><br><small>912305907/658592584</small> </p>
    <br>
    <h3 class="text-center">Contratación de servicios</h3>
   <br><br>
    <p  class="small3">Les informamos, que tiene derecho a ejercer los derechos de acceso, rectificación, supresión y portabilidad de sus datos, y la limitación u oposición a su tratamiento de sus datos, en cualquier momento, siempre que lo haga mediante notificación fehaciente a la dirección Paseo de las Delicias, 20 planta 2ª dcha. 28045, Madrid ante <strong>Evaterrum, S.L</strong>, con <strong>CIF B87762357</strong> . <br><br>
        Autoriza a solicitar y descargar el Certificado Electrónico en nuestros soportes informáticos para ser utilizados en procedimientos contratados por el firmante. <br>
        Sus datos serán archivados y no se cederán datos a terceros, salvo obligación legal. <br><br>
        Todos los datos aquí declarados por usted son ciertos y si existiera alguna variación de datos, usted se compromete a declararlos a esta entidad.<br><br>
        Una vez finalizado, el procedimiento se compromete a recibir todos sus documentos, no dejando aquí ningún original, copia compulsada, copia apostillada y/o similar recibida, todo ello, por motivos de su seguridad. Aun así, guardaremos escaneados todos los documentos recibidos.<br><br>
        Por motivos de calidad y seguridad en el servicio, usted se compromete a aportar todos los documentos solicitados para evitar retrasos en el procedimiento. <br><br>
        Tratamos la información que nos facilitan las personas interesadas con el fin de gestionar el procedimiento solicitado, así como para realizar asesorías y trámites con usted y en su nombre, para lo que usted ha sido previamente informado. <br><br>
        Se firma de manera libre y consciente el presente contrato de arrendamiento de servicios, para la asesoría y tramitación solicitada por el firmante, bajo la capacidad legal y en un plazo indeterminado, pudiendo dar por concluida esta relación contractual siempre y cuando lo notifique la otra parte con un mes de antelación, sin llevarse a cabo la devolución de dinero por concepto de consulta o abono a dicho trámite, si es el arrendador quien decide finalizar con los servicios contratados. <br><br>
        Las partes intervinientes, con renuncia expresa de su fuero propio o del que pudiera pertenecerles en cuanto a cuestiones o litigios se suscite con motivo de la interpretación, aplicación, o cumplimiento del presente contrato, se someten para su resolución a los Juzgados y Tribunales de Madrid. <br><br>
        Finalmente, todo lo declarado se insta en cumplimiento del Reglamento General de Protección de Datos <span class="font-italic">(Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo, de 27 de abril de 2016, sobre la protección de las personas físicas en lo que respecta. al tratamiento de datos personales y la libre circulación de esos datos, y por el que se deroga la Directiva 95/46 / CE (Reglamento general de protección de datos) (Texto pertinente a efectos del EEE)</span>
    </p>




    <br><br> --}}
    <div style="page-break-after:always;"></div>
    <img src="{{ public_path('/archivo/logo.jpg') }}" width="64px" alt="" class="float-right" ><br>
    <p class="small"><small>Paseo de las delicias 20, 2ª Madrid 28045</small><br><small>912305907/658592584</small> </p>
    <br><br>
    <h3 class="text-center">Información y Protección de Datos de Servicios</h3>
    <p  class="small3">
        <br>
        Le informamos que, tiene derecho a ejercer los derechos de acceso, rectificación, supresión y portabilidad de sus datos, y la limitación u oposición al tratamiento de sus datos en cualquier momento, siempre que lo haga mediante notificación fehaciente a la siguiente dirección: Paseo de las Delicias, 20 2da Planta Puerta A, CP 28045, Madrid; ante <strong> SSS Asesorías & Extranjería, S.L, con CIF B72682768.</strong><br><br>

Una vez contratado nuestros servicios y si resultara necesario -con su previa anuencia-, solicitamos y descargamos su Certificado Electrónico para ser utilizado de forma segura con la Administración Pública, en el o los procedimientos contratados por el firmante. <br><br>

Todos los datos aquí declarados por usted son ciertos, y si existiera alguna variación de estos, usted se compromete a comunicarlos a esta entidad. <br><br>

Sus datos serán archivados durante un (1) año y no se cederán sus datos a terceros, salvo obligación legal.<br><br>

Para garantizar la calidad y seguridad de la información que se tramita a la Administración Pública, el firmante se compromete al aporte de todos los documentos que se le soliciten para evitar retrasos, archivo, denegación o desistimiento en el procedimiento, quedando exento este despacho por incumplimientos provocados por el firmante.<br><br>

Una vez finalizado el procedimiento contratado por usted, se compromete a recibir toda la documentación que aportó, no dejando en esta entidad ningún original, copia compulsada, apostillada y/o similar; todo ello, por motivos de seguridad.  No obstante, en nuestros archivos permanecerán copias de los referidos documentos, los que se destruirán transcurrido un (1) año.<br><br>

Se firma de manera libre y consciente el presente documento, para la asesoría y tramitación solicitada por el firmante, bajo la capacidad legal y en plazo indeterminado, pudiendo dar por concluida esta relación contractual siempre y cuando lo notifique la otra parte con treinta (30) días de antelación, sin llevarse a cabo la devolución de dinero por concepto de consulta o abono a dicho trámite, si es el arrendador quien decide finalizar con los servicios contratados.<br><br>

Las partes intervinientes, con renuncia expresa de su fuero propio o del que pudiera pertenecerles en cuanto a cuestiones o litigios se suscite con motivo de la interpretación, aplicación, o incumplimiento del presente contrato, se someten para su resolución a los Juzgados y Tribunales de Madrid.<br><br>

Finalmente, todo lo declarado se insta en cumplimiento del Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo, de 27 de abril de 2016, relativo a la protección de las personas físicas en lo que respecta al tratamiento de datos personales y a la libre circulación de estos datos y por el que se deroga la Directiva 95/46/CE (Reglamento general de protección de datos).<br><br>


    </p>


  @else
        <h4>FICHA DEL CLIENTE - AUTÓNOMO/A</h4>
        <table class="table table-bordered table-sm" id="contenidoTabla">
          <tbody>
            <tr>
              <td><small>FECHA</small> </td>
              <td><small>{!! \Carbon\Carbon::parse($cliente->created_at)->format('d-m-Y') !!}</small></td>
            </tr>
            <tr>
              <td><small>NOMBRE Y APELLIDOS</small>  </td>
              <td><small class="text-uppercase">{{$cliente->nombre}} {{$cliente->apellido}}</small> </td>
            </tr>
            <tr>
              <td><small>DIRECCION</small> </td>
              <td><small class="text-uppercase">{{$cliente->direccion}}</small> </td>
            </tr>
            <tr>
                <td><small>CIUDAD/LOCALIDAD Y PROVINCIA</small>  </td>
                <td><small class="text-uppercase">{{$cliente->cp}}, {{$cliente->localidad->nombre}} / {{$cliente->provincia->nombre}}</small> </td>
            </tr>
            <tr>
              <td><small>DOMICILIO FISCAL</small> </td>
              <td><small class="text-uppercase">{{$cliente->domifiscal}}</small> </td>
            </tr>
            <tr>
                <td><small>{{$cliente->document->nombre}}</small>  </td>
                <td><small class="text-uppercase">{{$cliente->documento}}</small> </td>
            </tr>
            <tr>
                <td><small>TELEFONO</small>  </td>
                <td><small>{{$cliente->telefono}}</small> </td>
            </tr>
            <tr>
                <td><small>CORREO ELECTRONICO</small>  </td>
                <td><small >{{$cliente->email}}</small> </td>
            </tr>
            <tr>
                <td><small>¿DISPONE DE CERTIFICADO DIGITAL?</small>  </td>
                <td><small class="text-uppercase">{{$cliente->certdigital}}</small> </td>
            </tr>

            <tr>
                <td><small>HA ESTADO ANTES DADO DE ALTA COMO AUTONOMO</small>  </td>
                @php
                  if($cliente->numseguridad !=''){
                    $resp = 'SI, FECHA: '.\Carbon\Carbon::parse($cliente->altaautonomo)->format('d-m-Y') ;

                  }else {
                    $resp = 'NO';
                    }
                @endphp
                <td><small class="text-uppercase">{{$resp}} </small> </td>
            </tr>


            <tr>
                <td><small>NUMERO DE SEGURIDAD SOCIAL</small>  </td>
                <td><small class="text-uppercase">{{$cliente->numseguridad}}</small> </td>
            </tr>
            <tr>
                <td><small>CUENTA BANCARIA</small>  </td>
                <td><small>{{$cliente->cuentabanco}}</small> </td>
            </tr>
            <tr>
              <td><small>TITULAR DE LA CUENTA BANCARIA</small>  </td>
              <td><small class="text-uppercase">{{$cliente->titularbanco}}</small> </td>
          </tr>
          </tbody>
        </table>
        <br><br>




        <div style="page-break-after:always;"></div>

        <img src="{{asset('/archivo/logo.jpg')}}" width="64px" alt="" class="float-right" ><br>
        <p class="small"><small>Paseo de las delicias 20, 2ª Madrid 28045</small><br><small>912305907/658592584</small> </p>
        <br>
        <h3 class="text-center">Contratación de servicios</h3>
        <br><br>
        <p  class="small3">
          Les informamos, que tiene derecho a ejercer los derechos de acceso, rectificación, supresión y portabilidad de sus datos, y la limitación u oposición a su tratamiento de sus datos, en cualquier momento, siempre que lo haga mediante notificación fehaciente a la dirección Paseo de las Delicias, 20 planta 2ª. 28045, Madrid ante Evaterrum, S.L, con <strong>B87762357.</strong> <br><br><br>

          Autoriza a solicitar y descargar el Certificado Electrónico en nuestros soportes informáticos para ser utilizados en procedimientos contratados por el firmante.
          Sus datos serán archivados y no se cederán datos a terceros, salvo obligación legal.
          Todos los datos aquí declarados por usted son ciertos y si existiera alguna variación de datos, usted se compromete a declararlos a esta entidad.
          AUTONOMOS: Se compromete a los pagos que resultan del ejercicio y alta de la actividad como Persona Trabajadora por Cuenta Propia, <strong> NO TENIENDO ESTA EMPRESA OBLIGACIÓN ALGUNA DE COSTEAR NINGÚN TIPO DE GASTO GENERADO DE SU EJERCICIO.</strong><br><br><br>

          Una vez finalizado, el procedimiento se compromete a recibir todos sus documentos, no dejando aquí ningún original, copia compulsada, copia apostillada y/o similar recibida, todo ello, por motivos de su seguridad.<br><br><br>

          Por motivos de calidad y seguridad en el servicio, usted se compromete a aportar todos los documentos solicitados para evitar retrasos en el procedimiento.
          Tratamos la información que nos facilitan las personas interesadas con el fin de gestionar el procedimiento solicitado, así como para realizar asesorías y trámites con usted y en su nombre, para lo que usted ha sido previamente informado.<br><br><br>

          Se firma de manera libre y consciente el presente contrato de arrendamiento de servicios, para la asesoría y tramitación solicitada por el firmante, bajo la capacidad legal y en un plazo indeterminado, pudiendo dar por concluida esta relación contractual siempre y cuando lo notifique la otra parte con un mes de antelación, sin llevarse a cabo la devolución de dinero por concepto de consulta o abono a dicho trámite, si es el arrendador quien decide finalizar con los servicios contratados. <br><br><br>

          Las partes intervinientes, con renuncia expresa de su fuero propio o del que pudiera pertenecerles en cuanto a cuestiones o litigios se suscite con motivo de la interpretación, aplicación, o cumplimiento del presente contrato, se someten para su resolución a los
          Juzgados y Tribunales de Madrid.<br><br><br>
          Finalmente, todo lo declarado se insta en cumplimiento del Reglamento General de Protección de Datos<span class="font-italic"> (Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo, de 27 de abril de 2016, sobre la protección de las personas físicas en lo que respecta al tratamiento de datos personales y la libre circulación de esos datos, y por el que se deroga la Directiva 95/46 / CE (Reglamento general de protección de datos) (Texto pertinente a efectos del EEE)</span>



        </p>


        <br><br>

        <div style="page-break-after:always;"></div>
        <img src="{{asset('/archivo/logo.jpg')}}" width="64px" alt="" class="float-right" ><br>
        <p class="small"><small>Paseo de las delicias 20, 2ª Madrid 28045</small><br><small>912305907/658592584</small> </p>
        <br>
        <h3 class="text-center">Información y Protección de Datos de Servicios</h3>
        <br><br>
        <p  class="small3">
            Le informamos que, tiene derecho a ejercer los derechos de acceso, rectificación, supresión y portabilidad de sus datos, y la limitación u oposición al tratamiento de sus datos en cualquier momento, siempre que lo haga mediante notificación fehaciente a la siguiente dirección: Paseo de las Delicias, 20 2da Planta Puerta A, CP 28045, Madrid; ante SSS Asesorías & Extranjería, S.L, con CIF B72682768.
        </p>
        @endif











</body>
</html>



