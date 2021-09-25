<?php
namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderProduct;

class OrderService
{
    private $orderObj;

    public function __construct(Order $orderObj)
    {
        $this->orderObj = $orderObj;
    }

    public function collection($inputs = null)
    {
        return $this->orderObj->getQB()->get();
    }

    public function resource($id, $inputs = null){
        $order = $this->orderObj->getQB()->find($id);
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
        OrderProduct::insert([
            'order_id' => $order->id,
            'product_id' => $inputs['product_id'],
            'quantity' => $inputs['quantity']
        ]);
        // $order->products()->attach($inputs['product_id'], ['quantity' => $inputs['quantity']]);
        return $order;
    }

    public function delete($id){
        $order = $this->resource($id);
        if(isset($order['error'])){
            return $order;
        }
        // $order->products()->detach();
        OrderProduct::where('order_id', $id)->delete();
        $order = $order->delete();
        return ['success' => $order];
    }
}