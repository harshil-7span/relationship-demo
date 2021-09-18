<?php

namespace App\Http\Resources\OrderProduct;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Collection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\OrderProduct\Resource';
    public function toArray($request)
    {
        return $this->collection;
    }
}
