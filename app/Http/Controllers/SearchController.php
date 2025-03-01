<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use phpDocumentor\Reflection\Types\Null_;

class SearchController extends Controller
{
    public function cursos(Request $request){
        $term = $request->get('term');

        $querys = Cliente::where('nombre','LIKE', '%'. $term . '%')->get();
        if($querys->isEmpty()){
            $querys = Cliente::where('apellido','LIKE', '%'. $term . '%')->get();
        }
        if($querys->isEmpty()){
            $querys = Cliente::where('telefono','LIKE', '%'. $term . '%')->get();
        }
        if($querys->isEmpty()){
            $querys = Cliente::where('email','LIKE', '%'. $term . '%')->get();
        }
        $data = [];
        
        foreach ($querys as $query) {
            $data[] = [
                'label' => $query->id.' - '.$query->nombre.' '. $query->apellido,
            ];
        }
        return $data;
    }
}
