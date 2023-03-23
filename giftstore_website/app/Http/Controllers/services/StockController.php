<?php

namespace App\Http\Controllers\services;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Http\Payload;
use App\Http\Resources\StockResource;

class StockController extends Controller
{
    public function getAllStockByStatus ($status)
    {
        $stocks = Stock::where('status', $status)->get();
        if($stocks->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(StockResource::collection($stocks), 'Ok', 200);
    }

    public function store(Request $request)
    {
        $stock = new Stock();
        $stock->fill([
            'id_stock' => $request->id_stock,
            'name' => $request->name,
            'address' => $request->address,
        ]);
        if($stock->save() == 1){
            $stock = Stock::where('id_stock', $stock->id_stock)->first();
            return Payload::toJson(new StockResource($stock), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function update(Request $request)
    {
        $stock = Stock::where('id_stock', $request->id_stock)
        ->update([
            'name' => $request->name, 
            'address' => $request->address, 
        ]);
        if($stock == 1){
            return Payload::toJson($stock, 'Completed', 200);
        }
        return Payload::toJson($stock, 'Uncompleted', 500);
    }
 
    public function destroy($id)
    {
        $stocks = Stock::where('id_stock', $id)->first();
        if($stocks)
        {
            $stocks = Stock::where('id_stock', $id)->delete();
            return Payload::toJson(new StockResource($stocks), "Remove Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Deleted!", 500);
    }
}

