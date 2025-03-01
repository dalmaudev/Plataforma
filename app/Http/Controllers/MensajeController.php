<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class MensajeController extends Controller
{

    public function index()
    {
        return view('mensaje.index');
    }

    public function create()
    {
        $especialista = User::pluck('name','id');
        return view('mensaje.create',compact('especialista'));
    }

    public function store(Request $request)
    {
        $pa = $request->nombre;
        $request->validate([
            'nombre' => 'required|unique:mensajes',
        ],[
            'nombre.required' => 'El Nombre del Mensaje  es obligatorio',
            'nombre.unique' => 'El nombre del Mensaje ('.$pa.') ya se encuentra en la base de datos',
        ]);

        Mensaje::create($request->all());

        return redirect()->route('mensaje.index')->with('info','Registro agregado satisfactoriamente!!');
    }

    public function show(Mensaje $mensaje)
    {
        return view('mensaje.show', compact('mensaje'));
    }

    public function edit(Mensaje $mensaje)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensaje $mensaje)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mensaje  $mensaje
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensaje $mensaje)
    {
        //
    }

    public function docmensajes(){
        $users = Mensaje::select('id','nombre')->get();

        // return datatables()->of($users)->toJson();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a target="_blank" href="'.route('mensaje.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('mensaje.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })
           
            ->rawColumns(['btn'])
            
            ->toJson();
    }

    public function enviomensajes(){
        // $correo = new ContactanosMailable;
        // Mail::to('wurlizerbar1@gmail.com')->send($correo);
        $details = [
            'title' => 'Este es un correo de prueba',
            'body' => 'este es un ejemplo para envia un correo de Gemai',
        ];
           // $msg = 'Jorge Sanchez esta en este momento usuario normal';
            // dd($msg->nombre);
        \Mail::to('wurlizerbar1@gmail.com')->send(new ContactanosMailable($details));
        return view('mensaje.show');
    }
}
