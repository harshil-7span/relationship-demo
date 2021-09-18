<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\Resource as UserResource;
use App\Http\Resources\Review\Collection as ReviewCollection;
use App\Http\Resources\OrderProduct\Collection as OrderProductCollection;

class Resource extends JsonResource
{
    public function toArray($request)
    {
        $data = [
            "id" => $this->id,
            "user_id"=> $this->user_id,
            "address"=> $this->address,
            "price" => $this->price,
        ];
        $data['products'] = new OrderProductCollection($this->whenLoaded('products'));
        $data['user'] = new UserResource($this->whenLoaded('user'));
        $data['reviews'] = new ReviewCollection($this->whenLoaded('reviews'));
        return $data;
    }
}
