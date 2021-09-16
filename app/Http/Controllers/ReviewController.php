<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    protected $reviewObj;

    public function __construct(Review $reviewObj)
    {
        $this->reviewObj = $reviewObj;    
    }

    public function index(Request $request){
        $with = [];
        if(isset($request->include) && !empty($request->include)){
            $with = explode(',', $request->include);
        }
        $review = $this->reviewObj->with($with)->get();
        return response()->json($review);
    }

    public function store(Request $request){
        if($request->review_type == 'product'){
            $reviewType = Product::find($request->type_id);
        } else {
            $reviewType = Order::find($request->type_id);
        }

        if(empty($reviewType)){
            return response()->json(['error' => ['message'=> 'Review type not found.']]);
        }

        $review = $reviewType->reviews()->create([
            'review' => $request->review,
            'user_id' => $request->user_id
        ]);

        return response()->json($review);
    }
}
