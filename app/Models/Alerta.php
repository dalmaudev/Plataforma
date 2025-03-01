<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alerta extends Model
{
    use HasFactory;

    protected $fillable = ['titulo','cuerpo','fecalert','cliente_id','deuser_id','parauser_id'];

    public function deuser()
    {
        return $this->hasOne('App\Models\User','id','deuser_id');
    }

    public function parauser()
    {
        return $this->hasOne('App\Models\User','id','parauser_id');
    }
}
