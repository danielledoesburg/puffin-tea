<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressType extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id',
    ];

    public function addresses() 
    {
        return $this->hasMany(Address::class);
    }
}
