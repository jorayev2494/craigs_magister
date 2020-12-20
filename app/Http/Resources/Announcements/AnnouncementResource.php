<?php

namespace App\Http\Resources\Announcements;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\RecentActivityResource;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class AnnouncementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'front_end_price' => $this->front_end_price,
            'price_per' => $this->price_per,
            'is_price_contractual' => $this->is_price_contractual,
            'status' => $this->status,
            'status_cancelled_description' => $this->status_cancelled_description,
            'status_blocked_description' => $this->status_blocked_description,
            'rate' => $this->rate,
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'creator' => UserResource::make($this->whenLoaded('creator')),
            'concrete' => ConcreteResource::make($this->whenLoaded('concrete')),
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
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
            // 'recent_activities' => $this->whenLoaded('recentActivities', RecentActivityResource::collection($this->recentActivities)),
        ];
    }
}
