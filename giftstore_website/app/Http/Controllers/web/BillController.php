<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    public function index(){
        return view('admin/bill_management/all_bill');
    }
}