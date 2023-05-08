<?php

namespace App\Http\Resources;
use Carbon\Carbon;
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
            'id_bill' => $this->id_bill,
            'member' => new MemberResource($this->member),
            'voucher' => new VoucherResource($this->voucher),
            'payment' => new PaymentResource($this->payment),
            'total_quantity' => $this->total_quantity,
            'total_price' => $this->total_price,
            'order_date' => Carbon::parse($this->order_date,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'date_of_payment' => Carbon::parse($this->date_of_payment,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'status' => $this->status,
        ];
    }
}