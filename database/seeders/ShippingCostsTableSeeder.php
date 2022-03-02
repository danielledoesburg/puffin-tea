<?php

namespace Database\Seeders;

use App\Models\ShippingCost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingCostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ShippingCost::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            [
                'shipping_costs' => 6.95,
                'free_shipping_threshold' => 100,
                'date_from' => date('Y-m-d', strtotime(now() . '- 1 month')),
                'date_till' => date('Y-m-d', strtotime(now() . '- 2 weeks'))
            ],
            [
                'shipping_costs' => 5.95,
                'free_shipping_threshold' => 75,
                'date_from' => date('Y-m-d', strtotime(now() . '- 13 days')),
                'date_till' => now()
            ],
            [
                'shipping_costs' => 4.95,
                'free_shipping_threshold' => 50,
                'date_from' => date('Y-m-d', strtotime(now() . '+ 1 day')),
                'date_till' => null
            ]
        ];

        foreach ($data as $array)
        {
            ShippingCost::create([
                'shipping_costs' => $array['shipping_costs'],
                'free_shipping_threshold' => $array['free_shipping_threshold'],
                'date_from' => $array['date_from'],
                'date_till' => $array['date_till']
            ]);
        }
    }
}
