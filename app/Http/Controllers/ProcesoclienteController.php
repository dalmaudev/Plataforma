<?php

namespace App\Http\Controllers;

use App\Models\Procesocliente;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Desicion;
use App\Models\Proceso;
use App\Models\Tipoproceso;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class ProcesoclienteController extends Controller
{
    public function index()
    {
        $procesoclientes = Procesocliente::all();
        return view('procesocliente.index', compact('procesoclientes'));
    }

    public function create()
    {
        
        $procesos = Proceso::pluck('nombre','id');
        $tipoprocesos = Tipoproceso::pluck('nombre','id');
        $desicion = Desicion::pluck('nombre','id');
        if(Auth::user()->hasRole('Admin')){
            $cliente = Cliente::pluck('nombre','id');
            $especialista = User::pluck('name','id');
        }else{
            $iduser = auth()->id();
            $cliente = Cliente::where('user_id',$iduser)->pluck('nombre','id');
            $especialista = User::where('id',$iduser)->pluck('name','id');
        }
        return view('procesocliente.create',compact('cliente','procesos','tipoprocesos','desicion','especialista'));
    }
    

    public function store(Request $request)
    {
        $user = $request->cliente_id;
        $request->validate([
            'tipoproceso_id' => 'required',
            'cliente_id' => 'required',	
            'user_id' => 'required',
            'pagoconsulta' => 'required',
        ]);
        Procesocliente::create($request->all());
     
        return redirect()->route('cliente.show', $user)->with('info','Proceso Cliente agregado satisfactoriamente!!');
    }

    public function show(Procesocliente $procesocliente)
    {

        $cliente = Cliente::find($procesocliente->cliente_id);
       
        $procesos = Proceso::pluck('nombre','id');
        $tipoprocesos = Tipoproceso::pluck('nombre','id');
        $desicion = Desicion::pluck('nombre','id');
        $especialista = User::pluck('name','id');
        return view('procesocliente.show',compact('procesocliente','procesos','tipoprocesos','desicion','especialista','cliente'));
    }

    public function edit(Procesocliente $procesocliente)
    {
       
        $cliente = Cliente::find($procesocliente->cliente_id);
       
        $procesos = Proceso::pluck('nombre','id');
        $tipoprocesos = Tipoproceso::pluck('nombre','id');
        $desicion = Desicion::pluck('nombre','id');
        $especialista = User::pluck('name','id');
        return view('procesocliente.edit',compact('procesocliente','procesos','tipoprocesos','desicion','especialista','cliente'));
    }

    public function update(Request $request, Procesocliente $procesocliente)
    {
        $request->validate([
            'tipoproceso_id' => 'required',
            // 'cliente_id' => 'required',	
            // 'user_id' => 'required',
        ]);
           
        $procesocliente->update($request->all());

        return redirect()->route('procesocliente.index')->with('info','Proceso Cliente actualizado satisfactoriamente!!');
    }

    public function destroy(Procesocliente $procesocliente)
    {
        $procesocliente->delete();

        return redirect()->route('procesocliente.index')->with('info','Proceso Cliente eliminado satisfactoriamente!!');
    }

    public function editar($id){
    
        $procesos = Proceso::pluck('nombre','id');
        $tipoprocesos = Tipoproceso::pluck('nombre','id');
        $desicion = Desicion::pluck('nombre','id');
        if(Auth::user()->hasRole('Admin')){
            $cliente = $id;
            $especialista = User::pluck('name','id');
        }else{
            $iduser = auth()->id();
            $cliente = $id;
            $especialista = User::where('id',$iduser)->pluck('name','id');
        }
        return view('procesocliente.create',compact('cliente','procesos','tipoprocesos','desicion','especialista'));
    }

    public function docprocesoclientes(){
        if(Auth::user()->hasRole('Admin')){
        $users = DB::table('procesoclientes')
        ->join('tipoprocesos','tipoprocesos.id','=','procesoclientes.tipoproceso_id')
        ->join('procesos','procesos.id','=','procesoclientes.proceso_id')
        ->join('users','users.id','=','procesoclientes.user_id')
        ->join('clientes','clientes.id','=','procesoclientes.cliente_id')
        ->join('desicions','desicions.id','=','procesoclientes.desicion_id')
        ->select('procesoclientes.id','tipoprocesos.nombre as tipoproceso','procesos.nombre as proceso','clientes.nombre as ncliente','clientes.apellido as acliente','clientes.telefono','users.name as especialista','procesoclientes.fecpresentado','desicions.nombre as desicionPro')
        // ->where('tipoprocesos.id','=',1)
        ->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('procesocliente.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('procesocliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $iduser = auth()->id();
            $users = DB::table('procesoclientes')
        ->join('tipoprocesos','tipoprocesos.id','=','procesoclientes.tipoproceso_id')
        ->join('procesos','procesos.id','=','procesoclientes.proceso_id')
        ->join('users','users.id','=','procesoclientes.user_id')
        ->join('clientes','clientes.id','=','procesoclientes.cliente_id')
        ->join('desicions','desicions.id','=','procesoclientes.desicion_id')
        ->where('procesoclientes.user_id',$iduser)
        ->select('procesoclientes.id','tipoprocesos.nombre as tipoproceso','procesos.nombre as proceso','clientes.nombre as ncliente','clientes.apellido as acliente','clientes.telefono','users.name as especialista','procesoclientes.fecpresentado','desicions.nombre as desicionPro')
        
        ->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('procesocliente.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('procesocliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }
    }
}
