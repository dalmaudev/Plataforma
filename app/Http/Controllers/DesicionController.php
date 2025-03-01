<?php

namespace App\Http\Controllers;

use App\Models\Desicion;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class DesicionController extends Controller
{

    public function index()
    {
        $desicions = Desicion::all();
        return view('desicion.index', compact('desicions'));
    }

    public function create()
    {
        return view('desicion.create');
    }

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'nombre' => 'required|unique:desicions',
        ],[
            'nombre.required' => 'El nombre de la desicion es obligatorio',
            'nombre.unique' => 'El nombre de la desicion '.$pa.' ya se encuentra en la base de datos',
        ]);

        Desicion::create($request->all());

        return redirect()->route('desicion.index')->with('info','Desicion agregado satisfactoriamente!!');
    }

    public function show(Desicion $desicion)
    {
        return view('desicion.show', compact('desicion'));
    }

    public function edit(Desicion $desicion)
    {
        return view('desicion.edit',compact('desicion'));
    }

    public function update(Request $request, Desicion $desicion)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $desicion->update($request->all());

        return redirect()->route('desicion.index')->with('info','Desicion actualizado satisfactoriamente!!');
    }

    public function destroy(Desicion $desicion)
    {
        $desicion->delete();

        return redirect()->route('desicion.index')->with('info','Desicion eliminado satisfactoriamente!!');
    }

    public function docudesicion(){
        if(Auth::user()->hasRole('Admin')){
            $users = Desicion::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('desicion.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('desicion.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $users = Desicion::select('id','nombre')->get();
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
