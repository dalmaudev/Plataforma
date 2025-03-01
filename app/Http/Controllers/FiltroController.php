<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Procesocliente;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FiltroController extends Controller
{

    public function index()
    {
        // $clientes = Cliente::all();
        $procesos = Procesocliente::all();

        return view('filter.index', compact('procesos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
