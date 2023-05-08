<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
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
            'id_photo'=>$this->id_photo,
            'numerical_order'=>$this->numerical_order,
            'name'=>$this->name,
            'photo'=>$this->photo,
            'link'=>$this->link,
            'type'=>$this->type,
            'status'=>$this->status,
            'created_at'=>Carbon::parse($this->created_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'updated_at'=>Carbon::parse($this->updated_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s')
        ];
    }
}
