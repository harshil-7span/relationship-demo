<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Http\Requests\Order\Upsert;
use App\Http\Resources\Order\Collection as OrderCollection;
use App\Http\Resources\Order\Resource as OrderResource;
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
        $orders = $this->orderService->collection($request->all());
        return new OrderCollection($orders);
    }

    public function show($id, Request $request){
        $order = $this->orderService->resource($id, $request->all());
        return new OrderResource($order);
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
