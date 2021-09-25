<?php

namespace App\Http\Resources\OrderProduct;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Order\Resource as OrderResourceCollection;
use App\Http\Resources\Product\Resource as ProductResourceCollection;
use App\Traits\ResourceFilterable;

class Resource extends JsonResource
{
    use ResourceFilterable;
    protected $model = 'OrderProduct';

    public function toArray($request)
    {
        $data =  $this->fields();
        $data['order'] = new OrderResourceCollection($this->whenLoaded('order'));
        $data['product'] = new ProductResourceCollection($this->whenLoaded('product'));
        return $data;
    }
}
