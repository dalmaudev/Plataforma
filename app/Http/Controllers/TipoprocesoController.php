<?php

namespace App\Http\Controllers;

use App\Models\Tipoproceso;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class TipoprocesoController extends Controller
{

    public function index()
    {
        $tipoprocesos = Tipoproceso::all();
        return view('tipoproceso.index', compact('tipoprocesos'));
    }

    public function create()
    {
        return view('tipoproceso.create');
    }

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'nombre' => 'required|unique:tipoprocesos',
        ],[
            'nombre.required' => 'El nombre del Proceso Cliente es obligatorio',
            'nombre.unique' => 'El nombre del Proceso Cliente '.$pa.' ya se encuentra en la base de datos',
        ]);

        Tipoproceso::create($request->all());

        return redirect()->route('tipoproceso.index')->with('info','Proceso Cliente agregado satisfactoriamente!!');
    }

    public function show(Tipoproceso $tipoproceso)
    {
        return view('tipoproceso.show', compact('tipoproceso'));
    }

    public function edit(Tipoproceso $tipoproceso)
    {
        return view('tipoproceso.edit',compact('tipoproceso'));
    }

    public function update(Request $request, Tipoproceso $tipoproceso)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $tipoproceso->update($request->all());

        return redirect()->route('tipoproceso.index')->with('info','Proceso Cliente actualizado satisfactoriamente!!');
    }

    public function destroy(Tipoproceso $tipoproceso)
    {
        $tipoproceso->delete();

        return redirect()->route('tipoproceso.index')->with('info','Proceso Cliente eliminado satisfactoriamente!!');
    }

    public function doctipproceso(){
        if(Auth::user()->hasRole('Admin')){
            $users = Tipoproceso::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('tipoproceso.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('tipoproceso.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $users = Tipoproceso::select('id','nombre')->get();
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
