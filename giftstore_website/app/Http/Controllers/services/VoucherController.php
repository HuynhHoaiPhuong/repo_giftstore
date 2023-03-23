<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Http\Payload;
use App\Http\Resources\VoucherResource;

class VoucherController extends Controller
{
    public function getAllVoucherByStatus ($status)
    {
        $vouchers = Voucher::where('status', $status)->get();
        if($vouchers->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(VoucherResource::collection($vouchers), 'Ok', 200);
    }

    public function store(Request $request)
    {
        $vouchers = new Voucher();
        $vouchers->fill([
            'id_voucher' => $request->id_voucher, 
            'code' => $request->code, 
            'max_user' => $request->max_user, 
            'max_price' => $request->max_price, 
            'percent_price' => $request->percent_price, 
            'min_price_pay' => $request->min_price_pay, 
            'description' => $request->description, 
            'date_start' => $request->date_start, 
            'date_end' => $request->date_end, 
        ]);
        if($vouchers->save() == 1){
            $Voucher=Voucher::where('id_voucher', $vouchers->id_voucher)->first();
            return Payload::toJson(new VoucherResource($Voucher), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function update(Request $request)
    {
        $vouchers = Voucher::where('id_voucher', $request->id_voucher)
        ->update([
            'code' => $request->code, 
            'max_user' => $request->max_user, 
            'max_price' => $request->max_price, 
            'percent_price' => $request->percent_price, 
            'min_price_pay' => $request->min_price_pay, 
            'description' => $request->description, 
            'date_start' => $request->date_start, 
            'date_end' => $request->date_end, 
        ]);
        if($vouchers == 1){
            return Payload::toJson($vouchers, 'Completed', 200);
        }
        return Payload::toJson($vouchers, 'Uncompleted', 500);
    }
    public function destroy($id)
    {
        $vouchers = Voucher::where('id_voucher', $id)->first();
        if($vouchers)
        {
            $vouchers = Voucher::where('id_voucher', $id)->delete();
            return Payload::toJson(new VoucherResource($vouchers), "Remove Successfully", 202);
        }
        return Payload::toJson(null, "Cannot Deleted!", 500);
    }
}
