<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BillDetailResource extends JsonResource
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
            'id_bill_detail' => $this->id_bill_detail,
            'bill' => new BillResource($this->bill),
            'product' => new ProductResource($this->product),
            'price' => $this->price,
            'quantity' => $this->quantity,
            'discount' => $this->discount,
            'status' => $this->status,
        ];
    }
}
