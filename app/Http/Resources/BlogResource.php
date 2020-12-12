<?php

namespace App\Http\Resources;

use App\Http\Resources\Admin\AdminResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'category' => $this->whenLoaded('category', BlogCategoryResource::make($this->category)),
            'media_content' => $this->whenLoaded(
                                                'mediaContent', 
                                                DocumentResource::make($this->mediaContent),
                                                $this->getDefaultMediaContent()
                                            ),
            'user' => $this->whenLoaded('user', UserResource::make($this->user)),
            'admin' => $this->whenLoaded('admin', AdminResource::make($this->admin)),
            'description' => $this->description,
            'status' => $this->status,
            'blocked_description' => $this->blocked_description,
            'publish' => $this->publish,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
