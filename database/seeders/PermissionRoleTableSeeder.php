<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table('permission_role')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $permissionData = [
                'show_user', 'create_user', 'update_user', 'delete_user', 
                'show_product', 'create_product', 'update_product', 'delete_product', 
                'show_category', 'create_category', 'update_category', 'delete_category', 
                'show_message', 'update_message', 'delete_message',
                'show_order', 'update_order', 'delete_order', ];

        foreach ($permissionData as $name) 
        {
            Permission::create([
                'name' => $name
            ]);
        }

        Role::create(['name' => 'super-admin'])
            ->permissions()
            ->attach(Permission::all());

        Role::create(['name' => 'admin'])
            ->permissions()
            ->attach(Permission::where('name', 'not like', '%user')->get());

        Role::create(['name' => 'user']);

    }
}
