<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DatatableController extends Controller
{
    public function user(){
        $users = User::select('id','name','email')->get();

        // return datatables()->of($users)->toJson();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('documento.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('documento.edit', $row->id).'" class="edit btn btn-warning btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                $btn = $btn.'<a href="'.route('documento.show', $row->id).'" class="edit btn btn-danger btn-sm" title="Eliminar"><i class="far fa-trash-alt"></i></a>';
                return $btn;
            })
           
            ->rawColumns(['btn'])
            
            ->toJson();
        
    }
}
                                                   