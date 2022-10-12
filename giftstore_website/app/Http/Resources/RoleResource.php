<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class RoleResource extends JsonResource
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
            'id_role'=>$this->id_role,
            'name'=>$this->name,
            'created_at'=>Carbon::parse($this->created_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'updated_at'=>Carbon::parse($this->updated_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'status'=>$this->status,
        ];
    }
}
