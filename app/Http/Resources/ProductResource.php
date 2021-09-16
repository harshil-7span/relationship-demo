<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        $data = [
            "id" => $this->id,
            "name"=> $this->name,
            "price"=> $this->price,
            'order' => $this->whenLoaded('orders'),
        ];
        return $data;
    }
}
