<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\BillOrderDetailController as ServicesBillOrderDetailController;

class BillOrderDetailController extends Controller
{
    public function billOrderDetailManagement($id_bill_order){
        $billOrderDetailController = new ServicesBillOrderDetailController();
        $data_billOrderDetail = $billOrderDetailController->getAllBillOrderDetailByIdBillOrder($id_bill_order);
        $billOrderDetails = [];
        if($data_billOrderDetail['data']!=null)
            $billOrderDetails = $data_billOrderDetail['data']->collection;
        return view('admin/bill_order_management/bill_order_detail_management', ['billOrderDetails' => $billOrderDetails]);
    }
}
