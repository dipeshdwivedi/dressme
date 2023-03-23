<?php

namespace App\Http\Resources;

use App\Utils\Facades\Helpers;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'image'         => Helpers::getImageLink($this->image),
            'items'         => ItemResource::collection($this->whenLoaded('items'))
        ];
    }
}
