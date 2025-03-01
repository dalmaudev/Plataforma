<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FirmaController extends Controller
{

    public function index()
    {
        $iduser = auth()->id();
        if(Auth::user()->hasRole('Admin')){
            $clientes = Cliente::where('firma','=','SI')->get();
        return view('firma.index',compact('clientes'));
        }else{
            $clientes = Cliente::where('firma','=','SI')->where('user_id',$iduser)->get();
        return view('firma.index',compact('clientes'));
        }
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
        $cliente = Cliente::findOrfail($id);
        return view('firma.show', compact('cliente'));
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

    public function firmas(){
        if(Auth::user()->hasRole('Admin')){
        $users = Cliente::select('id','nombre','apellido','email')->where('firma','=','SI')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a target="_blank" href="'.route('signaturepad.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Firma"><i class="fas fa-signature"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }else{
            $iduser = auth()->id();
            $users = Cliente::select('id','nombre','apellido','email')->where('user_id',$iduser)->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a target="_blank" href="'.route('signaturepad.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Firma"><i class="fas fa-signature"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
        }
    }
}
