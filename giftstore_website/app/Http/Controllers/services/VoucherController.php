<?php

namespace App\Http\Controllers\services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Voucher;
use Carbon\Carbon;
use App\Http\Payload;
use App\Http\Resources\VoucherResource;

class VoucherController extends Controller
{
    public function getAllVoucher()
    {
        $vouchers = Voucher::all();
        if($vouchers->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(VoucherResource::collection($vouchers), 'Ok', 200);
    }

    public function getAllVoucherByStatus ($status)
    {
        $vouchers = Voucher::where('status', $status)->get();
        if($vouchers->isEmpty())
        {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(VoucherResource::collection($vouchers), 'Ok', 200);
    }

    public function getVoucherById ($id_voucher)
    {
        $voucher= Voucher::where('id_voucher',$id_voucher)->first();
        if(!$voucher)
        {
            return Payload::toJson(null,'Data Not Found',404);
        }
        return Payload::toJson(new VoucherResource($voucher),'Request Successfully',200);
    }

    public function saveVoucher(Request $request)
    {
        $vouchers = new Voucher();
        $vouchers->fill([
            'id_voucher' => Carbon::now()->format('ymdhis').rand(1,1000), 
            'name' => $request->name, 
            'code' => $request->code, 
            'number_of_uses' => $request->number_of_uses, 
            'percent_price' => $request->percent_price, 
            'max_price' => $request->max_price, 
            'min_price' => $request->min_price, 
            'description' => $request->description, 
            'start_day' => $request->start_day, 
            'expiration_date' => $request->expiration_date, 
        ]);
        if($vouchers->save() == 1){
            $Voucher=Voucher::where('id_voucher', $vouchers->id_voucher)->first();
            return Payload::toJson(new VoucherResource($Voucher), 'Completed', 201);
        }
        return Payload::toJson(null, 'Uncompleted', 500);
    }
    public function updateVoucher(Request $request)
    {
        $vouchers = Voucher::where('id_voucher', $request->id_voucher)
        ->update([
            'name' => $request->name, 
            'code' => $request->code, 
            'number_of_uses' => $request->number_of_uses, 
            'percent_price' => $request->percent_price, 
            'max_price' => $request->max_price,
            'min_price' => $request->min_price, 
            'description' => $request->description, 
            'start_day' => $request->start_day, 
            'expiration_date' => $request->expiration_date, 
        ]);
        
        if($result == 1){
            $vouchers = Voucher::where('id_voucher',$req->id_voucher)->first();
            return Payload::toJson(new VoucherResource($vouchers),"Update Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }
    public function removeVoucher(Request $req)
    {
        $result = Voucher::where('id_voucher', $req -> id_voucher)
             ->update(['status'=> $req -> status]);
        if($result == 1)
        {
            $voucher = Voucher::where('id_voucher',$req->id_voucher)->first();
            return Payload::toJson(new VoucherResource($voucher),"Remove Successfully",202);
        }
        return Payload::toJson(null,"Cannot Update",500);
    }

    public function deleteVoucher(Request $req)
    {
        if($req->id_voucher){
            $result = Voucher::where('id_voucher', $req->id_voucher)->delete();
            if($result) return Payload::toJson(true, "Remove Successfully", 202);
        }
        return Payload::toJson(false, "Cannot Deleted!", 500);
    }

    public function clearVoucher(Request $req)
    {
        $result = Voucher::where('status', 'disabled')->delete();
        if($result) return Payload::toJson(true, "Remove Successfully", 202);
        return Payload::toJson(false, "Cannot Deleted!", 500);
    }
}
