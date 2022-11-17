<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillOrder;
use App\Http\Payload;
use App\Http\Resources\BillOrderResource;

class BillOrderController extends Controller
{
    public function getAllBillOrderByStatus ($status)
    {
        $billOrders = BillOrder::where('status',$status)->get();
        if($billOrders->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(BillOrderResource::collection($billOrders),'Ok',200);
    }

    public function saveBillOrder(Request $req)
    {
        $billOrders = new BillOrder();
        $billOrders->fill([
            'id_bill_order' => $req->id_bill_order,
            'id_producer'=>$req->id_producer,
            'id_user'=>$req->id_user,
            'id_stock'=>$req->id_stock,
            'quantity'=>$req->quantity,
            'total_price'=>$req->total_price,
            'date_order'=>$req->date_order,
            'status'=>$req->status
        ]);
        if($billOrders->save()==1){
            $BillOrder=BillOrder::where('id_bill_order',$billOrders->id_bill_order)->first();
            return Payload::toJson(new BillOrderResource($BillOrder),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
    public function updateBillOrder (Request $req)
    {
        $billOrders= BillOrder::where('id_bill_order',$req->id_bill_order)
        ->update(['name'=>$req->name]);
        if($billOrders == 1){
            return Payload::toJson($billOrders,'Completed',200);
        }
        return Payload::toJson($billOrders,'Uncompleted',500);
    }
    public function removeBillOrder($id)
    {
        $billOrders = BillOrder::where('id_bill_order',$id)->first();
        if($billOrders)
        {
            $billOrders = BillOrder::where('id_bill_order',$id)->delete();
            return Payload::toJson(new BillOrderResource($billOrders),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Deleted!",500);
    }
}
