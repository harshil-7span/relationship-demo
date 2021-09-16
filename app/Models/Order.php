<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'address', 'price','is_paid'
    ];

    protected $hidden = ['created_at', 'updated_at', 'pivot'];

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
}
