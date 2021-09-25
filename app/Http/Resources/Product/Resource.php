<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Review\Collection as ReviewCollection;
use App\Http\Resources\OrderProduct\Collection as OrderProductCollection;
use App\Traits\ResourceFilterable;

class Resource extends JsonResource
{
    use ResourceFilterable;
    protected $model = 'Product';

    public function toArray($request)
    {
        $data =  $this->fields();
        $data['orders'] = new OrderProductCollection($this->whenLoaded('orders'));
        $data['reviews'] = new ReviewCollection($this->whenLoaded('reviews'));
        return $data;
    }
}
