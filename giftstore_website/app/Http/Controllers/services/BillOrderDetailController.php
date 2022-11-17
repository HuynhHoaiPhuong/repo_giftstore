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
        $billOrderDetails = BillOrderDetail::where('status',$status)->get();
        if($billOrderDetails->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(BillOrderDetailResource::collection($billOrderDetails),'Ok',200);
    }

    public function saveBillOrderDetail(Request $req)
    {
        $billOrderDetails = new BillOrderDetail();
        $billOrderDetails->fill([
            'id_bill_order_detail' => $req->id_bill_order_detail,
            'id_bill_order' => $req->id_bill_order,
            'id_product'=>$req->id_product,
            'price'=>$req->price,
            'quantity'=>$req->quantity,
            'discount'=>$req->discount,
            'rate_status'=>$req->rate_status
        ]);
        if($billOrderDetails->save() == 1){
            $billOrderDetails=BillOrderDetail::where('id_bill_order_detail',$billOrderDetails->id_bill_order_detail)->first();
            return Payload::toJson(new BillOrderDetailResource($billOrderDetails),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
    public function updateBillOrderDetail (Request $req)
    {
        $billOrderDetails = BillOrderDetail::where('id_bill_order_detail',$req->id_bill_order_detail)
        ->update(['name'=>$req->name]);
        if($billOrderDetails == 1){
            return Payload::toJson($billOrderDetails,'Completed',200);
        }
        return Payload::toJson($billOrderDetails,'Uncompleted',500);
    }
    public function removeBillOrderDetail($id)
    {
        $billOrderDetails = BillOrderDetail::where('id_bill_order_detail',$id)->first();
        if($billOrderDetails)
        {
            $billOrderDetails = BillOrderDetail::where('id_bill_order_detail',$id)->delete();
            return Payload::toJson(new BillOrderDetailResource($billOrderDetails),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Deleted!",500);
    }
}
