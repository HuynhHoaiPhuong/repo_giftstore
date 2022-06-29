<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
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
            'id_member' => new ProducerResource($this->id_member),
            'code_voucher' => $this->code_voucher,
            'total_price' => $this->total_price,
            'total_quantity' => $this->total_quantity,
            'payment' => $this->payment,
            'date_order' => Carbon::parse($this->date_order,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),  
            'date_confirm' => Carbon::parse($this->date_confirm,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),  
            'status' => $this->status,
        ];
    }
}
