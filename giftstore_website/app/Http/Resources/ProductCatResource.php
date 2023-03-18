<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCatResource extends JsonResource
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
            'id_product_cat'=>$this->id_product_cat,
            'product_list'=> new ProductListResource($this -> productlist),
            'name'=>$this->name,
            'slug'=>$this->slug,
            'photo'=>$this->photo,
            'numb'=>$this->numb,
            'description'=>$this->description,
            'status'=>$this->status,
            'created_at'=>Carbon::parse($this->created_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'updated_at'=>Carbon::parse($this->updated_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s')
        ];
    }
}
