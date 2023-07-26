<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TutoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('tutores')->insert([
        'nombre' => 'Juan',
        'apellido' => 'Perez',
        'cedula'=>'616-123456-1234A',
        'telefono'=>'7645-1234',
        'professions_id'=>'1',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
       ]);
       DB::table('tutores')->insert([
        'nombre' => 'Maria',
        'apellido' => 'Lopez',
        'cedula'=>'616-123456-1234A',
        'telefono'=>'7645-1234',
        'professions_id'=>'1',
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
       ]);
    }
}
