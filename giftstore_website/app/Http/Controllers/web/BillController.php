<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;
use App\Http\Controllers\services\BillController as ServicesBillController;

class BillController extends Controller
{
    public function billManagement(){
        $billController = new ServicesBillController();
        $data_bill = $billController->getAllBill();
        $bills = [];
        if($data_bill['data']!=null)
            $bills = $data_bill['data']->collection;
        return view('admin/bill_management/bill_management', ['bills' => $bills]);
    }
}