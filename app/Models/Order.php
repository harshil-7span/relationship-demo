<?php

namespace App\Models;

use DateTimeInterface;
use App\Traits\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, BaseModel;

    protected $fillable = [
        'user_id', 'address', 'price','is_paid'
    ];

    protected $hidden = ['updated_at', 'pivot'];

    protected $casts = [
        'is_paid' => 'boolean',
        'created_at' => 'datetime:Y-m-d',
    ];

    /*
     *  For all date are converted this formate
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y');
    }

    public $queryable = [
        'id'
    ];

    // m2m relationship
    // public function products(){
    //     return $this->belongsToMany(product::class)->withPivot('quantity');
    // }

    public function products(){
        return $this->hasMany(OrderProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    protected $relationship = [
        'products' => [
            'model' => 'App\\Models\\OrderProduct',
        ],
        'products.order' => [
            'model' => 'App\\Models\\OrderProduct',
        ],
        'products.product.reviews' => [
            'model' => 'App\\Models\\OrderProduct',
        ],
        'user' => [
            'model' => 'App\\Models\\User',
        ],
        'reviews' => [
            'model' => 'App\\Models\\Review',
        ],
    ];
}
