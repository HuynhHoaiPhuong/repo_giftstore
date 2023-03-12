<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StockDetail;
use App\Http\Payload;
use App\Http\Resources\StockDetailResource;

class StockDetailController extends Controller
{
    public function getAllStockDetailByStatus ($status)
    {
        $stockdetails= StockDetail::where('status',$status)->get();
        if($stockdetails->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(StockDetailResource::collection($stockdetails),'Ok',200);
    }

    public function saveStockDetail(Request $req)
    {
        $stockdetails = new StockDetail();

        $stockdetails->fill([
            'id_stock_detail' => $req->id_stock_detail,
            'id_stock'=>$req->id_stock,
            'id_product'=>$req->id_product,
            'quantity'=>$req->quantity,
            'price_pay'=>$req->price_pay,
            'total_price'=>$req->total_price,
            'status'=>$req->status,
            'date_created'=>$req->date_created,
            'date_updated'=>$req->date_updated
        ]);
        if($stockdetails->save()==1){
            $stockdetails=StockDetail::where('id_stock_detail',$stockdetails->id_stock_detail)->first();
            return Payload::toJson(new StockDetailResource($stockdetails),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
    public function updateStockDetail (Request $req)
    {
        $stockdetails= StockDetail::where('id_stock_detail',$req->id_stock_detail)
        ->update(['name'=>$req->name]);
        if($stockdetails==1){
            return Payload::toJson($stockdetails,'Completed',200);
        }
        return Payload::toJson($stockdetails,'Uncompleted',500);
    }
    public function removeStockDetail($id)
    {
        $stockdetails = StockDetail::where('id_stockdetail',$id)->first();
        if($stockdetails)
        {
            $stockdetails = StockDetail::where('id_stockdetail',$id)->delete();
            return Payload::toJson(new StockDetailResource($stockdetails),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Deleted!",500);
    }
}
