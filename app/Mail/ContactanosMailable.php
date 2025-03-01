<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Mensaje;

class ContactanosMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public string $detalle = 'holaaaaa';
    public function __construct()
    {
        $this->detalle = $detalle;
        // $this->textmensaje = $mensaje;
    }

   
    public function build()
    {
        // $mensaje = Mensaje::where('id',2)->get();
        // markdown('mensaje.enviomensaje');
        return $this->subject('Asesoria y Extrajeria')->view('mensaje.show');
    }
}
