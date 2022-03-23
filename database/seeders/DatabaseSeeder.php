<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $this->call(ShippingRatesTableSeeder::class);
        // $this->call(PermissionRoleTableSeeder::class);
        $this->call(AddressTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(VatTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(PropertiesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
       
        \App\Models\NewsletterSubscription::factory(10)->create();
        \App\Models\Message::factory(10)->create();
        \App\Models\Faq::factory(6)->create();
    }
}
