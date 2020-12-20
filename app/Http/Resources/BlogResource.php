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
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => BlogCategoryResource::make($this->whenLoaded('category')),
            'media_content' => $this->when(
                $this->whenLoaded('mediaContent'), 
                DocumentResource::make($this->whenLoaded('mediaContent'), 
                $this->getDefaultMediaContent())
            ),
            'user' => UserResource::make($this->whenLoaded('user')),
            'admin' => AdminResource::make($this->whenLoaded('admin')),
            'description' => $this->description,
            'status' => $this->status,
            'blocked_description' => $this->blocked_description,
            'publish' => $this->publish,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
        ];
    }
}
