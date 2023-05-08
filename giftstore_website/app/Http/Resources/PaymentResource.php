<?php

namespace App\Http\Resources\services;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'id_payment' => $this->id_payment,
            'photo' => $this->photo,
            'name' => $this->name,
            'status' => $this->status,
        ];
    }
}
