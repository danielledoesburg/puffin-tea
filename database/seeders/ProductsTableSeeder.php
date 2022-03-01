<?php

namespace Database\Seeders;

use App\Models\OnSale;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Property;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        ProductImage::truncate();
        OnSale::truncate();
        DB::table('product_property')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            [
                'name' => 'Green tea',
                'description' => 'this is the green tea description',
                'category_id' => '1',
                'type' => 1,
                'price' => 4.95,
                'vat_id' => 2,
                'unit_amount' => 25,
                'unit_id' => 1,
                'on_sale' => false,
                'image_filenames'=> ['greentea.jpg', 'greentea2.jpg']
            ],
            [
                'name' => 'Black tea',
                'description' => 'this is the black tea description',
                'category_id' => 2,
                'type' => 2,
                'price' => 2.50,
                'vat_id' => 1,
                'unit_amount' => 30,
                'unit_id' => 3,
                'on_sale' => 2.09,
                'image_filenames'=> ['blacktea.jpg', 'blacktea2.jpg']
            ]
        ];

        foreach ($data as $array)
        {
            $product = Product::create([
                'name' => $array['name'],
                'description' => $array['description'],
                'category_id' => $array['category_id'],
                'type' => $array['type'],
                'price' => $array['price'],
                'vat_id' => $array['vat_id'],
                'unit_amount' => $array['unit_amount'],
                'unit_id' => $array['unit_id'],
            ]);

            $product->properties()->attach(Property::all()->random(2));

            if ($array['on_sale'] !== false) 
            {
                OnSale::create([
                    'product_id' => $product->id,
                    'price' => $array['on_sale'],
                    'date_from' => date('Y-m-d', strtotime(now() . rand(-10, 10) . 'day')),
                ]);
            }

            if ($array['image_filenames'])
            {  
                foreach ($array['image_filenames'] as $key => $filename)
                ProductImage::create([
                    'filename' => $filename,
                    'product_id' => $product->id,
                    'order_sequence' => $key + 1
                ]);
            }
        }
    }
}

