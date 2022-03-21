<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'bestsellers' => Product::findMany($this->bestSellerIds()),
            'saleProducts' => Product::has('onSale')->get()->random(3)
        ]);
    }    

    protected function bestSellerIds()
    {
        return Cache::remember('bestSellerIds', 86400, function () {
            return  DB::table('products')
                ->select('products.id')
                ->join('order_details', function($join) { 
                    $join->on ('order_details.product_id', '=', 'products.id')
                        ->where('order_details.created_at', '>', DB::raw('DATE_SUB(NOW(), INTERVAL 3 MONTH)'));
                })
                ->whereNull('products.deleted_at')
                ->groupBy('products.id')
                ->orderBy(DB::raw('sum(order_details.quantity)'), 'desc')
                ->take(10)
                ->get()
                ->pluck('id');
        });    

    }
}
