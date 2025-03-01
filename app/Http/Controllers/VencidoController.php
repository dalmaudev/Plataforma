<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class VencidoController extends Controller
{
    public function index(){
    $clientes = Cliente::all();
    return view('vencido.index', compact('clientes'));
    }

    public function vencidodocu(){
        if(Auth::user()->hasRole('Admin')){
        $users = DB::table('clientes')->select('id','nombre','apellido','documento','caducidaddoc')
        ->where('caducidaddoc','>',Carbon::now()->subDays(90))->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('cliente.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
    }else{
        $iduser = auth()->id();
        $users = DB::table('clientes')->select('id','nombre','apellido','documento','caducidaddoc')
        ->where('caducidaddoc','>',Carbon::now()->subDays(90))
        ->where('user_id',$iduser)->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('cliente.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('cliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
    }
    }


}



    // $date = $date->format('d-m-Y');
    // $vencidos = DB::table('clientes')->where('caducidaddoc','>',Carbon::now()->subDays(90))->count();