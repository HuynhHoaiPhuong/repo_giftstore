<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id_user'=>$this->id_user,
            'role'=> new RoleResource($this -> role),
            'username'=>$this->username,
            'fullname'=>$this->fullname,
            'photo'=>$this->photo,
            'gender'=>$this->gender,
            'birthday'=>$this->birthday,
            'phone'=>$this->phone,
            'address'=>$this->address,
            'status'=>$this->status
        ];
    }
}
