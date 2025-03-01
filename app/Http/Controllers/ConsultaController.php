<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
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
        
        $request->validate([
            'consulta' => 'required',
        ],[
            'consulta.required' => 'La consulta es obligatorio',
        ]);

        Consulta::create($request->all());
        return redirect()->route('cliente.show',$request->cliente_id);
    }

    public function show($ide)
    {
        $numconsul = Consulta::where('cliente_id','=',$ide)->orderBy('fecalert', 'DESC')->get();
      
        return view('consulta.create',compact('ide','numconsul'));
    }

    public function edit($id)
    {
        $consulta = Consulta::find($id);
        // $nombre = Cliente::find($alerta->cliente_id);
        return view('consulta.edit',compact('consulta'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'consulta' => 'required',
        // ]);
        $consulta = Consulta::find($id);
        $cliente_id = $consulta->cliente_id;
        $consulta->update($request->all());
        return redirect()->route('cliente.show',$cliente_id);
    }

    public function destroy($id)
    {
        $consulta = Consulta::find($id);
        $cliente_id = $consulta->cliente_id;
        $consulta->delete();
        return redirect()->route('cliente.show',$cliente_id);
    }
}
