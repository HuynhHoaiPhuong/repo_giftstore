<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'id'=>$this->id,
            'product_list'=> new ProductListResource($this -> product_list),
            'product_cat'=> new ProductCatResource($this -> product_cat),
            'name'=>$this->name,
            'slug'=>$this->slug,
            'photo'=>$this->photo,
            'numb'=>$this->numb,
            'description'=>$this->description,
            'price'=>$this->price,
            'code'=>$this->code,
            'status'=>$this->status,
            'date_created'=>Carbon::parse($this->created_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'date_updated'=>Carbon::parse($this->updated_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s')
        ];
    }
}
