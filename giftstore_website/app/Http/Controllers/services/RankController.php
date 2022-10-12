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
                'id_rank' =>  $req -> id_rank,
                'rank_name' => $req->rank_name,
                'point' => $req->point,
            ]
        );
        $rank->save();
        $rank = Rank::where('id_rank',$rank->id_rank)->first();
        return Payload::toJson(new RankResource($rank),"Create Successfully",201);
    }

    public function updateRank(Request $req)
    {
        $result = Rank::where('id_rank', $req -> id_rank)
            //Key Value // Get e by array...
            ->update(
                [
                    'rank_name' => $req->rank_name,
                    'point'=> $req->point
                ],
            );  
        if($result == 1){
            $rank = Rank::where('id_rank',$req->id_rank)->first();
            return Payload::toJson(new RankResource($rank),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function removeRank(Request $req)
    {
        $result = Rank::where('id_rank', $req -> id_rank)
             ->update(['status'=> $req -> status]);
        if($result == 1)
        {
            $rank = Rank::where('id_rank',$req->id_rank)->first();
            return Payload::toJson(new RankResource($rank),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
