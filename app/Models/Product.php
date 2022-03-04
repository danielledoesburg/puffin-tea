<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

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
                ->where('date_till', '>=', date('Y-m-d'));
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
}


