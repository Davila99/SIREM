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

    


        //admin, registro, docente

        $admin =  Role::create(['name' => 'admin']);
        $registro =   Role::create(['name' => 'registro']);
        $docente =  Role::create(['name' => 'docente']);

        //Menu de catalogos solo por el rol de admin
        Permission::create(['name'=>'cargos.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'cargos.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'cargos.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'cargos.destroy'])->syncRoles([$admin]);
        
        Permission::create(['name'=>'consanguiniedades.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'consanguiniedades.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'consanguiniedades.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'consanguiniedades.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'seccion.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'seccion.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'seccion.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'seccion.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'turnos.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'turnos.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'turnos.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'turnos.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'cevaluativos.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'cevaluativos.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'cevaluativos.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'cevaluativos.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'grados.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'grados.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'grados.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'grados.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'nivelacademic.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'nivelacademic.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'nivelacademic.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'nivelacademic.destroy'])->syncRoles([$admin]);

        Permission::create(['name'=>'profession.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'profession.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'profession.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'profession.destroy'])->syncRoles([$admin]);
        
        Permission::create(['name'=>'tmatricula.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'tmatricula.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'tmatricula.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'tmatricula.destroy'])->syncRoles([$admin]);

        //Tabla de registro 
        Permission::create(['name'=>'empleados.index'])->syncRoles([$admin]);
        Permission::create(['name'=>'empleados.create'])->syncRoles([$admin]);
        Permission::create(['name'=>'empleados.edit'])->syncRoles([$admin]);
        Permission::create(['name'=>'empleados.destroy'])->syncRoles([$admin]);

        
        //Calificaciones
        Permission::create(['name'=>'calificaciones.index'])->syncRoles([$admin,$registro,$docente]);
        Permission::create(['name'=>'calificaciones.create'])->syncRoles([$admin,$registro,$docente]);
        Permission::create(['name'=>'calificaciones.edit'])->syncRoles([$admin,$registro,$docente]);
        Permission::create(['name'=>'calificaciones.destroy'])->syncRoles([$admin,$registro,$docente]);

        
    }
}
