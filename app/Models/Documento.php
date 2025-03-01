<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    // public function clientes(){
    //     return $this->hasOne('App\Models\Cliente');
    // }

    
    //Relacion de uno a muchos
    // public function cliente()
    // {
    //     return $this->belongsTo(cliente::class);
    // }
    
    public function document(){
        return $this->hasMany(Documento::class);
    }
}
