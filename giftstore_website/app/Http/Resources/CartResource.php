<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'id_cart'=>$this->id_cart,
            'member'=> new MemberResource($this -> member),
            'product'=> new ProductResource($this -> product),
            'quantity'=>$this->quantity,
            'price_pay'=>$this->price_pay
        ];
    }
}
