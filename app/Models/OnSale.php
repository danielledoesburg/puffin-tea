<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnSale extends Model
{
    protected $table = 'on_sale';

    protected $guarded = [
        'id',
    ];
}
