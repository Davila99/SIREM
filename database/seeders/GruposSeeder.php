<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GruposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos')->insert([
            'grado_id' => 1,
            'fecha' => '2023-01-01',
            'empleado_id' => 1,
            'seccion_id' => 1,
            'turno_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('grupos')->insert([
            'grado_id' => 2,
            'fecha' => '2023-01-01',
            'empleado_id' => 1,
            'seccion_id' => 1,
            'turno_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
    }

