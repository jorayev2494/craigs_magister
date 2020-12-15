<?php

namespace App\Http\Resources;

use App\Http\Resources\Admin\AdminResource;
use App\Http\Resources\Announcements\AnnouncementResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RecentActivityResource extends JsonResource
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
            'user' => $this->whenLoaded('user', UserResource::make($this->user)),
            'announcement' => $this->whenLoaded('announcement', AnnouncementResource::make($this->announcement)),
            'from_user' => $this->whenLoaded('fromUser', UserResource::make($this->user)),
            'admin' => $this->whenLoaded('admin', AdminResource::make($this->admin)),
            'status' => $this->status,
            'action' => $this->action,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
