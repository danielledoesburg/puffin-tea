<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function onSale()
    {
        return $this->hasMany(OnSale::class);
    }

    public function vat()
    {
        return $this->belongsTo(Vat::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }


    
}


