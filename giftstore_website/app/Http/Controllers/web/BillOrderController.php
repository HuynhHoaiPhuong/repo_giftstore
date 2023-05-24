<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillOrderController extends Controller
{
    public function billOrderManagement(){
        return view('admin/bill_order_management/bill_order_management');
    }
}