<?php

namespace Database\Seeders;

use App\Models\Property as ModelsProperty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ModelsProperty::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = ['relaxing', 'digestion', 'airways', 'energy'];

        foreach ($data as $key => $value) 
        {
            ModelsProperty::create([
                'name' => $value,
            ]);
        }
    }
}
