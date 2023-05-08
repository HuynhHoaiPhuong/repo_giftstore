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
        $billOrder = BillOrder::where('status', $status)->get();
        if($billOrder->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(BillOrderResource::collection($billOrder), 'Ok', 200);
    }

    public function saveBillOrder(Request $request)
    {
        $billOrder = new BillOrder();
        $billOrder->fill([
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
        if($billOrder->save() == 1){
            $BillOrder = BillOrder::where('id_bill_order', $billOrder->id_bill_order)->first();
            return Payload::toJson(new BillOrderResource($BillOrder), 'Created', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
}
