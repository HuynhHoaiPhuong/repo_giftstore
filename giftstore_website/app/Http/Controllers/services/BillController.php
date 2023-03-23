<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Http\Payload;
use App\Http\Resources\BillResource;

class BillController extends Controller
{
    public function getAllBillByStatus($status)
    {
        $bills = Bill::where('status', $status)->get();
        if($bills->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(BillResource::collection($bills), 'Ok', 200);
    }

    public function store(Request $request)
    {
        $bills = new Bill();
        $bills->fill([
            'id_bill' => $request->id_bill, 
            'id_member' => $request->id_member, 
            'code_voucher' => $request->code_voucher, 
            'total_price' => $request->total_price, 
            'total_quantity' => $request->total_quantity, 
            'payment' => $request->payment, 
            'date_order' => $request->date_order, 
            'date_confirm' => $request->date_confirm, 
        ]);
        if($bills->save() == 1){
            $bills = Bill::where('id_bill', $bills->id_bill)->first();
            return Payload::toJson(new BillResource($bills), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    // public function update(Request $request)
    // {
    //     $bills= Bill::where('id_bill', $request->id_bill)
    //     ->update(['name' => $request->name]);
    //     if($bills == 1){
    //         return Payload::toJson($bills, 'Completed', 200);
    //     }
    //     return Payload::toJson($bills, 'Uncompleted', 500);
    // }
    // public function destroy($id)
    // {
    //     $bills = Bill::where('id_bill',  $id)->first();
    //     if($bills)
    //     {
    //         $bills = Bill::where('id_bill',  $id)->delete();
    //         return Payload::toJson(new BillResource($bills), "Remove Successfully", 202);
    //     }
    //     return Payload::toJson(null, "Cannot Deleted!", 500);
    // }
}
