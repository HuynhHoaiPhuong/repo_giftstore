<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class StaticPageResource extends JsonResource
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
            'id_static'=>$this->id_static,
            'name'=>$this->name,
            'slug'=>$this->slug,
            'photo'=>$this->photo,
            'numb'=>$this->numb,
            'description'=>$this->description,
            'content'=>$this->content,
            'type'=>$this->type,
            'status'=>$this->status,
            'created_at'=>Carbon::parse($this->created_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'updated_at'=>Carbon::parse($this->updated_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s')
        ];
    }
}
