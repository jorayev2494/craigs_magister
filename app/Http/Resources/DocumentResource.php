<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentResource extends JsonResource
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
            'type' => $this->type,
            'path' => "/storage{$this->path}",
            'name' => $this->name,
            'user_file_name' => $this->user_file_name,
            'size' => $this->size,
            'mime_type' => $this->mime_type
        ];
    }
}
