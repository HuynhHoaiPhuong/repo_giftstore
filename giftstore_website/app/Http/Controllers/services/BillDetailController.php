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

    public function saveBillDetail(Request $request)
    {
        $billDetails = new BillDetail();
        $billDetails->fill([
            'id_bill_detail' => $request->id_bill_detail, 
            'id_bill' => $request->id_bill, 
            'id_product' => $request->id_product, 
            'id_discount' => $request->id_discount, 
            'quantity' => $request->quantity, 
            'total_price' => $request->total_price, 
            'rate_status' => $request->rate_status
        ]);
        if($billDetails->save() == 1){
            $billDetails = BillDetail::where('id_bill_detail', $billDetails->id_bill_detail)->first();
            return Payload::toJson(new BillDetailResource($billDetails), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    
}
