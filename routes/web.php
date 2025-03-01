<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DatatableController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\UserList;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\LocalidadController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProcesoController;
use App\Http\Controllers\DesicionController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\PresentoController;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\EstadocivilController;
use App\Http\Controllers\ProcesoclienteController;
use App\Http\Controllers\TipoprocesoController;
use App\Http\Controllers\RecursoclienteController;
use App\Http\Controllers\MensajeController;
use App\Models\Cliente;
use App\Models\Procesocliente;
use App\Models\Tipoproceso;
use App\Http\Controllers\NotaController;
use App\Models\Nota;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\VencidoController;
use App\Http\Controllers\TerminadoController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\AutonomoController;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailSend;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\SignaturePadController;
use App\Http\Controllers\FirmaController;
use App\Http\Controllers\AutorizadoController;
use App\Http\Controllers\FiledomicilioController;
use App\Http\Controllers\FileidentidadController;
use App\Http\Controllers\FileotrosController;
use App\Http\Controllers\FilesprocesoController;
use App\Http\Controllers\FilexpedienteController;
use App\Models\Filedomicilio;
use App\Models\Proceso;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AlertaController;
use App\Models\Alerta;
use App\Http\Controllers\DocuprocesoController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DelegacionController;
use App\Http\Controllers\LlamadaController;
use App\Http\Controllers\MetodopagoController;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PrecioprocesoController;
use App\Models\Precioproceso;
use App\Http\Controllers\FiltroController;
use App\Http\Controllers\TipoclienteController;
use App\Http\Controllers\FormularioExController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('filtro', function () {
    // return view('welcome');
    return view('filtro');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $cliente = Cliente::count();
    $proceso = Procesocliente::where('tipoproceso_id','=','1')->count();
    $recurso = Procesocliente::where('tipoproceso_id','=','2')->count();

    $date1 = Carbon::now();
    $date2 = Carbon::now();
    $date1->toDateString();
    $date2->toDateString();
    $to = $date1->addDay(15);
    $from = $date2->subDay(5);

    $alertas = Alerta::whereBetween('fecalert', [$from, $to])->get();

    $procesos = Proceso::all();

    $notas = Nota::all();
    $date = Carbon::now();
    // $date = $date->format('d-m-Y');
    $vencidos = DB::table('clientes')->where('caducidaddoc','>',Carbon::now()->subDays(90))->count();


    return view('dashboard',compact('cliente','proceso','recurso','notas','date','vencidos','procesos','alertas'));
})->name('dashboard');


Route::resource('vencido', VencidoController::class);
Route::get('vencidos', [VencidoController::class,'vencidodocu'])->name('docuvencido.vencidos');

//notas
Route::resource('notas', NotaController::class)->names('notas');
Route::get('notass', [NotaController::class,'notadocu'])->name('docunotas.notas');

//provincia
Route::resource('provincia', ProvinciaController::class)->names('provincia');
Route::get('towns/{id}', [ProvinciaController::class,'getTowns']);
Route::get('towns1/{id}', [ProvinciaController::class,'getTowns1']);
Route::get('provincias', [ProvinciaController::class,'provi'])->name('docuprovi.provincia');

//localidad
Route::resource('localidad', LocalidadController::class)->names('localidad');
Route::get('localidads', [LocalidadController::class,'locali'])->name('doculoca.localidad');

//pais
Route::resource('pais', PaisController::class)->names('pais');
Route::get('paiss', [PaisController::class,'docupais'])->name('docupais.pais');

//users
Route::resource('users', UsersController::class)->names('users');
Route::get('usuario', [UsersController::class, 'docuuser'])->name('users.data');

//proceso
Route::resource('proceso', ProcesoController::class)->names('proceso');
Route::get('procesos', [ProcesoController::class,'docuproceso'])->name('proceso.data');
Route::get('procesobuscar/{id}', [ProcesoController::class,'procesobuscar'])->name('proceso.buscar');
//desicionbuscar
Route::resource('desicion', DesicionController::class)->names('desicion');
Route::get('desicions', [DesicionController::class,'docudesicion'])->name('desicion.data');

//delegacion
//Route::resource('delegacion', DelegacionController::class)->names('delegacion');
//Route::get('delegacions', [DelegacionController::class, 'docudelegacion'])->name('delegacion.data');

//presento
Route::resource('presento', PresentoController::class)->names('presento');
Route::get('presentos', [PresentoController::class,'presentodocu'])->name('presento.data');

//recurso
Route::resource('recurso', RecursoController::class)->names('recurso');
Route::get('recursos', [RecursoController::class,'recu'])->name('docrecurso.recurso');

//estadocivil
Route::resource('estadocivil', EstadocivilController::class)->names('estadocivil');
Route::get('estadocivils', [EstadocivilController::class,'estadodocu'])->name('estadocivil.data');

//documento
Route::resource('documento', DocumentoController::class)->names('documento');
Route::get('documentos', [DocumentoController::class,'docum'])->name('documento.data');

//cliente
Route::resource('cliente', ClienteController::class)->names('cliente');
Route::get('afiliado',[ClienteController::class, 'afiliado'])->name('cliente.afiliado');
Route::get('client',[ClienteController::class, 'client'])->name('cliente.client');


Route::get('clientes', [ClienteController::class,'doccliente'])->name('doccliente.cliente');
Route::get('clients', [ClienteController::class,'docclients'])->name('doccliente.clients');
Route::get('afiliados', [ClienteController::class,'docafiliados'])->name('afiliados.clients');


Route::get('clientes-pdf/{cliente}', [ClienteController::class, 'clientesPDF'])->name('clientepdf');
Route::get('clientes-pdfafi/{cliente}', [ClienteController::class, 'clientesPDFafi'])->name('clientepdfafi');

Route::get('clientes-proceso/{cliente}', [ClienteController::class, 'clienteproceso'])->name('clienteproceso');
Route::get('firmar', [ClienteController::class, 'clientesfirma'])->name('clientefirma');

//procesocliente
Route::resource('procesocliente', ProcesoclienteController::class)->names('procesocliente');
Route::get('procesoclientes', [ProcesoclienteController::class,'docprocesoclientes'])->name('docprocesoclientes.procesocliente');
Route::get('procesoc/{id}', [ProcesoclienteController::class,'editar'])->name('editaproceso');

//recursocliente
Route::resource('recursocliente', RecursoclienteController::class)->names('recursocliente');
Route::get('recursoclientes', [RecursoclienteController::class,'docrecursoclientes'])->name('docrecursoclientes.recursocliente');
Route::get('recurso-pdf/{recurso}', [RecursoclienteController::class, 'recursoPDF'])->name('recursopdf');

//tipoproceso
Route::resource('tipoproceso', TipoprocesoController::class)->names('tipoproceso');
Route::get('tipoprocesos', [TipoprocesoController::class,'doctipproceso'])->name('doctipoproceso.tipoproceso');

// Route::get('datatable/users', [DatatableController::class,'user'])->name('datatable.user');

Route::resource('documento', TerminadoController::class);




Route::resource('files', FileController::class)->names('files');


Route::resource('fileidentidad', FileidentidadController::class)->names('fileidentidad');

Route::resource('tipoclientes', TipoclienteController::class)->names('tipoclientes');

// Route::resource('filedomicilio', FiledomicilioController::class)->names('filedomicilio');

// Route::resource('fileotros', FileotrosController::class)->names('fileotros');

// Route::resource('filexpediente', FilexpedienteController::class)->names('filexpediente');



// Route::post('/uploadt',[FileController::class,'store'])->name('files.store');
// Route::get('/uploadts/{upload}',[FileController::class,'index'])->name('files.index');
// Route::get('/uploadt/{upload}',[FileController::class,'show'])->name('files.show');
// Route::delete('/delete-uploadt/{upload}',[FileController::class,'destroy'])->name('files.destroy');

//autonomo
Route::resource('autonomo', AutonomoController::class)->names('autonomo');
Route::get('autonomos', [AutonomoController::class,'docautonomo'])->name('docautonomo.autonomo');

//mensaje
Route::resource('mensaje', MensajeController::class)->names('mensaje');
Route::get('mensajes', [MensajeController::class,'docmensajes'])->name('docmensajes.mensajes');

Route::resource('sexo', SexoController::class)->names('sexo');
Route::get('sexos', [SexoController::class,'sexos'])->name('docsexos.sexos');

// Route::get('mensajeenv', [MensajeController::class,'enviomensajes'])->name('Envmensajes');
Route::get('/envmensaje/{mensaje}',[MensajeController::class,'enviomensajes'])->name('enviomensajes.enviomensajes');

Route::get('contactanos', function(){
    // $correo = new ContactanosMailable;
    // Mail::to('wurlizerbar1@gmail.com')->send($correo);
    return view('emails.contactanos');
});

//sends-mail
Route::resource('sends-mail',MailSend::class)->names('sends-mail');

Route::post('send-mail',[MailSend::class,'mailsend'])->name('enviosend');

Route::resource('user',UserController::class)->names('user');

Route::get('signature_pad', [SignatureController::class, 'index']);
Route::post('signature_pad', [SignatureController::class, 'store'])->name('signature_pad.store');

// Route::get('signaturepad/{id}', [SignaturePadController::class, 'index'])->name('sign.index');
// Route::post('signaturepad', [SignaturePadController::class, 'upload'])->name('signaturepad.upload');

Route::resource('signaturepad', SignaturePadController::class)->names('signaturepad');


Route::resource('firma',FirmaController::class)->names('firma');
Route::get('firmas',[FirmaController::class,'firmas'])->name('docfirma.firma');


Route::get('firm',[SignatureController::class,'index']);
Route::post('firm',[SignatureController::class,'upload'])->name('signature');

//autorizado
Route::resource('autorizado', AutorizadoController::class)->names('autorizado');




// Route::post('/upload',[FileController::class,'store'])->name('user.files.store');

// Route::get('/uploadt',[FileController::class,'index'])->name('file.index');

// Route::get('/upload/{upload}',[FileController::class,'show'])->name('files.show');
// Route::delete('/delete-upload/{upload}',[FileController::class,'destroy'])->name('files.destroy');


Route::get('search/cursos',[SearchController::class, 'cursos'])->name('search.cursos');

//alerta
Route::resource('alerta', AlertaController::class)->names('alerta');
Route::get('alert/{id}', [AlertaController::class,'editar'])->name('editaler');


Route::resource('filesproceso', FilesprocesoController::class)->names('filesproceso');
Route::resource('docuproceso', DocuprocesoController::class)->names('docuproceso');
Route::resource('consulta', ConsultaController::class)->names('consulta');


Route::get('llamada/cursos',[LlamadaController::class, 'cursos'])->name('llamada.cursos');
Route::get('llamadas/{ver}',[LlamadaController::class, 'ver'])->name('llamada.ver');
Route::get('llamada/{crear}/crear',[LlamadaController::class, 'crearcliente'])->name('llamada.crear');

Route::get('llamada/{crearaf}/crera',[LlamadaController::class, 'crearafiliado'])->name('llamada.crearafiliado');
Route::get('llamada/{crearbaf}/crerbaf',[LlamadaController::class, 'bajaafiliado'])->name('llamada.bajaafiliado');


Route::get('llamada/{crearllamada}/crearllamada',[LlamadaController::class, 'crearllamada'])->name('llamada.crearllamada');
// Route::post('llamada/{guardarllamada}/guardarllamada',[LlamadaController::class, 'guardarllamada'])->name('llamada.guardarllamada');
Route::post('/guardarllamada',[LlamadaController::class,'guardarllamada'])->name('llamada.guardarllamada');
Route::resource('llamada', LlamadaController::class)->names('llamada');

Route::resource('precio', PrecioController::class)->names('precio');

Route::resource('metodopago', MetodopagoController::class)->names('metodopago');
Route::get('metodopagos', [MetodopagoController::class,'docupais'])->name('presentor.data');

Route::resource('pago', PagoController::class)->names('pago');
Route::get('pagos', [PagoController::class,'docupago'])->name('pago.data');


Route::resource('precioproceso', PrecioprocesoController::class)->names('precioproceso');
// Route::get('precioprocesos', [PrecioprocesoController::class,'docupago'])->name('pago.data');

Route::resource('filter', FiltroController::class)->names('filter');

// Extranjeria PDF
Route::get('formulario-ex/pdf/{nombreArchivo}', [FormularioExController::class, 'servirPDF'])->name('formulario.pdf');
Route::get('formulario-ex/{cliente}', [FormularioExController::class, 'mostrarFormulario'])->name('formulario.mostrar');







