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
        </style>
</head>
<body>
    <img src="storage\simbolo.jpg" class="float-right" width="35px"><br>
    <p class="small"><small>Paseo de las delicias 20, 2ª Madrid 28045</small><br><small>912305907/658592584</small> </p>
    <p class="font-italic font-weight-bold text-right">ASESORIAS & EXTRANJERIA<br>EVATERRUM, S.L<br>CIF: B87762357</p> 
  
  
    <br><br>
        <h4>FICHA DEL CLIENTE</h4>           
        <table class="table table-bordered table-sm" id="contenidoTabla">
          <tbody>
            <tr>
              <td><small>FECHA</small> </td>
              <td></td>
            </tr>
            <tr>
              <td><small>NOMBRE Y APELLIDOS</small>  </td>
              <td><small>{{$cliente->nombre}} {{$cliente->apellido}}</small> </td>
            </tr>
            <tr>
              <td><small>DIRECCION</small> </td>
              <td><small>{{$cliente->direccion}}</small> </td>
            </tr>
            <tr>
                <td><small>CIUDAD/LOCALIDAD Y PROVINCIA</small>  </td>
                <td><small class="text-uppercase">{{$cliente->cp}}, {{$cliente->localidad->nombre}} / {{$cliente->provincia->nombre}}</small> </td>
            </tr>
            <tr>
                <td><small>{{$cliente->document->nombre}}</small>  </td>
                <td><small>{{$cliente->documento}}</small> </td>
            </tr>
            <tr>
                <td><small>TELEFONO</small>  </td>
                <td><small>{{$cliente->telefono}}</small> </td>
            </tr>
            <tr>
                <td><small>CORREO ELECTRONICO</small>  </td>
                <td><small>{{$cliente->email}}</small> </td>
            </tr>
            <tr>
                <td><small>NACIONALIDAD</small>  </td>
                <td><small>{{$cliente->pais->nombre}}</small> </td>
            </tr>
            <tr>
                <td><small>ESTADO CIVIL</small>  </td>
                <td><small>{{$cliente->estadocivil->nombre}}</small> </td>
            </tr>
            <tr>
                <td><small>HIJOS</small>  </td>
                <td><small>
                  @if ($cliente->hijo == 0)
                    SIN HIJOS
                    @else     
                    {{$cliente->hijo}}  HIJO(S)          
                    @endif
                  
                  </small> </td>
            </tr>
            <tr>
                <td><small>NOMBRE DE LOS PADRES</small>  </td>
                <td><small class="text-uppercase">Padre: {{$cliente->nombrepadre}}, Madre: {{$cliente->nombremadre}}</small> </td>
            </tr>
            <tr>
                <td><small>FECHA DE NACIMIENTO, U OTROS</small>  </td>
                <td><small>{!! \Carbon\Carbon::parse($cliente->nacimiento)->format('d-m-Y') !!}</small> </td>
                
            </tr>
          </tbody>
        </table>
        <br><br>
        <p class="small font-italic font-weight-bold">Antes de firmar la solicitud, debe leer la información básica sobre protección de datos que se presenta. en el reverso de esta página.</p>
        <br><br>
        <p class="small2">Mediante la firma acepta la conformidad de lo aquí citado.
        <br> Esta información varía desde el día de consulta según normativa
        <br> Vigente española, por tanto no tendrá validez de forma indefinida </p>
      
        <div style="page-break-after:always;"></div>

        <img src="storage\simbolo.jpg" class="float-right" width="35px"><br>
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
  
  
    <br><br>
</body>
</html>



