<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class PaisController extends Controller
{

    public function index()
    {
        $paises = Pais::all();
        return view('pais.index', compact('paises'));
    }

    public function create()
    {
        return view('pais.create');
    }

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'nombre' => 'required|unique:pais',
        ],[
            'nombre.required' => 'El nombre de la Nacionalidad es obligatoria',
            'nombre.unique' => 'El nombre de la Nacionalidad '.$pa.' ya se encuentra en la base de datos',
        ]);

        Pais::create($request->all());

        return redirect()->route('pais.index')->with('info','Nacionalidad agregada satisfactoriamente!!');
    }

    public function show(Pais $pai)
    {
        return view('pais.show', compact('pai'));
    }

    public function edit(Pais $pai)
    {
        return view('pais.edit',compact('pai'));
    }

    public function update(Request $request, Pais $pai)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $pai->update($request->all());

        return redirect()->route('pais.index')->with('info','Nacionalidad actualizada satisfactoriamente!!');
    }

    public function destroy(Pais $pai)
    {
        $pai->delete();

        return redirect()->route('pais.index')->with('eliminar','ok');
        
    }

    public function docupais(){
        if(Auth::user()->hasRole('Admin')){
            $users = Pais::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('pais.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('pais.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $users = Pais::select('id','nombre')->get();
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
