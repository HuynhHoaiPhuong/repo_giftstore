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
        $wareHouseDetails = WareHouseDetail::where('status', $status)->get();

        if($wareHouseDetails->isEmpty())
            return Payload::toJson(null, "Data Not Found", 404);   

        return Payload::toJson(WareHouseDetailResource::collection($wareHouseDetails), "Request Successfully", 200);
    }

    public function store(Request $request){
        $wareHouseDetails = new WareHouseDetail();
        $wareHouseDetails->fill([
            'id_warehouse_detail' => "WAREDETAIL".Carbon::now()->format('ymdhis').rand(1, 1000), 
            'id_warehouse' => $request->id_warehouse,
            'id_product' => $request->id_product,
            'price_pay' => $request->price_pay,
            'total_price' => $request->total_price,
        ]);

        $wareHouseDetails->save();
        $wareHouseDetails = WareHouseDetail::where('id_warehouse_detail', $wareHouseDetails->id_warehouse_detail)->first();
        
        return Payload::toJson(new WareHouseDetailResource($wareHouseDetails), "Create Successfully", 201);
    }

    public function update(Request $request){
        $result = WareHouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)->update([
            'id_warehouse' => $request->id_warehouse,
            'id_product' => $request->id_product,
            'price_pay' => $request->price_pay,
            'total_price' => $request->total_price,
        ]);  

        if($result == 1){
            $wareHouseDetails = WareHouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)->first();
            return Payload::toJson(new WareHouseDetailResource($wareHouseDetails), "Update Successfully", 202);
        }
        
        return Payload::toJson(null, "Cannot Update", 500);
    }

    public function destroy(Request $request){
        $result = WareHouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)
        ->update(['status' => $request->status]);

        if($result == 1){
            $wareHouseDetails = WareHouseDetail::where('id_warehouse_detail', $request->id_warehouse_detail)->first();
            return Payload::toJson(new WareHouseDetailResource($wareHouseDetails), "Remove Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Update", 500);
    }
}
