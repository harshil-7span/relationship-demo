<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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

    public function orders(){
        return $this->hasMany(OrderProduct::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
