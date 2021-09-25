<?php

namespace App\Models;

use App\Traits\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, BaseModel;

    protected $fillable = [
        'name', 'price'
    ];

    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // m2m relationship
    // public function orders(){
    //     return $this->belongsToMany(Order::class)->using(OrderProduct::class)->withPivot('quantity');
    // }

    public $queryable = [
        'id'
    ];

    public function orders(){
        return $this->hasMany(OrderProduct::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    protected $relationship = [
        'orders' => [
            'model' => 'App\\Models\\OrderProduct',
        ],
        'orders.order' => [
            'model' => 'App\\Models\\OrderProduct',
        ],
        'orders.order.user' => [
            'model' => 'App\\Models\\OrderProduct',
        ],
        'orders.order.reviews' => [
            'model' => 'App\\Models\\OrderProduct',
        ],
        'reviews' => [
            'model' => 'App\\Models\\Review',
        ],
    ];
}
