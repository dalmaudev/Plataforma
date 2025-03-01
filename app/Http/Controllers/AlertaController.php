<?php

namespace App\Http\Controllers;

use App\Models\Alerta;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\User;

class AlertaController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required',
        ],[
            'titulo.required' => 'El titulo de la alerta es obligatorio',
        ]);

        Alerta::create($request->all());
        return redirect()->route('cliente.show',$request->cliente_id);
    }

    public function show(Alerta $alerta)
    {

        $cliente = Cliente::findOrFail();
        $list = User::all();
        return view('alerta.create',compact('alerta','list'));
    }

    public function edit($id)
    {
        $alerta = Alerta::find($id);
        $nombre = Cliente::find($alerta->cliente_id);
        $list = User::pluck('name','id');
        return view('alerta.edit',compact('alerta','nombre','list'));
    }

    public function update(Request $request,$id)
    {
        // $request->validate([
        //     'titulo' => 'required',
        // ]);
        $alert = Alerta::find($id);
        $alert->titulo = $request->titulo;
        $alert->fecalert = $request->fecalert;
        $alert->cuerpo = $request->cuerpo;
        $alert->deuser_id = $request->deuser_id;
        $alert->parauser_id = $request->parauser_id;
        $alert->save();
        // $alerta->update($request->all());


        return redirect()->route('cliente.show',$request->cliente_id);
    }

    public function destroy($id)
    {
         $alert = Alerta::find($id);
        $cliente_id = $alert->cliente_id;
        $alert->delete();
        return redirect()->route('cliente.show','cliente_id');
    }

    public function editar($id){
        $cliente = $id;
        $nombre = Cliente::find($id);
        $list = User::pluck('name','id');
        return view('alerta.create',compact('cliente','nombre','list'));
    }
}
