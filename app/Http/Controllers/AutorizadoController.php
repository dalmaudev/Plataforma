<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutorizadoController extends Controller
{
    public function index(){
        return view(('autorizado.index'));
    }
}
