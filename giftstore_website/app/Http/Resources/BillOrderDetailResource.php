<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BillOrderDetailResource extends JsonResource
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
            'id_bill_order' => new BillOrderResource($this->id_bill_order),
            'id_product' => new ProductResource($this->id_product),
            'price_order' => $this->price_order,
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'status' => $this->status,
        ];
    }
}
