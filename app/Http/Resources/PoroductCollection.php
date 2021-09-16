<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PoroductCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\ProductResource';
    public function toArray($request)
    {
        return $this->collection;
    }
}
