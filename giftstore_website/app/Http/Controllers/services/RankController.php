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
    public function getAllRankByStatus($status)
    {
        $ranks = Rank::where(['status', $status])
        ->orderBy('score_level', 'asc')->get();
        if($ranks->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   
        return Payload::toJson(RankResource::collection($ranks), "OK", 200);
    }
    public function saveRank(Request $request)
    {
        $rank = new Rank();
        $rank->fill([
            'id_rank' =>  "RANK".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'rank_name' => $request->rank_name, 
            'score_level' => $request->score_level, 
        ]);
        if($rank->save() == 1){
            $rank = Rank::where('id_rank', $rank->id_rank)->first();
            return Payload::toJson(new RankResource($rank), "Created!", 201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function updateRank(Request $request)
    {
        $result = Rank::where('id_rank', $request->id_rank)
        ->update([
            'rank_name' => $request->rank_name, 
            'score_level'=> $request->score_level
        ]);  
        if($result == 1){
            $rank = Rank::where('id_rank', $request->id_rank)->first();
            return Payload::toJson(new RankResource($rank), "Completed", 201);
        }
        return Payload::toJson(null, "Uncompleted", 500);
    }

    public function removeRank(Request $request)
    {
        $result = Rank::where('id_rank', $request->id_rank)
        ->update(['status' => $request->status]);
        if($result == 1){
            $ranks = Rank::where('id_rank', $request->id_rank)->first();
            return Payload::toJson(new RankResource($ranks), "Completed", 201);
        }
        return Payload::toJson(null, "Uncompleted", 500);
    }
}
