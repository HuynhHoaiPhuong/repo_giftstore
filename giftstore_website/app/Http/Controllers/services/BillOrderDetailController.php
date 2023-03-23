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

    public function store(Request $request)
    {
        $billOrderDetails = new BillOrderDetail();
        $billOrderDetails->fill([
            'id_bill_order_detail' => $request->id_bill_order_detail, 
            'id_bill_order' => $request->id_bill_order, 
            'id_product' => $request->id_product, 
            'price' => $request->price, 
            'quantity' => $request->quantity, 
            'discount' => $request->discount, 
            'rate_status' => $request->rate_status
        ]);
        if($billOrderDetails->save() == 1){
            $billOrderDetails=BillOrderDetail::where('id_bill_order_detail', $billOrderDetails->id_bill_order_detail)->first();
            return Payload::toJson(new BillOrderDetailResource($billOrderDetails), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function update(Request $request)
    {
        $billOrderDetails = BillOrderDetail::where('id_bill_order_detail', $request->id_bill_order_detail)
        ->update([
            'id_bill_order' => $request->id_bill_order, 
            'id_product' => $request->id_product, 
            'price' => $request->price, 
            'quantity' => $request->quantity, 
            'discount' => $request->discount, 
            'rate_status' => $request->rate_status
        ]);
        if($billOrderDetails == 1){
            return Payload::toJson($billOrderDetails, 'Completed', 200);
        }
        return Payload::toJson($billOrderDetails, 'Uncompleted', 500);
    }
    public function destroy($id)
    {
        $billOrderDetails = BillOrderDetail::where('id_bill_order_detail', $id)->first();
        if($billOrderDetails)
        {
            $billOrderDetails = BillOrderDetail::where('id_bill_order_detail', $id)->delete();
            return Payload::toJson(new BillOrderDetailResource($billOrderDetails), "Remove Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Deleted!", 500);
    }
}
