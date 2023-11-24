<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
        $root = Role::create(['name' => 'super-admin']);
        $admin = Role::create(['name' => 'admin']);
        $registro = Role::create(['name' => 'registro']);
        $docente = Role::create(['name' => 'docente']);

        //Permisos de Catalogos
        Permission::create(['name' => 'cargos.index'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'cargos.create'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'cargos.edit'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'cargos.destroy'])->syncRoles([$admin, $root]);

        Permission::create(['name' => 'asignaturas.index'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'asignaturas.create'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'asignaturas.edit'])->syncRoles([$admin], $root);
        Permission::create(['name' => 'asignaturas.destroy'])->syncRoles([$admin, $root]);

        Permission::create(['name' => 'consanguiniedades.index'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'consanguiniedades.create'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'consanguiniedades.edit'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'consanguiniedades.destroy'])->syncRoles([$admin, $root]);

        Permission::create(['name' => 'seccion.index'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'seccion.create'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'seccion.edit'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'seccion.destroy'])->syncRoles([$admin, $root]);

        Permission::create(['name' => 'turnos.index'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'turnos.create'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'turnos.edit'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'turnos.destroy'])->syncRoles([$admin, $root]);

        Permission::create(['name' => 'cevaluativos.index'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'cevaluativos.create'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'cevaluativos.edit'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'cevaluativos.destroy'])->syncRoles([$admin, $root]);

        Permission::create(['name' => 'grados.index'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'grados.create'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'grados.edit'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'grados.destroy'])->syncRoles([$admin, $root]);

        Permission::create(['name' => 'nivelacademic.index'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'nivelacademic.create'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'nivelacademic.edit'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'nivelacademic.destroy'])->syncRoles([$admin, $root]);

        Permission::create(['name' => 'profession.index'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'profession.create'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'profession.edit'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'profession.destroy'])->syncRoles([$admin, $root]);

        Permission::create(['name' => 'tmatricula.index'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'tmatricula.create'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'tmatricula.edit'])->syncRoles([$admin, $root]);
        Permission::create(['name' => 'tmatricula.destroy'])->syncRoles([$admin, $root]);

        //Permisos de Registro
        Permission::create(['name' => 'estudiantes.index'])->syncRoles([$admin,$root, $registro]);
        Permission::create(['name' => 'estudiantes.create'])->syncRoles([$admin,$root, $registro]);
        Permission::create(['name' => 'estudiantes.edit'])->syncRoles([$admin,$root, $registro]);
        Permission::create(['name' => 'estudiantes.destroy'])->syncRoles([$admin,$root, $registro]);

        Permission::create(['name' => 'estudianteTutores.index'])->syncRoles([$admin,$root, $registro]);
        Permission::create(['name' => 'estudianteTutores.create'])->syncRoles([$admin,$root, $registro]);
        Permission::create(['name' => 'estudianteTutores.edit'])->syncRoles([$admin,$root, $registro]);
        Permission::create(['name' => 'estudianteTutores.destroy'])->syncRoles([$admin,$root, $registro]);

        Permission::create(['name' => 'tutores.index'])->syncRoles([$admin,$root, $registro]);
        Permission::create(['name' => 'tutores.create'])->syncRoles([$admin,$root, $registro]);
        Permission::create(['name' => 'tutores.edit'])->syncRoles([$admin,$root, $registro]);
        Permission::create(['name' => 'tutores.destroy'])->syncRoles([$admin,$root, $registro]);

        Permission::create(['name' => 'matriculas.index'])->syncRoles([$admin,$root, $registro]);
        Permission::create(['name' => 'matriculas.create'])->syncRoles([$admin,$root, $registro]);
        Permission::create(['name' => 'matriculas.edit'])->syncRoles([$admin,$root, $registro]);
        Permission::create(['name' => 'matriculas.destroy'])->syncRoles([$admin,$root, $registro]);
        Permission::create(['name' => 'matriculas.pdf'])->syncRoles([$admin,$root, $registro]);

        //Permisos de Academia
        Permission::create(['name' => 'asignaturadocente.index'])->syncRoles([$root,$admin, $registro]);
        Permission::create(['name' => 'asignaturadocente.create'])->syncRoles([$root,$admin, $registro]);
        Permission::create(['name' => 'asignaturadocente.edit'])->syncRoles([$root,$admin, $registro]);
        Permission::create(['name' => 'asignaturadocente.destroy'])->syncRoles([$root,$admin, $registro]);

        Permission::create(['name' => 'organizacionacademica.index'])->syncRoles([$root,$admin, $registro]);
        Permission::create(['name' => 'organizacionacademica.create'])->syncRoles([$root,$admin, $registro]);
        Permission::create(['name' => 'organizacionacademica.edit'])->syncRoles([$root,$admin, $registro]);
        Permission::create(['name' => 'organizacionacademica.destroy'])->syncRoles([$root,$admin, $registro]);

        Permission::create(['name' => 'grupos.index'])->syncRoles([$root,$admin, $registro]);
        Permission::create(['name' => 'grupos.create'])->syncRoles([$root,$admin, $registro]);
        Permission::create(['name' => 'grupos.edit'])->syncRoles([$root,$admin, $registro]);
        Permission::create(['name' => 'grupos.destroy'])->syncRoles([$root,$admin, $registro]);

        //Permisos de Recursos Humanos
        Permission::create(['name' => 'empleados.index'])->syncRoles([$root, $admin]);
        Permission::create(['name' => 'empleados.create'])->syncRoles([$root, $admin]);
        Permission::create(['name' => 'empleados.edit'])->syncRoles([$root, $admin]);
        Permission::create(['name' => 'empleados.destroy'])->syncRoles([$root, $admin]);

        //Calificaciones
        Permission::create(['name' => 'calificaciones.index'])->syncRoles([$root, $admin, $registro, $docente]);
        Permission::create(['name' => 'calificaciones.create'])->syncRoles([$root, $admin, $registro, $docente]);
        Permission::create(['name' => 'calificaciones.edit'])->syncRoles([$root, $admin, $registro, $docente]);
        Permission::create(['name' => 'calificaciones.destroy'])->syncRoles([$root, $admin, $registro, $docente]);
        
        //Users
        Permission::create(['name' => 'admin/users.index'])->syncRoles([$root,$admin]);
        Permission::create(['name' => 'admin/users.create'])->syncRoles([$root,$admin]);
        Permission::create(['name' => 'admin/users.edit'])->syncRoles([$root,$admin]);
        Permission::create(['name' => 'admin/users.destroy'])->syncRoles([$root,$admin]);
        
    }
}

