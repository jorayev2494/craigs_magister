<?php

namespace App\Http\Resources;

use App\Http\Resources\Announcements\AnnouncementResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'rating' => $this->rating,
            'creator' => UserResource::make($this->whenLoaded('creator')),
            'user' => UserResource::make($this->whenLoaded('user')),
            'announcement' => AnnouncementResource::make($this->whenLoaded('announcement')),
            'created_at' => $this->created_at->format('M d, Y'),
            'updated_at' => $this->updated_at->format('M d, Y'),
        ];
    }
}
