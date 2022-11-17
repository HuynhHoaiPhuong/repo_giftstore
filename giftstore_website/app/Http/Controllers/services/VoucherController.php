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
        $vouchers = Voucher::where('status',$status)->get();
        if($vouchers->isEmpty())
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(VoucherResource::collection($vouchers),'Ok',200);
    }

    public function saveVoucher(Request $req)
    {
        $vouchers = new Voucher();
        $vouchers->fill([
            'id_voucher' => $req->id_voucher,
            'code'=>$req->code,
            'max_user'=>$req->max_user,
            'max_price'=>$req->max_price,
            'percent_price'=>$req->percent_price,
            'min_price_pay'=>$req->min_price_pay,
            'description'=>$req->description,
            'date_start'=>$req->date_start,
            'date_end'=>$req->date_end,
            'status'=>$req->status
        ]);
        if($vouchers->save() == 1){
            $Voucher=Voucher::where('id_voucher',$vouchers->id_voucher)->first();
            return Payload::toJson(new VoucherResource($Voucher),'Completed',201);
        }
        return Payload::toJson(null,'Uncompleted',500);
    }
    public function updateVoucher (Request $req)
    {
        $vouchers= Voucher::where('id_voucher',$req->id_voucher)
        ->update(['name'=>$req->name]);
        if($vouchers == 1){
            return Payload::toJson($vouchers,'Completed',200);
        }
        return Payload::toJson($vouchers,'Uncompleted',500);
    }
    public function removeVoucher($id)
    {
        $vouchers = Voucher::where('id_voucher',$id)->first();
        if($vouchers)
        {
            $vouchers = Voucher::where('id_voucher',$id)->delete();
            return Payload::toJson(new VoucherResource($vouchers),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Deleted!",500);
    }
}
