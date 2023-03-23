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
            'rank' => new RankResource($this->rank),
            'product_cat' => new ProductCatResource($this->productCat),
            'percent_price' => $this->percent_price,
            'status' => $this->status
        ];
    }
}
