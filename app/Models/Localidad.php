<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','provincia_id'];

    //Relacion de uno a muchos(inversa)

    public function provincia(){
        return $this->belongsTo('App\Models\Provincia');
    }

    public static function towns($id){
    	return Localidad::where('provincia_id','=',$id)
    	->get();
    }
}
