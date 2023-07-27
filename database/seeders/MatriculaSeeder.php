<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matriculas')->insert([
            'fecha' => '2023-01-01',
            'user_id' => 1,
            'estudiante_id' => 1,
            'tipo_matricula_id' => 1,
            'grupo_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('matriculas')->insert([
            'fecha' => '2023-01-01',
            'user_id' => 1,
            'estudiante_id' => 2,
            'tipo_matricula_id' => 1,
            'grupo_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('matriculas')->insert([
            'fecha' => '2023-01-01',
            'user_id' => 1,
            'estudiante_id' => 3,
            'tipo_matricula_id' => 1,
            'grupo_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('matriculas')->insert([
            'fecha' => '2023-01-01',
            'user_id' => 1,
            'estudiante_id' => 4,
            'tipo_matricula_id' => 1,
            'grupo_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('matriculas')->insert([
            'fecha' => '2023-01-01',
            'user_id' => 1,
            'estudiante_id' => 5,
            'tipo_matricula_id' => 1,
            'grupo_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('matriculas')->insert([
            'fecha' => '2023-01-01',
            'user_id' => 1,
            'estudiante_id' => 6,
            'tipo_matricula_id' => 1,
            'grupo_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('matriculas')->insert([
            'fecha' => '2023-01-01',
            'user_id' => 1,
            'estudiante_id' => 7,
            'tipo_matricula_id' => 1,
            'grupo_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('matriculas')->insert([
            'fecha' => '2023-01-01',
            'user_id' => 1,
            'estudiante_id' => 8,
            'tipo_matricula_id' => 1,
            'grupo_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]); 
        DB::table('matriculas')->insert([
            'fecha' => '2023-01-01',
            'user_id' => 1,
            'estudiante_id' => 9,
            'tipo_matricula_id' => 1,
            'grupo_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]); 

    }
}
