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
          <h4>FICHA AFILIADO</h4>
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
                  @if (isset($cliente->localidad->nombre))
                  <td class="text-uppercase"><strong> {{$cliente->cp}}, {{$cliente->localidad->nombre}} / {{$cliente->provincia->nombre}}</strong></td>
                  @else
                  <td class="text-uppercase"><strong> </strong></td>
                  @endif

              </tr>
              <tr>
                @if (isset($cliente->document->nombre))
                <td>{{$cliente->document->nombre}}  </td>
                <td class="text-uppercase"><strong>{{$cliente->documento}}</strong>  </td>
                @else
                <td></td>
                <td class="text-uppercase"><strong></strong>  </td>
                @endif




              </tr>
              <tr>
                @if (isset($cliente->telefono))
                <td>TELEFONO  </td>
                <td><strong>{{$cliente->telefono}} </strong> </td>
                @else
                <td>TELEFONO  </td>
                <td><strong> </strong> </td>
                @endif

              </tr>
              <tr>
                @if (isset($cliente->email))
                <td>CORREO ELECTRONICO  </td>
                <td><strong>{{$cliente->email}} </strong></td>
                @else
                <td>CORREO ELECTRONICO  </td>
                  <td><strong></strong></td>
                @endif

              </tr>
              <tr>
                @if (isset($cliente->pais->nombre))
                   <td>NACIONALIDAD  </td>
                  <td class="text-uppercase"><strong>{{$cliente->pais->nombre}} </strong></td>
                @else
                <td>NACIONALIDAD  </td>
                <td class="text-uppercase"><strong> </strong></td>
                @endif

              </tr>
              <tr>
                @if (isset($cliente->estadocivil->nombre))
                    <td>ESTADO CIVIL </td>
                  <td class="text-uppercase"><strong>{{$cliente->estadocivil->nombre}} </strong></td>
                @else
                <td>ESTADO CIVIL </td>
                <td class="text-uppercase"><strong></strong></td>
                @endif

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
                @if (isset($cliente->nombrepadre))
                <td>NOMBRE DE LO PADRES</td>
                <td class="text-uppercase"><strong>Padre: {{$cliente->nombrepadre}}, Madre: {{$cliente->nombremadre}}</strong> </td>
                @else
                <td>NOMBRE DE LO PADRES</td>
                <td class="text-uppercase"><strong></strong> </td>
                @endif

              </tr>
              <tr>
                @if (isset($cliente->fecnac))
                <td>FECHA DE NACIMIENTO </td>
                <td><strong>{!! \Carbon\Carbon::parse($cliente->fecnac)->format('d-m-Y') !!}</strong> </td>
                @else
                <td>FECHA DE NACIMIENTO </td>
                <td><strong></strong> </td>
                @endif

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





        <div style="page-break-after:always;"></div>

        <img src="{{asset('/archivo/logo.jpg')}}" width="64px" alt="" class="float-right" ><br>
        <p class="small"><small>Paseo de las delicias 20, 2ª Madrid 28045</small><br><small>912305907/658592584</small> </p>
        <br>
        <h3 class="text-center">CONDICIONES GENERALES DEL SERVICIO ASESORIAS AFILIATE!</h3>
        <br><br>
          <p  class="small2"><small>1.	CLIENTE y AFILIADO
            Se considera CLIENTE a la persona física que contrate el servicio y se dé
            de alta como titular del mismo.
            Se considera AFILIADO a la persona física que puede consultar sobre
            asuntos objeto de asesoramiento como AFILIADO o como autorizado del
            AFILIADO PRINCIPAL, por su condición de representante de un paquete FAMILIAR, cónyuge o pareja con la que conviva habitualmente, o hijo que habite en el domicilio familiar.
            El AFILIADO deberá comunicarlo previamente conforme al presente condicionado.</small> </p>

            <p class="small2"><small>2.	 SERVICIO PRESTADO.
              Consiste en la prestación de asesoramiento y asistencia jurídica realizada por Abogados colegiados ejercientes, y efectuada a través de vía telefónica y/o telemática. La formalización del contrato y la prestación del servicio
              </small></p>

              <p class="small2"><small>3.	  INFORMACION
                El contenido del asesoramiento prestado al AFILIADO por los Asesores de ASESORIAS SERVICIOS Y EXTRANJERIA no podrá ser empleado para usos distintos al estricto aprovechamiento personal del mismo; la difusión pública del referido asesoramiento jurídico requerirá la expresa autorización por parte de ASESORIAS SERVICIOS Y EXTRANJERIA, quedando prohibida la grabación, reproducción, o distribución por cualquier canal la información trasmitida al AFILIADO, ya sea personal o telefónicamente.
                </small></p>

                <p class="small2"><small>5.-  DERECHO DE DESESTIMIENTO Y RECLAMACIONES
                  En el anexo se acompaña la información relativa al derecho de desistimiento, (condiciones particulares) el cual puede ser ejercitado en el plazo de 14 días desde la contratación comunicándolo a través de cualquiera de las direcciones indicadas. La información relativa al derecho de desistimiento puede ser consultada además en la siguiente dirección: www.asesoriasyextranjeria.com/ informacion_derecho_desestimiento Las reclamaciones que puedan presentar los clientes que ostenten la condición de afiliados en los términos de la legislación vigente, serán tratadas por el servicio de atención al cliente de ASESORIAS SERVICIOS Y EXTRANJERIA; podrán ser remitidas a cualquiera de los datos de contacto especificados en este condicionado, y serán respondidas por el medio adecuado en el plazo máximo de 30 días. En caso de respuesta desestimatoria, el consumidor puede dirigirse a los organismos de consumo de su comunidad autónoma o recurrir a la plataforma del REGLAMENTO (UE) 524/2013 del Parlamento Europeo y del Consejo, de 21 de mayo, sobre resolución de litigios en línea en materia de consumo (http://ec.europa.eu/odr).
                  ANEXO RELATIVO AL DERECHO DE DESISTIMIENTO
                  Información sobre el ejercicio del derecho de desistimiento. Tiene usted derecho a desistir del presente contrato en un plazo de 14 días naturales sin necesidad de justificación. El plazo de desistimiento expirará a los 14 días naturales del día de la celebración del contrato. Para ejercer el derecho de desistimiento, deberá usted notificar a ASESORIAS SERVICIOS Y EXTRANJERIA (info@asesoriasyextranjeria.com) PASEO DELICIAS 20 2ª CODIGO POSTAL 28045 DE MADRID (MADRID ATOCHA RENFE) su decisión de desistir del contrato a través de una declaración inequívoca (por ejemplo, una carta enviada por correo postal, fax o correo electrónico). Podrá utilizar el email, el cual solo sirve para informar la intención que debe ser formalizada por medio de un formulario firmado. Para cumplir el plazo de desistimiento, basta con que la comunicación relativa al ejercicio por su parte de este derecho sea enviada antes de que venza el plazo correspondiente. Consecuencias del desistimiento: en caso de desistimiento por su parte, le devolveremos todos los pagos recibidos de usted, incluidos los gastos de entrega (con la excepción de los gastos adicionales resultantes de la elección por su parte de una modalidad de entrega diferente a la modalidad menos costosa de entrega ordinaria que ofrezcamos) sin ninguna demora indebida y, en todo caso, a más tardar 14 días naturales a partir de la fecha en la que se nos informe de su decisión de desistir del presente contrato. Procederemos a efectuar dicho reembolso utilizando el mismo medio de pago empleado por usted para la transacción inicial, a no ser que haya usted dispuesto expresamente lo contrario; en todo caso, no incurrirá en ningún gasto como consecuencia del reembolso. Si usted ha solicitado que la prestación de servicios dé comienzo durante el período de desistimiento, nos abonará un importe proporcional a la parte ya prestada del servicio en el momento en que nos haya comunicado su desistimiento, en relación con el objeto total del contrato. No obstante lo anterior, el derecho de desistimiento no será aplicable cuando a su expresa solicitud haya comenzado la ejecución del servicio.
                  </small></p>
                <p class="small2"><small>6.-  HORARIO.
                  El AFILIADO podrá utilizar los servicios de ASESORIAS SERVICIOS Y EXTRANJERIA  de 09:00 a 19:00 horas en horario peninsular de lunes a jueves, viernes de 09:00 a 15:00 excepto festivos nacionales. Las consultas o documentación que lleguen fuera de ese horario se entenderán recibidas el siguiente día hábil a las 9:00 de la mañana, de acuerdo con los criterios expresados. El horario de atención de consultas será única y exclusivamente en este horario para los AFILIADOS, siendo ampliado para los CLIENTES, una vez iniciados los procedimientos según cada caso o urgencia. Se entenderá por situaciones de urgencia aquellas cuyas consecuencias jurídicas más favorables o menos desfavorables para el CLIENTE dependan de un consejo legal especializado inmediato.
                  </small></p>
                <p class="small2"><small>7.- REMISION.
                  La decisión de remitir a un AFILIADO a uno de los ABOGADOS colaboradores de ASESORIAS SERVICIOS Y EXTRANJERIA, será siempre adoptada por LA DIRECCION DE ASEOSORIAS SERVICIOS Y EXTRANJERIA en función de la viabilidad del asunto planteado. En los supuestos en que se produjera la remisión para el planteamiento de un procedimiento judicial, ni los honorarios de abogado, procurador, así como los de otros profesionales necesarios para la tramitación de dicho procedimiento judicial, ni las costas judiciales si proceden, estarán incluidas en el servicio contratado, ni se descontaran de las cuotas mensuales de la AFILIACION. Pudiéndose beneficiar en algunos casos de descuentos y promociones.
                  </small></p>

                <p class="small2"><small>8.  ASESORAMIENTO JURÍDICO INMEDIATO.
                  El AFILIADO podrá contar con el asesoramiento de los Abogados, Asesoras, y Técnicas de ASESORIAS SERVICIOS Y EXTRANJERIA por vía telefónica o correo electrónico para consultar las cuestiones jurídicas que se le presenten en su ámbito personal y familiar y sobre las materias enumeradas a continuación. ASESORIAS SERVICIOS Y EXTRANJERIA se reserva el derecho a contestar SOLO verbalmente, y aunque la resolución de la consulta se realice por escrito, quedan expresamente excluidos del servicio la redacción de informes o dictámenes.
                  Si desea que dicha información, o negociaciones que se pudieran prestar sean notificadas o enviadas por escrito o correo electrónico el AFILIADO deberá pasar su suscripción a CLIENTE contratando los servicios jurídicos de ASESORIAS SERVICIOS Y EXTRANJERIA.
                  </small></p>
                <p class="small2"><small>9.- RESOLUCION DE CONSULTAS
                  Las consultas versarán sobre las materias incluidas en estas condiciones generales y podrán ser respondidas por los Abogados, Asesores y Técnicos de ASESORIAS SERVICIOS Y EXTRANJERIA  en el mismo momento de ser planteadas, y a más tardar en el plazo máximo de cinco días, excluyendo sábados, domingos y festivos nacionales, en función de la complejidad del asunto planteado.
                  </small></p>
                <p class="small2"><small>10.- Protección de datos personales.
                  A los efectos de lo previsto en la normativa de protección de datos de carácter personal que resulta de aplicación, ASESORIAS SERVICIOS Y EXTRANJERIA, informa a los Usuarios y/o Clientes que contraten productos y/o servicios de ASESORIAS SERVICIOS Y EXTRANJERIA de los siguientes aspectos en materia de protección de datos personales: INFORMACIÓN BÁSICA 4 Responsable ASESORIAS SERVICIOS Y EXTRANJERIA, EVATERUM S.L Finalidad Atención de solicitudes relacionadas con la prestación de servicios y cumplimiento de obligaciones contractuales y precontractuales Legitimación Consentimiento del interesado Destinatarios Otras empresas españolas afiliadas a la red de Entidades Colaboradoras de la Firma ASESORIAS SERVICIOS Y EXTRANJERIA. Administraciones y organismos públicos para el cumplimiento de obligaciones directamente exigibles a ASESORIAS SERVICIOS Y EXTRANJERIA, así como ficheros comunes de siniestralidad y de solvencia patrimonial. Derechos Acceder, Rectificar y Suprimir los Datos, así como otros derechos, como se explica en la Información Adicional Información adicional Consulte la Información Adicional y detallada sobre Protección de Datos. Según Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal (LOPD), fue una ley orgánica española y derogada con la entrada en vigor, el 7 de diciembre de 2018, de la Ley Orgánica 3/2018 de Protección de Datos Personales y garantía de los derechos digitales, que adapta la legislación española al Reglamento General de Protección de Datos de la Unión Europea.
                  ANEXO RELATIVO A LA INFORMACIÓN ADICIONAL SOBRE EL TRATAMIENTO DE DATOS PERSONALES RESPONSABLE DE TRATAMIENTO
                  Solo Entidades pertenecientes, colaboradores y asociados a ASESORIAS SERVICIOS Y EXTRANJERIA (info@asesoriasyextranjeria.com) PASEO DELICIAS 20 2ª CODIGO POSTAL 28045 DE MADRID (MADRID ATOCHA RENFE)  y por tanto Responsables de los Tratamientos de los datos de carácter personal que el Afiliado y/o Cliente proporcione a ASESORIAS SERVICIOS Y EXTRANJERIA de manera voluntaria para la provisión del Servicio y/o Servicios que resulten objeto de contratación las siguientes.
                  PLAZO DE CONSERVACIÓN DE LOS DATOS PERSONALES
                  Los datos personales proporcionados se conservarán mientras que se mantenga la relación contractual, no se solicite su supresión por el interesado y no deban eliminarse por ser necesarios para el cumplimiento de una obligación legal, para la formulación, ejercicio y defensa de reclamaciones, o cuando se requiera su conservación para posibilitar la aplicación de algún beneficio, descuento o ventaja promocional para el cliente. En caso de que el Afiliado y/o Cliente revoque su consentimiento prestado para el tratamiento de sus datos o ejercite los derechos de cancelación o supresión, sus datos personales se conservarán bloqueados a disposición de la Administración de Justicia durante los plazos establecidos 5 legalmente para atender a las posibles responsabilidades nacidas del tratamiento de los mismos.
                  LEGITIMACIÓN PARA EL TRATAMIENTO DE LOS DATOS PERSONALES
                  La base legal para el tratamiento de los datos personales de los Usuarios y/o Clientes por parte de ASESORIAS SERVICIOS Y EXTRANJERIA , reside en las letras a), b) y c) del número 1 del artículo 6 del Reglamento (UE) 2016/679, de 27 de abril. Por tanto, ASESORIAS SERVICIOS Y EXTRANJERIA se encuentra legitimada para llevar a cabo el tratamiento de los datos personales en base a que: - El Usuario y/o Cliente ha prestado su consentimiento expreso para las finalidades descritas que requieran el tratamiento de datos del Usuario y/o Cliente relativos a la comisión de infracciones penales, administrativas, datos de salud y/o de cualquier tipo de información que pudiera revelar el origen étnico o racial, opiniones políticas, convicciones religiosas o filosóficas, afiliación sindical, datos genéticos, biométricos, y/o información relativa a la vida u orientación sexual de una persona. - El Usuario y/o Cliente ha prestado su consentimiento explícito para el tratamiento de sus datos personales en el marco de una relación contractual o precontractual para la atención de su solicitud de información y/o ejecución de la prestación del servicio. - El Usuario y/o Cliente ha prestado su consentimiento informado para el envío de comunicaciones comerciales relacionadas con productos y/o servicios de ASESORIAS SERVICIOS Y EXTRANJERIA que pudieran ser de interés del Usuario y/o Cliente. - Adicionalmente se informa al Usuario y/o Cliente que existen obligaciones legales que requieren del tratamiento de los datos personales, de acuerdo con los servicios prestados.
                  </small></p>
                <p class="small2"><small>11.- EL AFILIADO
                  El AFILIADO Y/O FUTURO CLIENTE queda informado que el servicio se encuentra o puede encontrarse sujeto a las normas sobre prevención de blanqueo de capitales y financiación del terrorismo establecidas en la Ley 10/2010, de 28 de abril, de prevención del blanqueo de capitales y de la financiación del terrorismo, y a su reglamento aprobado por Real Decreto 304/2014, de 5 de mayo, así como que el encargo encomendado está o puede estar fuera del ámbito de secreto profesional, existiendo obligación de prestar información sobre los datos obtenidos del cliente o el encargo efectuado, en caso que las autoridades financieras la soliciten.
                  </small></p>
                <p class="small2"><small>En Madrid, a 1 de Diciembre de 2021.</small></p>
                <p class="small2"><small>D/ Dª LINA MARIA ORTIZ RODRIGUEZ  Directora de la empresa Evaterrum S.L con domicilio a efectos de notificaciones sito en Paseo delicias 20 2ª 28045 Madrid España con C.I.F. B87762357, Nombre comercial ASESORIAS SERVICIOS Y EXTRANJERIA.

                  Ambas partes se reconocen legitimación y capacidad necesarias para el otorgamiento del presente acuerdo en el cual, </small></p>
                <p class="small2"><small>EXPONEN
                  Que ambas partes con la finalidad de PUBLICIDAD MUTUA acuerdan el siguiente CONTRATO DE COLABORACIÓN sometido a las siguientes:</small></p>
                <p class="small2"><small>ESTIPULACIONES

                  PRIMERA.- OBJETO
                  El objeto del presente contrato es regular un acuerdo de colaboración entre las empresas, siendo cada uno el responsable de cumplir con sus obligaciones registrales, de hacienda, seguridad social, derechos de autor, calidad, y comprometiéndose a la responsabilidad civil que conlleve las reclamaciones o publicidad engañosa.</small></p>
                <p class="small2"><small>SEGUNDO.- OBLIGACIONES DE LAS PARTES</small></p>
                <p class="small2"><small>i. Ambas partes se comprometen a aportar todos sus conocimientos, ayuda, información y reconocimiento de créditos publicitarios y experiencia al llevar a cabo las funciones descritas en el objeto del presente contrato con la máxima diligencia posible.<br>
                  iii. Ambas partes se comprometen a que exista una relación cordial de trabajo.
                  <br>
                  iv. Ambas partes ceden su imagen a la otra con fines comerciales.</small></p>
                <p class="small2"><small>TERCERA.- SIN HONORARIOS
                  Sin cuantía económica representativa por la colaboración más que el intercambio de datos, publicidad, y descuentos para los clientes de ambas partes por un periodo inicial de un año, aceptando participar en los descuentos, rifas, promociones que realizara durante todo el periodo del 2022 en nuestra citada oficina
                  </small></p>
                <p class="small2"><small>CUARTA.- PROHIBICIÓN DE CESIÓN A TERCEROS
                  Las partes contratantes en ningún caso podrán ceder su posición contractual a terceros sin el consentimiento expresa de la otra parte contratante.
                  </small></p>
                <p class="small2"><small>QUINTA.- CONFIDENCIALIDAD
                  Ambas partes han de guardar secreto de toda la información a la que puedan llegar a tener acceso de la otra parte durante el presente contrato y con posterioridad al mismo.
                  </small></p>
                <p class="small2"><small>SEXTA.- PROPIEDAD INTELECTUAL E INDUSTRIAL
                  En ningún caso las cláusulas del presente convenio suponen la cesión o transmisión de cualesquiera derechos de propiedad intelectual o industrial titularidad de los Colaboradores.
                  </small></p>
                <p class="small2"><small>SÉPTIMA.- GASTOS
                  Cualquier gasto derivado del ejercicio de cualquier actividad destinada a la colaboración objeto del presente contrato, será asumido por quien realice la actividad o publicidad.
                  </small></p>
                <p class="small2"><small>OCTAVA.- DURACIÓN DEL CONTRATO
                  El presente contrato tendrá una duración de un año renovable con un mes de antelación a su vencimiento.
                  </small></p>
                <p class="small2"><small>NOVENA.- NOTIFICACIONES
                  A efectos de notificaciones, o de emplazamientos judiciales, y en general, toda comunicación o requerimiento que hayan de oír las partes en relación con el presente contrato, se tomará como domicilios los indicados en el inicio del presente documento.
                  Cualquier cambio de domicilio de una de las partes deberá ser notificado a la otra de forma inmediata, y por un medio que garantice la recepción del mensaje. Incluyendo cambios de imagen publicitaria, administración, local, productos, propietarios etc.
                  </small></p>
                <p class="small2"><small>DÉCIMA.- RESOLUCIÓN
                  El presente contrato puede quedar resuelto por las causas en él contenidas y además por siguientes causas:
                  </small></p>
                <p class="small2"><small>i. Incumplimiento de las obligaciones en el contenidas por la otra parte, pudiéndose anular sin previo aviso.
                  ii. Por acuerdo expreso entre las partes.
                  Este contrato estará vigente por un año y se podrá resolver, avisando un mes antes de ese periodo, sino se considera renovado automáticamente. Servicio de duración anual para asesoramiento jurídico sobre asuntos de la vida familiar (no empresarial no profesional) del cliente. Precio anual de 72€ (Sujeto a condiciones)
                  Los encabezamientos de las distintas cláusulas lo son sólo a efectos informativos, y no afectarán, calificarán o ampliarán la interpretación de este Contrato.
                  Y de conformidad con lo expuesto en el presente contrato, ambas partes firman el presente contrato de colaboración e extendido por duplicado, en fecha y lugar indicados al inicio del mismo.
                  </small></p>
                  <br><br><br><br><br><br><br><br><br><br>
                <p class="small2"><small>FIRMA DE AMBAS PARTES</small></p>















        <p  class="small2">




















        </p>


        <br><br>
        @endif











</body>
</html>



