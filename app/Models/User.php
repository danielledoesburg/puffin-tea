<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    protected $guarded = [
        'id',
    ];

    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'];

    
    /**
     * The attributes that should be cast.
     *
     * @param  integer  $value
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];


    public function getNameAttribute()
    {
           return $this->first_name . ' ' . $this->last_name;
    }

    public function newsletterSubscription() 
    {
        return $this->hasOne(NewsletterSubscription::class);
    }

    public function shippingAddress() 
    {
        return $this->hasOne(Address::class)->ofMany([
            'created_at' => 'max'
        ], function ($query) {
            $query->where('address_type_id', 1);
        });
    }

    public function billingAddress() 
    {
        return $this->hasOne(Address::class)->ofMany([
            'created_at' => 'max'
        ], function ($query) {
            $query->where('address_type_id', 2);
        });
    }

    // public function role()
    // {
    //     return $this->belongsTo(Role::class);
    // }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
