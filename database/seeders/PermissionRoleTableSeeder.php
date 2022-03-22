<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder
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
        Role::truncate();
        DB::table('role_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $permissionData = [
                'show_users', 'create_users', 'update_users', 'delete_users', 
                'show_products', 'create_products', 'update_products', 'delete_products', 
                'show_categories', 'create_categories', 'update_categories', 'delete_categories', 
                'show_messages', 'update_messages', 'delete_messages',
                'show_orders', 'update_orders', 'delete_orders', ];

        foreach ($permissionData as $name) 
        {
            Permission::create([
                'name' => $name
            ]);
        }

        Role::create(['name' => 'super-admin'])
            ->givePermissionTo(Permission::all());

        Role::create(['name' => 'admin'])
            ->givePermissionTo(Permission::where('name', 'not like', '%e_user')->get());

        Role::create(['name' => 'user']);

    }
}
