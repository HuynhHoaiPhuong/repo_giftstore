<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillOrder;
use App\Http\Payload;
use App\Http\Resources\BillOrderResource;

class BillOrderController extends Controller
{
    public function getAllBillOrderByStatus($status)
    {
        $billOrders = BillOrder::where('status', $status)->get();
        if($billOrders->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(BillOrderResource::collection($billOrders), 'Ok', 200);
    }

    public function store(Request $request)
    {
        $billOrders = new BillOrder();
        $billOrders->fill([
            'id_bill_order' => $request->id_bill_order, 
            'id_producer' => $request->id_producer, 
            'id_user' => $request->id_user, 
            'id_stock' => $request->id_stock, 
            'quantity' => $request->quantity, 
            'total_price' => $request->total_price, 
            'date_order' => $request->date_order, 
        ]);
        if($billOrders->save() == 1){
            $BillOrder=BillOrder::where('id_bill_order', $billOrders->id_bill_order)->first();
            return Payload::toJson(new BillOrderResource($BillOrder), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    // public function update(Request $request)
    // {
    //     $billOrders = BillOrder::where('id_bill_order', $request->id_bill_order)
    //     ->update([
    //         'id_producer' => $request->id_producer, 
    //         'id_user' => $request->id_user, 
    //         'id_stock' => $request->id_stock, 
    //         'quantity' => $request->quantity, 
    //         'total_price' => $request->total_price, 
    //     ]);
    //     if($billOrders == 1){
    //         return Payload::toJson($billOrders, 'Completed', 200);
    //     }
    //     return Payload::toJson($billOrders, 'Uncompleted', 500);
    // }
    // public function destroy($id)
    // {
    //     $billOrders = BillOrder::where('id_bill_order', $id)->first();
    //     if($billOrders)
    //     {
    //         $billOrders = BillOrder::where('id_bill_order', $id)->delete();
    //         return Payload::toJson(new BillOrderResource($billOrders), "Remove Successfully", 202);
    //     }
    //     return Payload::toJson(null, "Cannot Deleted!", 500);
    // }
}
