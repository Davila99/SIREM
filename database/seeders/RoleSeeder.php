<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;




class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    


        //admin, registro, docente

        $admin =  Role::create(['name' => 'admin']);
        $registro =   Role::create(['name' => 'registro']);
        $docente =  Role::create(['name' => 'docente']);

    }
}
