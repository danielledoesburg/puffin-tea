<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        for ($i = 1; $i <= 20; $i++)
        {
            $user = $users->random();
            
            $deliveryAddress = $user->addresses->filter(function($item){return $item->address_type_id === 1;})->first();
            $invoiceAddress = $user->addresses->filter(function($item){return $item->address_type_id === 2;})->first();
            if (!$invoiceAddress) $invoiceAddress = $deliveryAddress;
            
            $order = Order::create([
                'ordernr' => time() . $user->id,
                'shipping_costs' => 4.95, 
                'total' => 1,
                'user_id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'delivery_address_id' => $deliveryAddress->id,
                'delivery_address' => $deliveryAddress->address,
                'delivery_zipcode' => $deliveryAddress->zipcode,
                'delivery_city' => $deliveryAddress->city,
                'invoice_address_id' => $invoiceAddress->id,
                'invoice_address' => $invoiceAddress->address,
                'invoice_zipcode' => $invoiceAddress->zipcode,
                'invoice_city' => $invoiceAddress->city,
             ]);
             
             $random = rand(1,5);

             for ($i2 = 1; $i2 <= $random; $i2++) 
             {
                $product = Product::all()->random();

                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product' => $product->name,
                    'quantity' => rand(1,2),
                    'unit_id' => $product->unit_id,
                    'unit' => $product->unit->name,
                    'unit_amount' => $product->unit_amount,
                    'price' => $product->onSale->first()->price ?? $product->price
                ]);
            }
        }
    }
}