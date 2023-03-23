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
            'producer' => new ProducerResource($this->producer),
            'user' => new UserResource($this->user),
            'stock' => new StockResource($this->stock),
            'quantity' => $this->quantity,       
            'total_price' => $this->total_price,
            'status' => $this->status,
            'date_order' => Carbon::parse($this->date_order,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),   
        ];
    }
}