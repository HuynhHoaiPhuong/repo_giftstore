<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon; 

class BillOrderResource extends JsonResource
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
            'id_bill_order' => $this->id_bill_order,
            'provider' => new ProviderResource($this->provider),
            'payment' => new PaymentResource($this->payment),
            'user' => new UserResource($this->user),
            'warehouse' => new WarehouseResource($this->wareHouse),
            'total_quantity' => $this->quantity,       
            'total_price' => $this->total_price,
            'date_order' => Carbon::parse($this->date_order,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'date_of_payment' => Carbon::parse($this->date_of_payment,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'status' => $this->status,
        ];
    }
}
