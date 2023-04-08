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
        return Payload::toJson(RateResource::collection($rates), 'Ok', 200);
    }

    public function store(Request $request)
    {
        $rates = new Rate();
        $rates->fill([
            'id_rate' => "RATE".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'id_member' => $request->id_member, 
            'id_product' => $request->id_product, 
            'number_of_stars' => $request->number_of_stars, 
            'comment' => $request->comment, 
            'like' => $request->like, 
        ]);

        if($rates->save() == 1){
            $rates = Rate::where('id_rate', $rates->id_rate)->first();
            return Payload::toJson(new RateResource($rates), 'Completed', 201);
        }

        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function update(Request $request){
        $rates = Rate::where('id_rate', $request->id_rate)
        ->update([
            'id_member' => $request->id_member, 
            'id_product' => $request->id_product, 
            'number_of_stars' => $request->number_of_stars, 
            'comment' => $request->comment, 
            'like' => $request->like, 
        ]);

        if($rates == 1){
            return Payload::toJson($rates, 'Completed', 200);
        }

        return Payload::toJson($rates, 'Uncompleted', 500);
    }
    public function destroy(Request $request){
        $result = Rate::where('id_rate', $request->id_rate)
        ->update(['status' => $request->status]);

        if($result == 1){
            $rates = Rate::where('id_rate', $request->id_rate)->first();
            return Payload::toJson(new RateResource($rates), "Remove Successfully", 202);
        }

        return Payload::toJson(null, "Cannot Update", 500);
    }
}
