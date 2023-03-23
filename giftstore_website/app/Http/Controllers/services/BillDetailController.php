<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillDetail;
use App\Http\Payload;
use App\Http\Resources\BillDetailResource;
class BillDetailController extends Controller
{
    public function getAllBillDetailByStatus ($status)
    {
        $billDetails = BillDetail::where('status', $status)->get();
        if($billDetails->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(BillDetailResource::collection($billDetails), 'Ok', 200);
    }

    public function store(Request $request)
    {
        $billDetails = new BillDetail();
        $billDetails->fill([
            'id_bill_detail' => $request->id_bill_detail, 
            'id_bill' => $request->id_bill, 
            'id_product' => $request->id_product, 
            'quantity' => $request->quantity, 
            'price' => $request->price, 
            'discount' => $request->discount, 
            'rate_status' => $request->rate_status
        ]);
        if($billDetails->save() == 1){
            $billDetails = BillDetail::where('id_bill_detail', $billDetails->id_bill_detail)->first();
            return Payload::toJson(new BillDetailResource($billDetails), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function update(Request $request)
    {
        $billDetails = BillDetail::where('id_bill_detail', $request->id_bill_detail)
        ->update([
            'id_bill' => $request->id_bill, 
            'id_product' => $request->id_product, 
            'quantity' => $request->quantity, 
            'price' => $request->price, 
            'discount' => $request->discount, 
            'rate_status' => $request->rate_status
        ]);
        if($billDetails == 1){
            return Payload::toJson($billDetails, 'Completed', 200);
        }
        return Payload::toJson($billDetails, 'Uncompleted', 500);
    }
    public function destroy($id)
    {
        $billDetails = BillDetail::where('id_bill_detail', $id)->first();
        if($billDetails)
        {
            $billDetails = BillDetail::where('id_bill_detail', $id)->delete();
            return Payload::toJson(new BillDetailResource($billDetails), "Remove Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Deleted!", 500);
    }
}
