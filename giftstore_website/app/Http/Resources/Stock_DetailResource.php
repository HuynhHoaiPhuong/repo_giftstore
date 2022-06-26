<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Stock_DetailResource extends JsonResource
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
            'id' => $this->id,
            'id_stock'=> new ProductResource($this->id_product),
            'id_product'=> new ProductResource($this->id_product),
            'quantity' => $this->quantity,
            'price_pay' => $this->price_pay,
            'total_price' => $this->total_price,
            'date_created' => Carbon::parse($this->date_created,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'date_updated' => Carbon::parse($this->date_updated,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'status' => $this->status,
        ];
    }
}
