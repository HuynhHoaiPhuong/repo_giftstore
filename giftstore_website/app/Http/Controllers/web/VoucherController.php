<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\VoucherController as ServicesVoucherController;

class VoucherController extends Controller
{
    public function voucherManagement(){
        $voucherController = new ServicesVoucherController();
        $data_voucher = $voucherController->getAllVoucher();
        $vouchers = [];
        if($data_voucher['data']!=null)
        $vouchers = $data_voucher['data']->collection;
        return view('admin/voucher_management/voucher_management',['vouchers'=>$vouchers]);
    }
}
