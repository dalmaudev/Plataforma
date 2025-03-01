<?php
  
namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
  
class SignaturePadController extends Controller
{

    public function index()
    {
        $cliente = Cliente::findOrfail($signaturepad);
        return view('signature_pad', compact('cliente'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'signed' => 'required',
        ],[
            'signed.required' => 'La Firma es obligatoria',
        ]);
        $cliente = $request->cliente;

        

        $folderPath = public_path('upload/');
        
        $image_parts = explode(";base64,", $request->signed);
              
        $image_type_aux = explode("image/", $image_parts[0]);
           
        $image_type = $image_type_aux[1];
           
        $image_base64 = base64_decode($image_parts[1]);
        $firma = uniqid() . '.'.$image_type;  
        $file = $folderPath . $firma;
        
        file_put_contents($file, $image_base64);

            $cliente = Cliente::find($cliente);
            
            $cliente->firma = 'NO';
            $cliente->firmado = $firma;
            $cliente->save();
            return redirect()->route('clientepdf', $cliente->id);
    }

    public function edit($signaturepad){
        $cliente = Cliente::findOrfail($signaturepad);
        return view('firma.firmar', compact('cliente'));
    }

    public function show($signaturepad)
    {
        $cliente = Cliente::findOrfail($signaturepad);
        return view('signature_pad', compact('cliente'));
    }
}