<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Colaborador']);

        $permission = Permission::create(['name' => 'dashboard'])->syncRoles([$role1,$role2]);

                //notas
        $permission = Permission::create(['name' => 'notas.index'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'notas.create'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'notas.edit'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'notas.destroy'])->syncRoles([$role1]);

        //provincia
        $permission = Permission::create(['name' => 'provincia.index'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'provincia.create'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'provincia.edit'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'provincia.destroy'])->syncRoles([$role1]);

        //localidad
        $permission = Permission::create(['name' => 'localidad.index'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'localidad.create'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'localidad.edit'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'localidad.destroy'])->syncRoles([$role1]);

        //pais
        $permission = Permission::create(['name' => 'pais.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'pais.create'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'pais.edit'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'pais.destroy'])->syncRoles([$role1,$role2]);

        //users
        $permission = Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'users.create'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);

        //proceso
        $permission = Permission::create(['name' => 'proceso.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'proceso.create'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'proceso.edit'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'proceso.destroy'])->syncRoles([$role1,$role2]);

        //desicion
        $permission = Permission::create(['name' => 'desicion.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'desicion.create'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'desicion.edit'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'desicion.destroy'])->syncRoles([$role1,$role2]);

        //presento
        $permission = Permission::create(['name' => 'presento.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'presento.create'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'presento.edit'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'presento.destroy'])->syncRoles([$role1,$role2]);

        //recurso
        $permission = Permission::create(['name' => 'recurso.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'recurso.create'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'recurso.edit'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'recurso.destroy'])->syncRoles([$role1,$role2]);

        //estadocivil
        $permission = Permission::create(['name' => 'estadocivil.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'estadocivil.create'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'estadocivil.edit'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'estadocivil.destroy'])->syncRoles([$role1,$role2]);

        //document->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'documento.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'documento.create'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'documento.edit'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'documento.destroy'])->syncRoles([$role1,$role2]);

        //cliente
        $permission = Permission::create(['name' => 'cliente.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'cliente.create'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'cliente.edit'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'cliente.destroy'])->syncRoles([$role1,$role2]);

        //procesocliente
        $permission = Permission::create(['name' => 'procesocliente.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'procesocliente.create'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'procesocliente.edit'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'procesocliente.destroy'])->syncRoles([$role1,$role2]);

        //recursocliente
        $permission = Permission::create(['name' => 'recursocliente.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'recursocliente.create'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'recursocliente.edit'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'recursocliente.destroy'])->syncRoles([$role1,$role2]);

        //tipoproceso
        $permission = Permission::create(['name' => 'tipoproceso.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'tipoproceso.create'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'tipoproceso.edit'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'tipoproceso.destroy'])->syncRoles([$role1,$role2]);

        //autonomo
        $permission = Permission::create(['name' => 'autonomo.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'autonomo.create'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'autonomo.edit'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'autonomo.destroy'])->syncRoles([$role1,$role2]);

        //sends-mail
        $permission = Permission::create(['name' => 'sends-mail.index'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'sends-mail.create'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'sends-mail.edit'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'sends-mail.destroy'])->syncRoles([$role1]);

        //sexo
        $permission = Permission::create(['name' => 'sexo.index'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'sexo.create'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'sexo.edit'])->syncRoles([$role1,$role2]);
        $permission = Permission::create(['name' => 'sexo.destroy'])->syncRoles([$role1,$role2]);

        //mensaje
        $permission = Permission::create(['name' => 'mensaje.index'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'mensaje.create'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'mensaje.edit'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'mensaje.destroy'])->syncRoles([$role1]);


    }
}
