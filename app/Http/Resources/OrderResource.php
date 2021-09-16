<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        $data = [
            "id" => $this->id,
            "user_id"=> $this->user_id,
            "address"=> $this->address,
            "price" => $this->price,
            'products' => $this->whenLoaded('products'),
        ];
        return $data;
    }
}
