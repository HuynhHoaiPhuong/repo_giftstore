<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillOrder;
use App\Http\Resources\BillOrderResource;
use App\Http\Payload;
use Carbon\Carbon;

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
            'id_bill_order' => "BILLORDER".Carbon::now()->format('ymdhis').rand(1, 1000),
            'id_provider' => $request->id_provider, 
            'id_payment' => $request->id_payment, 
            'id_user' => $request->id_user, 
            'id_warehouse' => $request->id_warehouse, 
            'total_quantity' => $request->quantity, 
            'total_price' => $request->total_price, 
            'date_order' => $request->date_order, 
            'date_of_payment' => $request->date_of_payment, 
        ]);
        if($billOrders->save() == 1){
            $BillOrder = BillOrder::where('id_bill_order', $billOrders->id_bill_order)->first();
            return Payload::toJson(new BillOrderResource($BillOrder), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
}
