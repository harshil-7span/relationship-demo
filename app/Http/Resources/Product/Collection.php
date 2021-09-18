<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Collection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\Product\Resource';
    public function toArray($request)
    {
        return $this->collection;
    }
}
