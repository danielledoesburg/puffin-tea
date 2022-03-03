<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Database\Seeders\ProductsTableSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::all()->first()->category->name;
        // dd($products);
        
        // $category = Category::findOrFail(1);
        // dd($category->products);
// dd(Product::findMany($this->bestSellerIds(3)));
        return view('products', [
            'bestSellers' => Product::findMany($this->bestSellerIds(10)),
        ]);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function show($id=1)
        {
            return Product::all();
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
