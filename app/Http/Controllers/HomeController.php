<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
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
        return view('welcome', [
            'bestsellers' => Product::findMany($this->bestSellerIds(10)),
            'saleProducts' => Product::has('onSale')->get()
        ]);
    }    

    protected function bestSellerIds($amount = 10)
    {
        $ids = DB::table('products')
                ->select('products.id')
                ->join('order_details', function($join) { 
                    $join->on ('order_details.product_id', '=', 'products.id')
                        ->where('order_details.created_at', '>', DB::raw('DATE_SUB(NOW(), INTERVAL 3 MONTH)'));
                })
                ->whereNull('products.deleted_at')
                ->groupBy('products.id')
                ->orderBy(DB::raw('sum(order_details.quantity)'), 'desc')
                ->take($amount)
                ->get()
                ->pluck('id');

        return $ids;
    }
}
