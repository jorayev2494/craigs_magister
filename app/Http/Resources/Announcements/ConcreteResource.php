<?php

namespace App\Http\Resources\Announcements;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class ConcreteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return array_merge(
                    Arr::except(parent::toArray($request), ['id', 'announcement_id']), 
                    [
                        'created_at' => $this->created_at->diffForHumans(),
                        'updated_at' => $this->updated_at->diffForHumans()
                    ]
                );
    }
}
