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
        $this->call(PermissionsTableSeeder::class);
        $this->call(ShippingCostsTableSeeder::class);
        $this->call(AddressTypesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(VatTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(PropertiesTableSeeder::class);
        
        \App\Models\NewsletterSubscription::factory(10)->create();
        \App\Models\User::factory(20)->create();
        \App\Models\Message::factory(20)->create();
        \App\Models\Faq::factory(6)->create();
    }
}
