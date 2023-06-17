<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('niveles_academicos')->insert([
            'descripcion' => 'Bachiller',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('niveles_academicos')->insert([
            'descripcion' => 'Licenciado',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('niveles_academicos')->insert([
            'descripcion' => 'Ingeniero',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
    }
}
