<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rank;
use Carbon\Carbon;
use App\Http\Resources\RankResource;
use App\Http\Payload;

class RankController extends Controller
{
    public function getAllRankByStatus($status)
    {
        $ranks = Rank::where([
                ['status', $status]
            ])->orderBy('point','ASC')->get();
         if($ranks->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(RankResource::collection($ranks),"Request Successfully",200);
    }
    public function saveRank(Request $req)
    {
        $rank = new Rank();
        $rank->fill(
            [
                'rank_id' =>  $req -> rank_id,
                'rank_name' => $req->rank_name,
                'point' => $req->point,
            ]
        );
        $rank->save();
        $rank = Rank::where('rank_id',$rank->rank_id)->first();
        return Payload::toJson(new RankResource($rank),"Create Successfully",201);
    }

    public function updateRank(Request $req)
    {
        $result = Rank::where('rank_id', $req -> rank_id)
            //Key Value // Get e by array...
            ->update(
                [
                    'rank_name' => $req->rank_name,
                    'point'=> $req->point
                ],
            );  
        if($result == 1){
            $rank = Rank::where('rank_id',$req->rank_id)->first();
            return Payload::toJson(new RankResource($rank),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function removeRank(Request $req)
    {
        $result = Rank::where('rank_id', $req -> rank_id)
             ->update(['status'=> $req -> status]);
        if($result == 1)
        {
            $rank = Rank::where('rank_id',$req->rank_id)->first();
            return Payload::toJson(new RankResource($rank),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
