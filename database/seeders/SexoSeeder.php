<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexos')->insert([
            'descripcion' => 'Femenino',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('sexos')->insert([
            'descripcion' => 'Masculino',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

    }
}
