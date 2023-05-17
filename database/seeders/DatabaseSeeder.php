<?php

use Database\Seeders\RoleSeeder;
use Database\Seeders\TurnoSeeder;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            SexoSeeder::class
        );
        
        $this->call(
            TurnoSeeder::class
        );

        $this->call(RoleSeeder::class);

      

    }
}
