<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ProductResource extends JsonResource
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
            'id_product' => $this->id_product,
            'category' => new CategoryResource($this->category),
            'provider' => new ProviderResource($this->provider),
            'numerical_order' => $this->numerical_order,
            'name' => $this->name,
            'code' => $this->code,
            'photo' => $this->photo,
            'price' => $this->price,
            'slug' => $this->slug,
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'updated_at' => Carbon::parse($this->updated_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
        ];
    }
}
