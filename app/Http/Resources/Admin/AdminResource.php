<?php

namespace App\Http\Resources\Admin;

use App\Http\Resources\CityResource;
use App\Http\Resources\CountryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'avatar' => '/storage' . $this->avatar,
            // 'role' => $this->whenLoaded('role', $this->role->slug),
            // 'location' => $this->whenLoaded('country', [
            //     'country' => $this->country->slug,
            //     'city' => $this->city->slug,
            // ]),
            'email_confirmed' => $this->email_confirmed,
            'active' => $this->active,
            'last_login' => $this->last_login,
            'last_activity' => $this->last_activity,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
