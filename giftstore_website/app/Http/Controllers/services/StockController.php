<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use Carbon\Carbon;
use App\Http\Resources\StockResource;
use App\Http\Payload;

class StockController extends Controller
{
    public function getAllStockByStatus($status)
    {
        $stocks = Stock::where([
                ['status', $status]
            ])->orderBy('name','ASC')->get();
         if($stocks->isEmpty())
            return Payload::toJson(null,"Data Not Found",404);   
        return Payload::toJson(StockResource::collection($stocks),"Request Successfully",200);
    }
    public function saveStock(Request $req)
    {
        $stock = new Stock();
        $stock->fill(
            [
                'id_stock' =>  $req -> id_stock,
                'name' => $req->name,
                'address' => $req->address,
            ]
        );
        $stock->save();
        $stock = Stock::where('id_stock',$stock->id_stock)->first();
        return Payload::toJson(new StockResource($stock),"Create Successfully",201);
    }

    public function updateStock(Request $req)
    {
        $result = Stock::where('id_stock', $req -> id_stock)
            //Key Value // Get e by array...
            ->update(
                [
                    'name' => $req->name,
                    'address' => $req->address,
                ],
            );  
        if($result == 1){
            $stock = Stock::where('id_stock',$req->id_stock)->first();
            return Payload::toJson(new StockResource($stock),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function removeStock(Request $req)
    {
        $result = Stock::where('id_stock', $req -> id_stock)
             ->update(['status'=> $req -> status]);
        if($result == 1)
        {
            $stock = Stock::where('id_stock',$req->id_stock)->first();
            return Payload::toJson(new StockResource($stock),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
}
