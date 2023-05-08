<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id_post'=>$this->id_post,
            'topic' => new TopicResource($this->topic),
            'name'=>$this->name,
            'photo'=>$this->photo,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'content'=>$this->content,
            'status'=>$this->status,
            'created_at'=>Carbon::parse($this->created_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'updated_at'=>Carbon::parse($this->updated_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s')
        ];
    }
}
