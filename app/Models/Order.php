<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'address', 'price','is_paid'
    ];

    protected $hidden = ['updated_at', 'pivot'];

    protected $casts = [
        'is_paid' => 'boolean',
        // 'created_at' => 'datetime:Y-m-d',
    ];

    /*
     *  For all date are converted this formate
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y');
    }

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
