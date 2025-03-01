<?php

namespace App\Http\Controllers;

use App\Models\Localidad;
use App\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LocalidadController extends Controller
{

    public function index()
    {
        $localidads = Localidad::all();
        return view('localidad.index', compact('localidads'));
    }

    public function create()
    {
        return view('localidad.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'provincia_id' => 'required',
        ]);

        Localidad::create($request->all());

        return redirect()->route('localidad.index')->with('info','Localidad agregada satisfactoriamente!!');
    }

    public function show(Localidad $localidad)
    {
        return view('localidad.show', compact('localidad'));
    }

    public function edit(Localidad $localidad)
    {
        
        $provincia = Provincia::pluck('nombre','id');
        
        return view('localidad.edit',compact('localidad','provincia'));
    }

    public function update(Request $request, Localidad $localidad)
    {
        $request->validate([
            'nombre' => 'required',
            'provincia_id' => 'required',
        ]);

        $localidad->update($request->all());

        return redirect()->route('localidad.index')->with('info','Localidad actualizo satisfactoriamente!!');
    }

    public function destroy(Localidad $localidad)
    {
        $localidad->delete();

        return redirect()->route('localidad.index')->with('info','Localidad eliminada satisfactoriamente!!');
    }

    public function locali(){
        //$users = Localidad::select('id','nombre')->get();

        $users = DB::table('localidads')
        ->join('provincias','provincias.id','=','localidads.provincia_id')
        ->select('localidads.id','localidads.nombre','provincias.nombre as provincia')
        ->get();


        // return datatables()->of($users)->toJson();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('localidad.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('localidad.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })
           
            ->rawColumns(['btn'])
            
            ->toJson();
    }
}
