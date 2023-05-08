<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WareHouse;
use App\Http\Resources\WareHouseResource;
use App\Http\Payload;
use Carbon\Carbon;

class WareHouseController extends Controller
{
    public function getAllWareHouseByStatus($status)
    {
        $wareHouse = WareHouse::where('status', $status)->get();
        if($wareHouse->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   
        return Payload::toJson(WareHouseResource::collection($wareHouse), "OK", 200);
    }

    public function saveWarehouse(Request $request)
    {
        $wareHouse = new WareHouse();
        $wareHouse->fill([
            'id_warehouse' => "WAREHOUSE".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'name' => $request->name,
            'address' => $request->address,
        ]);
        if($wareHouse->save() == 1){
            $wareHouse = WareHouse::where('id_warehouse', $wareHouse->id_warehouse)->first();
            return Payload::toJson(new WareHouseResource($wareHouse), "Created!", 201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function updateWarehouse(Request $request){
        $result = WareHouse::where('id_warehouse', $request->id_warehouse)
        ->update([
            'name' => $request->name, 
            'address' => $request->address,
        ]);  
        if($result == 1){
            $wareHouse = WareHouse::where('id_warehouse', $request->id_warehouse)->first();
            return Payload::toJson(new WareHouseResource($wareHouse), "Completed", 201);
        }
        return Payload::toJson(null, "UnCompleted", 500);
    }

    public function removeWarehouse(Request $request){
        $result = WareHouse::where('id_warehouse', $request->id_warehouse)
        ->update(['status' => $request->status]);
        if($result == 1){
            $wareHouse = WareHouse::where('id_warehouse', $request->id_warehouse)->first();
            return Payload::toJson(new WareHouseResource($wareHouse), "Completed", 202);
        }
        return Payload::toJson(null, "UnCompleted", 500);
    }
}
