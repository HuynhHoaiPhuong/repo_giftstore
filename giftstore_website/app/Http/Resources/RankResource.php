<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class RankResource extends JsonResource
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
            'id_rank' => $this->id_rank,
            'rank_name' => $this->rank_name,
            'score_level' => $this->score_level,
            'status' => $this->status,
            'created_at' => Carbon::parse($this->created_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
            'updated_at' => Carbon::parse($this->updated_at,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),
        ];
    }
}
