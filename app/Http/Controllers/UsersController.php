<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        
        
        $userss = User::all();
        
        return view('users.index', compact('userss'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $pa = $request->name;
        $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'El nombre Especialista es obligatorio',
        ]);

        User::create($request->only('name','email','estado')
            + ['password' => bcrypt($request->input('password')),]
        );

        return redirect()->route('users.index')->with('info','Especialista agregado satisfactoriamente!!');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        
        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $user->update($request->only('name','email'));
        if($request->input('password')){
            $user->password = bcrypt($request->input('password'));
            $user->save();
        }

        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with('info','Especialista actualizado satisfactoriamente!!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('info','Especialista eliminado satisfactoriamente!!');
    }

    public function docuuser(){
        if(Auth::user()->hasRole('Admin')){
            $users = User::select('id','name','email')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('users.show', $row->id).'" class="btn btn-success btn-sm mr-2" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('users.edit', $row->id).'" class="edit btn btn-danger btn-sm mr-2" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
    }else{
        $users = User::select('id','name','email')->get();
        return datatables()
            ->of($users)
            ->addColumn('btn',function($row){
                $btn = '<a href="'.route('autorizado.index', $row->id).'" class="btn btn-success btn-sm mr-2 disabled" title="Mostrar"><i class="far fa-eye"></i></a>';
                $btn = $btn.'<a href="'.route('autorizado.index', $row->id).'" class="edit btn btn-danger btn-sm mr-2 disabled" title="Editar"><i class="fa fa-pen"></i></a>';
                return $btn;
            })->rawColumns(['btn'])->toJson();
    }
}
        
}
