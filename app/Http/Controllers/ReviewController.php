<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\Upsert;
use Illuminate\Http\Request;
use App\Services\ReviewService;
use App\Http\Resources\Review\Resource as ReviewResource;
use App\Http\Resources\Review\Collection as ReviewCollection;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index(Request $request){
        $reviews = $this->reviewService->collection($request);
        // return response()->json($reviews);
        return new ReviewCollection($reviews);
    }

    public function store(Upsert $request){
        $review = $this->reviewService->store($request);
        return new ReviewResource($review);
    }
}
