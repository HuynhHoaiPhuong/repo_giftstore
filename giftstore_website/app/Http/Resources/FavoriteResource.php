<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FavoriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_favorite' => $this->id_favorite,
            'product'=> new ProductResource($this->product),
            'member'=> new MemberResource($this->member),
            'status' => $this->status,
        ];
    }
}
