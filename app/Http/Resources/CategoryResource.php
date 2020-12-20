<?php

namespace App\Http\Resources;

use App\Models\Admin;
use App\Models\Interfaces\IBaseModel;
use App\Services\Base\Interfaces\IBaseAppGuards;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        // dd($this);
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'model' => $this->when(auth()->guard(IBaseAppGuards::ADMIN)->check(), $this->model),
            'unblock_date' => $this->when(auth()->guard(IBaseAppGuards::ADMIN)->check(), $this->unblock_date),
            'count_announcements' => $this->when($this->count_announcements, $this->count_announcements),
            'created_at' => $this->created_at->format(IBaseModel::FORMAT_VALIDATE),
            'updated_at' => $this->updated_at->format(IBaseModel::FORMAT_VALIDATE),
        ];
    }
}
