<?php

namespace Database\Seeders;

use App\Models\AddressType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        AddressType::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = ['shipping address', 'billing address'];

        foreach($data as $name) {
            AddressType::create([
                'name' => $name
            ]);
        }
    }
}
