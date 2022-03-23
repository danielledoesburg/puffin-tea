<?php

namespace Database\Seeders;

use App\Models\ShippingRate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingRatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ShippingRate::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            [
                'shipping_rate' => 6.95,
                'free_shipping_threshold' => 100,
                'date_from' => date('Y-m-d', strtotime(now() . '- 1 month')),
                'date_till' => date('Y-m-d', strtotime(now() . '- 2 weeks'))
            ],
            [
                'shipping_rate' => 5.95,
                'free_shipping_threshold' => 75,
                'date_from' => date('Y-m-d', strtotime(now() . '- 13 days')),
                'date_till' => now()
            ],
            [
                'shipping_rate' => 4.95,
                'free_shipping_threshold' => 50,
                'date_from' => date('Y-m-d', strtotime(now() . '+ 1 day')),
                'date_till' => null
            ]
        ];

        foreach ($data as $array)
        {
            ShippingRate::create([
                'shipping_rate' => $array['shipping_rate'],
                'free_shipping_threshold' => $array['free_shipping_threshold'],
                'date_from' => $array['date_from'],
                'date_till' => $array['date_till']
            ]);
        }
    }
}
