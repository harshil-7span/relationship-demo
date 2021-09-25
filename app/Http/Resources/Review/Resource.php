<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\Resource as UserResource;
use App\Traits\ResourceFilterable;

class Resource extends JsonResource
{
    use ResourceFilterable;
    protected $model = 'Review';

    public function toArray($request)
    {
        $data =  $this->fields();
        $data['reviewable'] = $this->whenLoaded('reviewable');
        $data['user'] = new UserResource($this->whenLoaded('user'));

        return $data;
    }
}
