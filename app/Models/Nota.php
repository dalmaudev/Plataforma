<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Nota extends Model
{
    use HasFactory;
    use Softdeletes;
    protected $fillable = ['titulo','cuerpo','alert', 'deuser_id', 'parauser_id','activo','fecComplemento'];
}
