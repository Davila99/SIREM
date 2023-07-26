<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsignaturaDocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asignatura_docentes')->insert([
            'organizacion_academica_id' => 1,
            'asignatura_id' => 1,
            'empleado_id' => 1,
            'grupo_id' => 1,
        ]);
    }
}
