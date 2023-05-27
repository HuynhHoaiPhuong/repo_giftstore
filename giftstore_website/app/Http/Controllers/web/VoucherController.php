<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function voucherManagement(){
        return view('admin/voucher_management/voucher');
    }
}
