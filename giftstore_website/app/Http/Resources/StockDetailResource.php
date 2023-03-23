<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
class StockDetailResource extends JsonResource
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
            'id_stock_detail' => $this->id_stock_detail,
            'stock' => new StockResource($this->stock),
            'product' => new ProductResource($this->product),
            'quantity' => $this->quantity,
            'price_pay' => $this->price_pay,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'updated_at' => Carbon::parse($this->updated_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
        ];
    }
}
