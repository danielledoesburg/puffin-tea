<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
                'show_user', 'create_user', 'update_user', 'delete_user', 
                'show_product', 'create_product', 'update_product', 'delete_product', 
                'show_category', 'create_category', 'update_category', 'delete_category', 
                'show_message', 'update_message', 'delete_message',
                'show_order', 'update_order', 'delete_order', ];

        foreach($data as $name) {
            Permission::create([
                'name' => $name
            ]);
        }
    }
}
