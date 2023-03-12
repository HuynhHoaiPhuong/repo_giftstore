<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
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
            'id_discount' => $this->id_discount,
            'id_rank' => new RankResource($this->id_rank),
            'id_cat' => new ProductCatResource($this->id_cat),
            'payment_price' => $this->payment_price,
            'status' => $this->status
        ];
    }
}
