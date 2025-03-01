<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Metodopago;

class PagoController extends Controller
{

    public function index()
    {
        return view('pago.index');
    }

    public function create()
    {
        return view('pago.create');
    }

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'nombre' => 'required|unique:pagos',
        ],[
            'nombre.required' => 'El Metodo de Pago es obligatorio',
            'nombre.unique' => 'El nombre del registro ('.$pa.') ya se encuentra en la base de datos',
        ]);

        Pago::create($request->all());

        return redirect()->route('pago.index')->with('info','Registro agregado satisfactoriamente!!');
    }

    public function show(Pago $pago)
    {
        return view('pago.show', compact('pago'));
    }

    public function edit(Pago $pago)
    {
        return view('pago.edit',compact('pago'));
    }

    public function update(Request $request, Pago $pago)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $pago->update($request->all());

        return redirect()->route('pago.index')->with('info','Nacionalidad actualizada satisfactoriamente!!');
    }

    public function destroy(Pago $pago)
    {
        $pago->delete();

        return redirect()->route('pago.index')->with('eliminar','ok');
    }

    public function docupago(){
        if(Auth::user()->hasRole('Admin')){
            $users = Pago::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('pago.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('pago.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $users = Pago::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('autorizado.index', $row->id).'" class="btn btn-success btn-sm mr-2 disabled" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('autorizado.index', $row->id).'" class="edit btn btn-danger btn-sm mr-2 disabled" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }
    }
}
