<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Order\Collection as OrderCollection;
use App\Http\Resources\Review\Collection as ReviewCollection;
use App\Traits\ApiResponser;
use App\Traits\ResourceFilterable;

class Resource extends JsonResource
{
    use ResourceFilterable;
    protected $model = 'User';

    public function toArray($request)
    {
        $data =  $this->fields();
        $data['orders'] = new OrderCollection($this->whenLoaded('orders'));
        $data['reviews'] = new ReviewCollection($this->whenLoaded('reviews'));
        return $data;
    }
}
