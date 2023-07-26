<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estudiantes')->insert([
            'nombres' => 'Paola',
            'apellidos' => 'Perez',
            'fecha_nacimiento' => '1990-01-01',
            'edad' => '30',
            'direccion' => 'San Pedro Sula',
            'tutor_id' => '1',
            'sexo_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('estudiantes')->insert([
            'nombres' => 'Maria',
            'apellidos' => 'Lopez',
             'edad' => '30',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'San Pedro Sula',
            'tutor_id' => '2',
            'sexo_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
