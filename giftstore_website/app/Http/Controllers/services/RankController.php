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
    public function getAllRankByStatus($status){
        $ranks = Rank::where(['status', $status])
        ->orderBy('score_level', 'asc')->get();

         if($ranks->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   

        return Payload::toJson(RankResource::collection($ranks), "Request Successfully", 200);
    }
    public function saveRank(Request $request){
        $ranks = new Rank();
        $ranks->fill([
            'id_rank' =>  "RANK".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'rank_name' => $request->rank_name, 
            'score_level' => $request->score_level, 
        ]);
        if($ranks->save() == 1){
            $ranks = Rank::where('id_rank', $ranks->id_rank)->first();
            return Payload::toJson(new RankResource($ranks), "Create Successfully", 201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function updateRank(Request $request){
        $result = Rank::where('id_rank', $request->id_rank)
        ->update([
            'rank_name' => $request->rank_name, 
            'score_level'=> $request->score_level
        ]);  

        if($result == 1){
            $ranks = Rank::where('id_rank', $request->id_rank)->first();
            return Payload::toJson(new RankResource($ranks), "Update Successfully", 202);
        }

        return Payload::toJson(null, "Cannot Update", 500);
    }

    public function removeRank(Request $request){
        $result = Rank::where('id_rank', $request->id_rank)
        ->update(['status' => $request->status]);

        if($result == 1){
            $ranks = Rank::where('id_rank', $request->id_rank)->first();
            return Payload::toJson(new RankResource($ranks), "Remove Successfully", 202);
        }

        return Payload::toJson(null, "Cannot Update", 500);
    }
}
