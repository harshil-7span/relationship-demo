<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Http\Requests\Order\Upsert;
use App\Http\Resources\OrderCollection;
use App\Models\OrderProduct;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        // $data = OrderProduct::get();
        $data = $this->orderService->collection($request->all());
        return response()->json($data);
    }

    public function show($id){
        $data = $this->orderService->resource($id);
        return response()->json($data);
    }

    public function store(Upsert $request){
        $data = $this->orderService->store($request->all());
        return response()->json($data);
    }

    public function destroy($id, Request $request){
        $data = $this->orderService->delete($id);
        return response()->json($data);
    }
}
