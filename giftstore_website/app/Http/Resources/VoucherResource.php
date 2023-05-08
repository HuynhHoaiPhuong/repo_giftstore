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
            'name' => $this->name,
            'code' => $this->code,
            'number_of_uses' => $this->number_of_uses,
            'percent_price' => $this->percent_price,
            'max_price' => $this->max_price,
            'min_price' => $this->min_price,
            'description' => $this->description,
            'start_day' => Carbon::parse($this->start_day,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'expiration_date' => Carbon::parse($this->expiration_date,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'status' => $this->status,
          ];
    }
}
