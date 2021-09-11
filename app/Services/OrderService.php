<?php
namespace App\Services;

use App\Models\Order;
use App\Models\Product;

class OrderService
{
    private $orderObj;

    public function __construct(Order $orderObj)
    {
        $this->orderObj = $orderObj;
    }

    public function collection($inputs = null)
    {
        $with = [];
        if(isset($inputs['include']) && !empty($inputs['include'])){
            $with = explode(',', $inputs['include']);
        }
        return $this->orderObj->with($with)->get();
    }

    public function resource($id){
        $order = $this->orderObj->find($id);
        $order->products;
        if (!empty($order)) {
            return $order;
        } else {
            return ['error' => ['Order is not found.']];
        }
    }

    public function store($inputs){
        $product = Product::find($inputs['product_id']);
        $inputs += ['price' => $product->price * $inputs['quantity']];
        $order = $this->orderObj->create($inputs);
        $order->products()->attach($inputs['product_id'], ['quantity' => $inputs['quantity']]);
        return $order;
    }

    public function delete($id){
        $order = $this->resource($id);
        if(isset($order['error'])){
            return $order;
        }
        $order->products()->detach();
        $order = $order->delete();
        return ['success' => $order];
    }
}