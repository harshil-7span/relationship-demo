<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\Resource as UserResource;
use App\Http\Resources\Review\Collection as ReviewCollection;
use App\Http\Resources\OrderProduct\Collection as OrderProductCollection;
use App\Traits\ResourceFilterable;

class Resource extends JsonResource
{
    use ResourceFilterable;
    protected $model = 'Order';

    public function toArray($request)
    {
        $data =  $this->fields();
        $data['products'] = new OrderProductCollection($this->whenLoaded('products'));
        $data['user'] = new UserResource($this->whenLoaded('user'));
        $data['reviews'] = new ReviewCollection($this->whenLoaded('reviews'));
        return $data;
    }
}
