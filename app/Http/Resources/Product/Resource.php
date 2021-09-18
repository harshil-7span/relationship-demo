<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Review\Collection as ReviewCollection;
use App\Http\Resources\OrderProduct\Collection as OrderProductCollection;

class Resource extends JsonResource
{
    public function toArray($request)
    {
        // dd($this->orders[0]->quantity);
        $data = [
            "id" => $this->id,
            "name"=> $this->name,
            "price"=> $this->price
        ];
        $data['orders'] = new OrderProductCollection($this->whenLoaded('orders'));
        $data['reviews'] = new ReviewCollection($this->whenLoaded('reviews'));
        return $data;
    }
}
