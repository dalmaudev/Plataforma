<?php

namespace App\Http\Controllers;

use App\Models\Alerta;
use App\Models\Cliente;
use App\Models\Delegacion;
use App\Models\Documento;
use App\Models\Estadocivil;
use Illuminate\Http\Request;
use App\Models\Provincia;
use App\Models\Localidad;
use App\Models\Pais;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Models\Proceso;
use App\Models\Tipoproceso;
use App\Models\Desicion;
use App\Models\Docuproceso;
use App\Models\User;
use App\Models\Procesocliente;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\File;
use App\Models\Sexo;
use Illuminate\Support\Facades\Auth;
// use App\Models\Filedomicilio;
// use App\Models\Fileidentidad;

class ClienteController extends Controller
{

    public function index()
    {
            $clientes = Cliente::all();

        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        $delegacion = Delegacion::all();

        $provincia = Provincia::pluck('nombre','id');
        $sexo = Sexo::pluck('nombre','id');

        $localidades = Localidad::pluck('nombre','id');
        $documentos = Documento::pluck('nombre','id');
        $paises = Pais::pluck('nombre','id');
        $estadocivil = Estadocivil::pluck('nombre','id');

        $procesos = Proceso::pluck('nombre','id');
        $tipoprocesos = Tipoproceso::pluck('nombre','id');
        $desicion = Desicion::pluck('nombre','id');
        $especialista = User::pluck('name','id');
        return view('cliente.create', compact('provincia','localidades','documentos','paises','estadocivil','procesos','tipoprocesos','desicion','especialista','sexo','delegacion'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'localidad_id' => 'required|integer|not_in:0',
            'documento' => 'required',

        ],[
            'nombre.required' => 'El nombre del cliente es obligatorio',
            'apellido.required' => 'El apellido del cliente es obligatorio',
            'localidad_id.integer' => 'La localidad del cliente es obligatoria',
            'documento.required' => 'El documento del cliente es obligatorio',
        ]);
        $data = $request->all();

        $user = Cliente::create($data);
        if ($request->hasFile('foto')){
            $file= $request->file("foto");
            $nombre  = time().'.'. $file->getClientOriginalExtension();
            $destino = public_path('archivo');
            $request->foto->move($destino,$nombre);
            $user->update(['foto' => $nombre]);

        }


        // Procesocliente::create([
        //     'tipoproceso_id' => $data['tipoproceso_id'],
        //     'proceso_id' => $data['proceso_id'],
        //     'fecpresentado' => $data['fecpresentado'],
        //     'desicion_id' => $data['desicion_id'],
        //     'fecdesicion' => $data['fecdesicion'],
        //     'user_id' => $data['user_id'],
        //     'pagoconsulta' => $data['pagoconsulta'],
        //     'observaciones' => $data['observaciones'],
        //     'abono' => $data['abono'],
        //     'pendiente' => $data['pendiente'],
        //     'precioproceso' => $data['precioproceso'],
        //     'cliente_id' => $user->id,
        // ]);





        return redirect()->route('cliente.index')->with('info','Cliente agregado satisfactoriamente!!');
    }


    public function clienteproceso($id)
    {
        // $cliente = Cliente::findOrFail($id);



        // $cliente = Cliente::where('id',$id)->pluck('nombre','id');
        $cliente = Cliente::find($id);

        $procesos = Proceso::pluck('nombre','id');
        $tipoprocesos = Tipoproceso::pluck('nombre','id');
        $desicion = Desicion::pluck('nombre','id');
        $especialista = User::pluck('name','id');
        // $delegacion = Delegacion::pluck('nombre', 'id');


        return view('procesocliente.create',compact('cliente','procesos','tipoprocesos','desicion','especialista', 'delegacion'));
    }

    public function show(Cliente $cliente)
    {
        $provincia = Provincia::pluck('nombre','id');
        $localidades = Localidad::pluck('nombre','id');
        $documentos = Documento::pluck('nombre','id');
        $paises = Pais::pluck('nombre','id');
        $estadocivil = Estadocivil::pluck('nombre','id');
        $files = File::whereClienteId($cliente->id)->latest()->get();
        $docuproceso = Docuproceso::where('cliente_id','=',$cliente->id)->get();

        // $docu = Docuproceso::where

        // $filedomicilios = Filedomicilio::where('cliente_id','=', $cliente->id)->latest()->get();
        // $fileidentidads = Fileidentidad::where('cliente_id','=', $cliente->id)->latest()->get();
        $procesos = Procesocliente::where('cliente_id','=', $cliente->id)->latest()->get();
        $alertas = Alerta::where('cliente_id','=', $cliente->id)->get();
        // dd($procesos);
        return view('cliente.show',compact('cliente','provincia','localidades','documentos','paises','estadocivil','files','procesos','alertas', 'docuproceso'));
    }

    public function edit(Cliente $cliente)
    {


        $files = File::where('cliente_id','=', $cliente->id)->latest()->get();
        $provincia = Provincia::pluck('nombre','id');

        // $localidades = Localidad::pluck('nombre','id')->where($cliente->provincia_id,'=','provincia_id');
        $localidades = Localidad::where('provincia_id','=',$cliente->provincia_id)->pluck('nombre','id');
        $documentos = Documento::pluck('nombre','id');
        $paises = Pais::pluck('nombre','id');
        $estadocivil = Estadocivil::pluck('nombre','id');
        $sexo = Sexo::pluck('nombre','id');
        return view('cliente.edit',compact('cliente','provincia','localidades','documentos','paises','estadocivil','sexo','files'));
    }

    public function update(Request $request, Cliente $cliente)
    {

        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'documento' => 'required',
        ],[
            'nombre.required' => 'El Nombre es obligatorio',
            'apellido.required' => 'El Apellido es obligatorio',
            'documento.required' => 'El Documento es obligatorio',
        ]);
        $cliente->update($request->only('nombre','apellido','direccion','estadocivil_id','documento_id','pais_id','localidad_id','provincia_id','cp','observaciones','documento','caducidaddoc','telefono','email','hijo','nombrepadre','nombremadre','fecnac','cifoto','avatar','hijo1','hijo2','hijo3','hijo4','hijo5','hijo6','hijo7','hijo8','hijo9','hijo10','hijo11','hijo12','profesion','domifiscal','certdigital','altaautonomo','numseguridad','cuentabanco','titularbanco','domifiscal','sexo','firma') );
    //    dd($request->all());
    if ($request->hasFile('foto')){
        $file= $request->file("foto");
        $nombre  = time().'.'. $file->getClientOriginalExtension();
        $destino = public_path('archivo');
        $request->foto->move($destino,$nombre);
        $cliente->update(['foto' => $nombre]);

    }



        return redirect()->route('cliente.index')->with('info','Cliente Actualizado satisfactoriamente!!');
    }

    public function destroy(Cliente $cliente)
    {

        $pcliente = Procesocliente::where('cliente_id','=',$cliente->id)->count();
        if($pcliente>0){
            return redirect()->route('cliente.index')->with('dele','Imposible borrar cliente con procesos pendientes!!');
        }else{
            $cliente->delete();

            return redirect()->route('cliente.index')->with('info','Cliente eliminado satisfactoriamente!!');
        }

    }

    public function doccliente(){
        if(Auth::user()->hasRole('Admin')){
        $users = Cliente::select('id','nombre','apellido','documento','email','created_at')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a target="_blank" href="'.route('clientepdf', $row->id).'" class="edit btn btn-primary btn-sm mr-2" title="Editar"><i class="far fa-file-pdf"></i></a>';
                $btn = $btn.'<a href="'.route('clienteproceso', $row->id).'" class="btn btn-warning btn-sm mr-2" title="Mostrar"><i class="fa fa-balance-scale"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $iduser = auth()->id();
            $users = Cliente::select('id','nombre','apellido','documento','email','created_at')->where('user_id',$iduser)->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a target="_blank" href="'.route('clientepdf', $row->id).'" class="edit btn btn-primary btn-sm mr-2" title="Editar"><i class="far fa-file-pdf"></i></a>';
                $btn = $btn.'<a href="'.route('clienteproceso', $row->id).'" class="btn btn-warning btn-sm mr-2" title="Mostrar"><i class="fa fa-balance-scale"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }
    }

    public function docclients(){
        if(Auth::user()->hasRole('Admin')){
        $users = Cliente::select('id','nombre','apellido','documento','email','created_at')->where('cliente',1)->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a target="_blank" href="'.route('clientepdf', $row->id).'" class="edit btn btn-primary btn-sm mr-2" title="Editar"><i class="far fa-file-pdf"></i></a>';
                $btn = $btn.'<a href="'.route('clienteproceso', $row->id).'" class="btn btn-warning btn-sm mr-2" title="Mostrar"><i class="fa fa-balance-scale"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $iduser = auth()->id();
            $users = Cliente::select('id','nombre','apellido','documento','email','created_at')->where('cliente',1)->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a target="_blank" href="'.route('clientepdf', $row->id).'" class="edit btn btn-primary btn-sm mr-2" title="Editar"><i class="far fa-file-pdf"></i></a>';
                $btn = $btn.'<a href="'.route('clienteproceso', $row->id).'" class="btn btn-warning btn-sm mr-2" title="Mostrar"><i class="fa fa-balance-scale"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }
    }

    public function docafiliados(){
        if(Auth::user()->hasRole('Admin')){
        $users = Cliente::select('id','nombre','apellido','documento','email','created_at')->where('afiliado',1)->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a target="_blank" href="'.route('clientepdf', $row->id).'" class="edit btn btn-primary btn-sm mr-2" title="Editar"><i class="far fa-file-pdf"></i></a>';

                $btn = $btn.'<a href="'.route('llamada.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="fas fa-voicemail"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $iduser = auth()->id();
            $users = Cliente::select('id','nombre','apellido','documento','email','created_at')->where('afiliado',1)->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a target="_blank" href="'.route('clientepdf', $row->id).'" class="edit btn btn-primary btn-sm mr-2" title="Editar"><i class="far fa-file-pdf"></i></a>';

                $btn = $btn.'<a href="'.route('llamada.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }
    }

    public function clientesPDF($cliente)
    {
        $cliente = Cliente::find($cliente);

       $nombre = $cliente->nombre.' '.$cliente->apellido;

        // dd($cliente->pais);

        $pdf = PDF::loadView('cliente.pdf', compact('cliente'));

        // return $pdf->download('itsolutionstuff.pdf');

        return $pdf->stream('Ficha-Cliente: '.$nombre.'.pdf');
    }

    public function clientesPDFafi($cliente)
    {
        $cliente = Cliente::find($cliente);

       $nombre = $cliente->nombre.' '.$cliente->apellido;

        // dd($cliente->pais);

        $pdf = PDF::loadView('cliente.pdfafi', compact('cliente'));

        // return $pdf->download('itsolutionstuff.pdf');

        return $pdf->stream('Ficha-Afiliado: '.$nombre.'.pdf');
    }

    public function clientesfirma(){
        return view('cliente.firma');
    }

    public function afiliado(){

        return view('cliente.afiliado');
    }

    public function client(){

        return view('cliente.client');
    }
}
