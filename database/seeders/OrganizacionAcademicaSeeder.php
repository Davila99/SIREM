<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizacionAcademicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organizacion_academicas')->insert([
            'descripcion' => 'Organización Académica primer ciclo de educación primaria',
            'fecha' => '2023',
            'confirmed' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('organizacion_academicas')->insert([
            'descripcion' => 'Organización Académica primer ciclo de educacion secundaria',
            'fecha' => '2023',
            'confirmed' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('organizacion_academicas')->insert([
            'descripcion' => 'Organización Académica primer ciclo de educación básica',
            'fecha' => '2023',
            'confirmed' => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
    }
}
