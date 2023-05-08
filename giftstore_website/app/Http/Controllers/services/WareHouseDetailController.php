<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WareHouseDetail;
use App\Http\Resources\WareHouseDetailResource;
use App\Http\Payload;
use Carbon\Carbon;

class WareHouseDetailController extends Controller
{
    public function getAllWareHouseDetailByStatus($status){
        $wareHouseDetail = WareHouseDetail::where('status', $status)->get();
        if($wareHouseDetail->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   
        return Payload::toJson(WareHouseDetailResource::collection($wareHouseDetail), "OK", 200);
    }

    public function saveWarehouseDetail(Request $request){
        $wareHouseDetail = new WareHouseDetail();
        $wareHouseDetail->fill([
            'id_warehouse_detail' => "WAREDETAIL".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'id_warehouse' => $request->id_warehouse,
            'id_product' => $request->id_product,
            'price_pay' => $request->price_pay,
            'total_price' => $request->total_price,
        ]);
        if($wareHouseDetail->save() == 1){
            $wareHouseDetail = WareHouseDetail::where('id_warehouse_detail', $wareHouseDetail->id_warehouse_detail)->first();
            return Payload::toJson(new WareHouseDetailResource($wareHouseDetail), "Completed", 201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function updateWarehouseDetail(Request $request){
        $result = WareHouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)
        ->update([
            'id_warehouse' => $request->id_warehouse,
            'id_product' => $request->id_product,
            'price_pay' => $request->price_pay,
            'total_price' => $request->total_price,
        ]);  
        if($result == 1){
            $wareHouseDetail = WareHouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)->first();
            return Payload::toJson(new WareHouseDetailResource($wareHouseDetail), "Completed", 202);
        }
        return Payload::toJson(null, "UnCompleted", 500);
    }

    public function removeWarehouseDetail(Request $request){
        $result = WareHouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)
        ->update(['status' => $request->status]);
        if($result == 1){
            $wareHouseDetail = WareHouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)->first();
            return Payload::toJson(new WareHouseDetailResource($wareHouseDetail), "Completed", 202);
        }
        return Payload::toJson(null, "UnCompleted", 500);
    }
}
