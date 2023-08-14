<?php

use App\Models\Estudiante;
use App\Models\Tutore;
use Database\Seeders\AsignaturaDocenteSeeder;
use Database\Seeders\AsignaturaSeeder;
use Database\Seeders\CargoSeeder;
use Database\Seeders\ConsanguinieddSeeder;
use Database\Seeders\CorteEvaluativoSeeder;
use Database\Seeders\EmpleadoSeeder;
use Database\Seeders\EstudianteSeeder;
use Database\Seeders\GradoSeeder;
use Database\Seeders\GruposSeeder;
use Database\Seeders\MatriculaSeeder;
use Database\Seeders\ModelHasRolesSeeder;
use Database\Seeders\NivelAcademicoSeeder;
use Database\Seeders\OrganizacionAcademicaSeeder;
use Database\Seeders\ProfesionSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\SeccionSeeder;
use Database\Seeders\SexoSeeder;
use Database\Seeders\TipoMatriculaSeeder;
use Database\Seeders\TurnoSeeder;
use Database\Seeders\TutoreSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            SexoSeeder::class
        );

        $this->call(
            TurnoSeeder::class
        );

        $this->call(
            SeccionSeeder::class
        );
        $this->call(
            ConsanguinieddSeeder::class
        );
        $this->call(
            GradoSeeder::class
        );
        $this->call(
            ProfesionSeeder::class
        );
        $this->call(
            TipoMatriculaSeeder::class
        );
        $this->call(
            NivelAcademicoSeeder::class
        );
        $this->call(
            CorteEvaluativoSeeder::class
        );
        $this->call(
            AsignaturaSeeder::class
        );
        $this->call(
            CargoSeeder::class
        );
        $this->call(
            EmpleadoSeeder::class
        );
        $this->call(
            OrganizacionAcademicaSeeder::class
        );
        $this->call(
            UserSeeder::class
        );
        $this->call(
            RoleSeeder::class
        );
        
        
       
        $this->call(
            TutoreSeeder::class
        );
        $this->call(
            EstudianteSeeder::class
        );
        $this->call(
            GruposSeeder::class
        );
        $this->call(
            MatriculaSeeder::class
        );

        $this->call(
            AsignaturaDocenteSeeder::class
        );
        $this->call(
            ModelHasRolesSeeder::class
        );
    }
}
