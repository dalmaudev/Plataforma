<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use App\Models\Localidad;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProvinciaController extends Controller
{

    public function index()
    {
        $provincias = Provincia::all();
        return view('provincia.index', compact('provincias'));
    }

    public function create()
    {
        return view('provincia.create');
    }

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'nombre' => 'required|unique:provincias',
        ],[
            'nombre.required' => 'El nombre de la Provincia es obligatorio',
            'nombre.unique' => 'El nombre de la Provincia '.$pa.' ya se encuentra en la base de datos',
        ]);

        Provincia::create($request->all());

        return redirect()->route('provincia.index')->with('info','Provincia agregada satisfactoriamente!!');
    }

    public function show(Provincia $provincium)
    {
        return view('provincia.show', compact('provincium'));
    }

    public function edit(\App\Models\Provincia  $provincium)
    {
        return view('provincia.edit',compact('provincium'));
    }

    public function update(Request $request, Provincia $provincium)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $provincium->update($request->all());

        return redirect()->route('provincia.index')->with('info','Provincia actualizo satisfactoriamente!!');
    }

    public function destroy(Provincia $provincium)
    {
        $provincium->delete();

        return redirect()->route('provincia.index')->with('info','Provincia eliminada satisfactoriamente!!');
    }

    public function provi(){
        $users = Provincia::select('id','nombre')->get();

        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('provincia.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('provincia.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })
           
            ->rawColumns(['btn'])
            
            ->toJson();
    }

    public function getTowns(Request $request, $id){
        if($request->ajax()){
            $towns = Localidad::towns($id);
            return response()->json($towns);
        }
    }

    public function getTowns1(Request $request, $id){
        if($request->ajax()){
            $towns = Localidad::towns($id);
            return response()->json($towns);
        }
    }
}
