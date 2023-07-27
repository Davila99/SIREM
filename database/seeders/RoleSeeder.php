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

        $admin = Role::create(['name' => 'admin']);
        $registro = Role::create(['name' => 'registro']);
        $docente = Role::create(['name' => 'docente']);

        //Permisos de Catalogos
        Permission::create(['name' => 'cargos.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'cargos.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'cargos.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'cargos.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'asignaturas.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'asignaturas.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'asignaturas.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'asignaturas.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'consanguiniedades.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'consanguiniedades.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'consanguiniedades.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'consanguiniedades.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'seccion.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'seccion.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'seccion.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'seccion.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'turnos.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'turnos.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'turnos.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'turnos.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'cevaluativos.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'cevaluativos.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'cevaluativos.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'cevaluativos.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'grados.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'grados.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'grados.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'grados.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'nivelacademic.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'nivelacademic.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'nivelacademic.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'nivelacademic.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'profession.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'profession.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'profession.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'profession.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'tmatricula.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'tmatricula.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'tmatricula.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'tmatricula.destroy'])->syncRoles([$admin]);

        //Permisos de Registro
        Permission::create(['name' => 'estudiantes.index'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'estudiantes.create'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'estudiantes.edit'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'estudiantes.destroy'])->syncRoles([$admin, $registro]);

        Permission::create(['name' => 'estudianteTutores.index'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'estudianteTutores.create'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'estudianteTutores.edit'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'estudianteTutores.destroy'])->syncRoles([$admin, $registro]);

        Permission::create(['name' => 'tutores.index'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'tutores.create'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'tutores.edit'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'tutores.destroy'])->syncRoles([$admin, $registro]);

        Permission::create(['name' => 'matriculas.index'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'matriculas.create'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'matriculas.edit'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'matriculas.destroy'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'matriculas.pdf'])->syncRoles([$admin, $registro]);

        //Permisos de Academia
        Permission::create(['name' => 'asignaturadocente.index'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'asignaturadocente.create'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'asignaturadocente.edit'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'asignaturadocente.destroy'])->syncRoles([$admin, $registro]);

        Permission::create(['name' => 'organizacionacademica.index'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'organizacionacademica.create'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'organizacionacademica.edit'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'organizacionacademica.destroy'])->syncRoles([$admin, $registro]);

        Permission::create(['name' => 'grupos.index'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'grupos.create'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'grupos.edit'])->syncRoles([$admin, $registro]);
        Permission::create(['name' => 'grupos.destroy'])->syncRoles([$admin, $registro]);

        //Permisos de Recursos Humanos
        Permission::create(['name' => 'empleados.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'empleados.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'empleados.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'empleados.destroy'])->syncRoles([$admin]);

        //Calificaciones
        Permission::create(['name' => 'calificaciones.index'])->syncRoles([$admin, $registro, $docente]);
        Permission::create(['name' => 'calificaciones.create'])->syncRoles([$admin, $registro, $docente]);
        Permission::create(['name' => 'calificaciones.edit'])->syncRoles([$admin, $registro, $docente]);
        Permission::create(['name' => 'calificaciones.destroy'])->syncRoles([$admin, $registro, $docente]);
        
        //Users
        Permission::create(['name' => 'admin/users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin/users.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin/users.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin/users.destroy'])->syncRoles([$admin]);
        
    }
}
