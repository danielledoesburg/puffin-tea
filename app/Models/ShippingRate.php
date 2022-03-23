<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingRate extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $hidden = ['created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'];

    public function scopeCurrent($query) {

            $query->where('date_from', '<=', date('Y-m-d'))
                ->where( function ($query) {
                    $query->where('date_till', '>=', date('Y-m-d'))
                        ->orWhereNull('date_till');
                });
    }
}
