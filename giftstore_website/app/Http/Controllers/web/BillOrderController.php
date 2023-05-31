<?php

namespace App\Http\Controllers\web;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\BillOrderController as ServicesBillOrderController;

class BillOrderController extends Controller
{
    public function billOrderManagement(){
        $billOrderController = new ServicesBillOrderController();
        $data_billOrder = $billOrderController->getAllBillOrder();
        $billOrders = [];
        if($data_billOrder['data']!=null)
            $billOrders = $data_billOrder['data']->collection;
        return view('admin/bill_order_management/bill_order_management', ['billOrders' => $billOrders]);
    }
}