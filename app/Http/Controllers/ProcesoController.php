<?php

namespace App\Http\Controllers;

use App\Models\Proceso;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use App\Models\Procesocliente;
use Illuminate\Support\Facades\DB;

class ProcesoController extends Controller
{

    public function index()
    {
        $procesos = Proceso::all();
        return view('proceso.index', compact('procesos'));
    }

    public function create()
    {
        return view('proceso.create');
    }

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'nombre' => 'required|unique:procesos',
        ],[
            'nombre.required' => 'El nombre del proceso es obligatorio',
            'nombre.unique' => 'El nombre del proceso '.$pa.' ya se encuentra en la base de datos',
        ]);

        Proceso::create($request->all());

        return redirect()->route('proceso.index')->with('info','Proceso agregado satisfactoriamente!!');
    }

    public function show(Proceso $proceso)
    {
        return view('proceso.show', compact('proceso'));
    }

    public function edit(Proceso $proceso)
    {
        return view('proceso.edit',compact('proceso'));
    }

    public function update(Request $request, Proceso $proceso)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $proceso->update($request->all());

        return redirect()->route('proceso.index')->with('info','Proceso actualizado satisfactoriamente!!');
    }

    public function destroy(Proceso $proceso)
    {
        $proceso->delete();

        return redirect()->route('proceso.index')->with('info','Proceso eliminado satisfactoriamente!!');
    }

    public function docuproceso(){
        if(Auth::user()->hasRole('Admin')){
            $users = Proceso::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('proceso.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('proceso.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $users = Proceso::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('autorizado.index', $row->id).'" class="btn btn-success btn-sm mr-2 disabled" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('autorizado.index', $row->id).'" class="edit btn btn-danger btn-sm mr-2 disabled" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }
    }

    public function procesobuscar($id)
    {
        // $procesoclientes = Procesocliente::where('proceso_id','=',$id)->get();
        // return view('proceso.busqueda', compact('procesoclientes'));
        $users = DB::table('procesoclientes')
        ->join('tipoprocesos','tipoprocesos.id','=','procesoclientes.tipoproceso_id')
        ->join('procesos','procesos.id','=','procesoclientes.proceso_id')
        ->join('users','users.id','=','procesoclientes.user_id')
        ->join('clientes','clientes.id','=','procesoclientes.cliente_id')
        ->join('desicions','desicions.id','=','procesoclientes.desicion_id')
        ->select('procesoclientes.id','tipoprocesos.nombre as tipoproceso','procesos.nombre as proceso','clientes.nombre as ncliente','clientes.apellido as acliente','clientes.telefono','users.name as especialista','procesoclientes.fecpresentado','desicions.nombre as desicionPro')
        ->where('proceso_id','=',$id)
        ->get();

        return view('proceso.busqueda', compact('users'));
    }
}
