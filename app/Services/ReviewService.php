<?php
namespace App\Services;

use App\Models\Order;
use App\Models\Review;
use App\Models\Product;

class ReviewService
{
    protected $reviewObj;

    public function __construct(Review $reviewObj)
    {
        $this->reviewObj = $reviewObj;    
    }

    public function collection($inputs = null)
    {
        $with = [];
        if(isset($inputs->include) && !empty($inputs->include)){
            $with = explode(',', $inputs->include);
        }
        return $this->reviewObj->with($with)->get();
    }

    public function store($inputs){
        if($inputs->review_type == 'product'){
            $reviewType = Product::find($inputs->type_id);
        } else {
            $reviewType = Order::find($inputs->type_id);
        }

        if(empty($reviewType)){
            return ['error' => ['message'=> 'Review type not found.']];
        }

        $review = $reviewType->reviews()->create([
            'review' => $inputs->review,
            'user_id' => $inputs->user_id
        ]);

        return $review;
    }
}