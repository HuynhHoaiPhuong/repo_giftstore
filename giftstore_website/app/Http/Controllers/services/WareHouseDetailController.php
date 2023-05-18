<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WareHouseDetail;
use App\Http\Resources\WareHouseDetailResource;
use App\Http\Payload;
use Carbon\Carbon;

class WarehouseDetailController extends Controller
{
    public function getAllWareHouseDetailByStatus($status){
        $warehouseDetails = WareHouseDetail::where('status', $status)->get();
        if($warehouseDetails->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   
        return Payload::toJson(WareHouseDetailResource::collection($warehouseDetails), "OK", 200);
    }

    public function saveWarehouseDetail(Request $request){
        $warehouseDetail = new WareHouseDetail();
        $warehouseDetail->fill([
            'id_warehouse_detail' => "WAREDETAIL".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'id_warehouse' => $request->id_warehouse,
            'id_product' => $request->id_product,
            'price_pay' => $request->price_pay,
            'total_price' => $request->total_price,
        ]);
        if($warehouseDetail->save() == 1){
            $warehouseDetail = WareHouseDetail::where('id_warehouse_detail', $warehouseDetail->id_warehouse_detail)->first();
            return Payload::toJson(new WareHouseDetailResource($warehouseDetail), "Completed", 201);
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
            $warehouseDetail = WareHouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)->first();
            return Payload::toJson(new WareHouseDetailResource($warehouseDetail), "Completed", 202);
        }
        return Payload::toJson(null, "UnCompleted", 500);
    }

    public function removeWarehouseDetail(Request $request){
        $result = WareHouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)
        ->update(['status' => $request->status]);
        if($result == 1){
            $warehouseDetail = WareHouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)->first();
            return Payload::toJson(new WareHouseDetailResource($warehouseDetail), "Completed", 202);
        }
        return Payload::toJson(null, "UnCompleted", 500);
    }
}

