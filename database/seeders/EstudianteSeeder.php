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
            'nombres' => 'Paola Andrea',
            'apellidos' => 'Perez Lopez',
            'fecha_nacimiento' => '1990-01-01',
            'edad' => '30',
            'direccion' => 'San Pedro Sula',
            'tutor_id' => '1',
            'sexo_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('estudiantes')->insert([
            'nombres' => 'Maria Luisa',
            'apellidos' => 'Lopez Perez',
             'edad' => '30',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'San Pedro Sula',
            'tutor_id' => '2',
            'sexo_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('estudiantes')->insert([
            'nombres' => 'Ruben Dario',
            'apellidos' => 'Jerez Lopez',
             'edad' => '30',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'San Pedro Sula',
            'tutor_id' => '2',
            'sexo_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('estudiantes')->insert([
            'nombres' => 'Luis Alberto',
            'apellidos' => 'Lopez Jerez',
             'edad' => '30',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'Monterrey',
            'tutor_id' => '2',
            'sexo_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('estudiantes')->insert([
            'nombres' => 'ana maria',
            'apellidos' => 'Perez Lopez',
             'edad' => '30',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'la ceiba',
            'tutor_id' => '2',
            'sexo_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('estudiantes')->insert([
            'nombres' => 'karla maria',
            'apellidos' => 'yanez Lopez',
             'edad' => '45',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'Korea del sur',
            'tutor_id' => '2',
            'sexo_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('estudiantes')->insert([
            'nombres' => 'KUmar maria',
            'apellidos' => 'juan Lopez',
             'edad' => '45',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'Korea del sur',
            'tutor_id' => '2',
            'sexo_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('estudiantes')->insert([
            'nombres' => 'ku maria',
            'apellidos' => 'juan Lopez',
             'edad' => '30',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'Korea del sur',
            'tutor_id' => '2',
            'sexo_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('estudiantes')->insert([
            'nombres' => 'Maria maria',
            'apellidos' => 'Ramos Lopez',
             'edad' => '30',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'Colombia',
            'tutor_id' => '2',
            'sexo_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('estudiantes')->insert([
            'nombres' => 'Eliseo Andres',
            'apellidos' => 'Davila Lopez',
             'edad' => '30',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'Colombia',
            'tutor_id' => '2',
            'sexo_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('estudiantes')->insert([
            'nombres' => 'Carlos Andres',
            'apellidos' => 'Davila Lopez',
             'edad' => '30',
            'fecha_nacimiento' => '1990-01-01',
            'direccion' => 'Colombia',
            'tutor_id' => '2',
            'sexo_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
