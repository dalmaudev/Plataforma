<?php

namespace App\Http\Controllers;

use App\Models\Estadocivil;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class EstadocivilController extends Controller
{

    public function index()
    {
        $estadocivils = Estadocivil::all();
        return view('estadocivil.index', compact('estadocivils'));
    }

    public function create()
    {
        return view('estadocivil.create');
    }

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'nombre' => 'required|unique:estadocivils',
        ],[
            'nombre.required' => 'El nombre del estado civil es obligatorio',
            'nombre.unique' => 'El nombre del estado civil '.$pa.' ya se encuentra en la base de datos',
        ]);

        Estadocivil::create($request->all());

        return redirect()->route('estadocivil.index')->with('info','Estado civil agregado satisfactoriamente!!');
    }

    public function show(Estadocivil $estadocivil)
    {
        return view('estadocivil.show', compact('estadocivil'));
    }

    public function edit(Estadocivil $estadocivil)
    {
        return view('estadocivil.edit',compact('estadocivil'));
    }

    public function update(Request $request, Estadocivil $estadocivil)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $estadocivil->update($request->all());

        return redirect()->route('estadocivil.index')->with('info','Estado civil actualizado satisfactoriamente!!');
    }

    
    public function destroy(Estadocivil $estadocivil)
    {
        $estadocivil->delete();

        return redirect()->route('estadocivil.index')->with('info','Estado civil eliminado satisfactoriamente!!');
    }

    public function estadodocu(){
        if(Auth::user()->hasRole('Admin')){
        $users = Estadocivil::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('estadocivil.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('estadocivil.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $users = Estadocivil::select('id','nombre')->get();
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
