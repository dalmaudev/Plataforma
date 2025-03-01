<?php

namespace App\Http\Controllers;

use App\Models\Filedomicilio;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FiledomicilioController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 10240;

        $files = $request->archivodomicilio;
        $cliente_id = $request->usuario;

        if($request->hasFile('archivodomicilio')){
            $data=array();

            foreach($request->archivodomicilio as $file){

                $name=Str::slug(time() . '-' .$file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('storage/archivos/domicilio'), $name);
            
                $data[] = $name; 

                $filecheck= new Filedomicilio();

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

    public function show(Filedomicilio $filedomicilio)
    {
        $file = Filedomicilio::whereId($filedomicilio)->firstOrFail();

        return redirect('/storage/archivos/domicilio'. $file->name);
    }

    public function edit(Filedomicilio $filedomicilio)
    {
        $cliente = Cliente::find($filedomicilio);
        $identidads = Filedomicilio::where('cliente_id','=', $cliente->id)->latest()->get();

        return view('archivos.index',compact('identidads','cliente'));
    }

    public function destroy(Filedomicilio $filedomicilio)
    {
        $file = Filedomicilio::whereId($filedomicilio)->firstOrFail();
        unlink(public_path('/storage/archivos/domicilio'. $file->name));
        $file->delete();
        return back()->with('eliminar','ok');
    }
}
