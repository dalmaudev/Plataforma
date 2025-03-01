<?php

namespace App\Http\Controllers;

use App\Models\Tipocliente;
use Illuminate\Http\Request;

class TipoclienteController extends Controller
{

    public function index()
    {
        $tipoclientes = Tipocliente::all();

        return view('tipocliente.index', compact('tipoclientes'));
    }

    public function create()
    {
        $tipocliente = new Tipocliente();
        return view('tipocliente.create', compact('tipocliente'));
    }

    public function store(Request $request)
    {
        request()->validate(Tipocliente::$rules);

        $tipocliente = Tipocliente::create($request->all());

        return redirect()->route('tipoclientes.index')
            ->with('message', 'Tipo cliente creado satisfactoriamente.');
    }

    public function show($id)
    {
        $tipocliente = Tipocliente::find($id);

        return view('tipocliente.show', compact('tipocliente'));
    }

    public function edit($id)
    {
        $tipocliente = Tipocliente::find($id);

        return view('tipocliente.edit', compact('tipocliente'));
    }

    public function update(Request $request, Tipocliente $tipocliente)
    {
        request()->validate(Tipocliente::$rules);

        $tipocliente->update($request->all());

        return redirect()->route('tipoclientes.index')
            ->with('message', 'Tipo cliente actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        $tipocliente = Tipocliente::find($id)->delete();

        return redirect()->route('tipoclientes.index')
            ->with('error', 'Tipo cliente borrado satisfactoriamente');
    }
}
