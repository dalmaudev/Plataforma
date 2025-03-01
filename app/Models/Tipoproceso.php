<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipoproceso extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function procesocliente()
    {
        return $this->hasMany(Procesocliente::class);
    }
}
