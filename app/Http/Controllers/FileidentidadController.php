<?php

namespace App\Http\Controllers;

use App\Models\Fileidentidad;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FileidentidadController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        $max_size = (int)ini_get('upload_max_filesize') * 10240;

        $files = $request->archivoidentidad;
        $cliente_id = $request->usuario;

        if($request->hasFile('archivoidentidad')){
            $data=array();

            foreach($request->archivoidentidad as $file){

                $name=Str::slug(time() . '-' .$file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

                $file->move(public_path('storage/archivos/identidad'), $name);

                $data[] = $name;

                $filecheck= new Fileidentidad();

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

    public function show(Fileidentidad $fileidentidad)
    {
        $file = Fileidentidad::whereId($fileidentidad)->firstOrFail();

        dd($file);

        return redirect('/storage/archivos/identidad'. $file->name);
    }

    public function edit(Fileidentidad $fileidentidad)
    {
        $cliente = Cliente::find($fileidentidad);

        $identidads = Fileidentidad::where('cliente_id','=', $cliente->id)->latest()->get();
        return view('archivos.index',compact('identidads','cliente'));
    }

    public function update(Request $request, Fileidentidad $fileidentidad)
    {
        //
    }

    public function destroy(Fileidentidad $fileidentidad)
    {
        $file = Fileidentidad::whereId($fileidentidad)->firstOrFail();
        unlink(public_path('/storage/archivos/identidad'. $file->name));
        $file->delete();
        return back()->with('eliminar','ok');
    }
}
