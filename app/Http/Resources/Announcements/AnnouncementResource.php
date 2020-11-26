<?php

namespace App\Http\Resources\Announcements;

use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AnnouncementResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'price_per' => $this->price_per,
            'is_price_contractual' => $this->is_price_contractual,
            'status' => $this->status,
            'status_cancelled_description' => $this->status_cancelled_description,
            'rate' => $this->rate,
            'category' => $this->whenLoaded('category', $this->category),
            'creator' => $this->whenLoaded('creator', UserResource::make($this->creator)),
            'concrete' => $this->whenLoaded('concrete', $this->concrete),
            'location' => $this->whenLoaded('country', [
                'country' => $this->country->slug,
                'city' => $this->city->slug,
            ]),
            'location_google_latitude' => $this->location_google_latitude,
            'location_google_longitude' => $this->location_google_longitude,
            'images' => $this->images,
            'video' => $this->video,
            'viewed' => $this->viewed,
            'unblock_date' => $this->unblock_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
