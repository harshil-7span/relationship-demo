<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\Resource as UserResource;

class Resource extends JsonResource
{
    public function toArray($request)
    {
        $data = [
            "id" => $this->id,
            "user_id" => $this->user_id,
            "review" => $this->review,
            "reviewable_type" => $this->reviewable_type,
            "reviewable_id" => $this->reviewable_id
        ];
        $data['reviewable'] = $this->whenLoaded('reviewable');
        $data['user'] = new UserResource($this->whenLoaded('user'));

        return $data;
    }
}
