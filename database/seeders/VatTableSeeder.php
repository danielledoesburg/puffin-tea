<?php

namespace Database\Seeders;

use App\Models\Vat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Vat::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            [
                'name' => 'hoog',
                'percentage' => 21
            ],
            [
                'name' => 'laag',
                'percentage' => 9
            ],
        ];

        foreach($data as $array) 
        {
            Vat::create([
                'name' => $array['name'],
                'percentage' => $array['percentage']
            ]);
        }
    }
}
