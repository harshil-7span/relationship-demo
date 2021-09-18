<?php

namespace App\Http\Resources\OrderProduct;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Order\Resource as OrderResourceCollection;
use App\Http\Resources\Product\Resource as ProductResourceCollection;

class Resource extends JsonResource
{
    public function toArray($request)
    {
        $data = [
            "quantity" => $this->quantity
        ];
        $data['order'] = new OrderResourceCollection($this->whenLoaded('order'));
        $data['product'] = new ProductResourceCollection($this->whenLoaded('product'));
        return $data;
    }
}
