<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NotaController extends Controller
{

    public function index()
    {
        $notas = Nota::all();
        return view('nota.index', compact('notas'));
        // $notas = Nota::onlyTrashed()->get();
        // $notas = Nota::all();
        // return view('nota.index', compact('notas'));
        // return $notas;
        //$notas->delete();
    }

    public function create()
    {
        $users = User::pluck('name', 'id');
        return view('nota.create', compact('users'));
    }

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'titulo' => 'required',
        ],[
            'titulo.required' => 'El nombre  es obligatorio',
        ]);

        Nota::create($request->all());

        return redirect()->route('notas.index')->with('info','Registro agregado satisfactoriamente!!');
    }

    public function show(Nota $nota)
    {
        return view('nota.show', compact('nota'));
    }

    public function edit(Nota $nota)
    {
        $users = User::pluck('name', 'id');
        return view('nota.edit',compact('nota', 'users'));
    }

    public function update(Request $request, Nota $nota)
    {
        $request->validate([
            'titulo' => 'required',
        ]);

        $nota->update($request->all());

        return redirect()->route('notas.index')->with('info','Registro actualizado satisfactoriamente!!');
    }

    public function destroy(Nota $nota)
    {
        $nota->delete();

        return redirect()->route('notas.index')->with('info','Registro eliminado satisfactoriamente!!');
    }

    public function notadocu(){
        $users = nota::select('id','titulo','cuerpo')->get();

        // return datatables()->of($users)->toJson();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('notas.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('notas.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })
           
            ->rawColumns(['btn'])
            
            ->toJson();
    }
}
