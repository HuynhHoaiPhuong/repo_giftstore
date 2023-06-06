<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\WarehouseDetailController as ServicesWarehouseDetailController;

class WarehouseDetailController extends Controller
{
    public function warehouseDetailManagement($id_warehouse){
        $warehouseDetailController = new ServicesWarehouseDetailController();
        $data_warehouseDetail = $warehouseDetailController->getAllWarehouseDetailByIdWarehouse($id_warehouse);
        $warehouseDetails = [];
        if($data_warehouseDetail['data']!=null)
        $warehouseDetails = $data_warehouseDetail['data']->collection;
        return view('admin/warehouse_management/warehouse_detail',['warehouseDetails'=>$warehouseDetails]);
    }
}
