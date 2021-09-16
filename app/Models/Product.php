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

    protected $hidden = ['created_at', 'updated_at' , 'pivot', 'quantity'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['quantity'];

    public function getQuantityAttribute()
    {
        return (!empty($this->pivot)) ? $this->pivot->quantity : 0;
    }

    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
