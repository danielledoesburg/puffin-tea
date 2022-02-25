<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(AddressTypesTableSeeder::class);
        \App\Models\Newsletter::factory(10)->create();
        \App\Models\User::factory(20)->create();
       
    }
}
