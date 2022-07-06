<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
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
            'code' => $this->code,
            'max_use' => $this->max_use,
            'max_price' => $this->max_price,
            'percent_price' => $this->percent_price,
            'min_price_pay' => $this->min_price_pay,
            'description' => $this->description,
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'status' => $this->status,
          ];
    }
}
