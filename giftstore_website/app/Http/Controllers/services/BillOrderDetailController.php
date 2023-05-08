<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillOrderDetail;
use App\Http\Payload;
use App\Http\Resources\BillOrderDetailResource;

class BillOrderDetailController extends Controller
{
    public function getAllBillOrderDetailByStatus ($status)
    {
        $billOrderDetails = BillOrderDetail::where('status', $status)->get();
        if($billOrderDetails->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(BillOrderDetailResource::collection($billOrderDetails), 'Ok', 200);
    }

    public function saveBillOrderDetail(Request $request)
    {
        $billOrderDetails = new BillOrderDetail();
        $billOrderDetails->fill([
            'id_bill_order_detail' => $request->id_bill_order_detail, 
            'id_bill_order' => $request->id_bill_order, 
            'id_product' => $request->id_product,
            'quantity' => $request->quantity,
            'total_price' => $request->total_price, 
            'status' => $request->status
        ]);
        if($billOrderDetails->save() == 1){
            $billOrderDetails=BillOrderDetail::where('id_bill_order_detail', $billOrderDetails->id_bill_order_detail)->first();
            return Payload::toJson(new BillOrderDetailResource($billOrderDetails), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
}
