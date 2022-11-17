<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Http\Payload;
use App\Http\Resources\BillResource;

class BillController extends Controller
{
    public function getAllBillByStatus ($status)
    {
        $bills = Bill::where('status',$status)->get();
        if($bills->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(BillResource::collection($bills),'Ok',200);
    }

    public function saveBill(Request $req)
    {
        $bills = new Bill();
        $bills->fill([
            'id_bill' => $req->id_bill,
            'id_member'=>$req->id_member,
            'code_voucher'=>$req->code_voucher,
            'total_price'=>$req->total_price,
            'total_quantity'=>$req->total_quantity,
            'payment'=>$req->payment,
            'date_order'=>$req->date_order,
            'date_confirm'=>$req->date_confirm,
            'status'=>$req->status
        ]);
        if($bills->save()==1){
            $bills = Bill::where('id_bill', $bills->id_bill)->first();
            return Payload::toJson(new BillResource($bills),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
    // public function updateBill (Request $req)
    // {
    //     $bills= Bill::where('id_bill',$req->id_bill)
    //     ->update(['name'=>$req->name]);
    //     if($bills == 1){
    //         return Payload::toJson($bills,'Completed',200);
    //     }
    //     return Payload::toJson($bills,'Uncompleted',500);
    // }
    // public function removeBill($id)
    // {
    //     $bills = Bill::where('id_bill', $id)->first();
    //     if($bills)
    //     {
    //         $bills = Bill::where('id_bill', $id)->delete();
    //         return Payload::toJson(new BillResource($bills),"Remove Successfully",202);
    //     }
    //     return Payload::toJson(null,"Cannot Deleted!",500);
    // }
}
