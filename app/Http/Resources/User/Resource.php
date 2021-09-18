<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Order\Collection as OrderCollection;

class Resource extends JsonResource
{
    public function toArray($request)
    {
        $data = [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email
        ];
        $data['orders'] = new OrderCollection($this->whenLoaded('orders'));
        return $data;
    }
}
