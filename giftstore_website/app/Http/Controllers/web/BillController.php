<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    public function billManagement(){
        return view('admin/bill_management/bill_management');
    }
}