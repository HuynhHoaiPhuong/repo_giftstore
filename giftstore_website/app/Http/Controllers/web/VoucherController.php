<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\VoucherController as ServicesVoucherController;

class VoucherController extends Controller
{
    public function voucherManagement(){
        $voucherController = new ServicesVoucherController();
        $data_voucher = $voucherController->getAllVoucherByStatus('enabled');
        $vouchers = [];
        if($data_voucher['data']!=null)
        $vouchers = $data_voucher['data']->collection;
        return view('admin/voucher_management/voucher_management',['vouchers'=>$vouchers]);
    }

    public function addVoucher(Request $req){
        $voucherController = new ServicesVoucherController();
        if($req->name==null){
            return back()->with('error','Tạo thất bại');
        }
        $result = $voucherController->saveVoucher($req);
        if($result['data']==null){
            return back()->with('error','Tạo thất bại');
        }
        return redirect(route('voucher-management'));
    }

    public function updateVoucher(Request $req){
        $voucherController = new ServicesVoucherController();
        if($req->code=='' || $req->id_voucher == '' || $req->id_voucher == null){
            return back()->with('error','Chỉnh sửa thất bại');
        }
        $result = $voucherController->updateVoucher($req);

        if($result['data']==null){
            return back()->with('error','Chỉnh sửa thất bại');
        }
        return redirect(route('voucher-management'));
    }

    public function recycleVoucher(){
        $voucherController = new ServicesVoucherController();
        $data_voucher = $voucherController->getAllVoucherByStatus('disabled');
        $vouchers = [];
        if($data_voucher['data']!=null)
        $vouchers = $data_voucher['data']->collection;
        return view('admin/voucher_management/recycle_voucher',['vouchers'=>$vouchers]);
    }
}
