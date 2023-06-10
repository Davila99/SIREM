<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    }
}
