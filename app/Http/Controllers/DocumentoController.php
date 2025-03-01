<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class DocumentoController extends Controller
{

    public function index()
    {
        $documentos = Documento::all();
        return view('documento.index', compact('documentos'));
    }

    public function create()
    {
        return view('documento.create');
    }

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'nombre' => 'required|unique:documentos',
        ],[
            'nombre.required' => 'El nombre del documento es obligatorio',
            'nombre.unique' => 'El nombre del documento '.$pa.' ya se encuentra en la base de datos',
        ]);

        Documento::create($request->all());

        return redirect()->route('documento.index')->with('info','Documento agregado satisfactoriamente!!');
    }

    public function show(Documento $documento)
    {
        return view('documento.show', compact('documento'));
    }

    public function edit(Documento $documento)
    {
        return view('documento.edit',compact('documento'));
    }

    public function update(Request $request, Documento $documento)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $documento->update($request->all());

        return redirect()->route('documento.index')->with('info','Documento actualizado satisfactoriamente!!');
    }

    public function destroy(Documento $documento)
    {
        $documento->delete();

        return redirect()->route('documento.index')->with('info','Documento eliminado satisfactoriamente!!');
    }

    public function docum(){
        if(Auth::user()->hasRole('Admin')){
        $users = Documento::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('documento.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('documento.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $users = Documento::select('id','nombre')->get();
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
