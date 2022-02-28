<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{
    use HasFactory;

    protected $table = 'vat';

    protected $guarded = [
        'id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
