<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Unit::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = ['grams', 'kg', 'tea bags', 'piece'];

        foreach($data as $value) 
        {
            Unit::create([
                'name' => $value,
            ]);
        }
    }
}
