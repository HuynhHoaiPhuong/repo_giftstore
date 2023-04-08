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
    public function getAllWareHouseByStatus($status){
        $wareHouses = WareHouse::where('status', $status)->get();

        if($wareHouses->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   

        return Payload::toJson(WareHouseResource::collection($wareHouses), "Request Successfully", 200);
    }

    public function store(Request $request){
        $wareHouses = new WareHouse();
        $wareHouses->fill([
            'id_warehouse' => "WAREHOUSE".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'name' => $request->name,
            'address' => $request->address,
        ]);

        $wareHouses->save();
        $wareHouses = WareHouse::where('id_warehouse', $wareHouses->id_warehouse)->first();
        
        return Payload::toJson(new WareHouseResource($wareHouses), "Create Successfully", 201);
    }

    public function update(Request $request){
        $result = WareHouse::where('id_warehouse', $request->id_warehouse)->update([
            'name' => $request->name, 
            'address' => $request->address,
        ]);  

        if($result == 1){
            $wareHouses = WareHouse::where('id_warehouse', $request->id_warehouse)->first();
            return Payload::toJson(new WareHouseResource($wareHouses), "Update Successfully", 202);
        }
        
        return Payload::toJson(null, "Cannot Update", 500);
    }

    public function destroy(Request $request){
        $result = WareHouse::where('id_warehouse', $request->id_warehouse)
        ->update(['status' => $request->status]);

        if($result == 1){
            $wareHouses = WareHouse::where('id_warehouse', $request->id_warehouse)->first();
            return Payload::toJson(new WareHouseResource($wareHouses), "Remove Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Update", 500);
    }
}
