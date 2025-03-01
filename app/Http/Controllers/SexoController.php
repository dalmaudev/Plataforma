<?php

namespace App\Http\Controllers;

use App\Models\Sexo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SexoController extends Controller
{

    public function index()
    {
        $sexos = Sexo::all();
        return view('sexo.index', compact('sexos'));
    }

    public function create()
    {
        return view('sexo.create');
    }

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'nombre' => 'required|unique:sexos',
        ],[
            'nombre.required' => 'El nombre del sexo es obligatorio',
            'nombre.unique' => 'El nombre del sexo '.$pa.' ya se encuentra en la base de datos',
        ]);

        Sexo::create($request->all());

        return redirect()->route('sexo.index')->with('info','Sexo agregado satisfactoriamente!!');
    }

    public function show(Sexo $sexo)
    {
        return view('sexo.show', compact('sexo'));
    }

    public function edit(Sexo $sexo)
    {
        return view('sexo.edit',compact('sexo'));
    }

    public function update(Request $request, Sexo $sexo)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $sexo->update($request->all());

        return redirect()->route('sexo.index')->with('info','Sexo actualizado satisfactoriamente!!');
    }

    public function destroy(Sexo $sexo)
    {
        $sexo->delete();

        return redirect()->route('sexo.index')->with('info','Sexo eliminado satisfactoriamente!!');
    }

    public function sexos(){
        if(Auth::user()->hasRole('Admin')){
        $users = Sexo::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('sexo.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('sexo.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
    }else{
        $users = Sexo::select('id','nombre')->get();
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
