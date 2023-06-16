<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rank;
use App\Http\Resources\RankResource;
use App\Http\Payload;
use Carbon\Carbon;

class RankController extends Controller
{
    public function getAllRank()
    {
        $ranks = Rank::all();
        if($ranks->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(RankResource::collection($ranks), 'Request Successfully', 200);
    }

    public function getAllRankByStatus($status)
    {
        $ranks = Rank::where('status', $status)
        ->orderBy('score_level', 'desc')->get();
        if($ranks->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   
        return Payload::toJson(RankResource::collection($ranks), "OK", 200);
    }

    public function getRankById($id_rank)
    {
        $rank = Rank::where('id_rank',$id_rank)->first();
        if(!$rank)
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(new RankResource($rank),'Request Successfully',200);
    }

    public function saveRank(Request $requestuest)
    {
        $rank = new Rank();
        $rank->fill([
            'id_rank' =>  "RANK".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'rank_name' => $requestuest->rank_name, 
            'score_level' => $requestuest->score_level, 
        ]);
        if($rank->save() == 1){
            $rank = Rank::where('id_rank', $rank->id_rank)->first();
            return Payload::toJson(new RankResource($rank), "Created!", 201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function updateRank(Request $requestuest)
    {
        $result = Rank::where('id_rank', $requestuest->id_rank)
        ->update([
            'rank_name' => $requestuest->rank_name, 
            'score_level'=> $requestuest->score_level
        ]);  
        if($result == 1){
            $rank = Rank::where('id_rank', $requestuest->id_rank)->first();
            return Payload::toJson(new RankResource($rank), "Completed", 201);
        }
        return Payload::toJson(null, "Uncompleted", 500);
    }

    public function removeRank(Request $requestuest)
    {
        $result = Rank::where('id_rank', $requestuest->id_rank)
        ->update(['status' => $requestuest->status]);
        if($result == 1){
            $ranks = Rank::where('id_rank', $requestuest->id_rank)->first();
            return Payload::toJson(new RankResource($ranks), "Completed", 201);
        }
        return Payload::toJson(null, "Uncompleted", 500);
    }
    
    public function deleteRank(Request $request)
    {
        if($request->id_rank){
            $result = Rank::where('id_rank', $request->id_rank)->delete();
            if($result) return Payload::toJson(true, "Remove Successfully", 202);
        }
        return Payload::toJson(false, "Cannot Deleted!", 500);
    }

    public function clearRank(Request $request)
    {
        $result = Rank::where('status', 'disabled')->delete();
        if($result) return Payload::toJson(true, "Remove Successfully", 202);
        return Payload::toJson(false, "Cannot Deleted!", 500);
    }
}
