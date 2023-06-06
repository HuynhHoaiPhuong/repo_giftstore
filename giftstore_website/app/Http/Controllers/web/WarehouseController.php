<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\services\WarehouseController as ServicesWarehouseController;

class WarehouseController extends Controller
{
    public function warehouseManagement(){
        $warehouseController = new ServicesWarehouseController();
        $data_warehouse = $warehouseController->getAllWarehouse();
        $warehouses = [];
        if($data_warehouse['data']!=null)
        $warehouses = $data_warehouse['data']->collection;
        return view('admin/warehouse_management/warehouse',['warehouses'=>$warehouses]);
    }
}
