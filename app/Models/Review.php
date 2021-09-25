<?php

namespace App\Models;

use App\Traits\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory, BaseModel;

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $fillable = [
        'user_id','review'
    ];

    public $queryable = [
        'id'
    ];

    public function setReviewAttribute($value){
        $this->attributes['review'] = strtolower($value);
    }

    public function reviewable()
    {
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $relationship = [
        'reviewable' => [
            'model' => 'App\\Models\\Review',
        ],
        'user' => [
            'model' => 'App\\Models\\User',
        ],
    ];
}
