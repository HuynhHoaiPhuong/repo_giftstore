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
            'id_bill_order_detail' => $this->id_bill_order_detail,
            'bill_order' => new BillOrderResource($this->billOrder),
            'product' => new ProductResource($this->product),
            'price_order' => $this->price_order,
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'status' => $this->status
        ];
    }
}