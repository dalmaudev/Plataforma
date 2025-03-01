<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Docuproceso;
use App\Models\Procesocliente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class DocuprocesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 10240;

        $procesocliente_id = $request->proceso;
        $cliente_id = $request->usuario;

        if($request->hasFile('archivoproceso')){
            $data=array();

            foreach($request->archivoproceso as $file){

                $name=Str::slug(time() . '-' .$file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('storage/archivos/proceso'), $name);
            
                $data[] = $name; 

                $filecheck= new Docuproceso();

                $filecheck->name=$name;

                $filecheck->cliente_id = $cliente_id;

                $filecheck->procesocliente_id = $procesocliente_id;

                $filecheck->save(); 
            }
            Alert::success('¡Éxito!', 'Se ha subido el archivo');
            return back();

        } else {
            Alert::error('Error!', 'Debes subir 1 o mas archivo');
            return back();
        }
    }

    public function show($id)
    {
        $idem = explode(':', $id);
        // $cliente = $idem[0];
        // $procesoidem = $idem[1];
        $proceso = Procesocliente::find($idem[1]);
        $cliente = Cliente::find($idem[0]);

        $files = Docuproceso::where('cliente_id','=',$cliente->id)->where('procesocliente_id','=',$proceso->id)->get();
 
        return view('docuproceso.create',compact('cliente','proceso','files'));
    }
    
    public function edit($id)
    {
        $file = Docuproceso::whereId($id)->firstOrFail();

        return redirect('/storage/archivos/proceso/'. $file->name);
    }

    public function update(Request $request, Docuproceso $docuproceso)
    {
        //
    }

    public function destroy($id)
    {
        $file = Docuproceso::whereId($id)->firstOrFail();
        unlink(public_path('/storage/archivos/proceso/'. $file->name));
        $file->delete();
        return back()->with('eliminar','ok');
    }
}
