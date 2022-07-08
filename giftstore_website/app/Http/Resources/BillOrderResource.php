<?php

namespace App\Http\Resources;
use Carbon\Carbon;
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
            'id' => $this->id,
            'id_producer' => new ProducerResource($this->id_producer),
            'id_user' => new UserResource($this->id_user),
            'id_stock' => new StockResource($this->id_stock),
            'quantity' => $this->quantity,       
            'total_price' => $this->total_price,
            'date_order' => Carbon::parse($this->date_order,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),   
            'status' => $this->status,
        ];
    }
}