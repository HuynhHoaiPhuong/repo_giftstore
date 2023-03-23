<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

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
            'id_voucher' => $this->id_voucher,
            'code' => $this->code,
            'max_use' => $this->max_use,
            'max_price' => $this->max_price,
            'percent_price' => $this->percent_price,
            'min_price_pay' => $this->min_price_pay,
            'description' => $this->description,
            'status' => $this->status,
            'date_start' => Carbon::parse($this->date_start,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'date_end' => Carbon::parse($this->date_end,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
          ];
    }
}
