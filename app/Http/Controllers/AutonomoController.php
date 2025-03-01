<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class AutonomoController extends Controller
{

    public function index()
    {
        return view('autonomo.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function docautonomo(){
        if(Auth::user()->hasRole('Admin')){
        $users = Cliente::select('id','nombre','apellido','documento','email','telefono')->where('numseguridad','!=','')->orWhere('domifiscal','!=','')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a target="_blank" href="https://api.whatsapp.com/send?phone=+34'.$row->telefono.'" class="edit btn btn-success btn-sm mr-2" title="Editar"><i class="fas fa-phone-square"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.show', $row->id).'" class="btn btn-info btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
    }else{
        $iduser = auth()->id();
        $users = Cliente::select('id','nombre','apellido','documento','email','telefono')->Where('numseguridad','!=','')->Where('domifiscal','!=','')->where('user_id',$iduser)->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a target="_blank" href="https://api.whatsapp.com/send?phone=+34'.$row->telefono.'" class="edit btn btn-success btn-sm mr-2" title="Editar"><i class="fas fa-phone-square"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.show', $row->id).'" class="btn btn-info btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
    }
    }


}
