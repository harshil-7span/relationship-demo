<?php

namespace App\Models;

use App\Traits\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderProduct extends Model
{
    use HasFactory, BaseModel;

    protected $table = 'order_product';

    protected $fillable = ['order_id', 'product_id', 'quantity'];
    
    protected $hidden = ['id', 'order_id', 'product_id'];

    public $queryable = [
        'id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    protected $relationship = [
        'product' => [
            'model' => 'App\\Models\\Product',
        ],
        'order' => [
            'model' => 'App\\Models\\Order',
        ],
    ];
}
