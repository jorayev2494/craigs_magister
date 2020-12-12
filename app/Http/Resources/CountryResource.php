<?php

namespace App\Http\Resources;

use App\Models\Interfaces\IBaseModel;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
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
            'slug' => $this->slug,
            'code' => $this->code,
            'iso_code' => $this->iso_code,
            // 'unblock_date' => $this->unblock_date,
            'created_at' => $this->created_at->format(IBaseModel::FORMAT_VALIDATE),
            'updated_at' => $this->updated_at->format(IBaseModel::FORMAT_VALIDATE),
        ];
    }
}
