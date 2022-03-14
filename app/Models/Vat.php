<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vat extends Model
{
    use SoftDeletes;

    protected $table = 'vat';

    protected $guarded = [
        'id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
