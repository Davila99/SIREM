<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asignaturas')->insert([
            'descripcion' => 'Matematica',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('asignaturas')->insert([
            'descripcion' => 'Lengua y Literatura',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('asignaturas')->insert([
            'descripcion' => 'Ingles',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('asignaturas')->insert([
            'descripcion' => 'Ciencias Naturales',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('asignaturas')->insert([
            'descripcion' => 'Ciencias Sociales',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('asignaturas')->insert([
            'descripcion' => 'Educacion Fisica',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('asignaturas')->insert([
            'descripcion' => 'Educacion Artistica',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('asignaturas')->insert([
            'descripcion' => 'Educacion para el Trabajo',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);

    }
}
