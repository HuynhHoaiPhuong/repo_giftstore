<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Http\Payload;
use App\Http\Resources\BillResource;
use Carbon\Carbon;

class BillController extends Controller
{
    public function getAllBill()
    {
        $bills = Bill::all();
        if($bills->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(BillResource::collection($bills), 'Request Successfully', 200);
    }
    public function getAllBillByStatus($status)
    {
        $bills = Bill::where('status', $status)->get();
        if($bills->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(BillResource::collection($bills), 'Ok', 200);
    }

    public function saveBill(Request $request)
    {
        $bills = new Bill();
        $bills->fill([
            'id_bill' => "B".Carbon::now('Asia/Ho_Chi_Minh')->format('ymdhis').rand(1, 1000), 
            'id_member' => $request->id_member, 
            'id_voucher' => $request->id_voucher,
            'id_payment' => $request->id_payment, 
            'total_quantity' => $request->total_quantity, 
            'total_price' => $request->total_price, 
            'order_date' => Carbon::now('Asia/Ho_Chi_Minh'), 
            // 'date_of_payment' => $request->date_of_payment, 
        ]);
        if($bills->save() == 1){
            $bills = Bill::where('id_bill', $bills->id_bill)->first();
            return Payload::toJson(new BillResource($bills), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
}
