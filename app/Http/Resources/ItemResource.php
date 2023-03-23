<?php

namespace App\Http\Resources;

use App\Utils\Facades\Helpers;
use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
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
            'price'         => $this->price,
            'category'      => new CategoryResource($this->whenLoaded('category'))
        ];
    }
}
