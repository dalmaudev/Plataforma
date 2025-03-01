<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;
use App\Models\Pais;
use Jenssegers\Date\Date;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','user_id', 'apellido','direccion','provincia_id','localidad_id','cp','documento_id','documento','caducidaddoc','telefono','email','pais_id','estadocivil_id','hijo','nombrepadre','nombremadre','fecnac','cifoto','avatar','foto','observaciones','fecingresoespaña','profesion','hijo1','hijo2','hijo3','hijo4','hijo5','hijo6','hijo7','hijo8','hijo9','hijo10','hijo11','hijo12','domifiscal','certdigital','altaautonomo','numseguridad','cuentabanco','titularbanco','domifiscal','sexo_id','conocio','firma','tipo','consulta','cliente'];


    protected $dates = [
        'nacimiento'
    ];
    // public function document(){
    //     return $this->belongsTo(Documento::class);
    // }


    // public function document(): BelongsTo
    // {
    //     return $this->belongsTo(Documento::class, 'documento_id', 'id');
    // }

    // public function document(): HasOne
    // {
    //     return $this->hasOne(Documento::class);
    // }

    //Relacion de uno a muchos(inversa)

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function document()
    {
        return $this->hasOne('App\Models\Documento','id','documento_id');
    }

    public function estadocivil()
    {
        return $this->hasOne('App\Models\Estadocivil','id','estadocivil_id');
    }

    public function provincia()
    {
        return $this->hasOne('App\Models\Provincia','id','provincia_id');
    }

    public function localidad()
    {
        return $this->hasOne('App\Models\Localidad','id','localidad_id');
    }

    public function getNacimientoAttribute($date){
        return new Date($date);
    }

    //Relacion de uno a muchos
    public function procesoclientes()
    {
        return $this->hasMany(Procesocliente::class);
    }




    }
