<?php

namespace App\Http\Controllers;

use App\Models\Presento;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class PresentoController extends Controller
{

    public function index()
    {
        $presentos = Presento::all();
        return view('presento.index', compact('presentos'));
    }

    public function create()
    {
        return view('presento.create');
    }

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'nombre' => 'required|unique:presentos',
        ],[
            'nombre.required' => 'El nombre  es obligatorio',
            'nombre.unique' => 'El nombre del registro ('.$pa.') ya se encuentra en la base de datos',
        ]);

        Presento::create($request->all());

        return redirect()->route('presento.index')->with('info','Registro agregado satisfactoriamente!!');
    }

    public function show(Presento $presento)
    {
        return view('presento.show', compact('presento'));
    }

    public function edit(Presento $presento)
    {
        return view('presento.edit',compact('presento'));
    }

    public function update(Request $request, Presento $presento)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $presento->update($request->all());

        return redirect()->route('presento.index')->with('info','Registro actualizado satisfactoriamente!!');
    }

    public function destroy(Presento $presento)
    {
        $presento->delete();

        return redirect()->route('presento.index')->with('info','Registro eliminado satisfactoriamente!!');
    }

    public function presentodocu(){
        if(Auth::user()->hasRole('Admin')){
            $users = Presento::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('presento.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('presento.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $users = Presento::select('id','nombre')->get();
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
