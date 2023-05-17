<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WareHouse;
use App\Http\Resources\WareHouseResource;
use App\Http\Payload;
use Carbon\Carbon;

class WarehouseController extends Controller
{
    public function getAllWareHouseByStatus($status)
    {
        $warehouses = WareHouse::where('status', $status)->get();
        if($warehouses->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   
        return Payload::toJson(WareHouseResource::collection($warehouses), "OK", 200);
    }

    public function saveWarehouse(Request $request)
    {
        $warehouse = new WareHouse();
        $warehouse->fill([
            'id_warehouse' => "WAREHOUSE".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'name' => $request->name,
            'address' => $request->address,
        ]);
        if($warehouse->save() == 1){
            $warehouse = WareHouse::where('id_warehouse', $warehouse->id_warehouse)->first();
            return Payload::toJson(new WareHouseResource($warehouse), "Created!", 201);
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
            $warehouse = WareHouse::where('id_warehouse', $request->id_warehouse)->first();
            return Payload::toJson(new WareHouseResource($warehouse), "Completed", 201);
        }
        return Payload::toJson(null, "UnCompleted", 500);
    }

    public function removeWarehouse(Request $request){
        $result = WareHouse::where('id_warehouse', $request->id_warehouse)
        ->update(['status' => $request->status]);
        if($result == 1){
            $warehouse = WareHouse::where('id_warehouse', $request->id_warehouse)->first();
            return Payload::toJson(new WareHouseResource($warehouse), "Completed", 202);
        }
        return Payload::toJson(null, "UnCompleted", 500);
    }
}

