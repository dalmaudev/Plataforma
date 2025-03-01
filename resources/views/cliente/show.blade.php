@extends('adminlte::page')

@section('title', 'Mostrar Cliente')

@section('content_header')

@stop

@section('content')

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('cliente.edit', $cliente->id) }}"><i class="fas fa-edit"></i></a>
                Mostrar Cliente




                <a class="btn btn-primary btn-sm" href="{{ route('consulta.show', $cliente->id) }}"><i
                        class="fas fa-swatchbook"></i>
                    Control de Consulta <span class="badge badge-light"></span></a>

                <a class="btn btn-success btn-sm" href="{{ route('editaproceso', $cliente->id) }}"><i
                        class="fas fa-balance-scale"></i>
                    Crear Proceso</a>

                <a class="btn btn-warning btn-sm" href="{{ route('editaler', $cliente->id) }}"><i class="far fa-bell"></i>
                    Crear Alerta</a>
            </h3>
        </div>
        @php
            $count = count($procesos);
            foreach ($procesos as $proceso) {
                $Proceso[] = $proceso->tipoproceso->nombre;
                $TipodeProceso[] = $proceso->proceso->nombre;
                $pid[] = $proceso->id;
                $FechaPresentacionProceso[] = $proceso->fecpresentado;
                $EstadodelProceso[] = $proceso->desicion->nombre;
                $FechaDesicionProceso[] = $proceso->fecdesicion;
                $Especialista[] = $proceso->user->name;
                $PagodelaConsulta[] = $proceso->pagoconsulta;
                $ValorProceso[] = $proceso->precioproceso;
                $abono[] = $proceso->abono;
                $Pendiente[] = $proceso->pendiente;
                $Observaciones[] = $proceso->observacion;

                $idem[] = $proceso->cliente_id . ':' . $proceso->id;
            }
        @endphp
        <div class="card-body">
            {{-- <h4>Custom Content Below</h4> --}}
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">

                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill"
                        href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                        aria-selected="true">Datos Cliente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                        href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile"
                        aria-selected="false">Alertas</a>
                </li>
                @for ($i = 0; $i < $count; $i++)
                    <li class="nav-item">
                        <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill"
                            href="#n{{ $pid[$i] }}" role="tab" aria-controls="custom-content-below-messages"
                            aria-selected="false">{{ $TipodeProceso[$i] }}</a>
                    </li>
                @endfor
                <li class="nav-item">
                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill"
                        href="#pdf" role="tab" aria-controls="custom-content-below-profile"
                        aria-selected="false">PDF</a>
                </li>

            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
                <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel"
                    aria-labelledby="custom-content-below-home-tab">
                    {!! Form::model($cliente, ['route' => ['cliente.update', $cliente], 'method' => 'PUT']) !!}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <small>{!! Form::label('nombre', 'Nombre Completo') !!}</small>
                            {!! Form::text('nombre', null, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-6">
                            <small>{!! Form::label('apellido', 'Apellido Completo') !!} </small>
                            {!! Form::text('apellido', null, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <small>{!! Form::label('direccion', 'Dirección') !!}</small>
                        {!! Form::text('direccion', null, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <small>{!! Form::label('provicia_id', 'Provicia') !!} </small>
                            {!! Form::select('provincia_id', $provincia, null, ['class' => 'form-control mb-2', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            <small>{!! Form::label('localidad', 'Localidad') !!} </small>
                            {!! Form::select('localidad_id', $localidades, null, ['class' => 'form-control mb-2', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            <small>{!! Form::label('cp', 'C.P.') !!}</small>
                            {!! Form::text('cp', null, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            <small>{!! Form::label('documento', 'Tipo Documento') !!} </small>
                            {!! Form::select('documento_id', $documentos, null, ['class' => 'form-control mb-2', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            <small>{!! Form::label('documento', 'Nº Documento') !!} </small>
                            {!! Form::text('documento', null, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            <small>{!! Form::label('caducidaddoc', 'Fecha Caducidad Documento') !!} </small>
                            {!! Form::date('caducidaddoc', null, ['class' => 'form-control', 'readonly']) !!}
                        </div>




                    </div>
                    <div class="form-row">

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <small>{!! Form::label('pais_id', 'Nacionalidad') !!} </small>
                            {!! Form::select('pais_id', $paises, null, ['class' => 'form-control mb-2', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            <small>{!! Form::label('telefono', 'Telefono') !!} </small>
                            {!! Form::text('telefono', null, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            <small>{!! Form::label('email', 'Correo Electronico') !!} </small>
                            {!! Form::text('email', null, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            <small>{!! Form::label('estadocivil_id', 'Estado Civil') !!} </small>
                            {!! Form::select('estadocivil_id', $estadocivil, null, ['class' => 'form-control mb-2', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            <small>{!! Form::label('hijo', 'Hijos') !!} </small>
                            {!! Form::selectRange('hijo', 0, 20, null, ['class' => 'form-control mb-2', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            <small>{!! Form::label('nombrepadre', 'Nombre del Padre') !!} </small>
                            {!! Form::text('nombrepadre', null, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>
                    <div class="form-row">


                        <div class="form-group col-md-2">
                            <small>{!! Form::label('nombremadre', 'Nombre de la Madre') !!} </small>
                            {!! Form::text('nombremadre', null, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-2">
                            <small>{!! Form::label('fecnac', 'Fecha de Nacimiento') !!} </small>
                            {!! Form::date('fecnac', null, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                        <div class="form-group col-md-8">
                            <small>{!! Form::label('observaciones', 'Observacion') !!} </small>
                            {!! Form::text('observaciones', null, ['class' => 'form-control', 'readonly']) !!}
                        </div>
                    </div>


                    {!! Form::close() !!}
                    <hr>
                    <a class="btn btn-warning btn-sm" href="{{ route('files.edit', $cliente->id) }}"><i
                            class="fas fa-upload"></i>
                        Subir Documentación Cliente</a>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre del Archivo</th>
                                        <th width="1px"></th>
                                        <th width="1px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($files as $file)
                                        <tr>
                                            <th scope="row">{{ $file->id }}</th>
                                            <td>

                                                <a target="_blank" href="{{ route('files.show', $file->id) }}"
                                                    class="btn btn-sm">{{ substr($file->name, 11) }}</a>
                                            </td>
                                            <td>
                                                <a target="_blank" href="{{ route('files.show', $file->id) }}"
                                                    class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>

                                            </td>
                                            <td>
                                                <form action="{{ route('files.destroy', $file->id) }}" method="POST"
                                                    class="formulario-eliminar">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel"
                    aria-labelledby="custom-content-below-profile-tab">
                    <div class="container-fluid h-100">


                        <div class="card card-row card-default mt-4">
                            <div class="card-header bg-info">
                                <h3 class="card-title">
                                    Historial de Alertas
                                </h3>
                            </div>
                            <div class="card-body">
                                @foreach ($alertas as $alerta)
                                    <div class="card card-light card-outline">
                                        <div class="card-header">
                                            <h5 class="card-title">{{ $alerta->titulo }}</h5>
                                            <div class="card-tools">
                                                <form action="{{ route('alerta.destroy', $alerta->id) }}" method="POST"
                                                    class="formulario-eliminar">
                                                    <a href="#"
                                                        class="btn btn-tool btn-link">{!! \Carbon\Carbon::parse($alerta->fecalert)->format('d-m-Y') !!}</a>


                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="far fa-trash-alt"></i> </button>



                                                    <a href="{{ route('alerta.edit', $alerta->id) }}"
                                                        class="btn btn-tool">
                                                        <i class="fas fa-pen" style="color: green"></i>
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                {{ $alerta->cuerpo }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>

                {{-- EX-PDF --}}

                <div class="tab-pane fade" id="pdf" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                    <div class="container-fluid h-100">
                        <div class="card card-row card-default mt-4">
                            <div class="card-header bg-success">
                                <h3 class="card-title">
                                    EXTRANJERIA - PDF
                                </h3>
                            </div>
                            <div class="card-body">
                                @php
                                $directorio = storage_path('app/public/pdfs');
                                $archivos = is_dir($directorio) ? scandir($directorio) : [];
                                $pdfs = array_filter($archivos, function($archivo) {
                                    return strpos($archivo, '.pdf') !== false;
                                });
                                @endphp
                                {{-- Selector de formulario --}}
                                <div class="form-group">
                                    <label>Seleccionar Formulario</label>
                                    <select id="formularioEx" class="form-control" onchange="console.log('PDF seleccionado:', this.value)">
                                        <option value="">Seleccione un formulario...</option>
                                        @foreach($pdfs as $pdf)
                                            <option value="{{ $pdf }}">{{ $pdf }}</option>
                                        @endforeach
                                    </select>
                                    <button id="descargarPDF" class="btn btn-primary mt-2">
                                        <i class="fas fa-download"></i> Descargar PDF
                                    </button>
                                </div>

                                {{-- Visor de PDF --}}
                                <div class="mt-4">
                                    <iframe id="pdfFrame" style="width:100%; height:600px; border:none;"></iframe>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>

                {{--  FIN EX-PDF --}}

                @for ($i = 0; $i < $count; $i++)
                    <div class="tab-pane fade" id="n{{ $pid[$i] }}" role="tabpanel"
                        aria-labelledby="n{{ $pid[$i] }}-tab">
                        <a class="btn btn-danger btn-sm  float-right" title="Editar"
                            href="{{ route('procesocliente.edit', $pid[$i]) }}"><i class="fa fa-pen"></i></a>
                        <div class="form-row mt-2">
                            <div class="form-group col-md-2">
                                <small>{!! Form::label('tipoproceso_id', 'Proceso: ') !!} </small>
                            </div>
                            <div class="col-md-10">
                                <strong>{{ $Proceso[$i] }}</strong>
                            </div>

                            <div class="form-group col-md-2">
                                <small>{!! Form::label('tipoproceso', 'Tipo de Proceso') !!} </small>
                            </div>
                            <div class="col-md-10">
                                <strong>{{ $TipodeProceso[$i] }}</strong>
                            </div>

                            <div class="form-group col-md-2">
                                <small>{!! Form::label('fecpresentado', 'Fecha Presentacion Proceso') !!} </small>
                            </div>
                            <div class="col-md-10">
                                {{-- {{$FechaPresentacionProceso[$i]}} --}}
                                <strong>{!! \Carbon\Carbon::parse($FechaPresentacionProceso[$i])->format('d-m-Y') !!}</strong>
                            </div>

                            <div class="form-group col-md-2">
                                <small>{!! Form::label('EstadoProceso', 'Estado del Proceso') !!} </small>
                            </div>
                            <div class="col-md-10">
                                <strong>{{ $EstadodelProceso[$i] }}</strong>
                            </div>

                            <div class="form-group col-md-2">
                                <small>{!! Form::label('FechaDesicionProceso', 'Fecha Desición Proceso') !!} </small>
                            </div>
                            <div class="col-md-10">
                                <strong>{!! \Carbon\Carbon::parse($FechaDesicionProceso[$i])->format('d-m-Y') !!}</strong>
                            </div>

                            <div class="form-group col-md-2">
                                <small>{!! Form::label('Especialista', 'Especialista') !!} </small>
                            </div>
                            <div class="col-md-10">
                                <strong>{{ $Especialista[$i] }}</strong>
                            </div>

                            <div class="form-group col-md-2">
                                <small>{!! Form::label('PagodelaConsulta', 'Pago de la Consulta') !!} </small>
                            </div>
                            <div class="col-md-10">
                                <strong>{{ $PagodelaConsulta[$i] }}</strong>
                            </div>

                            <div class="form-group col-md-2">
                                <small>{!! Form::label('ValorProceso', 'Valor Proceso') !!} </small>
                            </div>
                            <div class="col-md-10">
                                <strong>{{ $ValorProceso[$i] }}</strong>
                            </div>

                            <div class="form-group col-md-2">
                                <small>{!! Form::label('abono', 'Abono') !!} </small>
                            </div>
                            <div class="col-md-10">
                                <strong>{{ $abono[$i] }}</strong>
                            </div>

                            <div class="form-group col-md-2">
                                <small>{!! Form::label('abono', 'Pendiente') !!} </small>
                            </div>
                            <div class="col-md-10">
                                <strong>{{ $Pendiente[$i] }}</strong>
                            </div>

                            <div class="form-group col-md-2">
                                <small>{!! Form::label('Observaciones', 'Observaciones') !!} </small>
                            </div>
                            <div class="col-md-10">
                                <strong>{{ $Observaciones[$i] }}</strong>
                            </div>
                        </div>
                        <hr>
                        <a class="btn btn-warning btn-sm" href="{{ route('docuproceso.show', $idem[$i]) }}"><i
                                class="fas fa-upload"></i>
                            Subir Documentación {{ $TipodeProceso[$i] }}</a>
                        <div class="tab-custom-content">
                            @foreach ($docuproceso as $docu)
                                @if ($docu->procesocliente_id == $pid[$i])
                                    {{-- <a href="{{ route('docuproceso.edit', $docu->id) }}" target="_blank" type="button" class="btn btn-secondary btn-sm btn-block">{{ $docu->id }}-{{ substr($docu->name, 11) }}</a> --}}
                                    <a href="{{ route('docuproceso.edit', $docu->id) }}" target="_blank" type="button"
                                        class="btn btn-secondary btn-sm btn-block">{{ substr($docu->name, 11) }}</a>
                                @endif
                            @endforeach

                        </div>


                    </div>

                @endfor

                <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel"
                    aria-labelledby="custom-content-below-settings-tab">
                    Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare
                    sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie
                    tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec
                    pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl
                    commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                </div>
            </div>
            <div class="tab-custom-content">

                {{-- <p class="lead mb-0">Custom Content goes here</p> --}}
            </div>



        </div>

    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/pdf-lib/dist/pdf-lib.min.js"></script>
        
        <script>
            // Función para cargar el PDF
            function cargarPDF(nombrePDF) {
                if (!nombrePDF) {
                    document.getElementById('pdfFrame').style.display = 'none';
                    return;
                }
            
                const baseUrl = '/Plataforma/public';
                const pdfUrl = `${baseUrl}/formulario-ex/pdf/${nombrePDF}`;
                
                console.log('Intentando cargar:', pdfUrl);
                
                document.getElementById('pdfFrame').style.display = 'block';
                document.getElementById('pdfFrame').src = pdfUrl;
            }
            
            // Event listener
            document.getElementById('formularioEx').addEventListener('change', function() {
                cargarPDF(this.value);
            });
            </script>
        <script>
            const { PDFDocument } = PDFLib;

            async function fillFormByTemplate(pdfUrl) {
                try {
                    const formBytes = await fetch(pdfUrl).then(res => res.arrayBuffer());
                    const pdfDoc = await PDFDocument.load(formBytes);
                    const form = pdfDoc.getForm();

                    const formType = $('#formularioEx').val();

                    if (formType === 'EX00 - Formulario_estancia.pdf') {
                        // Mantener código existente de EX00 sin cambios
                        const tipoDoc = {{ $cliente->documento_id }};
                        const documento = '{{ $cliente->documento }}';
                        const apellidos = '{{ $cliente->apellido }}'.split(' ');
                        const fechaNac = '{{ $cliente->fecnac }}'.split('-');
                        const nacionalidad = '{{ $cliente->pais->nombre }}';

                        if (tipoDoc === 3) {
                            form.getTextField('Textfield').setText(documento);
                        } else {
                            form.getTextField('Textfield-0').setText(documento.substring(0, 1));
                            form.getTextField('Textfield-1').setText(documento.substring(1, documento.length - 1));
                            form.getTextField('Textfield-2').setText(documento.slice(-1));
                        }

                        form.getTextField('N').setText(apellidos[0] || '');
                        form.getTextField('x').setText(apellidos[1] || '');
                        form.getTextField('Textfield-3').setText('{{ $cliente->nombre }}');
                        form.getTextField('Fecha de nacimientoz').setText(fechaNac[2] || '');
                        form.getTextField('Texto-1').setText(fechaNac[1] || '');
                        form.getTextField('Textfield-4').setText(fechaNac[0] || '');
                        form.getTextField('Textfield-5').setText(nacionalidad);
                        form.getTextField('Textfield-6').setText(nacionalidad);
                        form.getTextField('Textfield-8').setText('{{ $cliente->nombrepadre }}');
                        form.getTextField('Piso').setText('{{ $cliente->nombremadre }}');
                        form.getTextField('CP').setText('{{ $cliente->direccion }}');
                        form.getTextField('Textfield-12').setText('{{ $cliente->localidad->nombre }}');
                        form.getTextField('Textfield-13').setText('{{ $cliente->cp }}');
                        form.getTextField('Textfield-15').setText('{{ $cliente->provincia->nombre }}');
                        form.getTextField('Textfield-17').setText('{{ $cliente->telefono }}');
                        form.getTextField('D NIN IEPAS').setText('{{ $cliente->email }}');

                        // Añadir los nuevos campos al final de EX00
                        const fecha = new Date();
                        const meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                        const dia = fecha.getDate().toString().padStart(2, '0');

                        form.getTextField('Nombre y apellidos del titular').setText('{{ $cliente->nombre }} {{ $cliente->apellido }}');
                        form.getTextField('Textfield-52').setText('MADRID');
                        form.getTextField('a').setText(dia);
                        form.getTextField('de').setText(meses[fecha.getMonth()]);
                        form.getTextField('de-0').setText(fecha.getFullYear().toString());

                    } else if (formType === 'EX01 - Residencia_no_lucrativa.pdf') {
                        // Mantener código existente de EX01 sin cambios
                        const tipoDoc = {{ $cliente->documento_id }};
                        const documento = '{{ $cliente->documento }}';
                        const apellidos = '{{ $cliente->apellido }}'.split(' ');
                        const fechaNac = '{{ $cliente->fecnac }}'.split('-');
                        const nacionalidad = '{{ $cliente->pais->nombre }}';

                        if (tipoDoc === 3) {
                            form.getTextField('Textfield-6').setText(documento);
                        } else {
                            form.getTextField('Textfield').setText(documento.substring(0, 1));
                            form.getTextField('Textfield-1').setText(documento.substring(1, documento.length - 1));
                            form.getTextField('Textfield-2').setText(documento.slice(-1));
                        }

                        form.getTextField('Textfield-3').setText(apellidos[0] || '');
                        form.getTextField('Textfield-5').setText(apellidos[1] || '');
                        form.getTextField('Lugar').setText('{{ $cliente->nombre }}');
                        
                        form.getTextField('Fecha de nacimientoz').setText(fechaNac[2] || '');
                        form.getTextField('Texto-1').setText(fechaNac[1] || '');
                        form.getTextField('Textfield-7').setText(fechaNac[0] || '');
                        
                        form.getTextField('Textfield-8').setText(nacionalidad);
                        form.getTextField('Textfield-9').setText(nacionalidad);
                        
                        form.getTextField('Textfield-10').setText('{{ $cliente->nombrepadre }}');
                        form.getTextField('Piso').setText('{{ $cliente->nombremadre }}');
                        
                        form.getTextField('Textfield-11').setText('{{ $cliente->direccion }}');
                        form.getTextField('Email').setText('{{ $cliente->localidad->nombre }}');
                        form.getTextField('Textfield-16').setText('{{ $cliente->cp }}');
                        form.getTextField('Textfield-17').setText('{{ $cliente->provincia->nombre }}');
                        form.getTextField('Textfield-19').setText('{{ $cliente->telefono }}');
                        form.getTextField('Textfield-22').setText('{{ $cliente->email }}');

                        // Añadir los nuevos campos al final de EX01
                        const fecha = new Date();
                        const meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                        const dia = fecha.getDate().toString().padStart(2, '0');

                        form.getTextField('Nombre y apellidos del titular').setText('{{ $cliente->nombre }} {{ $cliente->apellido }}');
                        form.getTextField('Textfield-53').setText('MADRID');
                        form.getTextField('a').setText(dia);
                        form.getTextField('de').setText(meses[fecha.getMonth()]);
                        form.getTextField('de-0').setText(fecha.getFullYear().toString());
                    } else if (formType === 'EX02 - Formulario_reag_familiar.pdf') {
                        // Mantener todo el código existente del EX02 sin cambios
                        const tipoDoc = {{ $cliente->documento_id }};
                        const documento = '{{ $cliente->documento }}';
                        const apellidos = '{{ $cliente->apellido }}'.split(' ');
                        const fechaNac = '{{ $cliente->fecnac }}'.split('-');
                        const nacionalidad = '{{ $cliente->pais->nombre }}';

                        if (tipoDoc === 3) {
                            form.getTextField('Textfield').setText(documento);
                        } else {
                            form.getTextField('Textfield-0').setText(documento.substring(0, 1));
                            form.getTextField('Textfield-1').setText(documento.substring(1, documento.length - 1));
                            form.getTextField('Textfield-2').setText(documento.slice(-1));
                        }

                        form.getTextField('Textfield-7').setText(apellidos[0] || '');
                        form.getTextField('x').setText(apellidos[1] || '');
                        form.getTextField('Textfield-3').setText('{{ $cliente->nombre }}');
                        form.getTextField('Feccha de nacimientoz').setText(fechaNac[2] || '');
                        form.getTextField('Texto-1').setText(fechaNac[1] || '');
                        form.getTextField('Textfield-4').setText(fechaNac[0] || '');
                        form.getTextField('Textfield-5').setText(nacionalidad);
                        form.getTextField('Textfield-8').setText(nacionalidad);
                        form.getTextField('Textfield-9').setText('{{ $cliente->nombrepadre }}');
                        form.getTextField('Piso').setText('{{ $cliente->nombremadre }}');
                        form.getTextField('CP').setText('{{ $cliente->direccion }}');
                        form.getTextField('Textfield-13').setText('{{ $cliente->localidad->nombre }}');
                        form.getTextField('Textfield-15').setText('{{ $cliente->cp }}');
                        form.getTextField('Textfield-16').setText('{{ $cliente->provincia->nombre }}');
                        form.getTextField('Textfield-17').setText('{{ $cliente->telefono }}');
                        form.getTextField('Textfield-19').setText('{{ $cliente->email }}');
                        
                        // Añadir solo los nuevos campos al final
                        const fecha = new Date();
                        const meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                        const dia = fecha.getDate().toString().padStart(2, '0');

                        form.getTextField('Nombre y apellidos del titular').setText('{{ $cliente->nombre }} {{ $cliente->apellido }}');
                        form.getTextField('Textfield-66').setText('MADRID');
                        form.getTextField('a').setText(dia);
                        form.getTextField('de').setText(meses[fecha.getMonth()]);
                        form.getTextField('de-0').setText(fecha.getFullYear().toString());
                    } else if (formType === 'EX03 - Formulario_cta_ajena.pdf') {
                        // Variables necesarias
                        const tipoDoc = {{ $cliente->documento_id }};
                        const documento = '{{ $cliente->documento }}';
                        const apellidos = '{{ $cliente->apellido }}'.split(' ');
                        const fechaNac = '{{ $cliente->fecnac }}'.split('-');
                        const nacionalidad = '{{ $cliente->pais->nombre }}';

                        try {
                            // Documento según tipo
                            if (tipoDoc === 3) {
                                form.getTextField('Textfield-8').setText(documento); // T12 para pasaporte
                            } else {
                                form.getTextField('Textfield').setText(documento.substring(0, 1));
                                form.getTextField('Textfield-1').setText(documento.substring(1, documento.length - 1));
                                form.getTextField('Textfield-2').setText(documento.slice(-1));
                            }

                            // Datos personales
                            form.getTextField('Textfield-3').setText(apellidos[0] || '');
                            form.getTextField('Textfield-5').setText(apellidos[1] || '');
                            form.getTextField('Lugar').setText('{{ $cliente->nombre }}');
                            
                            // Fecha de nacimiento
                            form.getTextField('Feccha de nacimientoz').setText(fechaNac[2] || '');
                            form.getTextField('Texto-1').setText(fechaNac[1] || '');
                            form.getTextField('Textfield-6').setText(fechaNac[0] || '');
                            
                            // País de nacimiento
                            form.getTextField('Textfield-10').setText(nacionalidad); // T13 para nacionalidad
                            
                            // Datos familiares y dirección
                            form.getTextField('Textfield-11').setText('{{ $cliente->nombrepadre }}');
                            form.getTextField('Piso').setText('{{ $cliente->nombremadre }}');
                            form.getTextField('Textfield-12').setText('{{ $cliente->direccion }}');
                            form.getTextField('Email').setText('{{ $cliente->localidad->nombre }}');
                            form.getTextField('Textfield-15').setText('{{ $cliente->cp }}');
                            form.getTextField('Textfield-16').setText('{{ $cliente->provincia->nombre }}');
                            form.getTextField('Textfield-17').setText('{{ $cliente->telefono }}');
                            form.getTextField('Textfield-19').setText('{{ $cliente->email }}');

                            // Nuevos campos solicitados
                            const fecha = new Date();
                            const meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                            const dia = fecha.getDate().toString().padStart(2, '0');

                            form.getTextField('Nombre y apellidos del titular').setText('{{ $cliente->nombre }} {{ $cliente->apellido }}');
                            form.getTextField('Textfield-65').setText('MADRID');
                            form.getTextField('a').setText(dia);
                            form.getTextField('de').setText(meses[fecha.getMonth()]);
                            form.getTextField('de-0').setText(fecha.getFullYear().toString());

                        } catch (e) {
                            console.error('Error rellenando campos:', e);
                        }
                    } else if (formType === 'EX07 - Formulario_cta_propia.pdf') {
                        // Variables necesarias
                        const tipoDoc = {{ $cliente->documento_id }};
                        const documento = '{{ $cliente->documento }}';
                        const apellidos = '{{ $cliente->apellido }}'.split(' ');
                        const fechaNac = '{{ $cliente->fecnac }}'.split('-');
                        const nacionalidad = '{{ $cliente->pais->nombre }}';

                        try {
                            // Documento (NIE/Pasaporte)
                            if (tipoDoc === 3) {
                                form.getTextField('Textfield-1').setText(documento);
                            } else {
                                form.getTextField('Textfield-2').setText(documento.substring(0, 1));
                                form.getTextField('Textfield-3').setText(documento.substring(1, documento.length - 1));
                                form.getTextField('Textfield-4').setText(documento.slice(-1));
                            }

                            // Nombre y apellidos
                            form.getTextField('Textfield-8').setText(apellidos[0] || '');
                            form.getTextField('x').setText(apellidos[1] || '');
                            form.getTextField('Textfield-5').setText('{{ $cliente->nombre }}');
                            
                            // Fecha de nacimiento
                            form.getTextField('Fecha de nacimientoz').setText(fechaNac[2] || '');
                            form.getTextField('Texto-1').setText(fechaNac[1] || '');
                            form.getTextField('Textfield-6').setText(fechaNac[0] || '');
                            
                            // Nacionalidad
                            form.getTextField('Textfield-7').setText(nacionalidad);
                            form.getTextField('Textfield-9').setText(nacionalidad);
                            
                            // Datos familiares
                            form.getTextField('Textfield-10').setText('{{ $cliente->nombrepadre }}');
                            form.getTextField('Piso').setText('{{ $cliente->nombremadre }}');
                            
                            // Datos de contacto
                            form.getTextField('Provincia').setText('{{ $cliente->direccion }}');
                            form.getTextField('Textfield-14').setText('{{ $cliente->localidad->nombre }}');
                            form.getTextField('Textfield-16').setText('{{ $cliente->cp }}');
                            form.getTextField('Textfield-17').setText('{{ $cliente->provincia->nombre }}');
                            form.getTextField('Textfield-19').setText('{{ $cliente->telefono }}');
                            form.getTextField('Textfield-21').setText('{{ $cliente->email }}');

                            // Nuevos campos solicitados
                            const fecha = new Date();
                            const meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                            const dia = fecha.getDate().toString().padStart(2, '0');

                            form.getTextField('Nombre y apellidos del titular').setText('{{ $cliente->nombre }} {{ $cliente->apellido }}');
                            form.getTextField('Textfield-65').setText('MADRID');
                            form.getTextField('a').setText(dia);
                            form.getTextField('de').setText(meses[fecha.getMonth()]);
                            form.getTextField('de-0').setText(fecha.getFullYear().toString());

                        } catch (e) {
                            console.error('Error rellenando campos:', e);
                        }
                    } else if (formType === 'EX10 - Formulario autor. resid. o resid. y trabajo circunst excep.pdf') {
                        

                        // Mantener el código existente que ya funciona
                        const tipoDoc = {{ $cliente->documento_id }};
                        const documento = '{{ $cliente->documento }}';
                        const apellidos = '{{ $cliente->apellido }}'.split(' ');
                        const fechaNac = '{{ $cliente->fecnac }}'.split('-');
                        const nacionalidad = '{{ $cliente->pais->nombre }}';

                        try {
                            // Documento según tipo
                            if (tipoDoc === 3) {
                                form.getTextField('Textfield-0').setText(documento);
                            } else {
                                form.getTextField('Textfield-1').setText(documento.substring(0, 1));
                                form.getTextField('Textfield-2').setText(documento.substring(1, documento.length - 1));
                                form.getTextField('Textfield-3').setText(documento.slice(-1));
                            }

                            // Datos personales
                            form.getTextField('CP').setText(apellidos[0] || '');
                            form.getTextField('x').setText(apellidos[1] || '');
                            form.getTextField('Textfield-4').setText('{{ $cliente->nombre }}');
                            
                            // Fecha de nacimiento
                            form.getTextField('Fecha de nacimientoz').setText(fechaNac[2] || '');
                            form.getTextField('Texto-1').setText(fechaNac[1] || '');
                            form.getTextField('Textfield-5').setText(fechaNac[0] || '');
                            
                            // País de nacimiento
                            form.getTextField('Textfield-6').setText(nacionalidad);
                            form.getTextField('Textfield-7').setText(nacionalidad);
                            
                            // Datos familiares
                            form.getTextField('Textfield-9').setText('{{ $cliente->nombrepadre }}');
                            form.getTextField('Piso').setText('{{ $cliente->nombremadre }}');
                            
                            // Dirección y contacto
                            form.getTextField('Textfield-12').setText('{{ $cliente->localidad->nombre }}');
                            form.getTextField('Textfield-15').setText('{{ $cliente->cp }}');
                            form.getTextField('Textfield-16').setText('{{ $cliente->provincia->nombre }}');
                            form.getTextField('Provincia').setText('{{ $cliente->direccion }}');
                            form.getTextField('Textfield-18').setText('{{ $cliente->telefono }}');
                            form.getTextField('DN IN IEPAS').setText('{{ $cliente->email }}');

                            // Nuevos campos solicitados
                            const fecha = new Date();
                            const meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                            const dia = fecha.getDate().toString().padStart(2, '0');

                            form.getTextField('Nombre y apellidos del titular').setText('{{ $cliente->nombre }} {{ $cliente->apellido }}');
                            form.getTextField('Textfield-77').setText('MADRID');
                            form.getTextField('a').setText(dia);
                            form.getTextField('de').setText(meses[fecha.getMonth()]);
                            form.getTextField('de-0').setText(fecha.getFullYear().toString());

                        } catch (e) {
                            console.error('Error rellenando campos:', e);
                        }
                    } else if (formType === 'EX11 - Formulario_larga_duracion.pdf') {
                        

                        // Mantener el código existente que ya funciona
                        const tipoDoc = {{ $cliente->documento_id }};
                        const documento = '{{ $cliente->documento }}';
                        const apellidos = '{{ $cliente->apellido }}'.split(' ');
                        const fechaNac = '{{ $cliente->fecnac }}'.split('-');
                        const nacionalidad = '{{ $cliente->pais->nombre }}';

                        try {
                            // Documento según tipo
                            if (tipoDoc === 3) {
                                form.getTextField('Textfield-2').setText(documento);
                            } else {
                                form.getTextField('Textfield-3').setText(documento.substring(0, 1));
                                form.getTextField('Textfield-4').setText(documento.substring(1, documento.length - 1));
                                form.getTextField('Textfield-5').setText(documento.slice(-1));
                            }

                            // Datos personales
                            form.getTextField('CP').setText(apellidos[0] || '');
                            form.getTextField('x H').setText(apellidos[1] || '');
                            form.getTextField('Textfield-6').setText('{{ $cliente->nombre }}');
                            
                            // Fecha de nacimiento
                            form.getTextField('Fecha de nacimientoz').setText(fechaNac[2] || '');
                            form.getTextField('Texto-1').setText(fechaNac[1] || '');
                            form.getTextField('Textfield-8').setText(fechaNac[0] || '');
                            
                            // País de nacimiento
                            form.getTextField('Textfield-9').setText(nacionalidad);
                            form.getTextField('Textfield-10').setText(nacionalidad);
                            
                            // Datos familiares
                            form.getTextField('Textfield-12').setText('{{ $cliente->nombrepadre }}');
                            form.getTextField('Piso').setText('{{ $cliente->nombremadre }}');
                            
                            // Dirección y contacto
                            form.getTextField('Provincia').setText('{{ $cliente->direccion }}');
                            form.getTextField('Textfield-12').setText('{{ $cliente->nombrepadre }}');
                            form.getTextField('Textfield-15').setText('{{ $cliente->localidad->nombre }}');
                            form.getTextField('Textfield-17').setText('{{ $cliente->cp }}');
                            form.getTextField('Textfield-19').setText('{{ $cliente->provincia->nombre }}');
                            form.getTextField('Textfield-20').setText('{{ $cliente->telefono }}');
                            form.getTextField('DN IN IEPAS').setText('{{ $cliente->email }}');

                            // Añadir solo los nuevos campos al final
                            const fecha = new Date();
                            const meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                            const dia = fecha.getDate().toString().padStart(2, '0');

                            form.getTextField('Nombre y apellidos del titular').setText('{{ $cliente->nombre }} {{ $cliente->apellido }}');
                            form.getTextField('Textfield-55').setText('MADRID');
                            form.getTextField('a').setText(dia);
                            form.getTextField('de').setText(meses[fecha.getMonth()]);
                            form.getTextField('de-0').setText(fecha.getFullYear().toString());

                        } catch (e) {
                            console.error('Error rellenando campos:', e);
                        }
                    } else if (formType === 'EX19 - Tarjeta_familiar_comunitario.pdf') {
                        // Variables necesarias
                        const tipoDoc = {{ $cliente->documento_id }};
                        const documento = '{{ $cliente->documento }}';
                        const apellidos = '{{ $cliente->apellido }}'.split(' ');
                        const fechaNac = '{{ $cliente->fecnac }}'.split('-');
                        const nacionalidad = '{{ $cliente->pais->nombre }}';

                        try {
                            // Documento según tipo
                            if (tipoDoc === 3) {
                                form.getTextField('Textfield-1').setText(documento);
                            } else {
                                form.getTextField('Textfield-2').setText(documento.substring(0, 1));
                                form.getTextField('Textfield-3').setText(documento.substring(1, documento.length - 1));
                                form.getTextField('Textfield-4').setText(documento.slice(-1));
                            }

                            // Datos personales
                            form.getTextField('CP').setText(apellidos[0] || '');
                            form.getTextField('x').setText(apellidos[1] || '');
                            form.getTextField('Textfield-5').setText('{{ $cliente->nombre }}');
                            
                            // Fecha de nacimiento
                            form.getTextField('Fecha de nacimientoz').setText(fechaNac[2] || '');
                            form.getTextField('Texto-1').setText(fechaNac[1] || '');
                            form.getTextField('Textfield-6').setText(fechaNac[0] || '');
                            
                            // País de nacimiento
                            form.getTextField('Textfield-7').setText(nacionalidad);
                            form.getTextField('Textfield-8').setText(nacionalidad);
                            
                            // Datos familiares
                            form.getTextField('Textfield-10').setText('{{ $cliente->nombrepadre }}');
                            form.getTextField('N').setText('{{ $cliente->nombremadre }}');
                            
                            // Dirección y contacto
                            form.getTextField('Provincia').setText('{{ $cliente->direccion }}');
                            form.getTextField('Textfield-13').setText('{{ $cliente->localidad->nombre }}');
                            form.getTextField('Textfield-15').setText('{{ $cliente->cp }}');
                            form.getTextField('Textfield-17').setText('{{ $cliente->provincia->nombre }}');
                            form.getTextField('Textfield-18').setText('{{ $cliente->telefono }}');
                            form.getTextField('DN IN IEPAS').setText('{{ $cliente->email }}');

                            console.log('Campos EX19 rellenados correctamente');
                        
                            // Mantener todo el código existente del EX19 sin cambios
                            // ... código existente ...

                            // Añadir solo los nuevos campos al final
                            const fecha = new Date();
                            const meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                            const dia = fecha.getDate().toString().padStart(2, '0');

                            form.getTextField('Nombre y apellidos del titular').setText('{{ $cliente->nombre }} {{ $cliente->apellido }}');
                            form.getTextField('Textfield-66').setText('MADRID');
                            form.getTextField('a').setText(dia);
                            form.getTextField('de').setText(meses[fecha.getMonth()]);
                            form.getTextField('de-0').setText(fecha.getFullYear().toString());

                        } catch (e) {
                            console.error('Error rellenando campos:', e);
                        }
                    } else if (formType === 'EX17 - Formulario_TIE.pdf') {
                        // Mantener el código existente que ya funciona
                        const tipoDoc = {{ $cliente->documento_id }};
                        const documento = '{{ $cliente->documento }}';
                        const apellidos = '{{ $cliente->apellido }}'.split(' ');
                        const fechaNac = '{{ $cliente->fecnac }}'.split('-');
                        const nacionalidad = '{{ $cliente->pais->nombre }}';

                        try {
                            // Documento (NIE/Pasaporte)
                            if (tipoDoc === 3) {
                                form.getTextField('Textfield-1').setText(documento);
                            } else {
                                form.getTextField('Textfield-2').setText(documento.substring(0, 1));
                                form.getTextField('Textfield-3').setText(documento.substring(1, documento.length - 1));
                                form.getTextField('Textfield-4').setText(documento.slice(-1));
                            }

                            // Nombre y apellidos
                            form.getTextField('CP').setText(apellidos[0] || '');
                            form.getTextField('x').setText(apellidos[1] || '');
                            form.getTextField('Textfield-5').setText('{{ $cliente->nombre }}');
                            
                            // Fecha de nacimiento
                            form.getTextField('Fecha de nacimientoz').setText(fechaNac[2] || '');
                            form.getTextField('Texto-1').setText(fechaNac[1] || '');
                            form.getTextField('Textfield-6').setText(fechaNac[0] || '');
                            
                            // Nacionalidad
                            form.getTextField('Textfield-7').setText(nacionalidad);
                            form.getTextField('Textfield-8').setText(nacionalidad);
                            
                            // Datos familiares
                            form.getTextField('Textfield-10').setText('{{ $cliente->nombrepadre }}');
                            form.getTextField('N').setText('{{ $cliente->nombremadre }}');
                            
                            // Datos de contacto
                            form.getTextField('Provincia').setText('{{ $cliente->direccion }}');
                            form.getTextField('Textfield-13').setText('{{ $cliente->localidad->nombre }}');
                            form.getTextField('Textfield-15').setText('{{ $cliente->cp }}');
                            form.getTextField('Textfield-17').setText('{{ $cliente->provincia->nombre }}');
                            form.getTextField('Textfield-18').setText('{{ $cliente->telefono }}');
                            form.getTextField('DN IN IEPAS').setText('{{ $cliente->email }}');

                            // Nuevos campos solicitados
                            const fecha = new Date();
                            const meses = ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'];
                            const dia = fecha.getDate().toString().padStart(2, '0');

                            form.getTextField('Nombre y apellidos del titular').setText('{{ $cliente->nombre }} {{ $cliente->apellido }}');
                            form.getTextField('Textfield-55').setText('MADRID');
                            form.getTextField('a').setText(dia);
                            form.getTextField('de').setText(meses[fecha.getMonth()]);
                            form.getTextField('de-0').setText(fecha.getFullYear().toString());

                        } catch (e) {
                            console.error('Error rellenando campos:', e);
                        }
                    } else if (formType === 'Designacion_Representante.pdf') {
                        const fields = form.getFields();
                        const apellidos = '{{ $cliente->apellido }}'.split(' ');
                        const fechaNac = '{{ $cliente->fecnac }}'.split('-');
                        const tipoDoc = {{ $cliente->documento_id }};
                        const documento = '{{ $cliente->documento }}';
                        
                        // Obtener fecha actual
                        const fecha = new Date();
                        const meses = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
                        
                        try {
                            // Mapeo de campos con sus valores
                            const fieldValues = {
                                'Text1': '{{ $cliente->nombre }}',                    // T0 nombre
                                'Text2': apellidos[0] || '',                         // T1 primer apellido
                                'Text4': apellidos[1] || '',                         // T2 segundo apellido
                                'Text5': '{{ $cliente->pais->nombre }}',             // T3 nacionalidad
                                'Text6': tipoDoc === 3 ? '' : documento,             // T4 nie (solo si no es pasaporte)
                                'Text8': tipoDoc === 3 ? documento : '',             // T6 pasaporte (solo si es pasaporte)
                                'Text7': fechaNac[2] || '',                         // T5 dia nacimiento
                                'Text9': fechaNac[1] || '',                         // T7 mes
                                'Text10': fechaNac[0] || '',                        // T8 año
                                'Text11': '{{ $cliente->localidad->nombre }}',       // T9 localidad
                                'Text13': '{{ $cliente->pais->nombre }}',            // T10 pais
                                'Text14': '{{ $cliente->nombrepadre }}',             // T11 nombre padre
                                'Text18': '{{ $cliente->nombremadre }}',             // T15 nombre madre
                                'Text20': '{{ $cliente->direccion }}',               // T16 direccion
                                'Text15': '{{ $cliente->localidad->nombre }}',       // T12 localidad
                                'Text24': '{{ $cliente->cp }}',                      // T20 cp
                                'Text23': '{{ $cliente->provincia->nombre }}',       // T19 provincia
                                'Text17': '{{ $cliente->telefono }}',                // T14 telefono
                                'Text16': '{{ $cliente->email }}',                   // T13 email
                                'Text44': 'Madrid',                                  // Ciudad fija
                                'Text45': fecha.getDate().toString(),                // Día actual
                                'Text46': meses[fecha.getMonth()],                   // Mes actual en letra
                                'Text47': fecha.getFullYear().toString()             // Año actual
                            };

                            // Rellenar los campos
                            fields.forEach(field => {
                                const fieldName = field.getName();
                                if (fieldValues[fieldName] !== undefined) {
                                    try {
                                        field.setText(fieldValues[fieldName]);
                                    } catch (e) {
                                        console.error(`Error al rellenar campo ${fieldName}:`, e);
                                    }
                                }
                            });
                        } catch (e) {
                            console.error('Error rellenando campos:', e);
                        }
                    }

                    const pdfBytes = await pdfDoc.save();
                    const blob = new Blob([pdfBytes], { type: 'application/pdf' });
                    const url = URL.createObjectURL(blob);
                    document.getElementById('pdfFrame').src = url;

                } catch (error) {
                    console.error('Error al rellenar el formulario:', error);
                    document.getElementById('pdfFrame').src = pdfUrl;
                }
            }

           // Event listener para cambio en el select
$('#formularioEx').change(function() {
    if (this.value) {
        const baseUrl = '/Plataforma/public';
        const pdfUrl = `${baseUrl}/formulario-ex/pdf/${this.value}`;
        fillFormByTemplate(pdfUrl);
    }
});

// Event listener para el botón de descarga
$('#descargarPDF').click(function() {
    const formType = $('#formularioEx').val();
    if (!formType) return;
    
    const baseUrl = '/Plataforma/public';
    const pdfUrl = `${baseUrl}/formulario-ex/pdf/${formType}`;
    
    fillFormByTemplate(pdfUrl).then(() => {
        const iframeSrc = document.getElementById('pdfFrame').src;
        
        // Obtener el nombre sugerido para el archivo
        const suggestedName = formType.toUpperCase().startsWith('EX') ? 
            formType.substring(0, 4) + '.pdf' : 
            formType;

        // Crear un enlace con target="_blank" para forzar el diálogo de guardado
        const link = document.createElement('a');
        link.href = iframeSrc;
        link.target = "_blank"; // Esto fuerza el diálogo de guardado en la mayoría de navegadores
        link.download = suggestedName;
        link.dispatchEvent(new MouseEvent('click')); // Simular click
    });
});
        </script>

        @if (session('eliminar') == 'ok')
            <script>
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            </script>
        @endif

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            $('.formulario-eliminar').submit(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Estas segur@!',
                    text: "Este Archivo se Eliminara!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Borrar!',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            });
        </script>
    @stop
