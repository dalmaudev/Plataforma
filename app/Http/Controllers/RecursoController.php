<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class RecursoController extends Controller
{

    public function index()
    {
        $recursos = Recurso::all();
        return view('recurso.index', compact('recursos'));
    }

    public function create()
    {
        return view('recurso.create');
    }
    

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'nombre' => 'required|unique:recursos',
        ],[
            'nombre.required' => 'El nombre del recurso es obligatorio',
            'nombre.unique' => 'El nombre del recurso '.$pa.' ya se encuentra en la base de datos',
        ]);

        Recurso::create($request->all());

        return redirect()->route('recurso.index')->with('info','Recurso agregado satisfactoriamente!!');
    }

    public function show(Recurso $recurso)
    {
        return view('recurso.show', compact('recurso'));
    }

    public function edit(Recurso $recurso)
    {
        return view('recurso.edit',compact('recurso'));
    }

    public function update(Request $request, Recurso $recurso)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $recurso->update($request->all());

        return redirect()->route('recurso.index')->with('info','Recurso actualizado satisfactoriamente!!');
    }

    public function destroy(Recurso $recurso)
    {
        $recurso->delete();

        return redirect()->route('recurso.index')->with('info','Recurso eliminado satisfactoriamente!!');
    }

    public function recu(){
        if(Auth::user()->hasRole('Admin')){
        $users = Recurso::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('recurso.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('recurso.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $users = Recurso::select('id','nombre')->get();
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
