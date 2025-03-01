<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Fileidentidad;
use App\Models\Fileotros;
use App\Models\Filedomicilio;

class FileController extends Controller
{

    public function edit(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        $files = File::where('cliente_id','=', $cliente->id)->latest()->get();
        // $identidads = Fileidentidad::where('cliente_id','=', $cliente->id)->latest()->get();

        return view('archivos.index',compact('cliente','files'));
    }

    public function store(Request $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 10240;

        $files = $request->archivo;
        $cliente_id = $request->usuario;

        if($request->hasFile('archivo')){
            $data=array();

            foreach($request->archivo as $file){

                $name=Str::slug(time() . '-' .$file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('storage/archivos'), $name);
            
                $data[] = $name; 

                $filecheck= new File();

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

    public function show(Request $request, $id){
       
        $file = File::whereId($id)->firstOrFail();

        return redirect('/storage/archivos/'. $file->name);
    }

    public function destroy(Request $request, $id){
        $file = File::whereId($id)->firstOrFail();
        unlink(public_path('/storage/archivos/'. $file->name));
        $file->delete();
        return back()->with('eliminar','ok');
    }
}
