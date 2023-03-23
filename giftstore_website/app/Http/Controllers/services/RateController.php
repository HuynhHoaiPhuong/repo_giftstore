<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rate;
use App\Http\Payload;
use App\Http\Resources\RateResource;
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
            'id_rate' => $request->id_rate, 
            'id_member' => $request->id_member, 
            'id_product' => $request->id_product, 
            'star' => $request->star, 
            'comment' => $request->comment, 
            'numb_like' => $request->numb_like, 
        ]);
        if($rates->save() == 1){
            $rates = Rate::where('id_rate', $rates->id_rate)->first();
            return Payload::toJson(new RateResource($rates), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function update(Request $request)
    {
        $rates = Rate::where('id_rate', $request->id_rate)
        ->update([
            'id_member' => $request->id_member, 
            'id_product' => $request->id_product, 
            'star' => $request->star, 
            'comment' => $request->comment, 
            'numb_like' => $request->numb_like,
        ]);
        if($rates == 1){
            return Payload::toJson($rates, 'Completed', 200);
        }
        return Payload::toJson($rates, 'Uncompleted', 500);
    }
    public function destroy($id)
    {
        $rates = Rate::where('id_rate', $id)->first();
        if($rates)
        {
            $rates = Rate::where('id_rate', $id)->delete();
            return Payload::toJson(new RateResource($rates), "Remove Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Deleted!", 500);
    }
}