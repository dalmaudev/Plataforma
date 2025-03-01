<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    protected $table = 'provincias';

    //Relacion de uno a muchos
    public function localidads()
    {
        return $this->hasMany('App\Models\Localidad');
    }
}
