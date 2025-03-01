<?php

namespace App\Http\Controllers;

use App\Models\Precioproceso;
use App\Models\Proceso;
use Illuminate\Http\Request;

class PrecioprocesoController extends Controller
{

    public function index()
    {
        $procesos = Proceso::all();
        return view('precioproceso.index',compact('procesos'));
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Precioproceso  $precioproceso
     * @return \Illuminate\Http\Response
     */
    public function show($precioproceso)
    {
        $proceso = Proceso::find($precioproceso);
        return view('precioproceso.show',compact('proceso'));
    }

    public function edit($precioproceso)
    {
        $proceso = Proceso::find($precioproceso);
        return view('precioproceso.edit',compact('proceso'));
    }

    public function update(Request $request, $precioproceso)
    {
        $precioproceso = Proceso::find($precioproceso);
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric'
        ]);
        $precioproceso->precio = $request->precio;
        $precioproceso->observacion = $request->observacion;
        $precioproceso->update();

        return redirect()->route('precioproceso.index')->with('info','Registro actualizado satisfactoriamente!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Precioproceso  $precioproceso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Precioproceso $precioproceso)
    {
        //
    }
}
