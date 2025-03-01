<?php

namespace App\Http\Controllers;

use App\Models\Fileotros;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class FileotrosController extends Controller
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

    public function show(Fileotros $fileotros)
    {
        $file = File::whereId($id)->firstOrFail();

        return redirect('/storage/archivos/'. $file->name);
    }

    public function edit(Fileotros $fileotros)
    {
        $cliente = Cliente::find($id);
        $identidads = Fileotros::where('cliente_id','=', $cliente->id)->latest()->get();

        return view('archivos.index',compact('identidads','cliente'));
    }

    public function update(Request $request, Fileotros $fileotros)
    {
        //
    }

    public function destroy(Fileotros $fileotros)
    {
        //
    }
}
