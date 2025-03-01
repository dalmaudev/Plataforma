<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Cliente;
use App\Models\Mensaje;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class MailSend extends Controller
{
    public function index(){
        
        $clientes = Cliente::all();
        $msj = Mensaje::pluck('nombre','id');
        return view('emails.index',compact('clientes','msj'));
    }

    

    public function mailsend(Request $request)
    {

        
        $mensaje = Mensaje::find($request->mensaje);
        $especialista = User::find($mensaje->especialista);
        
       



        $cadena = $request->caja;
        $nums = explode(",", $cadena);

        foreach($nums as $num ){
            $cliente = Cliente::find($num);
            $email = $cliente->email;


            switch ($mensaje->saludo) {
                case 'ES':
                    if($cliente->sexo == 'F'){
                        $salu = 'Estimada';
                    }else{
                        $salu = 'Estimado';
                    }
                    break;
                case 'SE':
                    if($cliente->sexo == 'F'){
                        $salu = 'Señora';
                    }else{
                        $salu = 'Señor';
                    }
                    break;
                case 'DI':
                    if($cliente->sexo == 'F'){
                        $salu = 'Distinguida';
                    }else{
                        $salu = 'Distinguido';
                    }
                    break;
                case 'UN':
                        $salu = 'Un cordial saludo.';;
                    break;
            }


            switch ($mensaje->despido) {
                case 'SD':
                        $despi = 'Se despide atentamente';
                    break;
                case 'AT':
                        $despi = 'Atentamente.';
                    break;
                case 'CO':
                        $despi = 'Cordialmente.';
                    break;
            }
            

            $details = [
                'titulo' => $mensaje->titulo,
                'asunto' => $mensaje->asunto,
                
                'saludo' => $salu,
                'cliente' => $cliente->nombre .' '.$cliente->apellido,
                'despido' => $despi,
                'especialista' => $especialista->name,
            ];

            Mail::to($email)->send(new SendMail($details));
            

        }

        
        
        return view('emails.thanks');


        



        // $details = [
        //     'titulo' => $titulo,
        //     'asunto' => $asunto,
        //     'saludo' => $saludo,
        //     'cliente' => $cliente,
        //     'despido' => $despido,
        //     'especialista' => $especialista,
        // ];

        // Mail::to($email)->send(new SendMail($details));
        // return view('emails.thanks');
    }
}