<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'avatar' => $this->avatar,
            'email' => $this->email,
            'phone' => $this->phone,
            'rate' => $this->rate,
            'email_confirmed' => $this->email_confirmed,
            'active' => $this->active,
            'location' => [
                'country' => $this->country->slug,
                'city' => $this->city->slug,
            ],
            'unblock_date' => $this->unblock_date,
            'is_verified' => $this->is_verified,
            'about' => $this->about,
            'last_login' => $this->last_login,
            'last_activity' => $this->last_activity,
            'created_at' => $this->created_at,
            'full_name' => $this->full_name
        ];
    }
}
