<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id',
    ];

    protected $hidden = ['created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'];

    protected $with = ['mainImage', 'onSale'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function onSale()
    {
        return $this->hasOne(OnSale::class)->ofMany([
            'date_from' => 'max',
            'created_at' => 'max'
        ], function ($query) {
            $query
                ->where('date_from', '<=', date('Y-m-d'))
                ->where(function ($query) {
                    $query->whereNull('date_till')
                        ->orWhere('date_till', '>=', date('Y-m-d'));
                });
        });
    }

    public function vat()
    {
        return $this->belongsTo(Vat::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(ProductImage::class)->ofMany('order_sequence', 'min');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class)->withTimestamps();
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class)->withTimestamps();
    }

    protected function bestSellerIds() 
    {
        return Cache::remember('bestSellerIds', now()->addDay(), function () {
            return DB::table('products')
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

    public function scopeBestSellers($query) 
    {    
        $query->whereIn('id', $this->bestSellerIds());        
    }
}


