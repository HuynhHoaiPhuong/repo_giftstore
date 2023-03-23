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
            'member' => new MemberResource($this->member),
            'product' => new ProductResource($this->product),
            'star' => $this->star,
            'comment' => $this->comment,
            'numb_like' => $this->numb_like,
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
        ];
    }
}
