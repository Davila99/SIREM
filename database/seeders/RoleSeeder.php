<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $roleAdministrador = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'Registro']);
        $role3 = Role::create(['name'=>'Docente']);

        Permission::create(['name'=>'cargos.index'])->syncRoles([$roleAdministrador,$role2,$role3]);
        Permission::create(['name'=>'cargos.create'])->syncRoles([$roleAdministrador,$role2,$role3]);
        Permission::create(['name'=>'cargos.edit'])->syncRoles([$roleAdministrador,$role2,$role3]);
        Permission::create(['name'=>'cargos.destroy'])->syncRoles([$roleAdministrador,$role2,$role3]);

        Permission::create(['name'=>'grados.index'])->syncRoles([$roleAdministrador,$role2,$role3]);
        Permission::create(['name'=>'grados.create'])->syncRoles([$roleAdministrador,$role2,$role3]);
        Permission::create(['name'=>'grados.edit'])->syncRoles([$roleAdministrador,$role2,$role3]);
        Permission::create(['name'=>'grados.destroy'])->syncRoles([$roleAdministrador,$role2,$role3]);
        Permission::create(['name'=>'nivelacademic.index'])->syncRoles([$roleAdministrador,$role2,$role3]);
        Permission::create(['name'=>'nivelacademic.create'])->syncRoles([$roleAdministrador,$role2,$role3]);
        Permission::create(['name'=>'nivelacademic.edit'])->syncRoles([$roleAdministrador,$role2,$role3]);
        Permission::create(['name'=>'nivelacademic.destroy'])->syncRoles([$roleAdministrador,$role2,$role3]);

    }
}
