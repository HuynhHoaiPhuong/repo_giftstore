<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivityHistoryResource extends JsonResource
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
            'id_activity_history' => $this->id_activity_history,
            'id_user' => new UserResource($this->id_member),
            'activity' => $this->activity,
            'date_created' => Carbon::parse($this->date_created,'Asia/Ho_Chi_Minh')->format('Y-m-d h:i:s'),    
            'type' => $this->type
        ];
    }
}
