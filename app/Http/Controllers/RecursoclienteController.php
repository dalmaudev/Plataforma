<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procesocliente;
use Illuminate\Support\Facades\DB;
use App\Models\Proceso;
use App\Models\Tipoproceso;
use App\Models\Desicion;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class RecursoclienteController extends Controller
{
    public function index(){
        $procesoclientes = Procesocliente::all();
        return view('recursocliente.index', compact('procesoclientes'));
    }

    // public function edit(Procesocliente $recursocliente)
    // {
       
    //     $cliente = Procesocliente::find($recursocliente->cliente_id);
       
    //     $procesos = Proceso::pluck('nombre','id');
    //     $tipoprocesos = Tipoproceso::pluck('nombre','id');
    //     $desicion = Desicion::pluck('nombre','id');
    //     $especialista = User::pluck('name','id');
    //     return view('recursocliente.edit',compact('procesocliente','procesos','tipoprocesos','desicion','especialista','cliente'));
    // }

    // public function update(Request $request, recursocliente $recursocliente)
    // {
    //     $request->validate([
    //         'tipoproceso_id' => 'required',
    //     ]);

    //     $recursocliente->update($request->all());

    //     return redirect()->route('recursocliente.index')->with('info','Proceso Cliente actualizado satisfactoriamente!!');
    // }

    public function docrecursoclientes(){
        //$users = Procesocliente::select('id','tipoproceso_id','cliente_id','user_id')->get();
        // return datatables()->of($users)->toJson();

        $users = DB::table('procesoclientes')
        ->join('tipoprocesos','tipoprocesos.id','=','procesoclientes.tipoproceso_id')
        ->join('procesos','procesos.id','=','procesoclientes.proceso_id')
        ->join('users','users.id','=','procesoclientes.user_id')
        ->join('clientes','clientes.id','=','procesoclientes.cliente_id')
        ->join('desicions','desicions.id','=','procesoclientes.desicion_id')
        ->select('procesoclientes.id','tipoprocesos.nombre as tipoproceso','procesos.nombre as proceso','clientes.nombre as ncliente','clientes.apellido as acliente','users.name as especialista','procesoclientes.recursofecpresentado','desicions.nombre as desicionPro')
        ->where('tipoprocesos.id','=',2)
        ->get();
        return datatables()
            ->of($users)
            // ->addColumn('btn',function($row){
            //     $btn = '<a href="'.route('recursocliente.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
            //     $btn = $btn.'<a href="'.route('recursocliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
            //     return $btn;
            // })
           
            ->rawColumns(['btn'])
            
            ->toJson();
    }

    public function recursoPDF($cliente)
    {
        $cliente = Recurso::find($cliente);
       
       $nombre = $cliente->nombre.' '.$cliente->apellido;

        // dd($cliente->pais);
          
        $pdf = PDF::loadView('cliente.pdf', compact('cliente'));
    
        // return $pdf->download('itsolutionstuff.pdf');

        return $pdf->stream('Ficha-Cliente: '.$nombre.'.pdf');
    }
}
