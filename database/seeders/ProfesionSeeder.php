<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('professions')->insert([
            'descripcion' => 'Ingeniero en sistemas',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('professions')->insert([
            'descripcion' => 'Administrador de empresas',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('professions')->insert([
            'descripcion' => 'Ingenerio Agroforestal',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('professions')->insert([
            'descripcion' => 'Ingeniero Civil',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('professions')->insert([
            'descripcion' => 'Ingeniero Electrico',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('professions')->insert([
            'descripcion' => 'Ingeniero Mecanico',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

    }
}
