<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
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
            'id_rate' => $this->id_rate,
            'id_member' => new MemberResource($this->id_member),
            'id_product' => new ProductResource($this->id_product),
            'star' => $this->star,
            'comment' => $this->comment,
            'numb_like' => $this->numb_like,
            'date_created' => Carbon::parse($this->date_created,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'), 
            'status' => $this->status
        ];
    }
}
