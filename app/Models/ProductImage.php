<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id',
    ];

    protected $hidden = ['created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
