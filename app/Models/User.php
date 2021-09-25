<?php

namespace App\Models;

use App\Traits\BaseModel;
// use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, BaseModel;

    public static $guard_name = "api";

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
        'email_verified_at'
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $queryable = [
        'id'
    ];

    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    protected $relationship = [
        'orders' => [
            'model' => 'App\\Models\\Order',
        ],
        'orders.products' => [
            'model' => 'App\\Models\\Order',
        ],
        'orders.products.product' => [
            'model' => 'App\\Models\\Order',
        ],
        'reviews' => [
            'model' => 'App\\Models\\Review',
        ],
    ];
}
