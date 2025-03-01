<?php

namespace App\Http\Controllers;

use App\Models\Metodopago;
use Illuminate\Http\Request;
use App\Models\Pais;
use Illuminate\Support\Facades\Auth;

class MetodopagoController extends Controller
{

    public function index()
    {
        return view('metodopago.index');
    }

    public function create()
    {
        return view('metodopago.create');
    }

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'nombre' => 'required|unique:metodopago',
        ],[
            'nombre.required' => 'El Metodo de Pago es obligatorio',
            'nombre.unique' => 'El nombre del registro ('.$pa.') ya se encuentra en la base de datos',
        ]);

        Metodopago::create($request->all());

        return redirect()->route('metodopago.index')->with('info','Registro agregado satisfactoriamente!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Metodopago  $metodopago
     * @return \Illuminate\Http\Response
     */
    public function show(Metodopago $metodopago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Metodopago  $metodopago
     * @return \Illuminate\Http\Response
     */
    public function edit(Metodopago $metodopago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Metodopago  $metodopago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metodopago $metodopago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Metodopago  $metodopago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Metodopago $metodopago)
    {
        //
    }

    public function docupais(){
        if(Auth::user()->hasRole('Admin')){
            $users = Metodopago::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('Metodopago.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('Metodopago.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $users = Metodopago::select('id','nombre')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('autorizado.index', $row->id).'" class="btn btn-success btn-sm mr-2 disabled" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('autorizado.index', $row->id).'" class="edit btn btn-danger btn-sm mr-2 disabled" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }
    }
}
