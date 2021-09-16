<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $fillable = [
        'user_id','review'
    ];

    public function reviewable()
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
