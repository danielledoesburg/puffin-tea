<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ShippingRate;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;

class CheckoutController extends Controller
{
    /**
     * Display the checkout page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('checkout');
    }

    /**
     * Display the checkout page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function success()
    {
        return view('checkout_success');
    }

    /**
     * Display the checkout page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculate(Request $request)
    {   
        $cart = json_decode($request->cart);
        $products = Array(); 
        $total = 0;

        foreach ($cart as $cartProduct) {
            $product = Product::with('unit')->find($cartProduct->id);
            $product->cart_quantity = $cartProduct->quantity;
            $products[] = $product;
            $total += ($product->onSale->price ?? $product->price) * $product->cart_quantity;
        }

        $shippingRate = ShippingRate::current()->first();
        $shippingRate = ($total < $shippingRate->free_shipping_threshold) ? $shippingRate->shipping_rate : 0;
              
        return [
            'user' => User::with('deliveryAddress', 'billingAddress')->currentUser()->first(),
            'products' => $products,
            'subTotal' => $total,
            'subTotalFormat' => number_format($total, 2),
            'shippingRate' => $shippingRate,
            'shippingRateFormat' => number_format($shippingRate, 2),
            'total' => $total + $shippingRate,
            'totalFormat' => number_format($total + $shippingRate, 2,)
        ];
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'ordernr' => time() . $request->user['id'],
            'shipping_rate' => $request->shippingRate,
            'total' => $request->total,
            'user_id' => $request->user['id'],
            'first_name' => $request->user['first_name'],
            'last_name' => $request->user['last_name'],
            'email' => $request->user['email'],
            'delivery_address_id' => $request->user['delivery_address']['id'],
            'delivery_address' => $request->user['delivery_address']['address'],
            'delivery_zipcode' => $request->user['delivery_address']['zipcode'],
            'delivery_city' => $request->user['delivery_address']['city'],
            'billing_address_id' => $request->user['billing_address']['id'],
            'billing_address' => $request->user['billing_address']['address'],
            'billing_zipcode' => $request->user['billing_address']['zipcode'],
            'billing_city' => $request->user['billing_address']['city']
        ]);

        foreach ($request->products as $product) 
        { 
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $product['id'],
                'product' => $product['name'],
                'quantity' => $product['cart_quantity'],
                'unit_amount' => $product['unit_amount'],
                'unit_id' => $product['unit_id'],
                'unit' => $product['unit']['name'],
                'price' => $product['on_sale']['price'] ?? $product['price']
            ]);
        }

        return [
            'ordernr' => $order->ordernr,
            'redirect' => '/checkout/success'
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
