<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'id_setting'=>$this->id_setting,
            'name'=>$this->name,
            'address'=>$this->address,
            'email'=>$this->email,
            'hotline'=>$this->hotline,
            'phone'=>$this->phone
        ];
    }
}
