<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
session_start();

class BillController extends Controller
{
    public function allBill(){
        $all_bill = DB::table('tbl_bill')
        ->join('tbl_member','tbl_member.id','=','tbl_bill.id_member')
        ->orderby('tbl_bill.id','desc')->get();
        $manager_bill = view('admin.bill_management.all_bill')->with('all_bill', $all_bill); 
        return view('admin_layout')->with('admin.bill_management.all_bill',$manager_bill);   

    }
}