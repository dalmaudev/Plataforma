<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filedomicilio extends Model
{
    use HasFactory;
    protected $fillable = ['name','cliente_id'];
}
