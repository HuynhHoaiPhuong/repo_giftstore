<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WarehouseDetail;
use App\Http\Resources\WarehouseDetailResource;
use App\Http\Payload;
use Carbon\Carbon;

class WarehouseDetailController extends Controller
{
    public function getWarehouseDetailByIdWarehouseDetail($id_warehouse_detail){
        $warehouseDetail = WarehouseDetail::where('id_warehouse_detail', $id_warehouse_detail)->first();
        if($warehouseDetail==null)
            return Payload::toJson(null, "Data Not Found", 404);   
        return Payload::toJson(new WarehouseDetailResource($warehouseDetail), "OK", 200);
    }

    public function getWarehouseDetailByIdProduct($id_product){
        $warehouseDetail = WarehouseDetail::where('id_product', $id_product)->first();
        if($warehouseDetail==null)
            return Payload::toJson(null, "Data Not Found", 404);   
        return Payload::toJson(new WarehouseDetailResource($warehouseDetail), "OK", 200);
    }

    public function getAllWarehouseDetailByIdWarehouse($id_warehouse){
        $warehouseDetails = WarehouseDetail::where('id_warehouse', $id_warehouse)->get();
        if($warehouseDetails->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   
        return Payload::toJson(WarehouseDetailResource::collection($warehouseDetails), "OK", 200);
    }

    public function getAllWarehouseDetailByStatus($status){
        $warehouseDetails = WarehouseDetail::where('status', $status)->get();
        if($warehouseDetails->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   
        return Payload::toJson(WarehouseDetailResource::collection($warehouseDetails), "OK", 200);
    }

    public function saveWarehouseDetail(Request $request){
        $warehouseDetail = new WarehouseDetail();
        $checkWarehouse = WarehouseDetail::select('id_warehouse_detail', 'quantity')->where('id_warehouse', $request->id_warehouse)->where('id_product', $request->id_product)->first();
        if($checkWarehouse){
            $result = WarehouseDetail::where('id_warehouse_detail', $checkWarehouse->id_warehouse_detail)
            ->update([
                'quantity' => (int)$checkWarehouse->quantity + (int)$request->quantity,
                'total_price' => ((int)$checkWarehouse->quantity + (int)$request->quantity)*(int)$request->price_pay,
            ]);  
            if($result == 1){
                $warehouseDetail = WarehouseDetail::where('id_warehouse_detail', $checkWarehouse->id_warehouse_detail)->first();
                return Payload::toJson(new WarehouseDetailResource($warehouseDetail), "Completed", 202);
            }
            return Payload::toJson(null, "UnCompleted", 500);
        }
        $warehouseDetail->fill([
            'id_warehouse_detail' => "WAREDETAIL".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'id_warehouse' => $request->id_warehouse,
            'id_product' => $request->id_product,
            'quantity' => $request->quantity,
            'price_pay' => $request->price_pay,
            'total_price' => $request->total_price,
        ]);
        if($warehouseDetail->save() == 1){
            $warehouseDetail = WarehouseDetail::where('id_warehouse_detail', $warehouseDetail->id_warehouse_detail)->first();
            return Payload::toJson(new WarehouseDetailResource($warehouseDetail), "Completed", 201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }

    public function updateWarehouseDetail(Request $request){
        $result = WarehouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)
        ->update([
            'price_pay' => $request->price_pay,
            'total_price' => $request->total_price,
        ]);  
        if($result == 1){
            $warehouseDetail = WarehouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)->first();
            return Payload::toJson(new WarehouseDetailResource($warehouseDetail), "Completed", 202);
        }
        return Payload::toJson(null, "UnCompleted", 500);
    }

    public function updateQuantityWarehouseDetail(Request $request){
        $result = WarehouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)
        ->update([
            'quantity' => $request->quantity,
            'total_price' => $request->total_price,
        ]);  
        if($result == 1){
            $warehouseDetail = WarehouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)->first();
            return Payload::toJson(new WarehouseDetailResource($warehouseDetail), "Completed", 202);
        }
        return Payload::toJson(null, "UnCompleted", 500);
    }

    public function removeWarehouseDetail(Request $request){
        $result = WarehouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)
        ->update(['status' => $request->status]);
        if($result == 1){
            $warehouseDetail = WarehouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)->first();
            return Payload::toJson(new WarehouseDetailResource($warehouseDetail), "Completed", 202);
        }
        return Payload::toJson(null, "UnCompleted", 500);
    }
}
