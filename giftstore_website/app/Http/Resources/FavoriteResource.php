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
            'id_product'=> new ProductResource($this->id_product),
            'id_member'=> new MemberResource($this->id_member),
            'status' => $this->status
        ];
    }
}
