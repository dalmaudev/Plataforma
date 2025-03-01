<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procesocliente extends Model
{
    use HasFactory;

    protected $fillable = ['delegacion_id','tipoproceso_id', 'numexpediente', 'cliente_id','proceso_id','fecpresentado','desicion_id','fecdesicion','user_id','presento_id','recursofecpresentado','recurso_id','recursofecdesicion','pagoconsulta','observacion','abono','precioproceso','pendiente'];

    //Relacion de uno a muchos
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    // public function tipoproceso()
    // {
    //     return $this->belongsTo(Tipoproceso::class, 'proceso_id');
    // }

    public function delegacion()
    {
        return $this->belongsTo(Delegacion::class);
    }

    public function proceso(){
        return $this->belongsTo(Proceso::class);
    }

    public function tipoproceso(){
        return $this->belongsTo(Tipoproceso::class);
    }

    public function desicion(){
        return $this->belongsTo(Desicion::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    // public function docrecursoclientes(){
    //     //$users = Procesocliente::select('id','tipoproceso_id','cliente_id','user_id')->get();
    //     // return datatables()->of($users)->toJson();

    //     $users = DB::table('procesoclientes')
    //     ->join('tipoprocesos','tipoprocesos.id','=','procesoclientes.tipoproceso_id')
    //     ->join('procesos','procesos.id','=','procesoclientes.proceso_id')
    //     ->join('users','users.id','=','procesoclientes.user_id')
    //     ->join('clientes','clientes.id','=','procesoclientes.cliente_id')
    //     ->join('desicions','desicions.id','=','procesoclientes.desicion_id')
    //     ->select('procesoclientes.id','tipoprocesos.nombre as tipoproceso','procesos.nombre as proceso','clientes.nombre as ncliente','clientes.apellido as acliente','users.name as especialista','procesoclientes.fecpresentado','desicions.nombre as desicionPro')
    //     ->where('tipoprocesos.id','=',2)
    //     ->get();
    //     return datatables()
    //         ->of($users)
    //         ->addColumn('btn',function($row){
    //             $btn = '<a href="'.route('procesocliente.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
    //             $btn = $btn.'<a href="'.route('procesocliente.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
    //             return $btn;
    //         })

    //         ->rawColumns(['btn'])

    //         ->toJson();
    // }
}
