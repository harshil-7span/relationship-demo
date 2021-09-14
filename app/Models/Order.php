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
    
    protected $appends = ['quantity'];

    public function getQuantityAttribute()
    {
        return (!empty($this->pivot)) ? $this->pivot->quantity : 0;
    }

    public function products(){
        return $this->belongsToMany(product::class)->withPivot('quantity');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'review');
    }
}
