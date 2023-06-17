<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grados')->insert([
            'descripcion' => 'Primero',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('grados')->insert([
            'descripcion' => 'Segundo',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
        DB::table('grados')->insert([
            'descripcion' => 'Tercero',
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
        ]);
    }
}
