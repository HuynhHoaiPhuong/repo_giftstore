<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rate;
use App\Http\Resources\RateResource;
use App\Http\Payload;
use Carbon\Carbon;

class RateController extends Controller
{
    public function getAllRateByStatus($status)
    {
        $rates = Rate::where('status', $status)->get();
        if($rates->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(RateResource::collection($rates), 'OK', 200);
    }

    public function saveRate(Request $request)
    {
        $rate = new Rate();
        $rate->fill([
            'id_rate' => "RATE".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'id_member' => $request->id_member, 
            'id_product' => $request->id_product, 
            'number_of_stars' => $request->number_of_stars, 
            'comment' => $request->comment, 
            'likes' => $request->likes
        ]);

        if($rate->save() == 1){
            $rate = Rate::where('id_rate', $rate->id_rate)->first();
            return Payload::toJson(new RateResource($rate), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function updateRate(Request $request){
        $result = Rate::where('id_rate', $request->id_rate)
        ->update([
            'id_member' => $request->id_member, 
            'id_product' => $request->id_product, 
            'number_of_stars' => $request->number_of_stars, 
            'comment' => $request->comment, 
            'likes' => $request->likes, 
        ]);
        if($result == 1){
            $rate = Rate::where('id_rate',$request->id_rate)->first();
            return Payload::toJson(new RateResource($rate),'Completed',201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function removeRate(Request $request){
        $result = Rate::where('id_rate', $request->id_rate)
        ->update(['status' => $request->status]);
        if($result == 1){
            $rate = Rate::where('id_rate', $request->id_rate)->first();
            return Payload::toJson(new RateResource($rate), 'Completed',201);
        }
        return Payload::toJson(null, "Uncompleted", 500);
    }
}
