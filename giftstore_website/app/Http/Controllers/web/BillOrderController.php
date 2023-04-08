<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillOrderController extends Controller
{
    public function index(){
        return view('admin/bill_order_management/all_bill_order');
    }
}