<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\BillDetailController as ServicesBillDetailController;


class BillDetailController extends Controller
{
    public function billDetailManagement($id_bill){
        $billDetailController = new ServicesBillDetailController();
        $data_billDetail = $billDetailController->getAllBillDetailByIdBill($id_bill);
        $billDetails = [];
        if($data_billDetail['data'] != null)
            $billDetails = $data_billDetail['data']->collection;
        return view('admin/bill_management/bill_detail_management',['billDetails' => $billDetails]);
    }
}
