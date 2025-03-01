<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presento extends Model
{
    use HasFactory;

    public $table = "presentos";
    protected $fillable = ['nombre'];
}
