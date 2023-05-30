<?php

namespace Database\Seeders;


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
    }
}
