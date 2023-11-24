<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleados')->insert([
            'nombres' => 'Juan',
            'apellidos' => 'Perez',
            'telefono' => '7645-1234',
            'cedula' => '616-123456-1234A',
            'fecha_nacimiento' => '1990-01-01',
            'nivel_academico_id' => '1',
            'direccion' => 'San Pedro Sula',
            'email'=>'davilaeliseo453@gmail.com',
            'fecha_ingreso'=>'2021-01-01',
            'cargos_id'=>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('empleados')->insert([
            'nombres' => 'Maria',
            'apellidos' => 'Lopez',
            'telefono' => '7645-1234',
            'cedula' => '616-123456-1234E',
            'fecha_nacimiento' => '1990-01-02',
            'nivel_academico_id' => '1',
            'direccion' => 'San Pedro Sula',
            'email'=>'maria@gmail.com',
            'fecha_ingreso'=>'2021-01-02',
            'cargos_id'=>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('empleados')->insert([
            'nombres' => 'Pedro',
            'apellidos' => 'Garcia',
            'telefono' => '7645-1234',
            'cedula' => '616-123456-1234I',
            'fecha_nacimiento' => '1990-01-03',
            'nivel_academico_id' => '1',
            'direccion' => 'San Pedro Sula',
            'email'=> 'secretaria@gmail.com',
            'fecha_ingreso'=>'2021-01-03',
            'cargos_id'=>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('empleados')->insert([
            'nombres' => 'Jose',
            'apellidos' => 'Gonzales',
            'telefono' => '7645-1234',
            'cedula' => '616-123456-1234O',
            'fecha_nacimiento' => '1990-01-04',
            'nivel_academico_id' => '1',
            'direccion' => 'San Pedro Sula',
            'email'=> 'root@gmail.com',
            'fecha_ingreso'=>'2021-01-04',
            'cargos_id'=>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
