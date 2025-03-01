<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\filesproceso;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FilesprocesoController extends Controller
{
    public function store(Request $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 10240;

        $files = $request->proceso;
        $cliente_id = $request->usuario;

        if($request->hasFile('archivoproceso')){
            $data=array();

            foreach($request->archivoproceso as $file){

                $name=Str::slug(time() . '-' .$file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('storage/archivos/proceso'), $name);
            
                $data[] = $name; 

                $filecheck= new filesproceso();

                $filecheck->name=$name;

                $filecheck->cliente_id=$cliente_id;

                $filecheck->save(); 
            }
            Alert::success('¡Éxito!', 'Se ha subido el archivo');
            return back();

        } else {
            Alert::error('Error!', 'Debes subir 1 o mas archivo');
            return back();
        }    
    }

    public function edit(filesproceso $filesproceso)
    {
        $cliente = Cliente::find($filesproceso);
        
        $identidads = filesproceso::where('cliente_id','=', $cliente->id)->latest()->get();
        return view('archivos.index',compact('identidads','cliente'));
    }

    public function show($id)
    {
        $idem = explode(':', $id);
        $cliente = $idem[0];
        $proceso = $idem[1];
        return view('filesproceso.create',compact('cliente','proceso'));
    }
}
